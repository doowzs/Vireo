<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Carbon\Carbon;

class DocsController extends Controller
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
     * Index page of documents.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $documents = Document::query()
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('category', 'asc')
            ->orderBy('published_at', 'desc')
            ->get();
        $documents_grouped = [];
        foreach ($documents as $key => $document) {
            $documents_grouped[$document->category][$key] = $document;
        }
        return view('docs.index')
            ->with('documents_grouped', $documents_grouped);
    }

    /**
     * View a specific document.
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function view($slug)
    {
        $document = Document::query()
            ->where('slug', $slug)
            ->firstOrFail();
        return view('docs.view')
            ->with('document', $document);
    }
}
