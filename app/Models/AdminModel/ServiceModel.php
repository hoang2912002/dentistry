<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'name', 'slug', 'price', 'activated'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function price()
    {
        $price = number_format($this->price,'0',".",".") . "VNĐ";
        return $price;
    }
}
