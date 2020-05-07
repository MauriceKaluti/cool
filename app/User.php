<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function isAdmin()
     {
        return $this->admin;
     }

     // Defining relationship between a user and shipping addresses

      public function orders()
     {
        return $this->hasMany(Order::class);
     }


     public function town() {
        //  $this->belongsTo('App\Product');
        return $this->belongsTo( Town::class );
    }


     // Defining relationship between a user and orders such that one user has many orders



     public function address()
     {
        return $this->hasMany(Address::class);
     }

        public function design()
     {
        return $this->hasMany(ProductDesign::class);
     }

          // Defining relationship between a user and shipping addresses

      public function review()
     {
        return $this->hasOne(ProductReview::class);
     }

               // Defining relationship between a user and shipping addresses

      public function wish()
     {
        return $this->hasOne(wishList::class);
     }

}
