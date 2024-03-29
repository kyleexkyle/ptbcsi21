<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26/10/2020
 * Time: 5:17 PM
 */

namespace App\Controllers;

use App\Controllers\ZKLib\ZKLib;
use App\Models\Eloquent\Employee;
use App\Models\Eloquent\Holiday;
use App\Models\Eloquent\Overtime;
use App\Models\Eloquent\Payroll;
use App\Models\Eloquent\TimeSheet;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;

class DtrController extends BaseController
{
    public $s_pre = 0;
    public function index()
    {

        $half = (isset($_POST['half']) ? $_POST['half'] : ($this->session->getFlashdata('half') ?? (Carbon::now()->format('d') < 15 ? 'A' : 'B')));
        $month = (isset($_POST['month']) ? $_POST['month'] : ($this->session->getFlashdata('month') ?? Carbon::now()->format('m')));
        $year = (isset($_POST['year']) ? $_POST['year'] : ($this->session->getFlashdata('year') ?? Carbon::now()->format('Y')));

        $start = ($half == "A" ? 1 : 16);
        $end = ($half == "A" ? 15 : Carbon::createFromFormat('m-Y', $month . '-' . $year)->endOfMonth()->format('d'));

        $data['half'] = $half;
        $data['month'] = $month;
        $data['year'] = $year;
        $data['start'] = $start;
        $data['end'] = $end;
        $data['employees'] = Employee::with('schedule', 'position')->get();
        $selected = Employee::first();
        $data['time_sheets'] = [];
        $data['holidays'] = Holiday::whereBetween('start', [$year . '-' . $month . '-' . $start, $year . '-' . $month . '-' . $end])->get();

        $selected_id = $this->session->getFlashdata('selected_employee') ?? (isset($_POST['selected_employee']) ? $_POST['selected_employee'] : ($this->session->userData['role'] == 'Employee' ? $this->session->userData['id'] : $selected->id));
        $data['selected_employee'] = $selected_id;
        $time_sheets = TimeSheet::where('employee_id', '=', $selected_id)->whereBetween('date', [$year . '-' . $month . '-' . $start, $year . '-' . $month . '-' . $end])->get();
        $data['time_sheets'] = $this->calculate_dtr($selected_id,$time_sheets);
        $data['s_pre'] = $this->s_pre;

        $overtime = Overtime::where(['employee_id' => session()->userData['id'], 'request_date' => Carbon::now()->format('Y-m-d')])->first();
        $data['requested_ot'] = $overtime != null ? true : false;
        return $this->blade->run('dtr.dtr', $data);
    }

    public function update()
    {
        foreach ($_POST['timesheet'] as $key => $item) {
            $new = false;
            if (str_contains($key, '-')) {
                foreach ($item as $data) {
                    if ($data != '') {
                        $new = true;
                    }
                }
            }

            if ($new) {
                $time_sheet = TimeSheet::create(
                    [
                        'date' => Carbon::createFromFormat('Y-m-d H:i:s', $key . ' 00:00:00'),
                        'employee_id' => $_POST['selected_employee']
                    ]
                );
            } else {
                $time_sheet = TimeSheet::find($key);
            }

            if ($time_sheet) {
                $time_sheet->morning_in = ($item[0] == '' ? null : $item[0] . ":" . $item[1]);
                $time_sheet->morning_out = ($item[2] == '' ? null : $item[2] . ":" . $item[3]);
                $time_sheet->morning_time = $item[4] == '' ? null : $item[4];
                $time_sheet->afternoon_in = ($item[5] == '' ? null : $item[5] . ":" . $item[6]);
                $time_sheet->afternoon_out = ($item[7] == '' ? null : $item[7] . ":" . $item[8]);
                $time_sheet->afternoon_time = $item[9] == '' ? null : $item[9];
                $time_sheet->overtime_in = ($item[10] == '' ? null : $item[10] . ":" . $item[11]);
                $time_sheet->overtime_out = ($item[12] == '' ? null : $item[12] . ":" . $item[13]);
                $time_sheet->overtime_time = $item[14] == '' ? null : $item[14];
                $time_sheet->pre = $item[15] == '' ? null : $item[15];
                $time_sheet->ot = $item[16] == '' ? null : $item[16];
                $time_sheet->late = $item[17] == '' ? null : $item[17];
                $time_sheet->save();
            }
        }
//        $status = $payroll->save();
//        $key = ($status ? "success" : "danger");e
//        $message = ($status ? "Schedule updated successfully!" : "Opps! There is an error while updating the schedule.");
        $this->session->setFlashdata('half', $_POST['half']);
        $this->session->setFlashdata('month', $_POST['month']);
        $this->session->setFlashdata('year', $_POST['year']);
        $this->session->setFlashdata('selected_employee', $_POST['selected_employee']);
        return redirect()->route('dtr.index');
    }

    public function calculate_dtr($selected_id, $time_sheets)
    {
        $employee = Employee::with('schedule', 'position.schedule')->where('id', $selected_id)->first();

        $schedule = $employee->schedule != null ? $employee->schedule : $employee->position->schedule;

        $sm_in = Carbon::createFromFormat('G:i', $schedule->morning_in);
        $sm_out = Carbon::createFromFormat('G:i', $schedule->morning_out);
        $sa_in = Carbon::createFromFormat('G:i', $schedule->afternoon_in);
        $sa_out = Carbon::createFromFormat('G:i', $schedule->afternoon_out);

        $sm_hrs= $sm_in->diffInSeconds($sm_out)/3600;
        $sa_hrs= $sa_in->diffInSeconds($sa_out)/3600;
        $s_pre = $sm_hrs+$sa_hrs;
        $this->s_pre = $s_pre;
        foreach ($time_sheets as $time_sheet) {
            $tm_hrs=0;
            $ta_hrs=0;
            $to_hrs=0;
            if($time_sheet->morning_in!=''){
                $tm_in = Carbon::createFromFormat('G:i', $time_sheet->morning_in);
                $tm_out = Carbon::createFromFormat('G:i', $time_sheet->morning_out!=''?$time_sheet->morning_out:$time_sheet->morning_in);
                $tm_hrs= $tm_in->diffInSeconds($tm_out)/3600;
            }

            if($time_sheet->afternoon_in!=''){
                $ta_in = Carbon::createFromFormat('G:i', $time_sheet->afternoon_in!=''?$time_sheet->afternoon_in:'00:00');
                $ta_out = Carbon::createFromFormat('G:i', $time_sheet->afternoon_out!=''?$time_sheet->afternoon_out:$time_sheet->afternoon_in);
                $ta_hrs= $ta_in->diffInSeconds($ta_out)/3600;
            }

            if($time_sheet->overtime_in!=''){
                $to_in = Carbon::createFromFormat('G:i', $time_sheet->overtime_in);
                $to_out = Carbon::createFromFormat('G:i', $time_sheet->overtime_out!=''?$time_sheet->overtime_out:$time_sheet->overtime_in);
                $to_hrs= $to_in->diffInSeconds($to_out)/3600;

            }



            $t_pre = $tm_hrs+$ta_hrs;
            $pre = $s_pre;
            $late = 0;
            $ot = $to_hrs;
            if($s_pre>$t_pre){
                $pre=$t_pre;
                $late+=$s_pre-$t_pre;
            }elseif($s_pre<$t_pre){
                $ot+= $t_pre-$s_pre;
            }

            $time_sheet->morning_time = $tm_hrs!=0?$tm_hrs:'';
            $time_sheet->afternoon_time = $ta_hrs!=0?$ta_hrs:'';
            $time_sheet->overtime_time = $to_hrs!=0?$to_hrs:'';
            $time_sheet->pre = $pre;
            $time_sheet->ot = $ot;
            $time_sheet->late = $late;
        }
        return $time_sheets;
    }

    public function get_time_diff($in, $out)
    {
        $in = \Carbon\Carbon::createFromTimeString($in);
        $out = Carbon::createFromTimeString($out);
        return (number_format($in->diffInMinutes($out) / 60.0, 2));
    }
}

