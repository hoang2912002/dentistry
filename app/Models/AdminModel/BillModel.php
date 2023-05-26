<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'user_uuid', 'name', 'email','phone_number','total_price','status','note'
    ];
    public function user()
    {
        return $this->hasOne(UserModel::class,'uuid','user_uuid');
    }
}
