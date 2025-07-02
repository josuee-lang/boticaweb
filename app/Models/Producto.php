<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $codigo
 * @property $nombre
 * @property $descripcion
 * @property $principio_activo
 * @property $pvp1
 * @property $precio_costo_unitario
 * @property $stock
 * @property $stock_min
 * @property $fecha_vencimiento
 * @property $imagen
 * @property $categoria_id
 * @property $laboratorio_id
 * @property $presentacion_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Laboratorio $laboratorio
 * @property Presentacion $presentacion
 * @property Almacen[] $almacens
 * @property DetalleCompra[] $detalleCompras
 * @property DetalleVenta[] $detalleVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['codigo', 'nombre', 'descripcion', 'principio_activo', 'pvp1', 'precio_costo_unitario', 'stock', 'stock_min', 'fecha_vencimiento', 'imagen', 'categoria_id', 'laboratorio_id', 'presentacion_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class, 'categoria_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratorio()
    {
        return $this->belongsTo(\App\Models\Laboratorio::class, 'laboratorio_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presentacion()
    {
        return $this->belongsTo(\App\Models\Presentacion::class, 'presentacion_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function almacens()
    {
        return $this->hasMany(\App\Models\Almacen::class, 'id', 'producto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleCompras()
    {
        return $this->hasMany(\App\Models\DetalleCompra::class, 'id', 'producto_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalleVentas()
    {
        return $this->hasMany(\App\Models\DetalleVenta::class, 'id', 'producto_id');
    }
}
