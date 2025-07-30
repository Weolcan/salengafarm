<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalkInSalesController;
use App\Http\Controllers\UserPlantRequestController;
use App\Http\Controllers\WalkInInventoryController;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;

// Public routes
Route::get('/', [PublicController::class, 'index'])->name('public.plants');
Route::post('/display-plants', [PublicController::class, 'store'])->name('display-plants.store');
Route::delete('/display-plants/{plant}', [PublicController::class, 'destroy'])->name('display-plants.destroy');
Route::post('/display-plants/photo/upload', [PublicController::class, 'uploadPhoto'])->name('display-plants.upload.photo');
Route::delete('/display-plants/photo/remove/{plant}', [PublicController::class, 'removePhoto'])->name('display-plants.remove.photo');

// Regular user plant request routes (accessible to all)
Route::prefix('user/plant-request')->name('user.plant-request.')->group(function () {
    Route::get('/', [UserPlantRequestController::class, 'create'])->name('create');
    Route::get('/select-plants', [UserPlantRequestController::class, 'selectPlants'])->name('select-plants');
    Route::post('/store', [UserPlantRequestController::class, 'store'])->name('store');
    Route::get('/success/{id}', [UserPlantRequestController::class, 'success'])->name('success');
    Route::get('/download-pdf/{id}', [UserPlantRequestController::class, 'downloadPdf'])->name('download-pdf');
});

// Client RFQ routes - for clients only
Route::middleware(['auth', 'can:client-access'])->group(function () {
    Route::post('/client-request', [ClientRequestController::class, 'store'])->name('client-request.store');
    Route::get('/request-success/{id}', [ClientRequestController::class, 'showSuccess'])->name('request-success');
});

// For public users without authentication
Route::post('/client-request-public', [ClientRequestController::class, 'store'])->name('client-request.public');
Route::get('/request-success-public/{id}', [ClientRequestController::class, 'showSuccess'])->name('request-success-public');

// Social Login Routes
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirectToProvider'])->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])->name('socialite.callback');

// Authentication routes
Route::middleware(['auth'])->group(function () {
    // Regular user routes
    Route::get('/home', [PublicController::class, 'index'])->name('home');

    // Admin-only routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::put('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.update-role');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Admin and Manager routes
    Route::middleware(['can:access-admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Add plant search API endpoint before the resource route
        Route::get('/plants/search', [PlantController::class, 'search'])->name('plants.search');

        Route::resource('plants', PlantController::class)->except(['create', 'edit', 'show']);
        Route::post('/plants/bulk-update', [PlantController::class, 'bulkUpdate'])->name('plants.bulk-update');
        Route::post('/update-stock', [DashboardController::class, 'updateStock'])->name('update-stock');

        // Walk-in sales routes
        Route::get('/walk-in', [WalkInSalesController::class, 'index'])->name('walk-in.index');
        Route::post('/walk-in/process-sale', [WalkInSalesController::class, 'processSale'])->name('walk-in.process-sale');
        Route::get('/walk-in/records', [WalkInSalesController::class, 'getSalesRecords'])->name('walk-in.records');
        Route::get('/walk-in/percentages', [WalkInSalesController::class, 'getSalesPercentages'])->name('walk-in.percentages');

        // Walk-in inventory management routes
        Route::get('/walk-in/inventory', [WalkInInventoryController::class, 'index'])->name('walk-in.inventory');
        Route::post('/walk-in/inventory/update', [WalkInInventoryController::class, 'updateInventory'])->name('walk-in.inventory.update');
        Route::get('/walk-in/inventory/stats', [WalkInInventoryController::class, 'getInventoryStats'])->name('walk-in.inventory.stats');
        Route::get('/walk-in/inventory/summary', [WalkInInventoryController::class, 'getSummary'])->name('walk-in.inventory.summary');

        // Requests management routes
        Route::get('/requests', [ClientRequestController::class, 'index'])->name('requests.index');
        Route::post('/requests/send-email/{id}', [ClientRequestController::class, 'sendEmail'])->name('requests.send-email');
        Route::get('/requests/view/{id}', [ClientRequestController::class, 'plainViewRequest'])->name('requests.view');
        Route::get('/requests/download-pdf/{id}', [ClientRequestController::class, 'downloadPdf'])->name('requests.download-pdf');
        Route::get('/requests/view-pdf/{id}', [ClientRequestController::class, 'viewPdf'])->name('requests.view-pdf');
        Route::delete('/requests/{id}', [ClientRequestController::class, 'destroy'])->name('requests.destroy');
        Route::post('/requests/update/{id}', [ClientRequestController::class, 'updateRequest'])->name('requests.update');
        Route::post('/requests/update-pricing/{id}', [ClientRequestController::class, 'updatePricing'])->name('requests.update-pricing');
        Route::post('/requests/update-info/{id}', [ClientRequestController::class, 'updateInfo'])->name('requests.update-info');
        Route::post('/requests/update-client/{id}', [ClientRequestController::class, 'updateClient'])->name('requests.update-client');
        Route::post('/requests/update-items/{id}', [ClientRequestController::class, 'updateItems'])->name('requests.update-items');
        Route::get('/requests/direct-view/{id}', [ClientRequestController::class, 'plainViewRequest'])->name('requests.direct-view');
        Route::get('/requests/plain-view/{id}', [ClientRequestController::class, 'plainViewRequest'])->name('requests.plain-view');

        // Site Visits placeholder route
        Route::get('/site-visits', function () {
            return view('site-visits');
        })->name('site-visits');

        // Move these routes inside the admin middleware group
        Route::post('/plants/photo/upload', [PlantController::class, 'uploadPhoto']);
        Route::delete('/plants/photo/remove/{plant}', [PlantController::class, 'removePhoto']);
    });

    // Common routes for all authenticated users
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add these routes for photo management
    Route::post('/plants', [PlantController::class, 'store']);

    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

    // Request Form route for authenticated users
    Route::get('/request-form', [App\Http\Controllers\RequestFormController::class, 'index'])->name('request-form');
    Route::post('/request-form', [App\Http\Controllers\RequestFormController::class, 'store'])->name('request-form.store');
    Route::get('/request-form/confirmation', [App\Http\Controllers\RequestFormController::class, 'confirmation'])->name('request-form.confirmation');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
});

Route::get('/client-requests', [DashboardController::class, 'clientRequests'])->name('client.requests');

require __DIR__ . '/auth.php';

