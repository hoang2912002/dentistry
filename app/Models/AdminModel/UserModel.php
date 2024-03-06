<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'users';
    protected $fillable = [
       'uuid', 'name', 'gender', 'birthdate', 'login_id'
    ];
    public function getRouteKeyName()
    {
        return 'uuid';
    }
    public function login()
    {
        return $this->hasOne(LoginModel::class,'id','login_id');
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
        //dd($permissions);
        return $permissions ?? ['null'];
    }

    public function birthdate()
    {
        $birthdate = date('d/m/Y', strtotime($this->birthdate));
        return $birthdate;
    }

    public function gender()
    {
        switch ($this->gender) {
            case '0':
                return '<span class="badge badge-sm bg-gradient-info">Female</span>';
                break;
            case '1':
                return '<span class="badge badge-sm bg-gradient-primary">Male</span>';
                break;
            default:
                break;     
        }
    }
}
