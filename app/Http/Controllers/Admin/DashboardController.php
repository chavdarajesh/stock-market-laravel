<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        $data['Total_News'] = News::count();
        $data['Total_Category'] = Category::count();
        return view('admin.dashboard', ['data' => $data]);
    }



}
