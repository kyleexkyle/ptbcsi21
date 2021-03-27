<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('DashboardController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Auth::index');


//$routes->get('/', 'Auth\Login::index');
//$routes->get('login','Auth\login::index',['as'=>'login.index']);
//$routes->post('login','Auth\Login::login',['as'=>'login.login']);
//$routes->get('logout','Auth\Login::logout',['as'=>'login.logout']);


$routes->group('dashboard',function ($routes){
    $routes->get('', 'DashboardController::index',['as' => 'dashboard.index']);
});

$routes->group('dtr',function ($routes){
    $routes->get('', 'DtrController::index',['as' => 'dtr.index']);
    $routes->post('', 'DtrController::index',['as' => 'dtr.index']);
});

$routes->group('overtime',function ($routes){
    $routes->get('', 'OvertimeController::index',['as' => 'overtime.index']);
    $routes->post('create', 'OvertimeController::create',['as' => 'overtime.create']);
    $routes->post('update', 'OvertimeController::update',['as' => 'overtime.update']);
});

$routes->group('leave',function ($routes){
    $routes->get('', 'LeaveController::index',['as' => 'leave.index']);
    $routes->post('create', 'LeaveController::create',['as' => 'leave.create']);
    $routes->post('update', 'LeaveController::update',['as' => 'leave.update']);
});

$routes->group('schedule', function($routes)
{
    $routes->get('', 'ScheduleController::index',['as' => 'schedule.index']);
    $routes->post('create', 'ScheduleController::create',['as' => 'schedule.create']);
    $routes->post('update', 'ScheduleController::update',['as' => 'schedule.update']);
    $routes->post('delete', 'ScheduleController::delete',['as' => 'schedule.delete']);
});

$routes->group('calendar',function ($routes){
    $routes->get('', 'CalendarController::index',['as' => 'calendar.index']);
    $routes->post('', 'CalendarController::index',['as' => 'calendar.index']);
    $routes->post('create', 'CalendarController::create',['as' => 'calendar.create']);
    $routes->post('update', 'CalendarController::update',['as' => 'calendar.update']);
});

$routes->group('employee',function ($routes){
    $routes->get('', 'EmployeeController::index',['as' => 'employee.index']);
    $routes->post('create', 'EmployeeController::create',['as' => 'employee.create']);
});

$routes->group('position',function ($routes){
    $routes->get('', 'PositionController::index',['as' => 'position.index']);
    $routes->post('create', 'PositionController::create',['as' => 'position.create']);
    $routes->post('update', 'PositionController::update',['as' => 'position.update']);
    $routes->post('delete', 'PositionController::delete',['as' => 'position.delete']);
});

$routes->group('payroll',function ($routes){
    $routes->get('','PayrollController::index',['as'=>'payroll.index']);
    $routes->post('','PayrollController::index',['as'=>'payroll.index']);
    $routes->post('','PayrollController::update',['as'=>'payroll.update']);
    $routes->get('get/(:any)','PayrollController::get/$1');
});

$routes->group('cash-advance',function ($routes){
    $routes->get('','CashAdvanceController::index',['as'=>'cash-advance.index']);
    $routes->post('create','CashAdvanceController::create',['as'=>'cash-advance.create']);
    $routes->post('update','CashAdvanceController::update',['as'=>'cash-advance.update']);
});

$routes->group('cash-advance-detail',function ($routes){
    $routes->post('get-detail','CashAdvanceDetailController::get_detail',['as'=>'cash-advance-detail.get-detail']);
});

$routes->group('attendance-report',function ($routes){
    $routes->get('','AttendanceReportController::index',['as'=>'attendance-report.index']);
    $routes->post('create','AttendanceReportController::create',['as'=>'attendance-report.create']);
    $routes->post('update','AttendanceReportController::update',['as'=>'attendance-report.update']);
});

$routes->group('payroll-report',function ($routes){
    $routes->get('','PayrollReportController::index',['as'=>'payroll-report.index']);
    $routes->post('create','PayrollReportController::create',['as'=>'payroll-report.create']);
    $routes->post('update','PayrollReportController::update',['as'=>'payroll-report.update']);
});

$routes->group('', ['namespace' => 'App\Controllers\Auth'], function($routes) {
    // Registration
    $routes->get('register', 'RegistrationController::register', ['as' => 'register']);
    $routes->post('register', 'RegistrationController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'RegistrationController::activateAccount', ['as' => 'activate-account']);

    // Login/out
    $routes->get('login', 'LoginController::login', ['as' => 'login']);
    $routes->post('login', 'LoginController::attemptLogin');
    $routes->get('logout', 'LoginController::logout');

    // Forgotten password and reset
    $routes->get('forgot-password', 'PasswordController::forgotPassword', ['as' => 'forgot-password']);
    $routes->post('forgot-password', 'PasswordController::attemptForgotPassword');
    $routes->get('reset-password', 'PasswordController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'PasswordController::attemptResetPassword');

    // Account settings
    $routes->get('account', 'AccountController::account', ['as' => 'account']);
    $routes->post('account', 'AccountController::updateAccount');
    $routes->post('change-email', 'AccountController::changeEmail');
    $routes->get('confirm-email', 'AccountController::confirmNewEmail');
    $routes->post('change-password', 'AccountController::changePassword');
    $routes->post('delete-account', 'AccountController::deleteAccount');
});

$routes->cli('cli-push', 'Cli/AttendancePusher::push');
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
