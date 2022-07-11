<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Login/index';
$route['dashboard'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/*====== AUTHENTICATION =======*/
$route['verify-otp'] = 'Login/verify_otp';
$route['forgot-password'] = 'Login/forgot_password';
$route['reset-password'] = 'Login/change_password';
/*======= AUTHENTICATION =======*/

/*====== USERS, GROUPS & PERMISSIONS =======*/
$route['groups'] = 'Users/manage_user_groups';
$route['group/add']  = 'Users/add_group';
$route['group/edit/(:any)'] = 'Users/edit_group/$1';
$route['group/group_permission/(:any)'] = 'Users/group_permission/$1';
$route['user/add'] = 'Users/add_user';
$route['user/edit/(:any)'] = 'Users/edit_user/$1';
$route['users'] = 'Users/manage_users';
/*====== /USERS, GROUPS & PERMISSIONS =======*/

/*====== SETTINGS ======*/
$route['user/settings'] = 'Users/profile_settings';
$route['backup/databases'] = 'Backup/backup';
$route['backup/create'] = 'Backup/create_backup';
/*====== /SETTINGS ======*/



$route['menus/add'] = 'Menus/add_menu';
$route['menus/edit/(:any)'] = 'Menus/edit_menu/$1';
$route['menus/manage'] = 'Menus/manage_menus';
$route['activity_logs'] = 'Activity_logs/index';
$route['activity_logs/custom_search'] = 'Activity_logs/custom_search';
$route['activity_logs/log_detail/(:any)'] = 'Activity_logs/log_detail/$1';


$route['registration'] = 'Registration/index';
$route['registration/manage'] = 'Registration/manage_registrations';
$route['registration/detail/(:any)'] = 'Registration/detail/$1';

$route['degrees/manage'] = 'Degree_program/manage_degrees';
$route['programs/manage'] = 'Degree_program/manage_programs';

/*====== /Items ======*/
$route['item/add'] = 'Items/add';
$route['menus/edit/(:any)'] = 'Menus/edit_menu/$1';
$route['item/manage'] = 'Items/index';

/*====== /Employees ======*/
$route['employee'] = 'Employees/index';
$route['employee/add'] = 'Employees/add';
$route['employee/store'] = 'Employees/store';
$route['employee/delete'] = 'Employees/delete/';
$route['employee/edit'] = 'Employees/edit/';
$route['employee/update'] = 'Employees/update/';



