@extends('layout')

@section('body')
    {!! Form::model($user, ['route' => ['user.update', collect($user)->first() ], 'method' => 'post' , 'enctype'=>'multipart/form-data']) !!}

        <div class="form-group col-sm-4">
            {!! Form::label('id', 'id:') !!}
            {!! Form::text('id', null, ['class' => 'form-control', 'disabled']) !!}
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('photo', 'Imagen:') !!}
            {!! Form::file('photo', null, ['class' => 'form-control']) !!}
            <img id="imgUser" src="{{isset($user->photo) ? $user->photo : asset('/images/users/template.png')}}" width="200px" height="200px" alt="your image" />
        </div>

        <div class="form-group col-sm-4">
            {!! Form::label('first_name', 'Primer Nombre:') !!}
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        </div>

    {{Form::submit('Click Me!')}}
        
    {!! Form::close() !!}

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