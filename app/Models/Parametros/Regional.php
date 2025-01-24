<?php

namespace App\Models\Parametros;

use App\Models\Constructoras\Constructora;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Regional extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'regionales';
    protected $guarded = [];
    //----------------------------------------------------------------------------------
    public function departamento()
    {
        return $this->hasOne(Departamento::class, 'id');
    }
    //----------------------------------------------------------------------------------
    //----------------------------------------------------------------------------------
    public function areas()
    {
        return $this->hasMany(Area::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function arquitectos()
    {
        return $this->hasMany(Arquitecto::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
    public function empresas()
    {
        return $this->hasMany(Constructora::class, 'regional_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
