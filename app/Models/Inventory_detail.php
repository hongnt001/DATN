<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory_detail extends Model
{
    use HasFactory;
    protected $table = 'inventory_detail_device';

    public function device()
    {
        return $this->hasOne('App\Models\Devices', 'id', 'id_device');
    }

}
