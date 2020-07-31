@extends('layout')

@section('title') <title>Crear Producto - Store</title> @endsection

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
                            <div class="login-form">
                                {!! Form::open(['route' => 'user.seller.product.store', 'enctype'=>'multipart/form-data']) !!}
                                    @csrf

                                    @include('product.field')
                                    
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
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