<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SistemController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::group(['middleware' => ['auth']], function () {
    //  <----------------Route Meja-------------------------->
    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            
        });
        Route::controller(TransaksiController::class)->group(function () {
            Route::get('/transaksi', 'transaksi');
            Route::post('/bayar/{id_keranjang}', 'bayar')->middleware();
            Route::get('/group', 'group');
            Route::get('/checkout', 'checkout');
        });
       
    });
    // <-------------------Route Admin----------------------------->
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('/dashboard');
            Route::get('/barang', 'barang');
            Route::get('/tambah', 'tambah');
            Route::get('/warna', 'warna');
            Route::get('/size', 'size');
            Route::get('/kategori', 'kategori');
            Route::get('/add.user', 'user');
            Route::get('/data.user', 'data_user');
            Route::get('/profile', 'profile')->name('profile');
        });
    });
    
});
Route::controller(KeranjangController::class)->group(function () {
    Route::get('/keranjang',  'keranjang');
    Route::get('/keranjang/hapus/{id_keranjang}',  'hapus');
});

Route::controller(ItemController::class)->group(function () {
    Route::get('/item/{id_barang}', 'item');
    Route::post('/keranjang/tambah','tambah');
});

// Route::controller(TransaksiController::class)->group(function () {
//     Route::get('/transaksi', 'transaksi');
//     Route::post('/bayar/{id_keranjang}', 'bayar')->middleware();
//     Route::get('/group', 'group');
//     Route::get('/checkout', 'checkout');
// });

Route::prefix('setting')->group(function () {
    Route::get('', [SettingController::class, 'setting']);
    Route::get('/hubungikami', [SettingController::class, 'hubungikami']);
    Route::get('/tentangkami', [SettingController::class, 'tentangkami']);
    Route::get('/profile', [SettingController::class, 'profil']);
});

Route::prefix('belanja')->group(function () {
    Route::get('', [BelanjaController::class, 'belanja']);
    Route::get('/search', [BelanjaController::class, 'search']);
    Route::get('/filter', [BelanjaController::class, 'filter']);
    Route::get('/populer', [BelanjaController::class, 'populer']);
    Route::get('/terbaru', [BelanjaController::class, 'terbaru']);
});

// Route::controller(AdminController::class)->group(function() {
//     Route::get('/dashboard', 'index')->name('/dashboard');
//     Route::get('/barang', 'barang');
//     Route::get('/tambah', 'tambah');
//     Route::get('/warna', 'warna');
//     Route::get('/size', 'size');
//     Route::get('/kategori', 'kategori');
// });
Route::controller(UserController::class)->group(function(){
    Route::get('index','index')->name('index');
    Route::get('/','login')->name('/');
    Route::get('/daftar','register');
    Route::post('/adduser', 'create');
});
Route::controller(SistemController::class)->group(function () {
    Route::post('/add.size', 'add_size');
    Route::get('/hapus.size/{id_size}', 'hapus_size');
    Route::post('/add.warna', 'add_warna');
    Route::get('/hapus.warna/{id_warna}', 'hapus_warna');
    Route::post('/add.kategori', 'add_kategori');
    Route::post('/status/{id_barang}', 'status');
    Route::get('/hapus.kategori/{id_kategori_barang}', 'hapus_kategori');
    Route::post('/tambah.barang','tambah_barang')->name('create');
    Route::get('/hapus/{id_barang}', 'hapus');
    Route::post('/edit/{id_barang}', 'edit')->name('edit');
    Route::post('/edit/{id}', 'edit_role')->name('edit.role');
    Route::post('/edit.profile/{id}', 'edit_profile')->name('edit.profile');
    Route::get('/hapus.user/{id}', 'hapus_user');
    Route::post('/tambah.user', 'user');
}); 
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
