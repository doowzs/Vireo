<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'content',
        'published_at',
        'updated_at',
    ];

    public function feedItem()
    {
        return "  <entry>\n"
            . "    <title>" . $this->title . "</title>"
            . "    <link href='" . route('blog.view', ['slug' => $this->slug]) . "'></link>\n"
            . "    <id>" . route('blog.view', ['slug' => $this->slug]) . "</id>\n"
            . "    <published>" . Carbon::parse($this->published_at)->format('c') . "</published>\n"
            . "    <updated>" . Carbon::parse($this->published_at)->format('c') . "</updated>\n"
            . "    <summary type='html'>" . $this->title . $this->slug . "</summary>\n"
            . "    <content type='html'>\n<![CDATA[" . $this->content . "]]>\n    </content>\n"
            . "  </entry>\n";
    }
}