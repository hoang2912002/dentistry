<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetailModel extends Model
{
    use HasFactory;
    protected $table = 'billdetails';
    protected $fillable = [
        'bill_id', 'prescription_id', 'user_service_id','total_price'
    ];
    public function bill()
    {
        return $this->hasOne(BillModel::class,'id','bill_id');
    }
    public function prescription()
    {
        return $this->hasOne   (BillModel::class,'id','bill_id');
    }
}
