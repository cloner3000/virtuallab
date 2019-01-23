<?php

namespace App\Providers;

use App\Policies\StudentPolicy;
use App\Student;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Silvanite\Brandenburg\Traits\ValidatesPermissions;

class AuthServiceProvider extends ServiceProvider
{
    use ValidatesPermissions;
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Student::class => StudentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->collectGate();

        $this->registerPolicies();
    }

    /**
     * Gate collection
     */
    protected function collectGate()
    {
        collect([
            'viewStudent',
            'manageStudent',
            'viewTeacher',
            'manageTeacher'
        ])->each(function ($permission) {
            Gate::define($permission, function ($user) use ($permission) {
                if ($this->nobodyHasAccess($permission)) {
                    return true;
                }

                return $user->hasRoleWithPermission($permission);
            });
        });
    }
}
