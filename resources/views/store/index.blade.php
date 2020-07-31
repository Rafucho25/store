@extends('layout')

@section('title') <title>Dashboard</title>  @endsection

@section('body')

<div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Datos Generales</a>
        <a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Productos</a>
        <a class="nav-link" id="v-pills-ordenes-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Ordenes</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Chats</a>
      </div>
    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            {!! Form::model($store, ['route' => ['user.seller.store.update', collect($store)->first() ], 'method' => 'post' , 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group col-sm-6">
                    {!! Form::label('id', 'id:') !!}
                    {!! Form::text('id', null, ['class' => 'form-control', 'disabled']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('photo', 'Imagen:') !!}
                    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
                    <img id="imgstore" src="{{isset($store->logo) ? $store->logo : asset('/images/store/template.png')}}" width="200px" height="200px" alt="your image" />
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('name', 'Primer Nombre:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('description', 'Descripcion:') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                </div>
                {{Form::submit('Click Me!')}}
            {!! Form::close() !!}
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-products-tab">
            <div class="col-md-3 offset-md-3"><a href="{{route('user.seller.product.create')}}">Crear un nuevo producto</a></div>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{$product->logo}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <p class="card-text">{{Str::substr($product->description,0,20)}}</p>
                            <a href=" {{route('user.seller.product.edit', $product->id)}} " class="btn btn-primary">Modificar</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-ordenes-tab">
            <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Envio</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estatus</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row"> {{$order->id}} </th>
                            <td> {{$order->names}} </td>
                            <td> {{$order->date}} </td>
                            <td> {{$order->subtotal}} </td>
                            <td> {{$order->shipping}} </td>
                            <td> {{$order->amount}} </td>
                            <td> {{$order->status}} </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
      </div>
    </div>
</div>

@endsection

@section('footer')
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgstore').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readURL(this);
    });
    </script>
@endsection