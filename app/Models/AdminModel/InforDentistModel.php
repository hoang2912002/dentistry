<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InforDentistModel extends Model
{
    use HasFactory;
    protected $table = 'infor_dentists';
    protected $fillable = [
        'dentist_uuid','description', 'avatar'
    ];

    public function dentist_infor()
    {
        return $this->hasOne(UserModel::class,'uuid','dentist_uuid');
    }

    public function image()
    {
        return $this->avatar;
    }
}
