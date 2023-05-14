<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'group_id', 'permission_id'
    ];
    public function group()
    {
        return $this->hasOne(GroupModel::class,'group_id','id');
    }
    public function permission()
    {
        return $this->hasOne(PermissionModel::class,'id','permission_id');
    }

    public function cmp($a, $b)
    {
        return $a <=> $b;
    }
}
