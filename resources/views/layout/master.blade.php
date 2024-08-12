<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Dynamic Page Title -->
    <title>
        {{ !empty($article->title) ? $article->title . ' | CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer' : 'CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer' }}
    </title>
    <!-- Dynamic Meta Tags -->
    <meta name="description" content="{{ !empty($article->description) ? Str::limit(strip_tags($article->description), 500) : 'Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.' }}">
    <meta property="og:title" content="{{ !empty($article->title) ? $article->title : 'CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer' }}">
    <meta property="og:description" content="{{ !empty($article->description) ? Str::limit(strip_tags($article->description), 500) : 'Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.' }}">
    <meta property="og:image" content="{{ !empty($article->image) ? asset('images/articles/' . $article->image) : 'https://zbogoevski.github.io/images/social-share.png' }}">
    <meta property="og:url" content="{{ !empty($article) ? route('article', $article->id) : 'https://zorandev.info' }}">
    <meta name="og:type" content="article">
    <meta name="twitter:title" content="{{ !empty($article->title) ? $article->title : 'CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer' }}">
    <meta name="twitter:description" content="{{ !empty($article->description) ? Str::limit(strip_tags($article->description), 500) : 'Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.' }}">
    <!-- Additional Meta Tags -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style-cf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
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