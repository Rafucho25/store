<div class="form-group">
    <center><img id="imgProduct" src="{{isset($product->logo) ? $product->logo : asset('/images/products/template.png')}}" width="200px" height="200px" alt="your image" /></center><br>
    <input type="file" name="logo" id="logo" class="form-control">
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre del Producto:') !!}
    {!! Form::text('name', null, ['class' => 'au-input au-input--full',  "placeholder" => "Nombre del Producto"]) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::text('description', null, ['class' => 'au-input au-input--full',  "placeholder" => "Descripcion"]) !!}
</div>

<div class="form-group">
    {{ Form::label('category_id', 'Categoria')}}
    {{ Form::select('category_id', $categories, null, ['class' => 'au-input au-input--full',  "placeholder" => "Categoria"] )}}
</div>

<div class="form-group">
    {{ Form::label('price', 'Precio:')}}
    {{ Form::number('price', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01'])}}
</div>

<div class="form-group">
    {{ Form::label('shipping', 'Precio de Envio:')}}
    {{ Form::number('shipping', null, ['class' => 'au-input au-input--full',  "placeholder" => "Precio de Envio", 'min' => '0', 'step' => '0.01'])}}
</div>

<div class="form-group">
    {{ Form::label('quantity', 'Cantidad:')}}
    {{ Form::number('quantity', null, ['class' => 'au-input au-input--full',  "placeholder" => "Cantidad", 'min' => '0', 'step' => '0.01'])}}
</div>

<div class="form-group">
    {{ Form::label('condition', 'Condicion')}}
    {{ Form::select('condition', array('Nuevo' => 'Nuevo', 'Usado' => 'Usado', 'Refublished' => 'Refublished', 'Dañado' => 'Dañado'), null, ['class' => 'au-input au-input--full',  "placeholder" => "Condicion"] )}}
</div>

<!--TODO: Revisar el boton guardar cuando el input foto esta vacio -->
<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Guardar Cambios</button>