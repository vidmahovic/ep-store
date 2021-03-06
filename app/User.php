<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use ReflectionClass;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'surname', 'email', 'password', 'token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


/*    protected $stiClassField = 'userable_type';
    protected $stiBaseClass = 'User';*/


    public function userable() {
        return $this->morphTo();
    }


    // MUTATORS
    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getNameAttribute() {
        return ucfirst($this->attributes['name']);
    }

    public function getSurnameAttribute() {
        return ucfirst($this->attributes['surname']);
    }

    /**
     * Check whether the authenticated user has a specified role (admin, employee or customer)
     * @return mixed
     */
    public function hasRole($role)
    {
        $model = 'App\\'.ucfirst($role);
        return $model::find($this->userable_id) && $this->userable_type == $model;
    }

    public function getStatusSpan() {
        if($this->trashed()) {
            return '<span style="color: #d75d4f">deaktiviran</span>';
        }

        return '<span style="color: #51d738">aktiviran</span>';
    }

    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;
        $this->save();
    }

}
