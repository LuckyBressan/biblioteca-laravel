<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . 'processos.php';

Route::get('/', function () {
    return view('welcome');
});
