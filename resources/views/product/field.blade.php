<div class="form-group col-sm-8">
    {!! Form::label('logo', 'Imagen:') !!}
    {!! Form::file('logo', null, ['class' => 'form-control']) !!}
    <img id="imgProduct" src="{{isset($product->logo) ? $product->logo : asset('/images/products/template.png')}}" width="200px" height="200px" alt="your image" />
</div>

<div class="form-group col-sm-8">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-8">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-8">
    {{ Form::label('category_id', 'Categoria')}}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control'] )}}
</div>

<div class="form-group col-sm-8">
    {{ Form::label('price', 'Precio:')}}
    {{ Form::number('price', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01'])}}
</div>

<div class="form-group col-sm-8">
    {{ Form::label('shipping', 'Precio de Envio:')}}
    {{ Form::number('shipping', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01'])}}
</div>

<div class="form-group col-sm-8">
    {{ Form::label('quantity', 'Cantidad:')}}
    {{ Form::number('quantity', null, ['class' => 'form-control', 'min' => '0', 'step' => '0.01'])}}
</div>

<div class="form-group col-sm-8">
    {{ Form::label('condition', 'Condicion')}}
    {{ Form::select('condition', array('New' => 'Nuevo', 'Used' => 'Usado', 'Refublished' => 'Refublished', 'Spoiled' => 'Dañado'), null, ['class' => 'form-control'] )}}
</div>