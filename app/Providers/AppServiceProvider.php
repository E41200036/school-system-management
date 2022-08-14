<?php

namespace App\Providers;

use App\Interfaces\TeacherInterface;
use App\Interfaces\UserInterface;
use App\Models\Teacher;
use App\Models\User;
use App\Observers\Admin\TeacherObserver;
use App\Observers\UserObserver;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(TeacherInterface::class, TeacherRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Teacher::observe(TeacherObserver::class);
        User::observe(UserObserver::class);
    }
}
