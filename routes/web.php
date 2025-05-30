<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\CampaignController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\ChatController as UserChatController;
use App\Http\Controllers\Admin\ChatController as AdminChatController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Landing Page for PB&J Solutions
Route::get('/pbj-solutions', function () {
    return Inertia::render('Auth/Register');
})->name('pbj.solutions');

// Public access routes
Route::get('/', function () {
    return Inertia::render('Marketing/Home');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('Marketing/About');
})->name('about');

Route::get('/brand-ambassador', function () {
    return Inertia::render('Marketing/BrandAmbassador');
})->name('brand-ambassador');

Route::get('/reviews', function () {
    return Inertia::render('Marketing/Reviews');
})->name('reviews');

Route::get('/services', function () {
    return Inertia::render('Marketing/Services');
})->name('services');

Route::get('/contact', function () {
    return Inertia::render('Marketing/Contact');
})->name('contact');

Route::get('/signup', function () {
    return Inertia::render('Marketing/Signup');
})->name('signup');

Route::get('/privacy', function () {
    return Inertia::render('Marketing/Privacy');
})->name('privacy');

Route::get('/terms', function () {
    return Inertia::render('Marketing/Terms');
})->name('terms');

Route::get('/fulfillment', function () {
    return Inertia::render('Marketing/Fulfillment');
})->name('fulfillment');

Route::get('/custom-register', function () {
    return Inertia::render('Register');
})->name('custom.register');

// User Routes (protected)
Route::middleware(['auth', 'verified'])->prefix('user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    
    // Campaign routes
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('user.campaigns');
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('user.campaigns.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('user.campaigns.store');
    Route::get('/campaigns/{id}', [CampaignController::class, 'show'])->name('user.campaigns.show');
    Route::get('/campaigns/{id}/edit', [CampaignController::class, 'edit'])->name('user.campaigns.edit');
    Route::put('/campaigns/{id}', [CampaignController::class, 'update'])->name('user.campaigns.update');
    Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy'])->name('user.campaigns.destroy');
    Route::post('/campaigns/{id}/send', [CampaignController::class, 'send'])->name('user.campaigns.send');
    Route::post('/campaigns/{id}/schedule', [CampaignController::class, 'schedule'])->name('user.campaigns.schedule');
    Route::post('/campaigns/{id}/cancel', [CampaignController::class, 'cancel'])->name('user.campaigns.cancel');
    
    // Contact routes
    Route::get('/contacts', [ContactController::class, 'index'])->name('user.contacts');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('user.contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('user.contacts.store');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('user.contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('user.contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('user.contacts.destroy');
    Route::post('/contacts/import', [ContactController::class, 'import'])->name('user.contacts.import');
    Route::delete('/contacts/bulk-delete', [ContactController::class, 'bulkDelete'])->name('user.contacts.bulk-delete');
    Route::patch('/contacts/bulk-status', [ContactController::class, 'bulkStatus'])->name('user.contacts.bulk-status');
    
    // Analytics routes
    Route::get('/analytics', [App\Http\Controllers\User\AnalyticsController::class, 'index'])->name('user.analytics');
    Route::get('/analytics/activity-data', [App\Http\Controllers\User\AnalyticsController::class, 'getActivityData'])->name('user.analytics.activity-data');
    Route::get('/analytics/login-data', [App\Http\Controllers\User\AnalyticsController::class, 'getLoginData'])->name('user.analytics.login-data');
    
    // Automation routes
    Route::get('/automation', [App\Http\Controllers\User\AutomationController::class, 'index'])->name('user.automation');
    Route::resource('automations', App\Http\Controllers\User\AutomationController::class, ['as' => 'user']);
    Route::put('/automations/{id}/status', [App\Http\Controllers\User\AutomationController::class, 'changeStatus'])->name('user.automations.status');
    
    // Settings routes
    Route::get('/settings', [App\Http\Controllers\User\SettingsController::class, 'index'])->name('user.settings');
    Route::put('/settings/general', [App\Http\Controllers\User\SettingsController::class, 'updateGeneralSettings'])->name('user.settings.general');
    Route::put('/settings/email', [App\Http\Controllers\User\SettingsController::class, 'updateEmailSettings'])->name('user.settings.email');
    Route::put('/settings/campaign', [App\Http\Controllers\User\SettingsController::class, 'updateCampaignSettings'])->name('user.settings.campaign');
    Route::post('/settings/reset', [App\Http\Controllers\User\SettingsController::class, 'resetSettings'])->name('user.settings.reset');
    
    Route::get('/support', function () {
        return Inertia::render('user/Support');
    })->name('user.support');
    
    Route::get('/resources', function () {
        return Inertia::render('user/Resources');
    })->name('user.resources');
    
    // Chat routes for users
    Route::get('/chat', [UserChatController::class, 'index'])->name('user.chat.index');
    Route::get('/chat/{id}', [UserChatController::class, 'show'])->name('user.chat.show');
    Route::post('/chat', [UserChatController::class, 'store'])->name('user.chat.store');
    Route::post('/chat/{id}/messages', [UserChatController::class, 'sendMessage'])->name('user.chat.message');
});

// Admin Routes (protected)
Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard', ['user' => auth()->user()]);
    })->name('admin.dashboard');
    
    Route::get('/contacts', function () {
        return Inertia::render('Admin/Contacts');
    })->name('admin.contacts');
    
    Route::get('/campaigns', function () {
        return Inertia::render('Admin/Campaigns');
    })->name('admin.campaigns');
    
    Route::get('/automations', function () {
        return Inertia::render('Admin/Automations');
    })->name('admin.automations');
    
    Route::get('/website', function () {
        return Inertia::render('Admin/Website');
    })->name('admin.website');
    
    Route::get('/analytics', function () {
        return Inertia::render('Admin/Analytics');
    })->name('admin.analytics');
    
    Route::get('/settings', function () {
        return Inertia::render('Admin/Settings');
    })->name('admin.settings');
    
    // Chat routes for admins
    Route::get('/chat', [AdminChatController::class, 'index'])->name('admin.chat.index');
    Route::get('/chat/{id}', [AdminChatController::class, 'show'])->name('admin.chat.show');
    Route::post('/chat/{id}/messages', [AdminChatController::class, 'sendMessage'])->name('admin.chat.message');
    Route::patch('/chat/{id}/status', [AdminChatController::class, 'changeStatus'])->name('admin.chat.status');
    Route::patch('/chat/{id}/reassign', [AdminChatController::class, 'reassign'])->name('admin.chat.reassign');
    Route::get('/chat/admins/list', [AdminChatController::class, 'getAdmins'])->name('admin.chat.admins');
});

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
