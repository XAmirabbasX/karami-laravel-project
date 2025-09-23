<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ViewShareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $categories = Category::whereNull('parent_id')->where('status', 'active')->with('children')->get();
        \Illuminate\Support\Facades\View::share('categories', $categories);
    }
}
