@extends('layouts.root')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <!--<left-menu></left-menu>-->
            <v-layout row wrap>
                <v-flex xs11 offset-xs1 md9 offset-md3>
                    <v-layout row wrap>
                        <h1>{{$typeProduct->title}}</h1>
                    </v-layout>
                </v-flex>
            </v-layout>
        </div>
    </div>
    <div class="delivery-wrapper">
        <v-content>
            <v-layout row wrap>
                <v-flex xs12 class="text-xs-left">
                    @foreach($products as $product)
                        <div class="product text-xs-center">
                            <div class="special-product__header text-xs-center">
                                <a href="{{route('detail',
                                              [
                                                  'slug'=>$product->url_key,
                                                  'slug_type_product'=>$typeProduct->url_key,
                                                  'slug_producer_type_product' => ''
                                              ])}}">
                                    {{str_limit($product->title, $limit = 52, $end="...")}}
                                </a>
                            </div>
                            <div class="special-product__img">
                                <v-layout aligin-center row wrap>
                                    <a href="#" class="img-shadow full-width">
                                        @if($product->files->count()>0)
                                            @foreach($product->files as $fileRecord)
                                                @foreach($fileRecord->config as $files)
                                                    @foreach($files as $key => $file)
                                                        @if($key == 'medium')
                                                            <img src="/storage/{{$file['filename']}}"/>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                @break
                                            @endforeach
                                        @else
                                            <img src="/images/no-image.png" width="150px"/>
                                        @endif
                                    </a>
                                </v-layout>
                            </div>
                            <br>
                            <div class="special-product__desc text-xs-center">Сделан на заказ</div>
                            <v-layout col wrap>
                                <v-flex xs8 class="special-product__price text-xs-center">
                                    <span>{{$product->price}}</span> руб.
                                </v-flex>
                                <v-flex xs4 class="special-product__cart">
                                    <img src="/images/product-cart.png"/>
                                </v-flex>
                            </v-layout>
                        </div>
                    @endforeach
                </v-flex>
            </v-layout>
        </v-content>
    </div>
    @foreach($typeProduct->producer_type_products as $key => $lineProduct)
        @if($lineProduct->products->count()>0)
            @if($key%2)<div class="delivery-wrapper">@else<div class="content-wrapper">@endif
                <v-content>
                    <v-layout row wrap>
                        <v-flex xs12 class="text-xs-left">
                            @if($key%2)<p class="delivery__header text-md-left left-50">@else <p class="content__header text-md-left">@endif
                                    {{$lineProduct->name_line}}
                                </p>
                                @foreach($lineProduct->products as $product)
                                    <div class="product text-xs-center">
                                        <div class="special-product__header text-xs-center">
                                            <a href="{{route('detail',
                                                    [
                                                        'slug'=>$product->url_key,
                                                        'slug_type_product'=>$typeProduct->url_key,
                                                        'slug_producer_type_product' => $typeProduct->producer_type_products[0]->url_key
                                                    ])}}">
                                                {{str_limit($product->title, $limit = 52, $end="...")}}
                                            </a>
                                        </div>
                                        <div class="special-product__img">
                                            <v-layout aligin-center row wrap>
                                                <a href="#" class="img-shadow full-width">
                                                    @if($product->files->count()>0)
                                                        @foreach($product->files as $fileRecord)
                                                            @foreach($fileRecord->config as $files)
                                                                @foreach($files as $key => $file)
                                                                    @if($key == 'medium')
                                                                        <img src="/storage/{{$file['filename']}}"/>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                            @break
                                                        @endforeach
                                                    @else
                                                        <img src="/images/no-image.png" width="150px"/>
                                                    @endif
                                                </a>
                                            </v-layout>
                                        </div>
                                        <br>
                                        <div class="special-product__desc text-xs-center">Сделан на заказ</div>
                                        <v-layout col wrap>
                                            <v-flex xs8 class="special-product__price text-xs-center">
                                                <span>{{$product->price}}</span> руб.
                                            </v-flex>
                                            <v-flex xs4 class="special-product__cart">
                                                <img src="/images/product-cart.png"/>
                                            </v-flex>
                                        </v-layout>
                                    </div>
                                @endforeach
                        </v-flex>
                    </v-layout>
                </v-content>
            </div>
        @endif
    @endforeach
@endsection