<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Dynamic SEO Meta Tags -->
    <title>{{ $seo['title'] ?? 'Zoran Bogoevski | Web Developer & PHP Expert' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Experienced PHP & Laravel developer from Macedonia' }}">
    <meta name="keywords" content="{{ $seo['keywords'] ?? 'web developer, php, laravel, macedonia' }}">
    <meta name="author" content="{{ $seo['author'] ?? 'Zoran Bogoevski' }}">
    <meta name="robots" content="{{ $seo['robots'] ?? 'index, follow' }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ $seo['og_type'] ?? 'website' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $seo['title'] ?? 'Zoran Bogoevski | Web Developer' }}">
    <meta property="og:description" content="{{ $seo['description'] ?? 'Experienced PHP & Laravel developer' }}">
    <meta property="og:site_name" content="{{ $seo['og_site_name'] ?? 'Zoran Dev' }}">
    @if(!empty($seo['og_image']))
    <meta property="og:image" content="{{ $seo['og_image'] }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    @endif
    @if(!empty($seo['article_published']))
    <meta property="article:published_time" content="{{ $seo['article_published'] }}">
    <meta property="article:modified_time" content="{{ $seo['article_modified'] }}">
    <meta property="article:author" content="{{ $seo['author'] }}">
    @endif
    @if(!empty($seo['article_tags']))
    <meta property="article:tag" content="{{ $seo['article_tags'] }}">
    @endif

    <!-- Twitter Card -->
    <meta name="twitter:card" content="{{ $seo['twitter_card'] ?? 'summary_large_image' }}">
    <meta name="twitter:site" content="{{ $seo['twitter_site'] ?? '@zorandev' }}">
    <meta name="twitter:title" content="{{ $seo['title'] ?? 'Zoran Bogoevski' }}">
    <meta name="twitter:description" content="{{ $seo['description'] ?? 'PHP & Laravel Developer' }}">
    @if(!empty($seo['og_image']))
    <meta name="twitter:image" content="{{ $seo['og_image'] }}">
    @endif

    <!-- Language & Geo -->
    <meta http-equiv="content-language" content="en">
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="Skopje">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/IOS/Icon-32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('images/IOS/Icon-64.png') }}" sizes="64x64" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/IOS/Icon-180.png') }}">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    
    <!-- Preconnect to external domains for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Structured Data (JSON-LD) -->
    @if(!empty($structuredData))
    <script type="application/ld+json">
    {!! json_encode($structuredData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
    </script>
    @endif

    @stack('styles')
</head>
<body>
    @yield('content')
    
    @stack('scripts')
</body>
</html>
