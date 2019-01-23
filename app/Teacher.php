<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Silvanite\Brandenburg\Role;

class Teacher extends Model
{
    protected $table = "users";

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('teacher', function (Builder $builder) {
            $builder->whereHas('roles', function ($q) {
                $q->where('slug', 'teacher');
            });
        });
    }

    /**
     * The model relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}
