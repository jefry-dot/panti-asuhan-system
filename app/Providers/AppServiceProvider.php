<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Share jumlah pesan belum dibaca ke semua view admin
        View::composer('layouts.admin', function ($view) {
            $unreadCount = Message::where('is_read', false)->count();
            $view->with('unreadCount', $unreadCount);
        });
    }
}
