<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['employee' => 'API\EmployeeController']);
Route::apiResources(['notice' => 'API\NoticeController']);
Route::apiResources(['generalschedule' => 'API\GeneralScheduleController']);
Route::apiResources(['invoice-product' => 'API\InvoiceProductController']);
Route::apiResources(['purchase-product' => 'API\PurchaseProductController']);
Route::apiResources(['invoice' => 'API\InvoiceController']);
Route::apiResources(['purchase' => 'API\PurchaseController']);
Route::apiResources(['category' => 'API\CategoryController']);
Route::apiResources(['vendor' => 'API\VendorController']);
Route::apiResources(['customer' => 'API\CustomerController']);
// Route::apiResources(['software' => 'API\SoftwareController']);
// Route::apiResources(['itdepartment' => 'API\ItdepartmentController']);
Route::apiResources(['marketing' => 'API\MarketingController']);
// Route::apiResources(['sale' => 'API\SalesController']);
Route::apiResources(['account' => 'API\AccountController']);
Route::apiResources(['training' => 'API\TrainingController']);
Route::apiResources(['create-leave' => 'API\CreateLeaveController']);
Route::apiResources(['recommender' => 'API\RecommenderController']);
Route::apiResources(['reliever' => 'API\RelieverController']);


Route::put('profile', 'API\UserController@updateProfile');
Route::get('profile', 'API\UserController@profile');
Route::get('profile-invo', 'API\UserController@profile_invo');
Route::get('profile-pur', 'API\UserController@profile_pur');
Route::get('employee-it', 'API\EmployeeController@getItemployee');
Route::get('createleaveforsuperadmin', 'API\CreateLeaveController@getleavependingsuper');
Route::get('createleaveforadmin', 'API\CreateLeaveController@getleavependingadmin');
Route::get('createleaveapproveforadmin', 'API\CreateLeaveController@getleaveapproveadmin');
Route::get('createleaveapproveforsuper', 'API\CreateLeaveController@getleaveapprovesuper');
Route::get('createleaverejectforsuper', 'API\CreateLeaveController@getleaverejectsuper');
Route::get('createleaverejectforadmin', 'API\CreateLeaveController@getleaverejectadmin');
// approve and discurd by  admin  
Route::put('approvebyreliever/{id}', 'API\CreateLeaveController@approvebyreliever');
Route::put('discurdbyreliever/{id}', 'API\CreateLeaveController@discurdbyreliever');
// approve and discurd by  admin 
Route::put('approvebyrecommender/{id}', 'API\CreateLeaveController@approvebyrecommender');
Route::put('discurdbyrecommender/{id}', 'API\CreateLeaveController@discurdbyrecommender');
// approve and discurd by  admin 
Route::put('approvebyadmin/{id}', 'API\CreateLeaveController@approvebyadmin');
Route::put('discurdbyadmin/{id}', 'API\CreateLeaveController@discurdbyadmin');
// approve and discurd by super admin 
Route::put('approvebysuperadmin/{id}', 'API\CreateLeaveController@approvebysuperadmin');
Route::put('discurdbysuperadmin/{id}', 'API\CreateLeaveController@discurdbysuperadmin');
Route::get('relieveras-requested/{id}', 'API\RelieverController@getRequestedreliever');