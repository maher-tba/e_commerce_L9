<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id','=', auth()->user()->id)->with('user')->paginate(4);

        return view('user.categories.index',compact('categories'));
    }
}
