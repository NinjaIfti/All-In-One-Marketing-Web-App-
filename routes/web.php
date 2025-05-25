<?php

use App\Http\Controllers\ProfileController;
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
    Route::get('/dashboard', function () {
        return Inertia::render('user/Dashboard', ['user' => auth()->user()]);
    })->name('user.dashboard');
    
    Route::get('/campaigns', function () {
        return Inertia::render('user/Campaigns');
    })->name('user.campaigns');
    
    Route::get('/campaigns/create', function () {
        return Inertia::render('user/CreateCampaign');
    })->name('user.campaigns.create');
    
    Route::get('/contacts', function () {
        return Inertia::render('user/Contacts');
    })->name('user.contacts');
    
    Route::get('/analytics', function () {
        return Inertia::render('user/Analytics');
    })->name('user.analytics');
    
    Route::get('/automation', function () {
        return Inertia::render('user/Automation');
    })->name('user.automation');
    
    Route::get('/settings', function () {
        return Inertia::render('user/Settings');
    })->name('user.settings');
    
    Route::get('/support', function () {
        return Inertia::render('user/Support');
    })->name('user.support');
    
    Route::get('/resources', function () {
        return Inertia::render('user/Resources');
    })->name('user.resources');
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
});

// User Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
