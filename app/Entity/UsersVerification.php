<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use App\Entity\User;

class UsersVerification extends Model
{
    protected $guarded = [];

    protected $table ='users_verification';
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
