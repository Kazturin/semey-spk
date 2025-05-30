<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageList;
use App\Models\Partner;
use App\Models\TextWidget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $news_page = Page::query()
            ->where('is_news_page', true)
            ->where('active', true)
            ->first();
            
        $news = PageList::query()
            ->where('active', true)
            ->where('page_id',$news_page->id)
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
        
        $partners = Cache::remember('partners', now()->addDays(1), function () {
            return Partner::query()->where('active', true)->get();
        });    
            
        $info = DB::table('text_widgets')->where('key','info')->where('active', true)->first();
        $banner = DB::table('text_widgets')->where('key','banner')->where('active', true)->first();
        
            

        //    dd($info);

        return view('site.index', [
            'mainNews' => $news->first(),
            'sideNews' => $news->slice(1, 4),
            'news_page' => $news_page,
            'info' => $info,
            'banner' => $banner,
            'partners' => $partners,
        ]);
    }

    public function test()
    {
        $news_page = Page::query()
            ->where('is_news_page', true)
            ->where('active', true)
            ->first();
            
        $news = PageList::query()
            ->where('active', true)
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();
            
        $info = DB::table('text_widgets')->where('key','info')->where('active', true)->first();
        $banner = DB::table('text_widgets')->where('key','banner')->where('active', true)->first();
            

        //    dd($info);

        return view('site.test', [
            'mainNews' => $news->first(),
            'sideNews' => $news->slice(1, 4),
            'news_page' => $news_page,
            'info' => $info,
            'banner' => $banner
        ]);
    }
}
