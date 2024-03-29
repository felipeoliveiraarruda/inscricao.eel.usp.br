<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TipoExperiencia extends Model
{
    use \Spatie\Permission\Traits\HasRoles;
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $primaryKey = 'codigoTipoExperiencia';
    protected $table      = 'tipo_experiencia';

    protected $fillable = [
        'tipoExperiencia',
        'codigoPessoaAlteracao'
    ];

    public function experiencias()
    {
        return $this->hasMany(\App\Models\Experiencia::class);
    }
}