<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class liquid extends Model
{
    protected $table='liquid';
    protected $fillable = [
                            'merek', 
                            'distributor', 
                            'stok', 
                            'foto',
                        ];
}
