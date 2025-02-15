<?php

use App\Http\Middleware\EmployeeMiddleware;
use App\Http\Middleware\IsManager;
use App\Livewire\EmployeePage;
use App\Livewire\FutureReservations;
use App\Livewire\NowReservations;
use App\Livewire\ReservationPanel;
use App\Livewire\TablePanel;
use App\Livewire\UserPanel;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;




//admin page
Route::middleware(['auth', IsManager::class])->group(function () {
    Route::get('/admin/users', UserPanel::class)->name('users');
    Route::get('/admin/tables', TablePanel::class)->name('tables');
    Route::get('/admin/reservations', ReservationPanel::class)->name('reservations');
});


Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/futureReservations', FutureReservations::class)
    ->middleware('auth')
    ->name('futureReservations');

Route::get('/nowReservations', NowReservations::class)
    ->middleware('auth')
    ->name('nowReservations');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // Verifica o papel do usuário autenticado e redireciona conforme necessário
        if (auth()->user()->role === 'manager') {
            return redirect('/admin/users');
        } elseif (auth()->user()->role === 'employee') {
            return redirect('/employeePage'); // Redireciona para a página do funcionário
        } else {
            return redirect()->route('home'); // Redireciona para a home se não for manager nem employee
        }
    })->name('dashboard');
});

Route::middleware(['auth',EmployeeMiddleware::class])->group(function () {
    Route::get('/employeePage', EmployeePage::class)->name('employee.page');
});



Route::post('/theme', function (Request $request) {
    session(['dark_mode' => $request->darkMode]);
    return response()->json(['success' => true]);
});

