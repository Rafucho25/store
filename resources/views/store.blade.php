@extends('layout')

@section('body')
    <div class="conatiner">
        <div class="row">
            {{$store->id}}
            {{$store->name}}
            {{$store->description}}
            @foreach ($products as $product)
                
                {{$product->name}}
            @endforeach
        </div>
    </div>
@endsection