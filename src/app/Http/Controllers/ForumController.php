<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use App\Models\Heart;

class ForumController extends Controller
{
    public function index()
    {
        $categorys = Category::orderby('title','asc')->get();
        $posts = array();
        foreach ($categorys as $value) {
            $posts[$value->id] = Post::where('category_id',$value->id)->orderby('created_at','desc')->limit(3)->get();
            foreach ($posts[$value->id] as $key => $post) {
                $posts[$value->id][$key]['userName'] = User::find($post['user_id'])['name'];
                $where_query = array('post_id'=>$post['id']);
                $posts[$value->id][$key]['replyCnt'] = Reply::where($where_query)->count();
                $posts[$value->id][$key]['heartCnt'] = Heart::where($where_query)->count();
            }
        }
        $datas = array('categorys'=>$categorys , 'posts'=>$posts);
        return view('forum.index')->with('datas',$datas);
    }

    public function view($id)
    {
        $post = Post::find($id);
        $where_query = array('post_id'=>$id);
        $heartCnt = Heart::where($where_query)->count();
        $replies = Reply::where($where_query)->orderby('created_at','desc')->get();
        $heartFlag = array();
        if(isset(auth()->user()->id)){
            array_merge($where_query,array('user_id'=>auth()->user()->id));
            $heartFlag = Heart::where($where_query)->get();
        }
        foreach ($replies as $key => $value) {
            $replies[$key]['userName'] = User::find($value['user_id'])['name'];
        }
        $data = array('post'=> $post,'replies'=>$replies,'heartCnt'=>$heartCnt,'heartFlag'=>$heartFlag);
        return view('forum.view')->with('data',$data);
    }

    public function create()
    {
        $categorys = Category::orderby('title','asc')->get();
        return view('forum.create')->with('categorys',$categorys);
    }

    public function modify($id)
    {
        $post = Post::find($id);
        $categorys = Category::orderby('title','asc')->get();
        $data = array('post'=>$post,'categorys'=>$categorys);
        return view('forum.modify')->with('data',$data);
    }

    public function put(Request $request,$id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->save();

        return response()->json($request->all(), 200);
    }

    public function delete(Request $request,$id)
    {
        $post = Post::find($id);
        $post->delete();

        return response()->json($request->all(), 200);
    }

    public function createPosts(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->save();
        return response()->json($request->all(), 200);
    }

    public function Heart($postId)
    {
        $where_query = array('post_id'=>$postId,'user_id'=>auth()->user()->id);
        $heartObj = Heart::where($where_query);

        if($heartObj->count() > 0){
            // 좋아요 취소
            $heartObj->delete();
        }else{
            // 좋아요
            $heart = new Heart;
            $heart->post_id = $postId;
            $heart->user_id = auth()->user()->id;
            $heart->save();
        }
        $heartCnt = $heartObj->count();
        $heartFlag = $heartObj->get();
        return response()->json(array('heartCnt'=>$heartCnt,'heartFlag'=>$heartFlag), 200);
    }
}
