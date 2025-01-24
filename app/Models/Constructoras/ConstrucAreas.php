<?php

namespace App\Models\Constructoras;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ConstrucAreas extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'construc_areas';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function constructora()
    {
        return $this->belongsTo(Constructora::class, 'constructora_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function cargos()
    {
        return $this->hasMany(ConstrucCargos::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
    // ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****
    //----------------------------------------------------------------------------------
    public function area_sup()
    {
        return $this->belongsTo(ConstrucAreas::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function areas()
    {
        return $this->hasMany(ConstrucAreas::class, 'area_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
