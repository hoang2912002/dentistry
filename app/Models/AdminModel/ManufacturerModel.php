<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerModel extends Model
{
    use HasFactory;
    protected $table = 'manufactureres';
    protected $fillable = [
        'name', 'slug', 'address', 'email', 'phone_number', 'activated'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
