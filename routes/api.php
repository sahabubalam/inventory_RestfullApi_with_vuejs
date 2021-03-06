<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/


Route::group([
     'middleware'=>'api',
     'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::post('signup', 'AuthController@signup');

});
//Route::prefix('admin')->group(base_path('routes/admin.php'));

Route::group([
    'middleware'=>'api',
    'prefix' => 'admin'

], function () {
    Route::get('admin-login','Admin\LoginController@adminlogin')->name('admin.login.get');
    Route::post('admin-login','Admin\LoginController@login')->name('admin.login');

   Route::post('login', 'AuthController@login');
   Route::post('signup', 'AuthController@signup');
   Route::post('logout', 'AuthController@logout');
   Route::post('refresh', 'AuthController@refresh');
   Route::post('me', 'AuthController@me');
   Route::post('payload', 'AuthController@payload');
   Route::post('signup', 'AuthController@signup');

});

Route::apiResource('/employee','Api\EmployeeController');
Route::apiResource('/supplier','Api\SupplierController');
Route::apiResource('/category','Api\CategoryController');
Route::apiResource('/product','Api\ProductController');
Route::apiResource('/expense','Api\ExpenseController');
Route::apiResource('/customer','Api\CustomerController');

Route::post('/paidsalary/{id}','Api\SalaryController@paid');
Route::get('/salary','Api\SalaryController@allsalary');
Route::get('/salary/view/{id}','Api\SalaryController@viewsalary');
Route::get('/edit/salary/{id}','Api\SalaryController@editsalary');
Route::post('/update/salary/{id}','Api\SalaryController@salaryupdate');

Route::get('/getting/product/{id}','Api\PosController@GetProduct');

Route::get('/addTocart/{id}','Api\CartController@AddToCart');
Route::get('/cart/product','Api\CartController@CartProduct');
Route::get('/remove/cart/{id}','Api\CartController@RemoveCart');
Route::get('/increment/{id}','Api\CartController@Increment');
Route::get('/decrement/{id}','Api\CartController@Decrement');
Route::get('/vats','Api\CartController@Vats');

Route::post('/orderdone','Api\PosController@OrderDone');

Route::get('/orders','Api\OrderController@TodayOrder');
Route::get('/order/details/{id}','Api\OrderController@OrderDetails');
Route::get('/order/orderdetails/{id}','Api\OrderController@AllOrderDetails');
Route::post('/search/order/','Api\OrderController@SearchDate');
Route::post('/search/month/','Api\OrderController@SearchMonth');
//home
Route::get('/today/sell','Api\PosController@TodaySell');
Route::get('/today/income','Api\PosController@TodayIncome');
Route::get('/today/due','Api\PosController@TodayDue');
Route::get('/today/expense','Api\PosController@TodayExpense');
Route::get('/stockout','Api\PosController@StockOut');

