<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $users = User::with('categories')->get();
        return view('admin.categories.index',compact('users'));
    }

    public function store(Request $request)
    {
        // validate the given request
        $data = $this->validate($request, [
            'title' => 'required|max:255',
            'user_id'=> 'required',
        ]);
        $user = User::findOrFail($data['user_id']);
        // create a new incomplete task with the given title
        $user->categories()->create([
            'title' => $data['title'],
            'is_hidden' => false,
            'author' => Auth::user()->name,
        ]);
        session()->flash('status', 'Category is Created');

        return redirect('admin/categories');
    }
    public function destroy(Task $task)
    {
        //
    }

}
