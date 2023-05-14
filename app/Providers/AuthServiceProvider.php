<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\AdminModel\GroupModel;
use App\Models\AdminModel\RoleModel;
use App\Models\AdminModel\RoomModel;
use App\Models\AdminModel\ShiftModel;
use App\Models\AdminModel\UserModel;
use App\Policies\GroupModelPolicy;
use App\Policies\RoleModelPolicy;
use App\Policies\RoomModelPolicy;
use App\Policies\ShiftModelPolicy;
use App\Policies\UserModelPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        UserModel::class => UserModelPolicy::class,
        GroupModel::class => GroupModelPolicy::class,
        RoleModel::class => RoleModelPolicy::class,
        RoomModel::class => RoomModelPolicy::class,
        ShiftModel::class => ShiftModelPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
