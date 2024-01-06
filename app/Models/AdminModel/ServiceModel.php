<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'name', 'slug', 'price','logo','description', 'activated'
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

    public function description() {
        $return = str_split($this->description,89);
        return $return[0];
    }
}
