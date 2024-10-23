<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->take(5)
            ->get();

        $categoryEconomyOutlookNews = News::where('category_id', 2)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->take(7)
            ->get();

        $firstcategoryEconomyOutlookNews = $categoryEconomyOutlookNews->shift();
        $othercategoryEconomyOutlookNews = $categoryEconomyOutlookNews->take(10);

        $categoryResearchNewsItems = News::where('category_id', 3)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $categoryIPONews = News::where('category_id', 4)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->take(7)
            ->get();

        $firstcategoryIPONews = $categoryIPONews->shift();
        $othercategoryIPONews = $categoryIPONews->take(10);


        $categoryCompanyNewsNewsItems = News::where('category_id', 5)
            ->whereNotIn('id', $latestNewsIds)
            ->orderBy('updated_at', 'desc')
            ->take(5)
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

                $newsCount = News::select(
                    DB::raw('MONTHNAME(updated_at) as month'),
                    DB::raw('YEAR(updated_at) as year'),
                    DB::raw('COUNT(*) as news_count')
                )
                    ->groupBy('month', 'year')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc')
                    ->get();

                return view('front.news.details', ['News' => $News, 'latestNews' => $latestNews, 'categorys' => $categorys, 'newsCount' => $newsCount]);
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }

    public function newsCatList($slug)
    {
        if ($slug) {
            $Category = Category::where('status', 1)->where('slug', $slug)->first();
            if ($Category) {
                $News = News::where('status', 1)->where('category_id', $Category->id)->orderBy('id', 'DESC')->paginate(10);

                $latestNews = News::where('category_id', '!=', $Category->id)->where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();

                $categorys = Category::where('status', 1)->where('id', '!=', $Category->id)->orderBy('id', 'DESC')->limit(7)->get();

                $newsCount = News::select(
                    DB::raw('MONTHNAME(updated_at) as month'),
                    DB::raw('YEAR(updated_at) as year'),
                    DB::raw('COUNT(*) as news_count')
                )
                    ->groupBy('month', 'year')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc')
                    ->get();
                return view('front.news.cat-list', ['News' => $News, 'latestNews' => $latestNews, 'categorys' => $categorys, 'Category' => $Category,'newsCount' => $newsCount]);
            } else {
                return redirect()->back()->with('error', 'Somthing Went Wrong..!');
            }
        } else {
            return redirect()->back()->with('error', 'News Not Found..!');
        }
    }

    public function newsSearch(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $News = News::where('title', 'like', "%$search%")->where('status', 1)->orderBy('id', 'DESC')
                ->paginate(6);
            if ($News) {

                $latestNewsIds = $News->pluck('id')->toArray();
                $latestNews = News::where('status', 1)->whereNotIn('id', $latestNewsIds)->orderBy('id', 'DESC')->limit(3)->get();
                $categorys = Category::where('status', 1)->orderBy('id', 'DESC')->limit(7)->get();

                $newsCount = News::select(
                    DB::raw('MONTHNAME(updated_at) as month'),
                    DB::raw('YEAR(updated_at) as year'),
                    DB::raw('COUNT(*) as news_count')
                )
                    ->groupBy('month', 'year')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc')
                    ->get();

                return view('front.news.search-list', ['search' => $search, 'News' => $News, 'latestNews' => $latestNews, 'categorys' => $categorys,'newsCount' => $newsCount]);
            } else {
                return redirect()->route('front.home');
            }
        } else {
            return redirect()->route('front.home');
        }
    }

    public function newsArchive(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');
        if ($month && $year) {
            $News = News::where('status', 1)->orderBy('id', 'DESC')
                ->whereYear('updated_at', $year)
                ->whereMonth('updated_at', Carbon::parse($month)->month)
                ->paginate(6);

            if ($News) {
                $latestNewsIds = $News->pluck('id')->toArray();
                $latestNews = News::where('status', 1)->whereNotIn('id', $latestNewsIds)->orderBy('id', 'DESC')->limit(3)->get();
                $categorys = Category::where('status', 1)->orderBy('id', 'DESC')->limit(7)->get();

                $newsCount = News::select(
                    DB::raw('MONTHNAME(updated_at) as month'),
                    DB::raw('YEAR(updated_at) as year'),
                    DB::raw('COUNT(*) as news_count')
                )
                    ->groupBy('month', 'year')
                    ->orderBy('year', 'desc')
                    ->orderBy('month', 'desc')
                    ->get();

                return view('front.news.archive-list', ['month' => $month, 'year' => $year, 'News' => $News, 'latestNews' => $latestNews, 'categorys' => $categorys,'newsCount' => $newsCount]);
            } else {
                return redirect()->route('front.home');
            }
        } else {
            return redirect()->route('front.home');
        }
    }
}
