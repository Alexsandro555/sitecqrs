@extends('layouts.root')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            @include('main.menu')
            <v-flex xs11 offset-xs1 md9 offset-md3>
                <v-layout row wrap>
                    <leader-detail-image :url="'/files/product-image/{{$product->id}}'"></leader-detail-image>
                    <v-flex class="detail__title" xs12 md8>
                        <h1>{{$product->title}}</h1>
                        <span class="detail__price">{{$product->price}} ₽  {{$product->price_amount}}</span>
                    </v-flex>
                </v-layout>
            </v-flex>
        </div>
    </div>
@endsection