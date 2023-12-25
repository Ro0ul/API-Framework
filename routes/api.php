<?php declare(strict_types=1);

use App\Controllers\HomeController;
use App\Core\Route;

Route::add("GET","/",[HomeController::class,"index"]);