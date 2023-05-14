<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfMedicineModel extends Model
{
    use HasFactory;
    protected $table = 'type_of_medicines';
    protected $fillable = [
        'name', 'slug', 'activated'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
