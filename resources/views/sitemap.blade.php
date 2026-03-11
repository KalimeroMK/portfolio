<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">
    
    <!-- Static Pages -->
    @foreach ($staticPages as $page)
    <url>
        <loc>{{ url($page['url']) }}</loc>
        <lastmod>{{ now()->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>{{ $page['changefreq'] }}</changefreq>
        <priority>{{ $page['priority'] }}</priority>
    </url>
    @endforeach
    
    <!-- Individual Articles -->
    @foreach ($articles as $article)
    <url>
        <loc>{{ url('/articles/' . $article->slug) }}</loc>
        <lastmod>{{ $article->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
        
        @if($article->getOgImage())
        <image:image>
            <image:loc>{{ asset($article->getOgImage()) }}</image:loc>
            <image:title>{{ $article->getMetaTitle() }}</image:title>
            <image:caption>{{ $article->getMetaDescription() }}</image:caption>
        </image:image>
        @endif
    </url>
    @endforeach
</urlset>
