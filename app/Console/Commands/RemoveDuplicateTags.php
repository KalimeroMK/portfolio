<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RemoveDuplicateTags extends Command
{
    protected $signature = 'tags:removeduplicates';
    protected $description = 'Removes duplicate tags and updates pivot tables';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        // Begin Transaction
        DB::beginTransaction();
        try {
            // Get all tags, ordered by name
            $tags = Tag::orderBy('name')->get();
            $seen = [];

            foreach ($tags as $tag) {
                // Check if tag is a duplicate
                if (isset($seen[$tag->name])) {
                    // Update pivot table entries
                    DB::table('contribution_tag')
                        ->where('tag_id', $tag->id)
                        ->update(['tag_id' => $seen[$tag->name]]);

                    DB::table('experience_tag')
                        ->where('tag_id', $tag->id)
                        ->update(['tag_id' => $seen[$tag->name]]);

                    // Delete the duplicate tag
                    $tag->delete();
                    $this->info("Deleted duplicate tag: {$tag->name}");
                } else {
                    // Not a duplicate, remember this tag
                    $seen[$tag->name] = $tag->id;
                }
            }

            // Commit Transaction
            DB::commit();
            $this->info("All duplicate tags have been removed and references updated.");
        } catch (\Exception $e) {
            // Rollback Transaction on Error
            DB::rollback();
            $this->error("An error occurred: " . $e->getMessage());
        }
    }
}
