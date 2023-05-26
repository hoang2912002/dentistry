<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionModel extends Model
{
    use HasFactory;
    protected $table = 'prescriptions';
    protected $fillable = [
        'user_uuid', 'total_quantity', 'total_price','activated'
    ];
    public function user()
    {
        return $this->hasOne(UserModel::class,'uuid','user_uuid');
    }

    public function user_uuid()
    {
        $name = '<a class="=text-dark px-3 mb-0 font-weight-bold" href='. route('prescriptiondetail.index',$this->id) .'>'. $this->user_uuid .'</a>';
        return $name;
    }

    public function price()
    {
        $price = number_format($this->total_price,'0',".",".") . ' VNĐ';
        return '<span class="text-danger ms-2 font-weight-bold">' . $price . '</span>';
    }
    public function quantity()
    {
        $quntity = $this->total_quantity;
        if($quntity > 0){
            return '<span class="badge badge-success badge-sm">IN STOCK(' . $quntity .  ')</span>';
        }
        else{
            return '<span class="badge badge-danger badge-sm">OUT OF STOCK(' . $quntity . ')</span>';
        }
    }
}
