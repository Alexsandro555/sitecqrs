@extends('layouts.root')

@section('content')
    <div class="content-wrapper articles article--desc text-xs-left">
        <v-content>
            <v-layout row wrap>
                <v-flex xs12 class="text-xs-left">
                    <p class="content__header text-md-left">
                        {{$article->title}}
                    </p>
                    <p >
                        {!! $article->content !!}
                    </p>
                </v-flex>
            </v-layout>
        </v-content>
    </div>
@stop
