<div class="modal fade" id="payroll_notes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Payroll Notes</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
{{--                <form action="{{ route_to('payroll.update') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <input type="text" class="form-control" id="id" name="id" value="" hidden>--}}
{{--                    <input type="text" name="half" value="{{$half}}" hidden>--}}
{{--                    <input type="text" name="month" value="{{$month}}" hidden>--}}
{{--                    <input type="text" name="year" value="{{$year}}" hidden>--}}
{{--                    <div class="flex payroll_details_table">--}}
{{--                        <div class="w-50 mr-4 ">--}}
{{--                            <div class="mb-3">--}}
{{--                                <table class="edit-payroll-table w-100 table-bordered">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th colspan="4" class=" font-weight-normal"> Employee Basic Information--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>Name</td>--}}
{{--                                        <td class="w-32" id="name"></td>--}}
{{--                                        <td>Mobile No.</td>--}}
{{--                                        <td class="w-32" id="mobile"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Address</td>--}}
{{--                                        <td id="address"></td>--}}
{{--                                        <td>Bank</td>--}}
{{--                                        <td id="bank"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Email</td>--}}
{{--                                        <td id="email"></td>--}}
{{--                                        <td>Tin No.</td>--}}
{{--                                        <td id="tin_no"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Company</td>--}}
{{--                                        <td id="company"></td>--}}
{{--                                        <td>SSS No.</td>--}}
{{--                                        <td id="sss_no"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Position</td>--}}
{{--                                        <td id="position"></td>--}}
{{--                                        <td>Philheath No.</td>--}}
{{--                                        <td id="philhealth_no"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Home Tel. No.</td>--}}
{{--                                        <td id="tel_no"></td>--}}
{{--                                        <td>Pag-ibig No.</td>--}}
{{--                                        <td id="pagibig_no"></td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3">--}}
{{--                                <table class="edit-payroll-table w-100 table-bordered ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th colspan="4" class="pl-2 font-weight-normal"> Employee Time Record--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">DTR Time:</td>--}}
{{--                                        <td><input id="dtr_time" type="text" disabled></td>--}}
{{--                                        <td class="text-right">Late:</td>--}}
{{--                                        <td><input id="late" type="number" name ="late" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Leave:</td>--}}
{{--                                        <td><input id="leave" name="leave" type="number" step="0.01" class="edit-payroll-num-input" disabled></td>--}}
{{--                                        <td class="text-right">Absent:</td>--}}
{{--                                        <td><input id="absent" type="text" disabled></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Total Over Time (hrs):</td>--}}
{{--                                        <td class="border-right-0"><input id="total_ot" type="text" disabled></td>--}}
{{--                                        <td class="border-left-0" colspan="2"></td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <table class="edit-payroll-table w-100 table-bordered ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th colspan="4" class="pl-2 font-weight-normal"> Employee Deduction--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">With Tax:</td>--}}
{{--                                        <td><input id="with_tax" name="with_tax" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">PhilHealth:</td>--}}
{{--                                        <td><input id="phi" name="phi" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">SSS:</td>--}}
{{--                                        <td><input id="sss" name="sss" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">HDMF:</td>--}}
{{--                                        <td><input id="hdmf" name="hdmf" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Cash Advance:</td>--}}
{{--                                        <td><input id="cash_advance" name="cash_advance" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">SSS Loan:</td>--}}
{{--                                        <td><input id="sss_loan" name="sss_loan" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Other Deduction:</td>--}}
{{--                                        <td><input id="other_deduction" name="other_deduction" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">PAG-IBIG Loan:</td>--}}
{{--                                        <td><input id="hdmf_loan" name="hdmf_loan" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="w-50 ">--}}
{{--                            <div class="mb-3">--}}
{{--                                <table class="edit-payroll-table w-100 table-bordered ">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th colspan="4" class="pl-2 font-weight-normal"> Employee Income--}}
{{--                                        </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td class="sub-header" colspan="4">Normal Day</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Basic Salary:</td>--}}
{{--                                        <td><input id="basic_salary" name="basic_salary" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Normal Day OT:</td>--}}
{{--                                        <td><input id="normal_ot_pay" name="normal_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="sub-header" colspan="4">Rest Day and Sunday Holiday(s) Over Time</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Normal Sunday OT:</td>--}}
{{--                                        <td><input id="rd_sunday_ot_pay" name="rd_sunday_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Special:</td>--}}
{{--                                        <td><input id="rd_special_ot_pay" name="rd_special_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Regular:</td>--}}
{{--                                        <td><input id="rd_regular_ot_pay" name="rd_regular_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Double:</td>--}}
{{--                                        <td><input id="rd_double_ot_pay" name="rd_double_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}

{{--                                    <tr>--}}
{{--                                        <td class="sub-header" colspan="4">Rest Day and Sunday Holiday(s)</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Sunday:</td>--}}
{{--                                        <td><input id="rd_sunday_pay" name="rd_sunday_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Special:</td>--}}
{{--                                        <td><input id="rd_special_pay" name="rd_special_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}

{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Regular:</td>--}}
{{--                                        <td><input id="rd_regular_pay" name="rd_regular_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Double:</td>--}}
{{--                                        <td><input id="rd_double_pay" name="rd_double_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="sub-header" colspan="4">Holiday(s) Over Time</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Regular:</td>--}}
{{--                                        <td><input id="nd_regular_ot_pay" name="nd_regular_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Special:</td>--}}
{{--                                        <td><input id="nd_special_ot_pay" name="nd_special_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Double:</td>--}}
{{--                                        <td class="border-right-0"><input id="nd_double_ot_pay" name="nd_double_ot_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="border-left-0" colspan="2"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="sub-header" colspan="4">Holiday(s)</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Regular:</td>--}}
{{--                                        <td><input id="nd_regular_pay" name="nd_regular_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Special:</td>--}}
{{--                                        <td><input id="nd_special_pay" name="nd_special_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Double:</td>--}}
{{--                                        <td class="border-right-0"><input id="nd_double_pay" name="nd_double_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="border-left-0" colspan="2"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="sub-header" colspan="4">Others</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Allowance:</td>--}}
{{--                                        <td><input id="allowance" name="allowance" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="text-right">Thirteenth Month:</td>--}}
{{--                                        <td><input id="" name="thirteenth_month_pay" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td class="text-right">Other Income:</td>--}}
{{--                                        <td class="border-right-0"><input id="other_income" name="other_income" type="number" step="0.01" class="edit-payroll-num-input"></td>--}}
{{--                                        <td class="border-left-0" colspan="2"></td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <div>--}}
{{--                                   <p class="bg-gray-600 text-white p-1 mb-0">Note</p>--}}
{{--                                    <textarea name="note" id="payroll_note" class="w-100" rows="2"></textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer mt-1">--}}
{{--                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>--}}
{{--                        <input class="btn btn-primary" type="submit" value="Submit"/>--}}
{{--                    </div>--}}

{{--                </form>--}}
            </div>
        </div>
    </div>
</div>