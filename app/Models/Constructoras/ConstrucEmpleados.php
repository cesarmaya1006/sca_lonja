<?php

namespace App\Models\Constructoras;

use App\Models\Config\TipoDocumento;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ConstrucEmpleados extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'construc_empleados';
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
    public function cargo()
    {
        return $this->belongsTo(ConstrucCargos::class, 'cargo_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
