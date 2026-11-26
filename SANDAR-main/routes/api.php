<?php

use App\Http\Controllers\ProductController;

Route::get(
    '/products',
    [ProductController::class, 'index']
);

Route::apiResource(
    'products', 
    ProductController::class
);