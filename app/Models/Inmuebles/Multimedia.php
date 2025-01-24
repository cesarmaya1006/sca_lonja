<?php

namespace App\Models\Inmuebles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Multimedia extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'multimedia_inmuebles';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class, 'inmuebles_id', 'id');
    }
    //---------------------------------------------------------------
}
