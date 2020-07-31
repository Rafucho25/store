@extends('layout')

@section('title') <title>Perfil - Store</title> @endsection

@section('body')
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
                            {!! Form::model($user, ['route' => ['user.update', collect($user)->first() ], 'method' => 'post' , 'enctype'=>'multipart/form-data']) !!}
                            <div class="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <center><img id="imgUser" src="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" width="200px" height="200px" alt="your image" /></center><br>
                                        <input type="file" name="photo" value="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" id="photo" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('first_name', 'Nombres:') !!}
                                        {!! Form::text('first_name', null, ['class' => 'au-input au-input--full',  "placeholder" => "Nombres"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('last_name', 'Apellidos:') !!}
                                        {!! Form::text('last_name', null, ['class' => 'au-input au-input--full',  "placeholder" => "Apellidos"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('address', 'Direccion:') !!}
                                        {!! Form::text('address', null, ['class' => 'au-input au-input--full',  "placeholder" => "Direccion"]) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('email', 'Correo Electronico:') !!}
                                        {!! Form::text('email', null, ['class' => 'au-input au-input--full', "disabled",  "placeholder" => "Correo Electronico"]) !!}
                                    </div>
                                    <!--TODO: Revisar el boton guardar cuando el input foto esta vacio -->
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Guardar Cambios</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Sentinel::inRole('seller'))
    <a href="{{route('user.seller.store.index')}}">Administrar mi tienda</a>
    @else
    <a href="{{route('user.activateSeller')}}">Conviertete en vendedor</a>
    @endif

@endsection

@section('footer')
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgUser').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readURL(this);
    });
    </script>
    
@endsection