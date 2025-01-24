<?php

namespace App\Models\Parametros;

use App\Models\Config\TipoDocumento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Arquitecto extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'arquitectos';
    protected $guarded = [];
    //==================================================================================
    //----------------------------------------------------------------------------------
    public function tipo_docu()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->hasOne(User::class, 'id');
    }
    //----------------------------------------------------------------------------------
    public function regional()
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
}
