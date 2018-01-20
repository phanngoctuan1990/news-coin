<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Get new detail
     *
     * @param string $slug News slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        \DB::table('news')
            ->where('slug', $slug)
            ->increment('view_number', 1);
        $new = News::findBySlugOrFail($slug);
        $newsPopulare = \DB::table('news')
                ->where('slug', '<>', $slug)
                ->where('status', News::ACCEPT)
                ->orderBy('view_number', 'desc')
                ->take(3)
                ->get();
        $listNews = \DB::table('news')
                ->where('slug', '<>', $new->slug)
                ->where('status', News::ACCEPT)
                ->paginate(20);
        return view('frontend.layout.partials.show', compact('new', 'listNews', 'newsPopulare'));
    }
}
