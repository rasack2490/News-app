<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Application d'information avec laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            body {
                font-family: 'Roboto';
            }
        </style>
    </head>
    <body>
        <div id="appendDivNews">
            <nav class="navbar fixed-top navbar-light bg-faded" style="background: #e3f2fd">
                <a class="navbar-brand" href="#"> Les nouvelles dans le monde</a>
            </nav>

            {{ csrf_field() }}

            <section id="content" class="section-dropdown">
                <p class="select-header"> Selection de source: </p>
                <label clas="select">
                    <select name="news_sources" id="news_sources">
                    <option value="{{ @$source_id }} : {{ @$source_name }}">{{ $source_name }}</option>
                    @foreach($news_sources as $news_source)
                        <option value="{{ $news_source['id'] }} : {{ $news_source['name'] }}">{{ $news_source['name'] }}</option>
                    @endforeach
                    </select>
                </label>
            </section>
        <p>les nouvelles sources : {{ $source_name }}</p>
            <section class="news">
                @foreach($news as $selected_news)
                <article>
                <img src="{{ $selected_news['urlToImage'] }}" alt="">
                <div class="text">
                <h1>{{ $selected_news['title'] }}</h1>
                <p style="font-size: 14px"> {{ $selected_news['description'] }} <a href="{{$selected_news['url']}}" target="_blank"><small>lire plus...</small></a> </p>
                <div style="padding-top: 5px; font-size: 12px">Auteur: {{ $selected_news['author'] or "Unknown" }}</div>
                @if($selected_news['publishedAt'] != null)
                <div style="padding-top: 5px">Date de publication: {{ Carbon\Carbon::parse($selected_news['publishedAt'])->format('l jS \\of F Y') }}</div>
                @else
                <div style="padding-top: 5px">Date de publication: Unknown</div>
                @endif
                </div>
                </article>

                @endforeach
            </section>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</html>
