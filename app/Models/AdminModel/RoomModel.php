<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = [
        'name', 'slug', 'activated'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
