<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\PurchaseController;
use App\HTTP\Controllers\SalesController;
use App\HTTP\Controllers\ProductController;
use App\HTTP\Controllers\EmployeeController;
use App\HTTP\Controllers\RecordsFilterController;
use App\HTTP\Controllers\ExpenseController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/hi', [PurchaseController::class, 'show1'])->name('save');



Route::resource('purchase', PurchaseController::class);
Route::resource('sale', SalesController::class);
Route::resource('product', ProductController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('expense', ExpenseController::class);


Route::get('/show_purchases', [RecordsFilterController::class, 'showPurchases'])->name('show.purchases');
Route::get('/show_sales', [RecordsFilterController::class, 'showSales'])->name('show.sales');
Route::get('/show_employees', [RecordsFilterController::class, 'showEmployees'])->name('show.employees');
Route::get('/show_expenses', [RecordsFilterController::class, 'showExpenses'])->name('show.expenses');
Route::get('/show_entities', [RecordsFilterController::class, 'showEntities'])->name('show.entities');

Route::get('/show_purchase_report', [RecordsFilterController::class, 'showPurchaseReport'])->name('show.purchase.report');
Route::get('/show_sale_report', [RecordsFilterController::class, 'showSaleReport'])->name('show.sale.report');
Route::get('/show_expense_report', [RecordsFilterController::class, 'showExpenseReport'])->name('show.expense.report');
Route::get('/show_employee_report', [RecordsFilterController::class, 'showEmployeeReport'])->name('show.employee.report');
Route::get('/show_entities_report', [RecordsFilterController::class, 'showEntitiesReport'])->name('show.entities.report');










