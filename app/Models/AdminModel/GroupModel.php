<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'name'
    ];
    public function role()
    {
        return $this->belongsToMany(PermissionModel::class,'roles','group_id','permission_id','id','id');
    }
}
