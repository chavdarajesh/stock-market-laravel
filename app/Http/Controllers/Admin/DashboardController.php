<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Front\ContactMessage;
use App\Models\Project;

class DashboardController extends Controller
{
    //

    public function dashboard()
    {
        $data['Total_Project'] = Project::count();
        $data['Total_Category'] = Category::count();
        return view('admin.dashboard', ['data' => $data]);
    }



}
