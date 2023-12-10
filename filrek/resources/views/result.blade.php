@extends('layouts.layout')
@section('content')

    <main id="contentResults">
        @foreach ($result['contents'] as $content)
            <div id="movieResult">
                <h1>{{ $content['title'] }}</h1>
                <div id="result">
                    <img src="{{ $content['poster_path'] }}" alt="{{ $content['title'] }}">
                    <div id="subResult">
                        <p>{{ $content['overview'] }}</p>
                        <!-- Tampilkan gambar, link trailer, dan sumber lainnya sesuai kebutuhan -->
                        <a href="{{ $content['youtube_trailer'] }}" target="_blank">Watch Trailer</a>
                        <!-- Tampilkan sumber pembelian atau tautan lainnya sesuai kebutuhan -->
                        @foreach ($content['sources'] as $source)
                            @if (isset($source['display_name']))
                                <a href="{{ $source['link'] }}" target="_blank">{{ $source['display_name'] }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </main>
