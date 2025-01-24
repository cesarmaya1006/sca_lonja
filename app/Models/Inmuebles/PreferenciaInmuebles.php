<?php

namespace App\Models\Inmuebles;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PreferenciaInmuebles extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'preferencia_inmuebles';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(User::class, 'id');
    }
    //----------------------------------------------------------------------------------
}
