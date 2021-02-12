<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
<<<<<<< HEAD
        'firstname','name', 'email','tel', 'password','droit',
=======
        'prenom','name', 'email', 'password','position',
>>>>>>> e93c705475a33ddd8b92364c51a748ae9a19ec21
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

<<<<<<< HEAD
=======
   

>>>>>>> e93c705475a33ddd8b92364c51a748ae9a19ec21

  
}
