<?php $active = substr(parse_url(current_url())['path'], 1) ?>

<ul class="navbar-nav bg-gradient-primary sidebar  sidebar-dark accordion " id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route_to('dashboard.index')}}">
        <div class="sidebar-brand-icon">
            <i class="fab fa-teamspeak"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PTBCSI</div>
    </a>

@if(session()->userData['role']=='Admin'||session()->userData['role']=='Payroll Master')
    <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{$active=="dashboard"?'active':''}}">
            <a class="nav-link" href="{{route_to('dashboard.index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
                <!-- Divider -->
        <hr class="sidebar-divider">
@endif
<!-- Heading -->
    <div class="sidebar-heading">
        Manage
    </div>

    <!-- Nav Item - DTR -->
    <li class="nav-item {{$active=="dtr"?'active':''}}">
        <a class="nav-link" href="{{route_to('dtr.index')}}">
            <i class="fas fa-user-clock"></i>
            <span>DTR</span></a>
    </li>

    <!-- Nav Item - Request -->
    <li class="nav-item {{$active=="overtime"?'active':($active=="leave"?'active':'')}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#requestCollapse"
           aria-expanded="true" aria-controls="requestCollapse">
            <i class="fas fa-retweet"></i>
            <span>Request</span></a>
        </a>
        <div id="requestCollapse" class="on-top collapse
{{--            {{$active=="overtime"?'show':($active=="leave"?'show':'')}}--}}
                "
             aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Request Management</h6>
                <a class="collapse-item {{$active=="overtime"?'active':''}}" href="{{route_to('overtime.index')}}">Overtime</a>
                <a class="collapse-item {{$active=="leave"?'active':''}}" href="{{route_to('leave.index')}}">Leave</a>
            </div>
        </div>
    </li>
@if(session()->userData['role']=='Admin')
    <!-- Nav Item - Schedule -->
        <li class="nav-item {{$active=="schedule"?'active':''}}">
            <a class="nav-link" href="{{route_to("schedule.index")}}">
                <i class="fas fa-clock"></i>
                <span>Schedule</span></a>
        </li>

@endif
<!-- Nav Item - Calendar -->
    <li class="nav-item {{$active=="calendar"?'active':''}}">
        <a class="nav-link" href="{{route_to('calendar.index')}}">
            <i class="fas fa-calendar-alt"></i>
            <span>Calendar</span></a>
    </li>
@if(session()->userData['role']=='Admin'||session()->userData['role']=='Payroll Master')
    <!-- Nav Item - Employees Collapse Menu -->
        @if(session()->userData['role']=='Admin')
            <li class="nav-item {{$active=="employee"?'active':($active=="position"?'active':'')}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employeeCollapse"
                   aria-expanded="true" aria-controls="employeeCollapse">
                    <i class="fas fa-users"></i>
                    <span>Employees</span>
                </a>
                <div id="employeeCollapse" class="on-top collapse
{{--{{$active=="employee"?'show':($active=="position"?'show':'')}}--}}
                        "
                     aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employee Management</h6>
                        <a class="collapse-item {{$active=="employee"?'active':''}}"
                           href="{{route_to('employee.index')}}">Employee
                            List</a>
                        <a class="collapse-item {{$active=="position"?'active':''}}"
                           href="{{route_to('position.index')}}">Position</a>
                    </div>
                </div>
            </li>
        @endif

    <!-- Nav Item - Payroll -->
        <li class="nav-item {{$active=="payroll"?'active':''}}">
            <a class="nav-link" href="{{route_to('payroll.index')}}">
                <i class="fas fa-money-bill"></i>
                <span>Payroll</span></a>
        </li>

        <!-- Nav Item - Cash Advance -->
        <li class="nav-item {{$active=="cash-advance"?'active':''}}">
            <a class="nav-link" href="{{route_to('cash-advance.index')}}">
                <i class="fas fa-cash-register"></i>
                <span>Cash Advance</span></a>
        </li>

        <!-- Nav Item - Deductions -->
        <li class="nav-item {{$active=="sss-contribution-table"?'active':
                        ($active=="late-penalty"?'active':
                        (($active=="pag-ibig-contribution-table"?'active':'')))}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#deductionCollapse"
               aria-expanded="true"
               aria-controls="deductionCollapse">
                <i class="fas fa-chart-line"></i>
                <span>Deduction</span>
            </a>
            <div id="deductionCollapse" class="on-top collapse" aria-labelledby="headingTwo"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Deduction Management:</h6>
                    <a class="collapse-item {{$active=="sss-contribution-table"?'active':''}}"
                       href="{{route_to('sss-contribution-table.index')}}">SSS Contribution</a>
                    <a class="collapse-item {{$active=="pag-ibig-contribution-table"?'active':''}} "
                       href="{{route_to('pag-ibig-contribution-table.index')}}">Pag-ibig Contribution </a>
                    <a class="collapse-item {{$active=="phil-health-contribution-table"?'active':''}} "
                       href="{{route_to('phil-health-contribution-table.index')}}">Philhealth Contribution</a>
                    {{--                <a class="collapse-item {{$active=="late-penalty"?'active':''}} " href="{{route_to('late-penalty.index')}}">Late Penalty</a>--}}
                </div>
            </div>
        </li>

        <!-- Nav Item - Reports Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportCollapse"
               aria-expanded="true"
               aria-controls="reportCollapse">
                <i class="fas fa-chart-line"></i>
                <span>Reports</span>
            </a>
            <div id="reportCollapse" class="on-top collapse" aria-labelledby="headingTwo"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Summary Report:</h6>
                    @if(session()->userData['role']=='Admin')
                        <a class="collapse-item" href="{{route_to('attendance-report.index')}}">Attendance Report</a>
                    @endif
                    <a class="collapse-item" href="{{route_to('payroll-report.index')}}">Payroll Report</a>
                </div>
            </div>
        </li>
    @endif
    <li class="nav-item {{$active=="bug-report"?'active':''}}">
        <a class="nav-link" href="{{route_to('bug-report.index')}}">
            <i class="fas fa-money-bill"></i>
            <span>Bug Report</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>