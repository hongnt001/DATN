<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';

    public function group()
    {
        return $this->hasMany('App\Models\Inventory_group', 'id_inventory', 'id');
    }

    public function report()
    {
        return $this->hasOne('App\Models\Inventory_report', 'id', 'id_inventory');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\Inventory_detail', 'foreign_key', 'id_inventory');
    }

}
