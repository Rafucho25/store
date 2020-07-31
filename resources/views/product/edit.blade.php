@extends('layout')

@section('title') <title>Editar Producto {{$product->name}} - Store</title> @endsection

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
                            {!! Form::model($product, ['route' => ['user.seller.product.update', collect($product)->first() ], 'method' => 'post' , 'enctype'=>'multipart/form-data']) !!}
                                  @csrf

                                  @include('product.field')

                                  <button type="button" class="au-btn au-btn--block au-btn--red" data-toggle="modal" data-target="#deleteModal">Eliminar</button>
                                  
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Esta seguro de eliminar el producto {{$product->name}}
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <a href="{{route('user.seller.product.delete', $product->id)}}"> <button type="button"  class="btn btn-danger">Eliminar</button></a>
        </div>
      </div>
    </div>
</div>

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