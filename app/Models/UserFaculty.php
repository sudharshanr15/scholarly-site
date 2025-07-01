<?php

namespace App\Models;

use App\Notifications\VerifyUserFaculty;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserFaculty extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    
    protected $table = "users_faculty";

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendEmailVerificationNotification(){
        $this->notify(new VerifyUserFaculty);
    }
}
