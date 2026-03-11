<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        
        $this->command->info("Found {$articles->count()} articles to process...");
        
        foreach ($articles as $article) {
            $this->command->info("Processing: {$article->title}");
            
            // Generate meta title if empty
            if (empty($article->meta_title)) {
                $article->meta_title = $this->generateMetaTitle($article);
            }
            
            // Generate meta description if empty
            if (empty($article->meta_description)) {
                $article->meta_description = $this->generateMetaDescription($article);
            }
            
            // Generate keywords if empty
            if (empty($article->meta_keywords)) {
                $article->meta_keywords = $this->generateKeywords($article);
            }
            
            // Set default indexable
            if ($article->indexable === null) {
                $article->indexable = true;
            }
            
            // Set OG image to main image if empty
            if (empty($article->og_image) && !empty($article->image)) {
                $article->og_image = $article->image;
            }
            
            $article->save();
            
            $this->command->info("  ✓ SEO fields updated");
        }
        
        $this->command->info("\n✅ All articles have been updated with SEO data!");
    }
    
    /**
     * Generate meta title from article title
     */
    private function generateMetaTitle(Article $article): string
    {
        $title = $article->title;
        
        // If title is too long, shorten it
        if (strlen($title) > 55) {
            $title = Str::limit($title, 55, '');
        }
        
        // Add brand if there's room
        $suffix = ' | Zoran Bogoevski';
        if (strlen($title . $suffix) <= 60) {
            return $title . $suffix;
        }
        
        return $title;
    }
    
    /**
     * Generate meta description from article content
     */
    private function generateMetaDescription(Article $article): string
    {
        // Strip HTML and get plain text
        $content = strip_tags($article->description);
        
        // Remove extra whitespace
        $content = preg_replace('/\s+/', ' ', $content);
        $content = trim($content);
        
        // Limit to 155-160 characters for optimal SEO
        return Str::limit($content, 155, '...');
    }
    
    /**
     * Generate keywords based on article content
     */
    private function generateKeywords(Article $article): string
    {
        $content = strtolower(strip_tags($article->title . ' ' . $article->description));
        
        // Common tech keywords to look for
        $techKeywords = [
            'laravel' => 'Laravel',
            'php' => 'PHP',
            'javascript' => 'JavaScript',
            'js' => 'JavaScript',
            'react' => 'React',
            'vue' => 'Vue.js',
            'angular' => 'Angular',
            'nodejs' => 'Node.js',
            'python' => 'Python',
            'django' => 'Django',
            'aws' => 'AWS',
            'docker' => 'Docker',
            'kubernetes' => 'Kubernetes',
            'api' => 'API',
            'rest' => 'REST API',
            'graphql' => 'GraphQL',
            'mysql' => 'MySQL',
            'postgresql' => 'PostgreSQL',
            'mongodb' => 'MongoDB',
            'redis' => 'Redis',
            'git' => 'Git',
            'ci/cd' => 'CI/CD',
            'devops' => 'DevOps',
            'testing' => 'Testing',
            'tdd' => 'TDD',
            'solid' => 'SOLID',
            'mvc' => 'MVC',
            'architecture' => 'Architecture',
            'performance' => 'Performance',
            'optimization' => 'Optimization',
            'security' => 'Security',
            'authentication' => 'Authentication',
            'authorization' => 'Authorization',
            'oauth' => 'OAuth',
            'jwt' => 'JWT',
            'webhook' => 'Webhook',
            'queue' => 'Queue',
            'job' => 'Background Jobs',
            'cache' => 'Caching',
            'database' => 'Database',
            'orm' => 'ORM',
            'eloquent' => 'Eloquent',
            'blade' => 'Blade',
            'livewire' => 'Livewire',
            'filament' => 'Filament',
            'tailwind' => 'Tailwind CSS',
            'bootstrap' => 'Bootstrap',
            'css' => 'CSS',
            'html' => 'HTML',
        ];
        
        $foundKeywords = [];
        
        foreach ($techKeywords as $key => $value) {
            if (str_contains($content, $key)) {
                $foundKeywords[] = $value;
            }
        }
        
        // Always add general keywords
        $defaultKeywords = ['Web Development', 'Programming', 'Tutorial'];
        $foundKeywords = array_merge($foundKeywords, $defaultKeywords);
        
        // Remove duplicates and limit to 10
        $foundKeywords = array_unique($foundKeywords);
        $foundKeywords = array_slice($foundKeywords, 0, 10);
        
        return implode(', ', $foundKeywords);
    }
}
