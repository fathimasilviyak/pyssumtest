<?php

namespace App\Providers;

use App\Http\View\Composers\BranchComposer;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(['layouts.super-admin', 'super-admin.branch.index', 'super-admin.student-class.index'], BranchComposer::class);
    }
}
