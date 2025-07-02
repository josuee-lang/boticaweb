<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documentos';
    protected $primaryKey = 'id'; // ya no es 'id_tipo_doc'
    public $timestamps = true; // en tu migración sí usas timestamps

    protected $fillable = [
        'nombre_documento',
    ];

    // Relación con el modelo User
    public function usuarios()
    {
        return $this->hasMany(User::class, 'tipo_documento_id');
    }
}
