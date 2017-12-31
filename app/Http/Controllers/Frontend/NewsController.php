<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Get new detail
     *
     * @param int $id New id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        \DB::table('news')
            ->where('id', $id)
            ->increment('view_number', 1);
        $new = News::find($id);
        $newsPopulare = \DB::table('news')
                ->where('id', '<>', $id)
                ->where('status', News::ACCEPT)
                ->orderBy('view_number', 'desc')
                ->take(3)
                ->get();
        $listNews = \DB::table('news')
                ->where('id', '<>', $new->id)
                ->where('status', News::ACCEPT)
                ->paginate(20);
        return view('frontend.layout.partials.show', compact('new', 'listNews', 'newsPopulare'));
    }
}
