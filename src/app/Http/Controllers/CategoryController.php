<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Reply;
use App\Models\Heart;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::orderby('title','asc')->get();
        return view('category.index')->with('categorys',$categorys);
    }

    public function view($id)
    {
        $category = Category::find($id);
        return view('category.view')->with('category',$category);
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->save();

        return redirect('/category');
    }

    public function put(Request $request,$id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();

        return redirect('/category');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category');
    }

    public function viewPosts($id)
    {
        $posts = Post::where('category_id',$id)->orderby('created_at','desc')->paginate(10);
        $category = Category::find($id);
        $datas = array('category'=>$category , 'posts'=>$posts);
        foreach ($posts as $key => $post) {
            $posts[$key]['userName'] = User::find($post['user_id'])['name'];
            $where_query = array('post_id'=>$post['id']);
            $posts[$key]['replyCnt'] = Reply::where($where_query)->count();
            $posts[$key]['heartCnt'] = Heart::where($where_query)->count();
        }
        return view('category.posts')->with('datas',$datas);
    }
}
