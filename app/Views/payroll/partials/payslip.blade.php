<div class="modal fade" id="payslip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="payslip_title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body " style="font-family: Arial !important;">
                <div class="flex justify-content-between border-bottom-dashed">
                    <div class="w-70">
                        <img src="/assets/images/ptbcsi_logo.png" width="270px">
                        <div class="text-black text-xs font-weight-bold" style="margin-top: -20px;margin-left: 5.8rem">
                            <p class="m-0">Address: 5th Street Extention, Block A5, MEPZ1, Ibo Lapu-Lapu City, Cebu,
                                6015</p>
                            <p class="m-0">Email: info.ptbcsi@gmail.com</p>
                            <p class="m-0"> Contact #: 032-340 9437</p>
                        </div>
                    </div>
                    <div class="w-30 font-weight-bold text-black ">
                        <div class="border-dashed payslip_background">
                            <p class="m-0 py-3  text-3xl  text-center align-middle ">Pay Slip</p>
                        </div>
                        <div>
                            <p class="mb-0">Released Date: March 29, 2021</p>
                            <p class="mb-0">Trans #: 307320211631</p>
                        </div>
                    </div>
                </div>
                <div class="mx-4">
                    <div class="mt-4 text-sm flex text-black">
                        <div class="w-50 mr-2">
                            <table class="mx-4 ">
                                <tr>
                                    <td class="text-right font-weight-bold">Employee Name :</td>
                                    <td id="name"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold">Employee # :</td>
                                    <td id="id"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> Designation :</td>
                                    <td id="position"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> Location :</td>
                                    <td id="location"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> Monthly Salary :</td>
                                    <td id="monthly_pay"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> SSS # :</td>
                                    <td id="sss_no"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="w-50 ml-2">
                            <table class="mx-4 ">
                                <tr>
                                    <td class="text-right font-weight-bold">Payroll Period :</td>
                                    <td id="payroll_period"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> Bank Name/Branch :</td>
                                    <td id="bank_name"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> TIN # :</td>
                                    <td id="tin_no"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> PHILHEALTH # :</td>
                                    <td id="philhealth_no"></td>
                                </tr>
                                <tr>
                                    <td class="text-right font-weight-bold"> PAGIBIG # :</td>
                                    <td id="pagibig_no"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="flex mt-2 text-black text-ssm">
                        <div class="w-50 mr-2">
                            <table border="" class="tbl-deductions" width="100%">
                                <tbody>
                                <tr>
                                    <td><b>Earnings</b></td>
                                    <td align="right"><b>Amount</b></td>
                                </tr>
                                <tr>
                                    <td>Basic</td>
                                    <td align="right" id="basic_salary"></td>
                                </tr>
                                <tr>
                                    <td>Allowance</td>
                                    <td align="right" id="allowance"></td>
                                </tr>
                                <tr>
                                    <td>Overtime</td>
                                    <td align="right" id="total_ot_pay"></td>
                                </tr>
                                <tr>
                                    <td>Holiday</td>
                                    <td align="right" id="total_holiday_pay"></td>
                                </tr>
                                <tr>
                                    <td>13th Month</td>
                                    <td align="right" id="thirteenth_month_pay"></td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td align="right" id="other_income"></td>
                                </tr>

                                <tr>
                                    <td><b>Gross Pay</b></td>
                                    <td align="right" class="font-weight-bold" id="gross_pay"></td>
                                </tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                    <td align="right"></td>
                                </tr>
                                <tr>
                                    <td>Late</td>
                                    <td align="right" id="late"></td>
                                </tr>
                                <tr>
                                    <td>Absences</td>
                                    <td align="right" id="absent"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="w-50 ml-2">
                            <table border="" class="tbl-earnings" width="100%">
                                <tbody>
                                <tr>
                                    <td><b>Deductions</b></td>
                                    <td align="right"><b>Amount</b></td>
                                </tr>

                                <tr>
                                    <td>SSS</td>
                                    <td align="right" id="sss"></td>
                                </tr>
                                <tr>
                                    <td>HDMF</td>
                                    <td align="right" id="hdmf"></td>
                                </tr>
                                <tr>
                                    <td>PHIC</td>
                                    <td align="right" id="phi"></td>
                                </tr>
                                <tr>
                                    <td>With Tax</td>
                                    <td align="right" id="with_tax"></td>
                                </tr>
                                <tr>
                                    <td>LWOP</td>
                                    <td align="right"></td>
                                </tr>
                                <tr>
                                    <td>Cash Advance</td>
                                    <td align="right" id="cash_advance"></td>
                                </tr>
                                <tr>
                                    <td>SSS Loan/ Pagibig Loan</td>
                                    <td align="right" id="loan"></td>
                                </tr>
                                <tr>
                                    <td>Others</td>
                                    <td align="right" id="other_deduction"></td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td>&nbsp</td>
                                    <td align="right"></td>
                                </tr>
                                <tr>
                                    <td><b>Total Deduction</b></td>
                                    <td align="right" class="font-weight-bold" id="total_deduction"></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="border-dashed mt-4 align-middle">
                        <p class="m-0 p-2 text-black text-sm font-weight-bold">Net Pay: <span id="net_pay"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">
                    <i class="fas fa-print mr-1"></i>Print
                </button>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
