<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Policies\AnnouncePolicy;
use App\Policies\PagePolicy;

use App\Announce;
use App\Page;

use App\User;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Announce::class => AnnouncePolicy::class,
        Page::class => PagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::before(function (User $user, $ability) {
            if($user->role == 2)
            {
                return true;
            }
        });

        $this->registerPolicies();
    }

}
