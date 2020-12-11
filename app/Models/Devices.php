<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;
    protected $table = 'devices';
    public function accounting()
    {
        return $this->hasOne('App\Models\Accounting',  'id_device','id');
    }
    public function category()
    {
        return $this->hasOne('App\Models\Category',  'id','category_id');
    }


}
