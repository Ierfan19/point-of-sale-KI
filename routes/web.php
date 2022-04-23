<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [DashboardController::class, 'getViewDash'])->middleware('auth');
Route::get('/transaksi', [TransaksiController::class, 'index'])->middleware('auth');

// Route::get('/','DashboardController@index');

Route::group(['prefix' => 'basic-ui'], function(){
    Route::get('accordions', function () { return view('pages.basic-ui.accordions'); });
    Route::get('buttons', function () { return view('pages.basic-ui.buttons'); });
    Route::get('badges', function () { return view('pages.basic-ui.badges'); });
    Route::get('breadcrumbs', function () { return view('pages.basic-ui.breadcrumbs'); });
    Route::get('dropdowns', function () { return view('pages.basic-ui.dropdowns'); });
    Route::get('modals', function () { return view('pages.basic-ui.modals'); });
    Route::get('progress-bar', function () { return view('pages.basic-ui.progress-bar'); });
    Route::get('pagination', function () { return view('pages.basic-ui.pagination'); });
    Route::get('tabs', function () { return view('pages.basic-ui.tabs'); });
    Route::get('typography', function () { return view('pages.basic-ui.typography'); });
    Route::get('tooltips', function () { return view('pages.basic-ui.tooltips'); });
});

Route::group(['prefix' => 'laporan'], function(){
    Route::get('chartjs', [LaporanController::class, 'index']);
});

Route::group(['prefix' => 'barang'], function(){
    Route::get('barang-table', [BarangController::class, 'index']);
    Route::get('tambahbarang', [BarangController::class, 'create']);
});
    Route::post('/addbarang', [BarangController::class, 'store']);
    Route::get('/editbarang/{id}', [BarangController::class, 'edit']);
    Route::post('/editbarang', [BarangController::class, 'update']);
    Route::get('/deletebarang/{id}', [BarangController::class, 'destroy']);

Route::group(['prefix' => 'pembeli'], function(){
    Route::get('pembeli', [PembeliController::class, 'index']);
    Route::get('tambahpembeli', [PembeliController::class, 'create']);
});
    Route::post('addpembeli', [PembeliController::class, 'store']);
    Route::get('deletepembeli/{id}', [PembeliController::class, 'destroy']);
    Route::get('editpembeli/{id}', [PembeliController::class, 'edit']);
    Route::post('editpembeli', [PembeliController::class, 'update']);

Route::group(['prefix' => 'user-pages'], function(){
    Route::get('login', function () { return view('pages.user-pages.login'); });
    Route::get('register', function () { return view('pages.user-pages.register'); });
    Route::get('lock-screen', function () { return view('pages.user-pages.lock-screen'); });
});
Route::group(['prefix' => 'error-pages'], function(){
    Route::get('error-404', function () { return view('pages.error-pages.error-404'); });
    Route::get('error-500', function () { return view('pages.error-pages.error-500'); });
});

// For Clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
// Route::any('/{page?}',function(){
//     return View::make('pages.error-pages.error-404');
// })->where('page','.*');
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/tambahcategory', [CategoryController::class, 'create']);
Route::post('/addcategory', [CategoryController::class, 'store']);
Route::post('/editcategory', [CategoryController::class, 'update']);
Route::get('/editcategory/{id}', [CategoryController::class, 'show']);

Route::get('/beli/{id}', [TransaksiController::class, 'show']);
Route::get('/cari/nama', [TransaksiController::class, 'cari'])->name('cari');
Route::post('/transaksi/post', [TransaksiController::class, 'store']);

Route::get('/tukarpoin/{id}', [PembeliController::class, 'show']);

Route::get('/login', [UserController::class, 'getViewLogin'])->name('login');
Route::post('/logging', [UserController::class, 'authenticate']);
Route::get('/register', [UserController::class, 'getViewRegister']);
Route::post('/register', [UserController::class, 'store']);
Route::get('/logout', [UserController::class, 'logout']);