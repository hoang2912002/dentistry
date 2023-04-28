<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUserModel extends Model
{
    use HasFactory;
    protected $table = 'group_users';
    protected $fillable = [
        'user_uuid', 'group_id'
    ];
    public function group()
    {
        return $this->hasOne(GroupModel::class,'group_id','id');
    }
    public function user()
    {
        return $this->hasOne(UserModel::class,'user_uuid','uuid');
    }
}
