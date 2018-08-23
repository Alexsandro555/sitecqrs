@extends('layouts.root')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            @include('main.menu')
            <v-flex xs11 offset-xs1 md9 offset-md3>
                <v-layout row wrap>
                    <leader-detail-image :url="'/files/product-image/{{$product->id}}'"></leader-detail-image>
                    <v-flex class="detail__title text-xs-left" xs7 md7>
                        <h1>{{$product->title}}</h1>
                        <p>
                            <span>Цена: </span><br>
                            <span class="detail__price">
                                <span class="detail__price--big">{{$product->price}}</span> ₽
                                {{$product->price_amount}}
                            </span><br>
                            @if($product->vendor)
                                <v-chip color="yellow">арт. {{$product->vendor}}</v-chip>
                            @endif
                        </p>
                    </v-flex>
                    <v-flex xs21>
                        <br>
                        <v-tabs class="detail-characteristics" color="green darken-4" dark slider-color="yellow">
                            <v-tab key="description">Опсание</v-tab>
                            <v-tab key="characteristics">Характеристики</v-tab>
                            <v-tab-item key="description">
                                <br>
                                <span style="color: white">
                                   {!! $product->description !!}
                                </span>
                            </v-tab-item>
                            <v-tab-item key="characteristics">
                                <br>
                                <div class="detail-characteristics__left-table">
                                    <table class="detail-characteristics__table">
                                        <tbody>
                                        <?php $counter=1; ?>
                                        @foreach($product->attributes as $attribute)
                                            @if($attribute->pivot->value)
                                                <tr>
                                                    <td>{{$attribute->title}}</td>
                                                    <td  class="tbl-left">{{$attribute->pivot->value}}</td>
                                                </tr>
                                                <?php
                                                $counter++;
                                                if($counter>9)
                                                {
                                                  echo "</tbody></table></div><div class='detail-characteristics__right-table'><table class='detail-characteristics__table'><tbody>";
                                                  $counter=1;
                                                }
                                                ?>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </v-tab-item>
                        </v-tabs>
                    </v-flex>
                </v-layout>
            </v-flex>
        </div>
    </div>
@endsection