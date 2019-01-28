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
$route['default_controller'] = 'user';
$route['user'] = "user/index";
$route['logout'] = "user/logout";
$route['user/submit'] = "user/check_login";
$route['user/create_account'] = "user/create_user";
$route['user/create_account_admin'] = "user/create_user_admin";
$route['user/update/(:num)'] = "user/update/$1";
$route['user/update/(:num)/(:num)'] = "user/update/$1/$2";
$route['user/delete/(:num)'] = "user/delete/$1";
$route['user/register'] = "user/register";
$route['user/password_recovery'] = "user/recover_password";
$route['user/password_recovery/(:num)'] = "user/recover_password/$1";
$route['user/new_password/(:any)'] = "user/new_password/$1";
$route['user/change_password/(:any)'] = "user/change_password/$1";
$route['user/change_password/(:any)/(:num)'] = "user/change_password/$1/$2";
$route['user/send_recovery_email'] = "user/send_recovery_email";
$route['user/login'] = "user/check_login";
$route['user/register/(:any)'] = "user/register/$1";
$route['user/profile/(:num)'] = 'user/profile/$1';
$route['user/add'] = 'user/add_user';
$route['user/add/(:any)'] = 'user/add_user/$1';
$route['user/all'] = 'user/view_users';
$route['user/all/(:num)'] = 'user/view_users/$1';
$route['user/edit/(:num)'] = 'user/edit_user/$1';
$route['user/edit/(:num)/(:num)'] = 'user/edit_user/$1/$2';
$route['user/(:any)'] = "user/index/$1";

$route['logs'] = 'logs/index';

$route['dashboard/index'] = 'dashboard/index';
$route['dashboard/reports'] = 'dashboard/reports';
$route['dashboard/maps'] = 'dashboard/show_map';
$route['404_override'] = '';

$route['upload/finish/(:any)'] = 'upload/save_data/$1';
$route['upload/(:any)'] = 'upload/index/$1';
$route['upload/(:any)/(:num)'] = 'upload/index/$1/$2';

$route['translate_uri_dashes'] = FALSE;
// Product
$route['add_product'] = 'add/add_product';
$route['add_product/(:num)'] = 'add/add_product/$1';
$route['view_product'] = 'view/view_products';
$route['view_product/(:num)'] = 'view/view_products/$1';
$route['product/edit/(:num)'] = 'view/edit_product/$1';
$route['product/delete/(:num)'] = 'view/delete_product/$1';
$route['product/edit/(:num)/(:num)'] = 'view/edit_product/$1/$2';
$route['product/update_product/(:num)'] = 'view/update_product/$1';
$route['product/delete/(:num)'] = 'view/delete_product/$1';
$route['product_distribution'] = 'view/view_distribution';
$route['product_distribution/(:num)'] = 'view/view_distribution/$1';
$route['distribution/delete/(:num)'] = 'view/delete_distribution/$1';

// Receipt Books
$route['register_book'] = 'books/register_book';
$route['register_book/(:num)'] = 'books/register_book/$1';
$route['view_books'] = 'books/view_books';
$route['view_books/(:num)'] = 'books/view_books/$1';
$route['books/add_book'] = 'books/save_book';
$route['book/delete/(:num)'] = 'books/delete_book/$1';

$route['add_coordinator'] = 'add/add_coordinator';
$route['add_coordinator/(:num)'] = 'add/add_coordinator/$1';
$route['view_coordinator'] = 'view/view_coordinator';
$route['view_coordinator/(:num)'] = 'view/view_coordinator/$1';

$route['add_sales'] = 'add/add_sales';
$route['sales'] = 'view/view_sales';
$route['sales/(:num)'] = 'view/view_sales/$1';

$route['view_county'] = 'view/view_county';
$route['view_county/(:num)'] = 'view/view_county/$1';
$route['county/edit/(:num)'] = 'view/edit_county/$1';
$route['county/edit/(:num)/(:num)'] = 'view/edit_county/$1/$2';
$route['county/delete/(:num)'] = 'view/delete_county/$1';
$route['county/update_county/(:num)'] = 'view/update_county/$1';
$route['county/add'] = 'view/add_county';
$route['add_county'] = 'add/add_county';
$route['add_county/(:num)'] = 'add/add_county/$1';

$route['view_cluster'] = 'view/view_cluster';
$route['view_cluster/(:num)'] = 'view/view_cluster/$1';
$route['cluster/edit/(:num)'] = 'view/edit_cluster/$1';
$route['cluster/edit/(:num)/(:num)'] = 'view/edit_cluster/$1/$2';
$route['cluster/delete/(:num)'] = 'view/delete_cluster/$1';
$route['cluster/update_cluster/(:num)'] = 'view/update_cluster/$1';
$route['cluster/add'] = 'view/add_cluster';
$route['add_cluster'] = 'add/add_cluster';
$route['add_cluster/(:num)'] = 'add/add_cluster/$1';

$route['coordinator/edit/(:num)'] = 'view/edit_coordinator/$1';
$route['coordinator/delete/(:num)'] = 'view/delete_coordinator/$1';
$route['coordinator/edit/(:num)/(:num)'] = 'view/edit_coordinator/$1/$2';
$route['coordinator/update_coordinator/(:num)'] = 'view/update_coordinator/$1';
$route['coordinator/add_coordinator'] = 'view/add_coordinator';
//LME
$route['add_lme'] = 'add/add_lme';
$route['add_lme/(:num)'] = 'add/add_lme/$1';
$route['lme'] = 'view/lme';
$route['lme/(:num)'] = 'view/lme/$1';
$route['lme/page'] = 'view/lme';
$route['lme/update_lme/(:num)'] = 'view/update_lme/$1';
$route['lme/add_lme'] = 'view/add_lme';
$route['lme/page/(:num)'] = 'view/lme/$1';
$route['lme/edit/(:num)'] = 'view/edit/$1';
$route['lme/delete/(:num)'] = 'view/delete_lme/$1';
$route['lme/edit/(:num)/(:num)'] = 'view/edit/$1/$2';

$route['product/add'] = 'view/add_product';
// $route['lme/(:num)'] = 'view/lme/$1';

$route['api/sales/add'] = 'add/add_sales_api';
$route['api/sales/edit'] = 'add/edit_sales_api';
$route['api/sales/delete'] = 'add/delete_sales_api';

$route['api/distributions/add'] = 'add/add_distributions_api';
$route['api/distributions/delete'] = 'add/delete_distributions_api';

$route['api/stoves/add'] = 'stoves/add/add_stove_data_api';
$route['api/stoves/delete'] = 'stoves/add/delete_stove_data_api';

$route['api/producers/add'] = 'stoves/add/add_producer_data_api';
$route['api/producers/delete'] = 'stoves/add/delete_producer_data_api';
// STOVES
$route['stoves/view_builders'] = 'stoves/view/view_builders';
$route['stoves/view_builders/(:any)'] = 'stoves/view/view_builders/$1';
$route['stoves/add_builder'] = 'stoves/add/add_builder';
$route['stoves/add_builder/(:any)'] = 'stoves/add/add_builder/$1';
$route['stoves/add/builder'] = 'stoves/add/post_builder';

$route['stoves/view_centres'] = 'stoves/view/view_centres';
$route['stoves/view_centres/(:any)'] = 'stoves/view/view_centres/$1';
$route['stoves/add_centre'] = 'stoves/add/add_centre';
$route['stoves/add_centre/(:any)'] = 'stoves/add/add_centre/$1';
$route['stoves/add/centre'] = 'stoves/add/post_centre';
$route['stoves/edit/centre/(:num)'] = 'stoves/add/edit_centre/$1';
$route['stoves/producers/edit/(:num)'] = 'stoves/view/edit_centre/$1';
$route['stoves/producers/edit/(:num)/(:any)'] = 'stoves/view/edit_centre/$1/$2';
$route['stoves/producers/data_entry'] = 'stoves/view/producer_data_entry';
$route['stoves/producers/view_data'] = 'stoves/view/view_producer_data';
$route['stoves/producers/view_data/(:any)'] = 'stoves/view/view_producer_data/$1';
$route['stoves/producer_data/delete/(:num)'] = 'stoves/view/delete_producer_data_url/$1';

$route['stoves/builders/edit/(:num)'] = 'stoves/view/edit_builder/$1';
$route['stoves/builders/edit/(:num)/(:any)'] = 'stoves/view/edit_builder/$1/$2';
$route['stoves/edit/builder/(:num)'] = 'stoves/view/update_builder/$1';
$route['stoves/builders/delete/(:num)'] = 'stoves/view/delete_builder/$1';

$route['stoves/data_entry'] = 'stoves/view/data_entry';
$route['stoves/view_data'] = 'stoves/view/view_stove_data';
$route['stoves/view_data/(:any)'] = 'stoves/view/view_stove_data/$1';
$route['stoves/stove_data/delete/(:num)'] = 'stoves/view/delete_stove_data_url/$1';