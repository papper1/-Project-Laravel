<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAge;
use App\Http\Controllers\AgeController;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        $products = [
            ['id' => 1, 'name' => 'iPhone 15'],
            ['id' => 2, 'name' => 'Samsung S24'],
            ['id' => 3, 'name' => 'Xiaomi 14'],
        ];
        return view('product.index', compact('products'));
    })->name('product.index');

    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');

    Route::get('/{id?}', function ($id = '123') {
        return "Chi tiết sản phẩm có ID = $id";
    })->where('id', '.*')->name('product.detail');
});

Route::get('/sinhvien/{name?}/{mssv?}', function (
    $name = 'NguyenQuangThang',
    $mssv = '0123567'
) {
    return view('sinhvien', compact('name', 'mssv'));
})->name('sinhvien.info');

Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
})->name('banco');

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);



Route::get('/signin', [AuthController::class, 'SignIn']);
Route::post('/signin', [AuthController::class, 'CheckSignIn']);


Route::get('/age', [AgeController::class, 'index']);
Route::post('/save-age', [AgeController::class, 'saveAge']);

Route::get('/restricted', function () {
    return "Bạn đủ tuổi, được phép truy cập!";
})->middleware(CheckAge::class);