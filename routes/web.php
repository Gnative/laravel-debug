<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/migrate/mysql', function () {
    // Works
    Artisan::call('migrate:fresh', [
        '--database' => 'mysql'
    ]);

    dd('Success');
});

Route::get('/migrate/pgsql', function () {
    // This correctly outputs the current version of psql
    // $output = shell_exec('psql --version');
    // dd($output);

    // This fails with error - could not find a "psql" to execute
    Artisan::call('migrate:fresh', [
        '--database' => 'pgsql',
    ]);

    // Also Fails with the error - could not find a "psql" to execute
    Artisan::call('migrate:fresh', [
        '--database' => 'pgsql',
        '--schema-path' => database_path().'/schema/pgsql-schema.sql',
    ]);

    dd('Success');
});
