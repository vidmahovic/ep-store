<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;




class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

/*    public function __construct($attributes = array())
    {
        parent::__construct($attributes);
        $this->setAttribute('userable_type', get_class($this));
    }*/

/*    public function newQuery()
    {
        $builder = parent::newQuery();
        if ('App\User' !== get_class($this)) {
            $builder->where('userable_type',"=",get_class($this));
            if('App\Customer' === get_class($this)) {
                $builder->with('customer');
            }
        }

        return $builder;
    }*/

/*    public function newFromBuilder($attributes = [], $connection = null)
    {
        if ($attributes->userable_type) {
            $class = $attributes->userable_type;
            $instance = new $class;
            $instance->exists = true;
            $instance->setRawAttributes((array) $attributes, true);
            return $instance;
        } else {
            return parent::newFromBuilder($attributes, $connection);
        }


    }*/


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
    protected $fillable = ['name', 'surname', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function userable() {
        return $this->morphTo();
    }

    // MUTATORS

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }



    /**
     * Check whether the authenticated user has a specified role (admin, employee or customer)
     * @return mixed
     */
    public function hasRole($role) {
        $model = 'App\\'.ucfirst($role);
        return $model::find($this->userable_id) !== null;
    }
}
