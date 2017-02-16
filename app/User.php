<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Tetapan nama table untuk model User
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'nama', 'status', 'telefon', 'gambar', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Function untuk semak status admin
    public function isAdmin()
    {
      // Semak status admin
      if ( \Auth::user()->status == 'admin' )
      {
        return true;
      }

      return false;

    }


}
