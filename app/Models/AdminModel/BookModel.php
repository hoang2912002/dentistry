<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'user_uuid', 'name', 'email','phone_number','date_appointment','shift_id','doctor_uuid','note'
    ];
    public function user()
    {
        return $this->hasOne(UserModel::class,'uuid','user_uuid');
    }

    public function book_name()
    {
        $name = '<a class="=text-dark px-3 mb-0 font-weight-bold" href='. route('bookdetail.index',$this->id) .'>'. $this->name .'</a>';
        return $name;
    }

    public function date_appointment()
    {
        return date('d-m-Y', strtotime($this->date_appointment));
    }

    public function shift()
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

    public function doctor()
    {
        $name = UserModel::where('uuid',$this->doctor_uuid)->value('name');
        return $name;
    }
}
