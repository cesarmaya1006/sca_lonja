<?php

namespace App\Models\Constructoras;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ConstrucCargos extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'construc_cargos';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function area()
    {
        return $this->belongsTo(ConstrucAreas::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empleados()
    {
        return $this->hasMany(ConstrucEmpleados::class, 'cargo_id', 'id');
    }
    //---------------------------------------------------------------
}
