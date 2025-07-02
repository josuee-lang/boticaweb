<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="codigo" class="form-label">{{ __('Codigo') }}</label>
            <input type="text" name="codigo" class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo', $producto?->codigo) }}" id="codigo" placeholder="Codigo">
            {!! $errors->first('codigo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $producto?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="principio_activo" class="form-label">{{ __('Principio Activo') }}</label>
            <input type="text" name="principio_activo" class="form-control @error('principio_activo') is-invalid @enderror" value="{{ old('principio_activo', $producto?->principio_activo) }}" id="principio_activo" placeholder="Principio Activo">
            {!! $errors->first('principio_activo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="pvp1" class="form-label">{{ __('Pvp1') }}</label>
            <input type="text" name="pvp1" class="form-control @error('pvp1') is-invalid @enderror" value="{{ old('pvp1', $producto?->pvp1) }}" id="pvp1" placeholder="Pvp1">
            {!! $errors->first('pvp1', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_costo_unitario" class="form-label">{{ __('Precio Costo Unitario') }}</label>
            <input type="text" name="precio_costo_unitario" class="form-control @error('precio_costo_unitario') is-invalid @enderror" value="{{ old('precio_costo_unitario', $producto?->precio_costo_unitario) }}" id="precio_costo_unitario" placeholder="Precio Costo Unitario">
            {!! $errors->first('precio_costo_unitario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock" class="form-label">{{ __('Stock') }}</label>
            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $producto?->stock) }}" id="stock" placeholder="Stock">
            {!! $errors->first('stock', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="stock_min" class="form-label">{{ __('Stock Min') }}</label>
            <input type="text" name="stock_min" class="form-control @error('stock_min') is-invalid @enderror" value="{{ old('stock_min', $producto?->stock_min) }}" id="stock_min" placeholder="Stock Min">
            {!! $errors->first('stock_min', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @php
        $fechaVencimiento = old('fecha_vencimiento', $producto->fecha_vencimiento ?? '');
        if ($fechaVencimiento instanceof \Carbon\Carbon) {
        $fechaVencimiento = $fechaVencimiento->format('Y-m-d');
        }
        @endphp

        <div class="form-group mb-2 mb20">
            <label for="fecha_vencimiento" class="form-label">{{ __('Fecha de Vencimiento') }}</label>
            <input
                type="date"
                name="fecha_vencimiento"
                id="fecha_vencimiento"
                class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                value="{{ $fechaVencimiento }}"
                placeholder="Ejemplo: 2025-06-14">

            {!! $errors->first('fecha_vencimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        {{--esto esta para cambiar sigue con fallas--}}

        <div class="form-group mb-2 mb20">
            <label for="imagen" class="form-label">{{ __('Imagen') }}</label>
            <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" id="imagen" accept="image/*">
            {!! $errors->first('imagen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @if(isset($producto) && $producto->imagen)
        <div class="mt-2">
            <p>Imagen actual:</p>
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen actual" width="150">
        </div>
        @endif







        {{-- CATEGORÍA --}}
        <div class="form-group mb-2 mb20">
            <label for="categoria_nombre" class="form-label">Categoría</label>
            <input list="categorias" name="categoria_nombre" id="categoria_nombre"
                class="form-control @error('categoria_nombre') is-invalid @enderror"
                value="{{ old('categoria_nombre' ,  $producto->categoria->nombre ?? '') }}" placeholder="Escribe o selecciona una categoría">
            <datalist id="categorias">
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->nombre }}">
                    @endforeach
            </datalist>
            {!! $errors->first('categoria_nombre', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- LABORATORIO --}}
        <div class="form-group mb-2 mb20">
            <label for="laboratorio_nombre" class="form-label">Laboratorio</label>
            <input list="laboratorios" name="laboratorio_nombre" id="laboratorio_nombre"
                class="form-control @error('laboratorio_nombre') is-invalid @enderror"
                value="{{ old('laboratorio_nombre' , $producto->laboratorio->nombre_laboratorio ?? '') }}" placeholder="Escribe o selecciona un laboratorio">
            <datalist id="laboratorios">
                @foreach ($laboratorios as $lab)
                <option value="{{ $lab->nombre_laboratorio }}">
                    @endforeach
            </datalist>
            {!! $errors->first('laboratorio_nombre', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- PRESENTACIÓN --}}
        <div class="form-group mb-2 mb20">
            <label for="presentacion_tipo" class="form-label">Presentación</label>
            <input list="presentaciones" name="presentacion_tipo" id="presentacion_tipo"
                class="form-control @error('presentacion_tipo') is-invalid @enderror"
                value="{{ old('presentacion_tipo' , $producto->presentacion->tipo_presentacion ?? '') }}" placeholder="Escribe o selecciona una presentación">
            <datalist id="presentaciones">
                @foreach ($presentaciones as $pres)
                <option value="{{ $pres->tipo_presentacion }}">
                    @endforeach
            </datalist>
            {!! $errors->first('presentacion_tipo', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>




    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>