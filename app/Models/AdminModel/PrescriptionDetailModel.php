<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDetailModel extends Model
{
    use HasFactory;
    protected $table = 'prescription_details';
    protected $fillable = [
        'prescription_id', 'medicine_id', 'shift_id','quantity','amount_of_time','price'
    ];
    public function prescription()
    {
        return $this->hasOne(PrescriptionModel::class,'id','prescription_id');
    }
    public function medicine()
    {
        return $this->hasOne(MedicineModel::class,'id','medicine_id');
    }
    public function shift()
    {
        return $this->hasOne(ShiftModel::class,'id','shift_id');
    }
    public function shift_name()
    {
        switch ($this->shift_id) {
            case 1:
                return '7:00 AM';
                break;
            
            case 2:
                return '9:00 AM';
                break;
            
            case 3:
                return '11:00 AM';
                break;
            
            case 4:
                return '13:00 PM';
                break;
            
            case 5:
                return '15:00 PM';
                break;
            
            
        }
    }
    public function price()
    {
        return '<span class="text-danger" id="'. $this->price .'"><strong>' . number_format($this->price,0,",",".") . '</strong><small><u class="m-1 font-weight-bold">đ</u></small></span>';
    }
    public function amount_of_time()
    {
        return '<p class="=text-dark px-3 mb-0 font-weight-bold">'. $this->amount_of_time   .'</p>';
    }
    
}
