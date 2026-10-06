<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->GET('/', 'MainController::Main');
$routes->GET('/intro', 'MemberController::Login');
$routes->GET('/Logout','MemberController::LogOut');





/** Common Api */
$routes->match(['GET', 'POST'], 'Api/Process_Login', 'ApiCommonController::Process_Login');




/** Shop Api */
$routes->match(['GET', 'POST'], 'Api/Load_Shop_Medicine', 'ApiShopController::Load_Shop_Medicine');




