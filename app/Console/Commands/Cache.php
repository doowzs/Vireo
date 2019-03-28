<?php

namespace App\Console\Commands;

use App\Models\Document;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Console\Command;
use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use League\Flysystem\Plugin\ForcedCopy;
use League\Flysystem\Plugin\ListFiles;
use League\Flysystem\Plugin\ListPaths;
use Symfony\Component\Yaml\Yaml;

class Cache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vireo:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cache all blog/docs pages and assets.';

    /**
     * Markdown parser.
     *
     * @var \Parsedown
     */
    protected $parser;

    /**
     * File systems.
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
        $this->parser = new \Parsedown();
        $this->fs = new Filesystem(new Local(base_path()));
        $this->fs->addPlugin(new ListPaths());
        $this->fs->addPlugin(new ListFiles());
        $this->fs->addPlugin(new ForcedCopy());
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->cachePosts();
        $this->cacheDocuments();
    }

    protected function cachePosts()
    {
        Post::query()->truncate();
        $folders = $this->fs->listPaths('/resources/posts');
        foreach ($folders as $folder) {
            $post = $this->parseConfigAndContent($this->fs->read($folder . '/content.md'));

            $pattern = '/<p><img src="(.+\w+)" alt="(.*)"( \/)?><\/p>/';
            $replace = '<p class="text-center"><a href="/assets/posts/' . $post['slug'] . '/${1}" data-fancybox data-caption="${2}">'
                . '<img src="/assets/posts/' . $post['slug'] . '/${1}" class="img-fluid rounded" style="max-width:90%;">' . '</a></p>';
            $post['content'] = preg_replace($pattern, $replace, $post['content']);

            Post::query()->create([
                'title'        => $post['title'],
                'slug'         => $post['slug'],
                'category'     => $post['category'],
                'content'      => $post['content'],
                'published_at' => Carbon::parse($post['published_at']),
                'updated_at'   => Carbon::parse($post['updated_at']),
            ]);

            $files = $this->fs->listFiles($folder);
            foreach ($files as $file) {
                if ($file['basename'] != 'content.md') {
                    $this->fs->forceCopy($file['path'], '/public/assets/posts/' . $post['slug'] . '/' . $file['basename']);
                }
            }
            echo "[Post] " . $folder . "\n";
        }
    }

    protected function cacheDocuments()
    {
        Document::query()->truncate();
        $folders = $this->fs->listPaths('/resources/docs');
        foreach ($folders as $folder) {
            $document = $this->parseConfigAndContent($this->fs->read($folder . '/content.md'));

            $pattern = '/<p><img src="(.+\w+)" alt="(.*)"( \/)?><\/p>/';
            $replace = '<p class="text-center"><a href="/assets/docs/' . $document['slug'] . '/${1}" data-fancybox data-caption="${2}">'
                . '<img src="/assets/docs/' . $document['slug'] . '/${1}" class="img-fluid rounded" style="max-width:90%;">' . '</a></p>';
            $document['content'] = preg_replace($pattern, $replace, $document['content']);

            Document::query()->create([
                'title'        => $document['title'],
                'slug'         => $document['slug'],
                'category'     => $document['category'],
                'content'      => $document['content'],
                'published_at' => Carbon::parse($document['published_at']),
                'updated_at'   => Carbon::parse($document['updated_at']),
            ]);

            $files = $this->fs->listFiles($folder);
            foreach ($files as $file) {
                if ($file['basename'] != 'content.md') {
                    $this->fs->forceCopy($file['path'], '/public/assets/docs/' . $document['slug'] . '/' . $file['basename']);
                }
            }
            echo "[Docs] " . $folder . "\n";
        }
    }

    protected function parseConfigAndContent($file_raw)
    {
        $parts = explode('---', $file_raw);
        $item = Yaml::parse($parts[1]);
        $item['content'] = key_exists('do_not_parse', $item)
            ? $parts[2] : $this->parser->parse($parts[2]);
        return $item;
    }
}