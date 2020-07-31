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
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Datos Generales</h3>
                                    </div>
                                    <hr>
                                    <div class="login-form">
                                        {!! Form::model($store, ['route' => ['user.seller.store.update', collect($store)->first() ], 'method' => 'post' , 'enctype'=>'multipart/form-data']) !!}
                                            @csrf
                                            <div class="form-group">
                                                <center><img id="imgstore" src="{{isset($store->logo) ? $store->logo : asset('/images/store/template.png')}}" width="200px" height="200px" alt="your image" /></center><br>
                                                <input type="file" name="photo" value="{{isset($store->logo) ? $store->logo : asset('/images/store/template.png')}}" id="photo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('name', 'Nombre de la Tienda:') !!}
                                                {!! Form::text('name', null, ['class' => 'au-input au-input--full',  "placeholder" => "Nombre de la Tienda"]) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('description', 'Descripcion:') !!}
                                                {!! Form::text('description', null, ['class' => 'au-input au-input--full',  "placeholder" => "Descripcion"]) !!}
                                            </div>
                                            <!--TODO: Revisar el boton guardar cuando el input foto esta vacio -->
                                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Guardar Cambios</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-products-tab">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Lista de Productos</h2>
                                    <a href="{{route('user.seller.product.create')}}" class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Crear nuevo Producto</a>
                                </div>
                            </div>
                        </div>
                        <hr>
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
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-ordenes-tab">
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>Orden No.</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Envio</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="tr-shadow">
                                <td>{{$order->id}}</td>
                                <td> {{$order->names}} </td>
                                <td>{{$order->date}}</td>
                                <td> {{$order->subtotal}} </td>
                                <td> {{$order->shipping}} </td>
                                <td> {{$order->amount}} </td>
                                <td>
                                    <div class="table-data-feature">
                                        <a href="{{route('user.orderdetail',$order->id)}}" class="au-btn au-btn-icon au-btn--blue">Ver Detalles</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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