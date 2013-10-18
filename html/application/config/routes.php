<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */
$route['default_controller'] = "landing_page";
$route['404_override'] = '';

//Custom built routes

/*
 * Documents/region/organization:
 * For Region the Key is: 
 * 1=>Somaliland;
 * 2=>Puntland
 * 3=>South Central
 * 
 * For Organization
 * 1 => UK Aid
 * 2 => Save the children
 * 3 => THET
 * 4 => psi
 * 5 => Troicaire
 * 6 => Health poverty action
 */
$route['documents/:num/:num/:num'] = "documents/index";  //Region, organization and category
$route['documents/:num/:num'] = "documents/index";  //Region and Organization
$route['documents/upload'] = "documents/upload_docs"; //Upload documents
$route['tools/upload'] = "tools/upload_tools"; //Upload tools
$route['innovations/uploads'] = "innovations/uploads"; //Upload innovations
$route['hcs_tab_upload/:num'] = "hcs_tab_upload/index"; //Upload HCS tab contents
$route['reports/:num'] = "reports/index"; //View reports contents
$route['categories/:num'] = "categories/index"; //Categories
$route['user_management/:num'] = "user_management/index"; //User management
$route['edit_content/:num'] = "edit_content/index"; //Edit uploaded content

/* End of file routes.php */
/* Location: ./application/config/routes.php */