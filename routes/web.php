<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Ruta para la página principal
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

// Ruta para el dashboard
Route::get('/dashboard', [\App\Http\Controllers\MainController::class, 'index'])->name('dashboard');

// PWA - Progressive Web App
Route::get('/manifest', [\App\Http\Controllers\ManifestController::class, 'renderWebManifest'])
    ->name('manifest');

Auth::routes(['register' => env('APP_ENV') != 'production']);

Route::get('/lock', [\App\Http\Controllers\Auth\LockController::class, 'index']);
Route::post('/unlock', [\App\Http\Controllers\Auth\UnlockController::class, 'unlock'])->name('unlock');

//Order
require_once __DIR__.'/module/order.php';

//Product
require_once __DIR__.'/module/product.php';

//Brand
require_once __DIR__.'/module/brand.php';

// Lead
require_once __DIR__.'/module/lead.php';

//Customer
require_once __DIR__.'/module/customer.php';

//Category
require_once __DIR__.'/module/category.php';

// Company
require_once __DIR__.'/module/company.php';

// Contact
require_once __DIR__.'/module/contact.php';

// Account
Route::get('/accounting', [\App\Http\Controllers\Account\AccountIndexController::class, 'index']);
Route::post('/account/save', [\App\Http\Controllers\Account\AccountSaveController::class, 'save']);

// User
require_once __DIR__.'/module/user.php';

// Profile
Route::get('/profile', [\App\Http\Controllers\Profile\ProfileUpdateController::class, 'update']);
Route::post('/profile/save', [\App\Http\Controllers\Profile\ProfileSaveController::class, 'save']);

Route::get('/setting', [\App\Http\Controllers\SettingController::class, 'index']);
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index']);

// Calendar
require_once __DIR__.'/module/calendar.php';

// Email
require_once __DIR__.'/module/email.php';

// Email template
Route::match(['get', 'post'], '/email-template',
    [\App\Http\Controllers\EmailTemplate\EmailTemplateIndexController::class, 'index']);

// Campaign
require_once __DIR__.'/module/campaign.php';

// Supplier
require_once __DIR__.'/module/supplier.php';

// Ticket
require_once __DIR__.'/module/ticket.php';

// Regions
Route::get('ajax/region/{country}', [\App\Http\Controllers\Region\RegionGetAjaxController::class, 'index']);

//Report
Route::get('/report', [\App\Http\Controllers\Report\ReportIndexController::class, 'index']);
Route::get('/report/sale', [\App\Http\Controllers\Report\ReportSaleController::class, 'index']);
Route::get('/report/email', [\App\Http\Controllers\Report\ReportEmailController::class, 'index']);

// Web-form
Route::get('/web-form', [\App\Http\Controllers\WebForm\WebFormIndexController::class, 'index']);

// Notifications
require_once __DIR__.'/module/notification.php';

// Unsubscribe
Route::get('/unsubscribe', [\App\Http\Controllers\Unsubscribe\UnsubscribeUpdateController::class, 'update']);
Route::post('/unsubscribe/save', [\App\Http\Controllers\Unsubscribe\UnsubscribeSaveController::class, 'save']);

// Permission
Route::get('/permission', [\App\Http\Controllers\Permission\PermissionIndexController::class, 'index']);
Route::post('/permission', [\App\Http\Controllers\Permission\PermissionSaveController::class, 'save']);

//Bank
require_once __DIR__.'/module/bank.php';

//Bank account
require_once __DIR__.'/module/bank_account.php';

// Payroll
require_once __DIR__.'/module/payroll.php';
