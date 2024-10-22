<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home()
    {
        $newsItems = News::orderBy('updated_at', 'desc')->take(4)->get();
        $latestNewsIds = $newsItems->pluck('id')->toArray();

        $categoryStocksNewsItems = News::where('category_id', 1)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->get();

        $categoryEconomyOutlookNews = News::where('category_id', 2)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->take(11)
            ->get();

        $firstcategoryEconomyOutlookNews = $categoryEconomyOutlookNews->shift();
        $othercategoryEconomyOutlookNews = $categoryEconomyOutlookNews->take(10);

        $categoryResearchNewsItems = News::where('category_id', 3)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->get();

        $categoryIPONews = News::where('category_id', 4)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->take(11)
            ->get();

        $firstcategoryIPONews = $categoryIPONews->shift();
        $othercategoryIPONews = $categoryIPONews->take(10);


        $categoryCompanyNewsNewsItems = News::where('category_id', 5)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('front.pages.home', compact('newsItems', 'categoryStocksNewsItems', 'firstcategoryEconomyOutlookNews', 'othercategoryEconomyOutlookNews', 'categoryResearchNewsItems', 'firstcategoryIPONews', 'othercategoryIPONews', 'categoryCompanyNewsNewsItems'));
    }

    public function newsDetails($slug)
    {
        if ($slug) {
            $News = News::where('status', 1)->where('slug', $slug)->first();
            if ($News) {
                $latestNews = News::where('id', '!=', $News->id)->where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
                $categorys = Category::where('status', 1)->where('id', '!=', $News->category_id)->orderBy('id', 'DESC')->limit(7)->get();
                return view('front.news.details', ['News' => $News, 'latestNews' => $latestNews, 'categorys' => $categorys]);
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }
}
