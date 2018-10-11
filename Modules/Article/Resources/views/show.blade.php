@extends('layouts.root')

@section('content')
    <div class="content-wrapper articles">
        <v-content class="article--desc text-xs-left">
            <v-layout row wrap>
                <v-flex xs12 class="text-xs-center">
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
