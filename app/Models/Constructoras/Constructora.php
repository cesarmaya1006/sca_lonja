<?php

namespace App\Models\Constructoras;

use App\Models\Config\TipoDocumento;
use App\Models\Parametros\Regional;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Constructora extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'constructoras';
    protected $guarded = [];
    //==================================================================================
    //----------------------------------------------------------------------------------
    public function tipo_docu()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function regional()
    {
        return $this->belongsTo(Regional::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
    //==================================================================================
    //----------------------------------------------------------------------------------
    public function areas()
    {
        return $this->hasMany(ConstrucAreas::class, 'constructora_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
