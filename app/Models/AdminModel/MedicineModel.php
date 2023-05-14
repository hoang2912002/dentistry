<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineModel extends Model
{
    use HasFactory;
    protected $table = 'medicines';
    protected $fillable = [
        'name', 'slug', 'quantity', 'root', 'price', 'type_of_medicine_id', 'manufacturer_id','activated'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function type_of_medicine()
    {
        return $this->hasOne(TypeOfMedicineModel::class,'id','type_of_medicine_id');
    }
    public function manufacturer()
    {
        return $this->hasOne(ManufacturerModel::class,'id','manufacturer_id');
    }
    public function price()
    {
        $price = number_format($this->price,'0',".",".") . ' VNĐ';
        return '<span class="text-danger ms-2 font-weight-bold">' . $price . '</span>';
    }
    public function quantity()
    {
        $quntity = $this->quantity;
        if($quntity > 0){
            return '<span class="badge badge-success badge-sm">IN STOCK(' . $quntity .  ')</span>';
        }
        else{
            return '<span class="badge badge-danger badge-sm">OUT OF STOCK(' . $quntity . ')</span>';
        }
    }
    public function input_price()
    {
        $price = number_format($this->price,'0',".",",") . 'VNĐ';
        return $price;
    }
}
