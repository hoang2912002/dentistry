<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name', 'gender', 'birthdate', 'login_id'
    ];
    public function login()
    {
        return $this->hasOne(LoginModel::class,'login_id','id');
    }
    public function group_user()
    {
        return $this->belongsToMany(GroupModel::class,'group_users','user_uuid', 'group_id', 'uuid', 'id')->withPivot('group_id');
    }
    public function getPermision()
    {
        $groups = $this->group_user;
        foreach($groups as $group){
            $permissions = array_map(function($permission){
                return $permission->name;
            },$group->role->all());
        }
        return $permissions ?? ['null'];
    }
}
