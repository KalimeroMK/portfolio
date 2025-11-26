<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ !empty($article->title) ? $article->title . ' | Zoran Bogoevski | Senior Software Engineer | Laravel Expert' : 'Zoran Bogoevski | Senior Software Engineer | Laravel Expert' }}
    </title>

    <!-- Dynamic Meta Tags -->
    <meta name="description" content="{{ !empty($article->description) ? Str::limit(strip_tags($article->description), 150) : 'Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.' }}">
    <meta property="og:title" content="{{ !empty($article->title) ? $article->title : 'CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer' }}">
    <meta property="og:description" content="{{ !empty($article->description) ? Str::limit(strip_tags($article->description), 150) : 'Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.' }}">
    <meta property="og:image" content="{{ !empty($article->image) ? asset('storage/' . $article->image) : 'https://zbogoevski.github.io/images/social-share.png' }}">
    <meta property="og:url" content="{{ !empty($article) ? route('article', $article->slug) : 'https://zorandev.info' }}">
    <meta name="og:type" content="article">
    <meta name="twitter:title" content="{{ !empty($article->title) ? $article->title : 'CV: Zoran Bogoevski | Senior Software Engineer | Laravel Developer' }}">
    <meta name="twitter:description" content="{{ !empty($article->description) ? Str::limit(strip_tags($article->description), 150) : 'Zoran Bogoevski, a Senior Software Engineer and Laravel Developer with 10+ years of professional experience. Get in touch to discuss your next project.' }}">

    <!-- Canonical Tag -->
    <link rel="canonical" href="{{ !empty($article) ? route('article', $article->slug) : url()->current() }}">

    <!-- Favicon for Various Platforms -->
    <!-- Standard Favicon -->
    <link rel="icon" href="{{ asset('images/IOS/Icon-32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('images/IOS/Icon-64.png') }}" sizes="64x64" type="image/png">

    <!-- Apple Touch Icon for iOS -->
    <link rel="apple-touch-icon" href="{{ asset('images/iOS/Icon-152.png') }}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{ asset('images/iOS/Icon-167.png') }}" sizes="167x167">
    <link rel="apple-touch-icon" href="{{ asset('images/iOS/Icon-180.png') }}" sizes="180x180">

    <!-- Android Icons -->
    <link rel="icon" href="{{ asset('images/Android/Icon-36.png') }}" sizes="36x36" type="image/png">
    <link rel="icon" href="{{ asset('images/Android/Icon-96.png') }}" sizes="96x96" type="image/png">
    <link rel="icon" href="{{ asset('images/Android/Icon-192.png') }}" sizes="192x192" type="image/png">

    <!-- Manifest for Progressive Web App (PWA) -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style-cf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Person",
          "name": "Zoran Bogoevski",
          "jobTitle": "Senior Software Engineer",
          "worksFor": {
            "@type": "Organization",
            "name": "Zoran Bogoevski"
          },
          "url": "https://zorandev.info",
          "image": "https://zbogoevski.github.io/images/social-share.png",
          "sameAs": [
            "https://www.linkedin.com/in/zoran-bogoevski/",
            "https://github.com/zbogoevski"
          ]
        }
    </script>
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

<!-- button -->
<a href="#top_" id="myBtn" title="Go to top">
    <!-- SVG code -->
</a>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>