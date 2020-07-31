@extends('layout')

@section('title') <title>Crear Producto - Store</title> @endsection

@section('body')
    <div class="container">
        <div class="row">
            {!! Form::open(['route' => 'user.seller.product.store', 'enctype'=>'multipart/form-data']) !!}
            {{ Form::token()}}
    
            @include('product.field')
    
            {{Form::submit('Click Me!')}}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('footer')
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgProduct').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#logo").change(function(){
        readURL(this);
    });
    </script>
@endsection