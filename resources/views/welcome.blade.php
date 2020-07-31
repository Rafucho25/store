@extends('layout')

@section('title')
  <title>Online Store </title>  
@endsection

@section('header')
  <style>
    .scrolling-wrapper{
    overflow-x: auto;
    padding-top: 30px;
    padding-bottom: 70px;	
  }

  
  .clicker {
    cursor: pointer;
  }
  </style>
@endsection

@section('body')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/images/banner/deals.png" width="1024px" height="400px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/images/banner/deals_clother.png" width="1024px" height="400px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/images/banner/deals_technology.png" width="1024px" height="400px" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<center> <h2>Productos por Categorias</h2> </center>
<center>
  <ul class="nav nav" id="categories">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-ms-2">
          <li class="nav-item">
            <a class="nav-link" id="{{$category->id}}tab" data-toggle="tab" href="#category{{$category->id}}" role="tab" aria-controls="category{{$category->id}}">
              <img src="{{$category->logo}}" alt="{{$category->description}}" width="70px" height="70px">
            </a>
          </li>
        </div>
        <br>
      @endforeach
    </div>
  </ul>
</center>
<div class="tab-content" id="categoriesContent">
  @foreach ($categories as $category)
    <div class="tab-pane fade {{$category->id == 1 ? 'show active' : ''}} " id="category{{$category->id}}" role="tabpanel" aria-labelledby="{{$category->id}}tab">
      <div class="container">
        <div class="row">
          <br>
            @foreach ($products as $product)
            @if ($product->category_id == $category->id)
            <div class="col-md-4">
              <div class="card">
                  <img class="card-img-top" src="{{$product->logo}}" width="250" height="200" alt="{{$product->name}}">
                  <div class="card-body">
                      <a href="product/{{$product->id}}"><h4 class="card-title mb-3">{{$product->name}}</h4></a>
                      <p class="condition">Condicion: {{$product->condition}}</p>
                      <strong>Precio: {{$product->price}} </strong>
                      <p class="card-text"> {{Str::substr($product->description, 0, 80)}}</p>
                      <div class="row-reverse">
                          <div class="col-ms-10">
                              <div class="float-right"><i class="far fa-heart text-danger" id="{{$product->id}}"></i></div>
                              <div role="alert" id="result{{$product->id}}"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            @endif
            @endforeach
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="container-fluid">
  <h2 class="mt-5">Productos Destacados</h2>
  <div class="scrolling-wrapper row flex-row flex-nowrap">
    @foreach ($newProducts as $new)
      <div class="col-5 clicker" onclick="location.href='/product/{{$new->id}}';">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{asset($new->logo)}}" width="60" height="58" class="d-block w-100">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"> {{$new->name}} </h5>
                <p class="card-text"> {{Str::substr($new->description,0,100)}} ... </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection

@section('footer')
@endsection