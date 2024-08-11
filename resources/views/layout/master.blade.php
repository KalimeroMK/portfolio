<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <!-- Dynamic Page Title -->
    <title>
        @if(!empty($article) && !empty($article->title))
            {{ $article->title }} | CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer
        @else
            CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer
        @endif
    </title>

    <!-- Dynamic Meta Tags -->
    <meta name="description"
          content="@if(!empty($article) && !empty($article->description))
                       {{ $article->description }}
                   @else
                       Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.
                   @endif">

    <meta content="@if(!empty($article) && !empty($article->title))
                       {{ $article->title }}
                   @else
                       CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer
                   @endif"
          property="og:title">

    <meta content="@if(!empty($article) && !empty($article->description))
                       {{ $article->description }}
                   @else
                       Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.
                   @endif"
          property="og:description">

    <meta content="@if(!empty($article) && !empty($article->image))
                       {{ asset('images/articles/' . $article->image) }}
                   @else
                       https://zbogoevski.github.io/images/social-share.png
                   @endif"
          property="og:image">

    <meta content="@if(!empty($article))
                       {{ route('article', $article->id) }}
                   @else
                       https://zorandev.info
                   @endif"
          property="og:url">

    <meta content="article" name="og:type">

    <meta content="@if(!empty($article) && !empty($article->title))
                       {{ $article->title }}
                   @else
                       CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer
                   @endif"
          name="twitter:title">

    <meta content="@if(!empty($article) && !empty($article->description))
                       {{ $article->description }}
                   @else
                       Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.
                   @endif"
          name="twitter:description">

    <!-- Additional Meta Tags -->
    <link crossorigin="anonymous" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-cf.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <!-- Other links and styles -->
</head>
<body class="clearfix">
<!-- page loading -->
<div id="loading">
    <div class="load-circle"><span class="one"></span></div>
</div>
<!-- End -->
<main>
    @yield('content')
</main>
<!-- Footer -->
@include('layout.footer')
@yield('scripts')
<!-- button -->
<a href="#top_" id="myBtn" title="Go to top">
    <!-- SVG code -->
</a>
<!--  -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
