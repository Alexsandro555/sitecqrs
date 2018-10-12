@extends('layouts.root')

@section('content')
    <div class="content-wrapper articles">
        <v-content>
            <v-layout row wrap>
                <v-flex xs12 class="text-xs-center">
                    @foreach($articles as $article)
                        <v-card class="article--card">
                            <v-card-title class="text-xs-center">
                                <span class="article--title">
                                    <a href="/article/{{$article->url_key}}">{{$article->title}}</a>
                                </span>
                            </v-card-title>
                            <v-content class="text-xs-left">
                                <p class="article--content">
                                    {{str_limit(strip_tags($article->content), $limit = 102, $end="...")}}
                                </p>
                            </v-content>
                            <v-card-actions>
                                <a class="article--button" href="/article/{{$article->url_key}}">Подробнее</a>
                            </v-card-actions>
                        </v-card>
                        <p>
                            <br>
                        </p>
                    @endforeach
                </v-flex>
            </v-layout>
        </v-content>
    </div>
@stop
