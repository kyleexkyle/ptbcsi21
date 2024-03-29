</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; PTBCSI 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= route_to('login.logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/jquery-3.5.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/js/jquery.easing.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/jquery.dataTables.min.js"></script>
<script src="/assets/js/dataTables.bootstrap4.min.js"></script>

<!--<script src="/assets/js/fullcalendar/dayGrid.js"></script>-->
<!--<script src="/assets/js/fullcalendar/fullCalendar2.js"></script>-->
<script type="text/javascript" src="/assets/js/fullcalendar/core.min.js"></script>
<script type="text/javascript" src="/assets/js/fullcalendar/interaction.min.js"></script>
<script type="text/javascript" src="/assets/js/fullcalendar/daygrid.min.js"></script>
<script type="text/javascript" src="/assets/js/fullcalendar/timegrid.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery-stickytable.min.js"></script>
<!--<script type="text/javascript" src="/assets/js/app.js">-->
</body>
</html>
<script type="text/javascript">
    (function ($) {
        "use strict"; // Start of use strict

        // Toggle the side navigation
        $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
            $("body").toggleClass("sidebar-toggled");
            $(".sidebar").toggleClass("toggled");
            if ($(".sidebar").hasClass("toggled")) {
                $('.sidebar .collapse').collapse('hide');
            }
        });

        // Close any open menu accordions when window is resized below 768px
        $(window).resize(function () {
            if ($(window).width() < 768) {
                $('.sidebar .collapse').collapse('hide');
            }

            // Toggle the side navigation when window is resized below 480px
            if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
                $("body").addClass("sidebar-toggled");
                $(".sidebar").addClass("toggled");
                $('.sidebar .collapse').collapse('hide');
            }
        });

        // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
        $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
            if ($(window).width() > 768) {
                var e0 = e.originalEvent,
                    delta = e0.wheelDelta || -e0.detail;
                this.scrollTop += (delta < 0 ? 1 : -1) * 30;
                e.preventDefault();
            }
        });

        // Scroll to top button appear
        $(document).on('scroll', function () {
            var scrollDistance = $(this).scrollTop();
            if (scrollDistance > 100) {
                $('.scroll-to-top').fadeIn();

            } else {
                $('.scroll-to-top').fadeOut();
            }
        });

        // Smooth scrolling using jQuery easing
        $(document).on('click', 'a.scroll-to-top', function (e) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: ($($anchor.attr('href')).offset().top)
            }, 1000, 'easeInOutExpo');
            e.preventDefault();
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
            startTime();
        });

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid'],
                timeZone: 'UTC',
                allDayDefault: true,
                header: {
                    right: 'prev,next today',
                    center: 'title',
                    left: ''
                },
                editable: true,
                selectable: true,
                eventLimit: true, // when too many events in a day, show the popover

                events: [
                    <?php
                    if (isset($events)) {
                        foreach ($events as $event) {
                            echo $event . ',';
                        }
                    }
                    ?>],
                dateClick: function (info) {
                    $('#add_event').modal('show');
                    $('#add_event #start').val(info.dateStr);
                    $('#add_event #end').val(info.dateStr);
                },
                select: function (info) {
                    $('#add_event').modal('show');
                    $('#add_event #start').val(info.startStr);
                    $('#add_event #end').val(info.endStr);
                },
                eventDrop: function (info) {
                    var start = info.event.start.toISOString().substring(0, 10);
                    if (info.event.end !== null) {
                        var end = info.event.end.toISOString().substring(0, 10)
                    } else {
                        var end = info.event.start.toISOString().substring(0, 10)
                    }

                    $.ajax({
                        url: "<?=route_to('calendar.update')?>",
                        method: 'post',
                        data: {
                            id: info.event.id,
                            start: start,
                            end: end,
                            ["<?=csrf_token();?>"]: "<?=csrf_hash();?>"
                        },
                        dataType: 'json',
                        success: function (response) {
                            //TODO add flash message
                        }
                    });

                },
                eventClick: function (info) {
                    $('#edit_event').modal('show');
                    $('#edit_event #title').val(info.event.title);
                    $('#edit_event #start').val(info.event.start.toISOString().substring(0, 10));
                    if (info.event.end != null) {
                        $('#edit_event #end').val(info.event.end.toISOString().substring(0, 10));
                    } else {
                        $('#edit_event #end').val(info.event.start.toISOString().substring(0, 10));
                    }
                    $('#edit_event #note').val(info.event.extendedProps.note);
                }
            });
            <?php if(isset($active) && $active == "calendar"){?>
            calendar.render();
            <?php }?>
        });

        $('.edit_schedule').on('click', function () {
            $('#edit_schedule').modal('show');
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var data = tr.children("td").map(function () {
                return $(this).text();
            }).get();

            $('#edit_schedule #id').val(id);
            $('#edit_schedule #time_in').val(convertTo24Hour(data[0]));
            $('#edit_schedule #time_out').val(convertTo24Hour(data[1]));
        });

        $('.delete_schedule').on('click', function () {
            $('#delete_schedule').modal('show');
            var id = $(this).data('id');
            $('#delete_schedule #id').val(id);
        });

        $('.edit_position').on('click', function () {
            $('#edit_position').modal('show');
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var data = tr.children("td").map(function () {
                return $(this).text();
            }).get();
            var schedule = $(tr.children("td")[2]).data('id');

            $('#edit_position #id').val(id);
            $('#edit_position #position').val(data[0]);
            $('#edit_position #rate').val(data[1]);
            $('#edit_position #schedule_id').val(schedule)

        });

        $('.delete_position').on('click', function () {
            $('#delete_position').modal('show');
            var id = $(this).data('id');
            $('#delete_position #id').val(id);
        });

        $('.accept_overtime').on('click', function () {
            $('#accept_overtime').modal('show');
            var id = $(this).data('id');
            $('#accept_overtime #id').val(id);
        });

        $('.reject_overtime').on('click', function () {
            $('#reject_overtime').modal('show');
            var id = $(this).data('id');
            $('#reject_overtime #id').val(id);
        });

        $('.accept_leave').on('click', function () {
            $('#accept_leave').modal('show');
            var id = $(this).data('id');
            $('#accept_leave #id').val(id);
        });

        $('.reject_leave').on('click', function () {
            $('#reject_leave').modal('show');
            var id = $(this).data('id');
            $('#reject_leave #id').val(id);
        });

        $('#position_id').on('click', function () {
            $('#monthly_pay').val($(this).find(':selected').data('salary'));
        });


        function convertTo24Hour(time) {
            var hours = parseInt(time.substr(0, 2));
            if (time.indexOf('AM') != -1 && hours == 12) {
                time = time.replace('12', '00');
            }
            if (time.indexOf('PM') != -1 && hours < 12) {
                time = time.replace(hours, (hours + 12));
                time = (time[0] == "0" ? time.substr(1) : time);
            }
            return time.replace(/( AM| PM)/, '');
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            var ampm = h >= 12 ? 'PM' : 'AM';
            m = checkTime(m);
            s = checkTime(s);
            $("#time_display").text(
                (h % 12 == 0 ? 12 : h % 12) + ":" + m + ":" + s + " " + ampm);
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }
            // add zero in front of numbers < 10
            return i;
        }

        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);

        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "contextmenu", "drop"].forEach(function (event) {

                for (var i = 0; i < textbox.length; i++) {

                    textbox[i].addEventListener(event, function () {
                        console.log((this.value));
                        if (inputFilter(this.value.trim())) {
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            this.value = "";
                        }
                    });
                }
            });
        }

        setInputFilter(document.getElementsByClassName("time_h_input"), function (value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 12);
        });
        setInputFilter(document.getElementsByClassName("time_m_input"), function (value) {

            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 59);
        });
        setInputFilter(document.getElementsByClassName("ca-num-input"), function (value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) >= 1);
        });
        $('#payroll-table').stickyTable({
            copyTableClass: true,
            overflowy: true
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        $('.edit_cash_advance').on('click', function () {
            $('#edit_cash_advance').modal('show');
            var id = $(this).data('id');
            var tr = $(this).closest('tr');
            var data = tr.children("td").map(function () {
                return $(this).text();
            }).get();

            $('#edit_cash_advance #cash_advance_id').val(id);
            $('#edit_cash_advance #employee_name').val(data[1]);
            $('#edit_cash_advance #request_date').val(data[0]);
            $('#edit_cash_advance #amount').val(data[4]);
            $('#edit_cash_advance #repayment').val(data[5]);
            $('#edit_cash_advance #purpose').val(data[7]);
        });
        $('.delete_cash_advance').on('click', function () {
            alert('delete    ');
        });

        $('.ca-table tr').each(function () {
            $(this).on('click', function () {
                var tr = $(this).closest('tr');
                var ca = tr.children("td").map(function () {
                    return $(this).text();
                }).get();
                var ca_details = $(this).data('json');
                $('#ca_name').text(ca[1].toUpperCase());
                $('#ca_amount').text(ca[4]);
                $('#ca_balance').text(ca[6]);
                $('#ca_purpose').text(ca[7]);
                $('#ca_request_date').text(ca[0]);
                $('#ca_repayment').text(ca[5]);
                $('#ca_paid').text((ca[6] == 0 ? 'Yes' : 'No'));
                var total_paid = ca[4] - ca[6];
                console.log(ca_details);
                if (ca_details.length >= 1) {
                    $('.ca-details-table tbody tr').remove();
                    var body = $('.ca-details-table tbody');
                    var i;
                    var bal_amount = ca[6];
                    for (i = 0; i < ca_details.length; i++) {
                        var tr = document.createElement('tr');
                        var range = document.createElement('td');
                        var payrolll_no = document.createElement('td');
                        var amount = document.createElement('td');
                        var bal = document.createElement('td');
                        range.innerHTML = ca_details[i]['payroll_range'];
                        payrolll_no.innerHTML = ca_details[i]['payroll_id'];
                        amount.innerHTML = ca_details[i]['amount_paid'];
                        bal_amount -= ca_details[i]['amount_paid'];
                        bal.innerHTML = bal_amount;
                        tr.append(range);
                        tr.append(payrolll_no);
                        tr.append(amount);
                        tr.append(bal);
                        body.append(tr);
                    }
                    var tra = document.createElement('tr');
                    var tp = document.createElement('td');
                    var tpa = document.createElement('td');
                    var td = document.createElement('td');
                    $(tp).attr('colspan', 2);
                    $(tp).addClass('text-right');
                    tp.innerHTML = "Total Paid :";
                    tpa.innerHTML = total_paid;
                    tra.append(tp);
                    tra.append(tpa);
                    tra.append(td);
                    body.append(tra);
                }
            });
        });

        $('.edit_payroll').on('click', function () {
            $('#edit_payroll').modal('show');
            var id = $(this).data('id');

        });



    })(jQuery);
</script>
