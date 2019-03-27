<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the index page of blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::query()
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(10);
        return view('blog.index')
            ->with('posts', $posts);
    }

    /**
     * View a specific post.
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function view($slug)
    {
        $post = Post::query()
            ->where('slug', $slug)
            ->firstOrFail();
        return view('blog.view')
            ->with('post', $post);
    }

    /**
     * Get Atom feed of blog.
     *
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function feed()
    {
        $feed = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n"
            . "<feed xmlns=\"http://www.w3.org/2005/Atom\">\n"
            . "  <title>" . env('APP_NAME') . "</title>\n"
            . "  <link href=\"" . route('home') . "\"></link>\n"
            . "  <link href=\"" . route('blog.feed') . "\" rel=\"self\"/>\n"
            . "  <id>" . route('home') . "</id>\n"
            . "  <author><name>" . env('APP_AUTHOR') . "</name></author>\n"
            . "  <updated>" . date("c") . "</updated>\n";

        $posts = Post::query()
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->get();
        foreach ($posts as $post) {
            $feed = $feed . $post->feedItem();
        }

        $feed = $feed . "</feed>";
        return response($feed)->withHeaders([
            'Content-Type' => 'text/xml'
        ]);
    }
}
