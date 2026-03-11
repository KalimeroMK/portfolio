<?php
/**
 * Complete SEO Analysis for zorandev.info
 * Connects to Laravel DB + SEMrush API for comprehensive analysis
 */

require_once __DIR__ . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Kalimeromk\SemrushApi\Auth\ApiKeyAuthentication;
use Kalimeromk\SemrushApi\Client\SemrushClient;
use Dotenv\Dotenv;

// Load environment
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Initialize Laravel DB connection
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'port' => $_ENV['DB_PORT'] ?? '3306',
    'database' => $_ENV['DB_DATABASE'] ?? 'portfolio',
    'username' => $_ENV['DB_USERNAME'] ?? 'root',
    'password' => $_ENV['DB_PASSWORD'] ?? '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$apiKey = $_ENV['SEMRUSH_API_KEY'] ?? null;
$domain = 'zorandev.info';

echo "\n";
echo "╔══════════════════════════════════════════════════════════════════╗\n";
echo "║          🔍 КОМПЛЕТНА SEO АНАЛИЗА ЗА: zorandev.info              ║\n";
echo "╚══════════════════════════════════════════════════════════════════╝\n";
echo "\n";

// ============================================
// 1. АНАЛИЗА НА АРТИКЛИ (од Laravel база)
// ============================================
echo "📰 1. АНАЛИЗА НА АРТИКЛИ\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

$articles = Capsule::table('articles')
    ->leftJoin('article_tag', 'articles.id', '=', 'article_tag.article_id')
    ->leftJoin('tags', 'article_tag.tag_id', '=', 'tags.id')
    ->select('articles.*', Capsule::raw('GROUP_CONCAT(tags.name) as tag_names'))
    ->groupBy('articles.id')
    ->get();

echo "✅ Пронајдени {$articles->count()} артикли\n\n";

$articleAnalysis = [];
foreach ($articles as $article) {
    $issues = [];
    $recommendations = [];
    
    // Провери SEO полиња
    if (empty($article->meta_title)) {
        $issues[] = 'Нема meta_title';
        $recommendations[] = 'Додади meta_title (50-60 карактери)';
    } elseif (strlen($article->meta_title) > 60) {
        $issues[] = 'Meta_title е предолг (' . strlen($article->meta_title) . ' карактери)';
        $recommendations[] = 'Скрати го meta_title на под 60 карактери';
    }
    
    if (empty($article->meta_description)) {
        $issues[] = 'Нема meta_description';
        $recommendations[] = 'Додади meta_description (150-160 карактери)';
    } elseif (strlen($article->meta_description) > 160) {
        $issues[] = 'Meta_description е предолг';
        $recommendations[] = 'Скрати го meta_description на 150-160 карактери';
    }
    
    if (empty($article->meta_keywords)) {
        $issues[] = 'Нема meta_keywords';
        $recommendations[] = 'Додади релевантни keywords';
    }
    
    if (empty($article->og_image)) {
        $recommendations[] = 'Додади OG image за социјални мрежи';
    }
    
    // Провери содржина
    $contentLength = strlen(strip_tags($article->description));
    if ($contentLength < 300) {
        $issues[] = 'Содржината е прекратка (' . $contentLength . ' знаци)';
        $recommendations[] = 'Прошири ја содржината (минимум 500+ зборови за добар SEO)';
    }
    
    // Провери slug
    if (strlen($article->slug) > 60) {
        $issues[] = 'Slug е предолг';
        $recommendations[] = 'Скрати го slug-от (пократко = подобро)';
    }
    
    // Провери тагови
    $tagCount = $article->tag_names ? count(explode(',', $article->tag_names)) : 0;
    if ($tagCount === 0) {
        $recommendations[] = 'Додади тагови за подобра категоризација';
    }
    
    $status = $article->publish ? '✅' : '⚠️';
    $seoScore = 100 - (count($issues) * 15) - (count($recommendations) * 5);
    $seoScore = max(0, $seoScore);
    
    echo "{$status} {$article->title}\n";
    echo "   URL: /articles/{$article->slug}\n";
    echo "   Published: " . ($article->publish ? 'Да' : 'Не') . " | SEO Score: {$seoScore}/100\n";
    
    if (!empty($issues)) {
        echo "   ❌ Проблеми:\n";
        foreach ($issues as $issue) {
            echo "      • {$issue}\n";
        }
    }
    
    if (!empty($recommendations)) {
        echo "   💡 Препораки:\n";
        foreach ($recommendations as $rec) {
            echo "      • {$rec}\n";
        }
    }
    echo "\n";
    
    $articleAnalysis[] = [
        'id' => $article->id,
        'title' => $article->title,
        'slug' => $article->slug,
        'published' => $article->publish,
        'seo_score' => $seoScore,
        'issues' => $issues,
        'recommendations' => $recommendations,
    ];
}

// ============================================
// 2. ТЕХНИЧКА АНАЛИЗА
// ============================================
echo "\n🔧 2. ТЕХНИЧКА АНАЛИЗА\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

$techIssues = [];

// Провери robots.txt
$robotsUrl = "https://{$domain}/robots.txt";
$robotsExists = @file_get_contents($robotsUrl) !== false;
echo "robots.txt: " . ($robotsExists ? "✅ Постои" : "⚠️ Недостасува") . "\n";
if (!$robotsExists) {
    $techIssues[] = 'Креирај robots.txt за да ги водиш crawler-ите';
}

// Провери sitemap.xml
$sitemapUrl = "https://{$domain}/sitemap.xml";
$sitemapExists = @file_get_contents($sitemapUrl) !== false;
echo "sitemap.xml: " . ($sitemapExists ? "✅ Постои" : "⚠️ Недостасува") . "\n";
if (!$sitemapExists) {
    $techIssues[] = 'Креирај sitemap.xml за подобра индексација';
}

// Провери SSL
$sslValid = @openssl_x509_parse(openssl_x509_read(@file_get_contents("https://{$domain}"))) !== false;
echo "SSL сертификат: " . ($sslValid ? "✅ Валиден" : "❌ Проблем") . "\n";

// Провери брзина (базична)
echo "\n⏱️  Брзина на страниците:\n";
$urlsToTest = [
    "https://{$domain}/",
    "https://{$domain}/articles",
];

foreach ($urlsToTest as $url) {
    $start = microtime(true);
    @file_get_contents($url);
    $time = round((microtime(true) - $start) * 1000);
    $status = $time < 500 ? '✅' : ($time < 1000 ? '⚠️' : '❌');
    echo "   {$status} {$url}: {$time}ms\n";
    if ($time > 1000) {
        $techIssues[] = "Бавно време на одговор за {$url}";
    }
}

// Провери дали има gzip compression
if (!empty($techIssues)) {
    echo "\n💡 Технички препораки:\n";
    foreach ($techIssues as $issue) {
        echo "   • {$issue}\n";
    }
}

// ============================================
// 3. SEMrush АНАЛИЗА (ако има API key)
// ============================================
if (!empty($apiKey)) {
    echo "\n\n📊 3. SEMrush АНАЛИЗА\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    
    try {
        $auth = new ApiKeyAuthentication($apiKey);
        $client = new SemrushClient($auth);
        
        // Backlink анализа
        $response = $client->analytics()->backlinksOverview($domain);
        if ($response->count() > 0) {
            $data = $response->first();
            
            echo "🔗 Беклинк преглед:\n";
            echo "   • Authority Score: " . ($data['ascore'] ?? 'N/A') . "/100\n";
            echo "   • Вкупно беклинкови: " . number_format((int)($data['total'] ?? 0)) . "\n";
            echo "   • Референтни домени: " . number_format((int)($data['domains_num'] ?? 0)) . "\n";
            
            $ascore = (int)($data['ascore'] ?? 0);
            if ($ascore < 30) {
                echo "   ⚠️  Authority Score е низок - работи на линк билдинг\n";
            }
            
            $backlinks = (int)($data['total'] ?? 0);
            if ($backlinks < 500) {
                echo "   💡 Цел: Достигни 500+ квалитетни беклинкови\n";
            }
        }
        
        // Органски клучни зборови
        $response = $client->analytics()->domainOrganic($domain, 'mk', ['display_limit' => 10]);
        if ($response->count() > 0) {
            echo "\n🎯 Топ клучни зборови (Македонија):\n";
            foreach ($response->toArray() as $kw) {
                echo "   • {$kw['Ph']} - Позиција: {$kw['Po']}\n";
            }
        } else {
            echo "\n⚠️  Нема видливи органски клучни зборови во MK\n";
            echo "   💡 Фокусирај се на локален SEO за Македонија\n";
        }
        
    } catch (Exception $e) {
        echo "⚠️  SEMrush API грешка: " . $e->getMessage() . "\n";
    }
}

// ============================================
// 4. ПРИОРИТЕТНИ ПРЕПОРАКИ
// ============================================
echo "\n\n🚀 4. АКЦИОНЕН ПЛАН - ШТО ДА СЕ ПОДОБРИ ВЕДНАШ\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

$allRecommendations = [];

// Собери ги сите препораки
foreach ($articleAnalysis as $article) {
    foreach ($article['recommendations'] as $rec) {
        $allRecommendations[] = "[{$article['title']}] {$rec}";
    }
    foreach ($article['issues'] as $issue) {
        $allRecommendations[] = "[{$article['title']}] FIX: {$issue}";
    }
}

// Додади технички
foreach ($techIssues as $issue) {
    $allRecommendations[] = "[Техничко] {$issue}";
}

// Приоритети
$highPriority = [];
$mediumPriority = [];

foreach ($allRecommendations as $rec) {
    if (str_contains($rec, 'Нема meta') || 
        str_contains($rec, 'прекратка') || 
        str_contains($rec, 'robots.txt') || 
        str_contains($rec, 'sitemap.xml') ||
        str_contains($rec, 'published')) {
        $highPriority[] = $rec;
    } else {
        $mediumPriority[] = $rec;
    }
}

echo "\n🔴 ВИСОК ПРИОРИТЕТ:\n";
echo str_repeat("─", 70) . "\n";
if (empty($highPriority)) {
    echo "   ✅ Нема критични проблеми!\n";
} else {
    foreach (array_slice($highPriority, 0, 5) as $i => $rec) {
        echo "   " . ($i + 1) . ". {$rec}\n";
    }
}

echo "\n🟡 СРЕДЕН ПРИОРИТЕТ:\n";
echo str_repeat("─", 70) . "\n";
foreach (array_slice($mediumPriority, 0, 5) as $i => $rec) {
    echo "   " . ($i + 1) . ". {$rec}\n";
}

// ============================================
// 5. БРЗИ ПОБЕДИ (Quick Wins)
// ============================================
echo "\n\n⚡ 5. БРЗИ ПОБЕДИ (Quick Wins)\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "Овие промени ќе имаат најголем ефект со најмалку напор:\n\n";

echo "1. 📝 Пополни ги сите празни meta_title полиња\n";
echo "   → Оди во Filament admin, провери кои артикли немаат meta_title\n\n";

echo "2. 📄 Направи ги сите артикли Published\n";
echo "   → Само " . $articles->where('publish', true)->count() . " од {$articles->count()} се објавени\n\n";

echo "3. 🗺️  Креирај robots.txt и sitemap.xml\n";
echo "   → Laravel веќе има рута за sitemap, провери дали работи\n\n";

echo "4. 🔗 Започни линк билдинг кампања\n";
echo "   → Регистрирај го сајтот на локални директориуми\n";
echo "   → Контактирај блогови за гостувачки постови\n\n";

echo "5. 📱 Провери мобилна оптимизација\n";
echo "   → Тестирај на Google Mobile-Friendly Test\n\n";

// ============================================
// Зачувај резултати
// ============================================
$outputFile = __DIR__ . '/seo_analysis_' . date('Y-m-d_H-i') . '.json';
file_put_contents($outputFile, json_encode([
    'date' => date('Y-m-d H:i:s'),
    'domain' => $domain,
    'articles' => $articleAnalysis,
    'technical_issues' => $techIssues,
    'recommendations' => $allRecommendations,
], JSON_PRETTY_PRINT));

echo "\n";
echo "╔══════════════════════════════════════════════════════════════════╗\n";
echo "║  💾 Анализата е зачувана во: {$outputFile}  ║\n";
echo "╚══════════════════════════════════════════════════════════════════╝\n";
echo "\n";
