<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\View\Components\GuestLayout;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::middleware('guest')->group(function () {
            Route::get('/', [GuestController::class, 'index'])->name('guest_welcome');
            Route::get('/view/{id}', [DoctorController::class, 'view_profile'])->name('view_profile');
            Route::fallback(function () {
                return redirect()->route('guest_welcome');
            });
        });

        Route::prefix('/admin')->middleware(['auth', 'superadmin'])->group(function () {
            Route::get('/', [DoctorController::class, 'admin'])->name('admin_dashboard');
            Route::get('/users', [DoctorController::class, 'all_users'])->name('admin_all_users');
            Route::get('/user/update/{id}', [DoctorController::class, 'user_form_update'])->name('admin_user_form_update');
            Route::patch('/user/update/{id}', [DoctorController::class, 'user_update'])->name('update_user');
            Route::delete('/user/delete', [DoctorController::class, 'destroy'])->name('destroy_user');
            Route::fallback(function () {
                return redirect()->route('admin_dashboard');
            });
        });
                Route::prefix('/patient')->middleware(['auth', 'patient'])->group(function () {
            Route::get('/', [GuestController::class, 'index'])->name('patient_dashboard');
            Route::fallback(function () {
                return redirect()->route('patient_dashboard');
            });
        });

        Route::prefix('/doctor')->middleware(['auth', 'doctor'])->group(function () {
            Route::get('/', [DoctorController::class, 'index'])->name('doctor_dashboard');
            Route::get('/users', [DoctorController::class, 'all_users'])->name('all_users');
            Route::get('/reservations', [DoctorController::class, 'all_appointment'])->name('all_appointment');
            Route::get('/user/update/{id}', [DoctorController::class, 'user_form_update'])->name('user_form_update');
            Route::get('/doctor/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
            Route::patch('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
            Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
            Route::get('/beds/status', [BedController::class, 'status'])->name('beds.status');
            Route::resource('/beds', BedController::class);
            Route::get('/patients/{patient}/prescriptions', [PrescriptionController::class, 'prescriptions'])->name('prescriptions.patient');
            Route::get('/profile', [DoctorController::class, 'profile'])->name('doctor_profile');
        Route::get('/doctor/profile/edit', [DoctorController::class, 'editProfile'])->name('doctor.profile.edit');
        Route::post('/doctor/profile/update', [DoctorController::class, 'updateProfile'])->name('doctor.profile.update');
            Route::resource('prescriptions', PrescriptionController::class);
            Route::resource('medical_records', MedicalRecordController::class);
            Route::resource('invoices', InvoiceController::class);
            Route::get('invoices/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');
            Route::get('invoices/{invoice}/print', [InvoiceController::class, 'print'])->name('invoices.print');
            Route::fallback(function () {
                return redirect()->route('doctor_dashboard');
            });
        });
        Route::prefix('/secretary')->middleware(['auth', 'secretary'])->group(function () {
            Route::get('/', [DoctorController::class, 'index'])->name('secretary_dashboard');
            Route::fallback(function () {
                return redirect()->route('secretary_dashboard');
            });
        });


        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified'])->name('dashboard');

        // Route::middleware('auth')->group(function () {
        //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // });

        require __DIR__ . '/auth.php';
    }
);
