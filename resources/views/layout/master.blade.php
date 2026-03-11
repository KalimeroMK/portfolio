<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $seoTitle = isset($article) && $article ? $article->getMetaTitle() : 'Zoran Bogoevski | Senior Laravel Developer & PHP API';
        $seoDesc = isset($article) && $article ? $article->getMetaDescription() : 'Senior Laravel Developer with 15+ years of experience. Expert in SaaS architecture, AWS, and fintech payment gateway integrations (Casys, Halkbank).';
        $seoAuthor = isset($article) && $article ? ($article->author ?? 'Zoran Bogoevski') : 'Zoran Bogoevski';
        $seoKeywords = isset($article) && $article ? ($article->meta_keywords ?? 'Laravel, PHP, AWS, Software Architecture, Payment Gateways, Casys, Halkbank, SaaS, Fintech, Backend Development, API Development, System Architecture, Senior Software Engineer, Laravel Expert, Macedonian Developer') : 'Laravel, PHP, AWS, Software Architecture, Payment Gateways, Casys, Halkbank, SaaS, Fintech, Backend Development, API Development, System Architecture, Senior Software Engineer, Laravel Expert, Macedonian Developer';
        $seoIndexable = isset($article) && $article ? ($article->indexable ?? true) : true;
        $seoOgImage = isset($article) && $article && $article->getOgImage() ? asset('storage/' . $article->getOgImage()) : 'https://zbogoevski.github.io/images/social-share.png';
    @endphp

    <title>{{ $seoTitle }}</title>

    <!-- Meta Description -->
    <meta name="description" content="{{ $seoDesc }}">
    
    <!-- Author -->
    <meta name="author" content="{{ $seoAuthor }}">
    
    <!-- Keywords -->
    <meta name="keywords" content="{{ $seoKeywords }}">
    
    <!-- Robots -->
    <meta name="robots" content="{{ $seoIndexable ? 'index, follow' : 'noindex, nofollow' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="{{ isset($article) && $article ? 'article' : 'website' }}">
    <meta property="og:url" content="{{ isset($article) && $article ? route('article', $article->slug) : 'https://zorandev.info' }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDesc }}">
    <meta property="og:image" content="{{ $seoOgImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="Zoran Bogoevski - Laravel Expert">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ isset($article) && $article ? route('article', $article->slug) : 'https://zorandev.info' }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDesc }}">
    <meta name="twitter:image" content="{{ $seoOgImage }}">

    <!-- Canonical Tag -->
    <link rel="canonical" href="{{ !empty($article) ? route('article', $article->slug) : url()->current() }}">
    
    <!-- Language -->
    <meta http-equiv="content-language" content="en-US">
    
    <!-- Geo Tags (Optional - for Macedonian market) -->
    <meta name="geo.region" content="MK">
    <meta name="geo.placename" content="North Macedonia">

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
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-cf.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Person',
                    '@id' => 'https://zorandev.info/#person',
                    'name' => 'Zoran Bogoevski',
                    'jobTitle' => 'Senior Laravel Developer',
                    'url' => 'https://zorandev.info',
                    'image' => 'https://zbogoevski.github.io/images/social-share.png',
                    'description' => 'Senior Laravel Developer specializing in backend architecture and fintech integrations.',
                    'sameAs' => [
                        'https://github.com/kalimeromk',
                        'https://www.linkedin.com/in/zoran-bogoevski/',
                        'https://x.com/zaebalovek'
                    ],
                    'knowsAbout' => [
                        'Laravel',
                        'PHP',
                        'AWS',
                        'Software Architecture',
                        'Payment Gateways',
                        'Casys',
                        'Halkbank',
                        'SaaS',
                        'Fintech',
                        'Backend Development',
                        'API Development',
                        'System Architecture'
                    ]
                ],
                [
                    '@type' => 'Organization',
                    '@id' => 'https://zorandev.info/#organization',
                    'name' => 'Zoran Bogoevski',
                    'url' => 'https://zorandev.info',
                    'logo' => 'https://zbogoevski.github.io/images/social-share.png',
                    'sameAs' => [
                        'https://github.com/kalimeromk',
                        'https://www.linkedin.com/in/zoran-bogoevski/',
                        'https://x.com/zaebalovek'
                    ]
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => 'https://zorandev.info/#website',
                    'url' => 'https://zorandev.info',
                    'name' => 'Zoran Bogoevski - Senior Laravel Developer',
                    'publisher' => [
                        '@id' => 'https://zorandev.info/#organization'
                    ],
                    'inLanguage' => 'en-US'
                ]
            ]
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" defer></script>
@yield('scripts')
</body>
</html>
