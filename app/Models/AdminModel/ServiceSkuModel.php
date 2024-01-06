<?php

namespace App\Models\AdminModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSkuModel extends Model
{
    use HasFactory;
    protected $table = 'services_sku';
    protected $fillable = [
        'service_id', 'service_sku'
    ];
}
