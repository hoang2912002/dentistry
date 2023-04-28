<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class LoginModel extends User
{
    use HasFactory;
    protected $table = 'logins';
    protected $fillable = [
        'email', 'password', 'phone_number'
    ];
    public function User()
    {
        return $this->hasOne(UserModel::class,'login_id','id');
    }
}
