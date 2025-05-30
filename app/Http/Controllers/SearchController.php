<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Page;
use App\Models\PageList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('query');

        $locale = App::getLocale();

        $titleField = "title_$locale";
        $contentField = "content_text_$locale";

        $pages = Page::query()->select(['id','slug', $titleField, $contentField])->whereRaw("MATCH($titleField, $contentField) AGAINST(? IN BOOLEAN MODE)", [$query])->get();

        $news = PageList::query()->select(['id','slug', $titleField, $contentField])->whereRaw("MATCH($titleField, $contentField) AGAINST(? IN BOOLEAN MODE)", [$query])->get();

        $results = $pages->merge($news);


        return view('search.index', ['results' => $results]);
    }
}
