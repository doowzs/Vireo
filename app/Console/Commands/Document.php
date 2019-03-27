<?php

namespace App\Console\Commands;


use Carbon\Carbon;
use Illuminate\Console\Command;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class Document extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vireo:document';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new document.';

    /**
     * File System to use for documents.
     *
     * @var Filesystem
     */
    protected $fs;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->fs = new Filesystem(new Local(resource_path('/docs')));
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->ask('Title (Displays on the page)');
        $slug  = $this->ask('Slug (Used in the route to view the document)');
        $category = $this->ask('Category (One-word category for the document)');

        $folder = $category . date('-Y-m-d-') . $slug;
        $folder = strtolower($folder);
        $this->fs->createDir($folder);
        $content = "---\n"
            . "title: " . $title . "\n"
            . "slug: " . $slug . "\n"
            . "category: " . $category . "\n"
            . "published_at: " . Carbon::now()->format('Y-m-d H:i:s') . "\n"
            . "updated_at: " . Carbon::now()->format('Y-m-d H:i:s') . "\n"
            . "---\n\nStart writing here!";
        $this->fs->put($folder . '/content.md', $content);
        echo "Generated document " . $folder . ".\n";
    }
}