@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="single__product">
                        <img class="single__product-img" src="{{asset('storage/'. $product->afbeelding)}}" alt="">
                      <p><b>Titel:</b> {{$product->title}}</p>
                      <p><b>Descriptie: </b>{{$product->description}}</p>
                      <p><b>Prijs: </b>{{$product->price}}</p>
                      <p><b>Aantal: </b>{{$product->amount}}</p>
                      <a href="/product/verwijder/{{$product->id}}">Verwijder dit product</a> <br>
                      <a href="/product-aanpassen/{{$product->id}}">Pas dit product aan</a>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection