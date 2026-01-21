<?php

use Illuminate\Support\Facades\Route;

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
    $name = 'Luong Xuan Hieu',
    $mssv = '123456'
) {
    return view('sinhvien', compact('name', 'mssv'));
})->name('sinhvien.info');

Route::get('/banco/{n}', function ($n) {
    return view('banco', compact('n'));
})->name('banco');

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});