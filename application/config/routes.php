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

//tin-tuc FO
$route['chi-tiet-tin-tuc-tai-chinh/(:num)'] = 'customer/chiTietTinTucTaiChinh';
$route['tin-tuc-tai-chinh'] = 'customer/tinTucTaiChinh';
$route['tin-tuc-tai-chinh/(:num)'] = 'customer/tinTucTaiChinh';

//step FO
$route['step-1'] = 'customer/loanStepOne';
$route['step-2'] = 'customer/loanStepTwo';
$route['step-3'] = 'customer/loanStepThree';
$route['step-4'] = 'customer/loanStepFour';
$route['step-5'] = 'customer/loanStepFive';
$route['cam-on'] = 'customer/camOn';
$route['ve-voi-chung-toi'] = 'customer/veVoiChungToi';
$route['gioi-thieu-khach-hang'] = 'customer/gioiThieuKhachHang';

//news BO
$route['news'] = "admin/news";
$route['news/add'] = "admin/news/add";
$route['news/remove'] = "admin/news/remove";
$route['news/edit/(:num)'] = "admin/news/edit/$1";
$route['news/(:num)'] = "admin/news";

//category BO
$route['category'] = "admin/category";
$route['category/add'] = "admin/category/add";
$route['category/remove'] = "admin/category/remove";
$route['category/edit/(:num)'] = "admin/category/edit/$1";
$route['category/(:num)'] = "admin/category";

$route['default_controller'] = 'customer';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
