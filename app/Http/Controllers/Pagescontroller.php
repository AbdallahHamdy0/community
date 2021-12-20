<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Routing\Response;

use App\Post;
use App\User;
use App\Role;
use App\Like;


use DB;

class Pagescontroller extends Controller
{
    public function index(){
        $posts=Post::all();
    return view('content.posts',compact('posts'));
    }


    //view One Post 
    public function vpost(Post $post){

        $stop_comment=DB::table('settings')->where('name','stop_comment ')->value('value');

        //$post=DB::table('posts')->find($id);
         return view('content.post',compact('post','stop_comment'));
    }


    public function store(Request $request){
        // frist method to store1)
        // Post::create(request()->all());

        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required',
            'url'=>'image|mimes:jpg,jpeg,png,gif|max:2048 ',
        ]);
        
        
        $img_name=time(). '.' . $request->url-> getClientOriginalExtension();
       

        
         //( second method to store1)
         $post =new Post;
         $post->title=request('title');
         $post->body=request('body');
         $post->url=$img_name;
 
         $post->save();

        $request->url->move(public_path('upload'), $img_name);

       
        
        //( third method to store1)
        // Post::create([
        //     'title'=>request('title'),
        //     'body'=>request('body'),
        //     'url'=>request('url'),
        // ]);

        return redirect('/');

    }


    public function category($name){
        // $posts=Post::all();

        $cat = DB::table('categories')->where('name' , $name)->value('id');

        $posts =DB::table('posts')->where('category_id',$cat)->get();

        return view('content.category',compact('posts'));
    }

    public function admin(){
        // $posts=Post::all();
        $users=User::all();
        $stop_comment=DB::table('settings')->where('name','stop_comment ')->value('value');
        $stop_register=DB::table('settings')->where('name','stop_register ')->value('value');

        return view('content.admin',compact('users','stop_comment','stop_register'));
    }
    public function settings(Request $request)
    {
        // dd($request->stop_comment);
        
        //Stop Comment
        if ($request->stop_comment ) 
        {

            DB::table('settings')
            ->where ('name','stop_comment') 
            ->update(['value'=> 1]);   
        }
        else {

            DB::table('settings')
            ->where ('name','stop_comment') 
            ->update(['value'=> 0]);   
        }

        // Stop Register 
        if ($request->stop_register ) 
        {

            DB::table('settings')
            ->where ('name','stop_register') 
            ->update(['value'=> 1]);   
        }
        else {

            DB::table('settings')
            ->where ('name','stop_register') 
            ->update(['value'=> 0]);   
        }
        return redirect()->back();

    }


    public function add_role(Request $request)
    {
        $user=User::where('email',$request['email'])->first();
        $user->roles()->detach();

        if ($request['role_user']) {

            $user->roles()->attach(Role::where('name','user')->first());
        }if($request['role_editor']) {

            $user->roles()->attach(Role::where('name','editor')->first());
        }if ($request['role_admin']){
            $user->roles()->attach(Role::where('name','Admin')->first());

        }
        return redirect()->back();
    }
    public function editor(){
        // $posts=Post::all();
        return view('content.editor');
    }

    public function deniy()
    {
        return view('content.deniy');
    }

    public function like(Request $request)
    {   
        $Like_s=$request->Like_s;
        $post_id=$request->post_id;
        $change_like=0;
        $like=DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
        
        if (!$like) {

            $new_like=new Like;
            $new_like->post_id=$post_id;
            $new_like->user_id=Auth::user()->id;
            $new_like->like=1;
            $new_like->save();

            $is_like=1;


        }elseif($like->like == 1){
            DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)
                ->delete();

                $is_like=0;

        }elseif($like->like == 0){
            DB::table('likes')
            ->where('post_id',$post_id)
            ->where('user_id',Auth::user()->id)
            ->update(['like'=>1]);

            $is_like=1;
            $change_like=1;
             
        }
        $response=array('is_like' => $is_like,'change_like'=>$change_like);
        return response()->json($response,200);
    }

    public function dislike(Request $request)
    {   
        $Like_s=$request->Like_s;
        $post_id=$request->post_id;
        $change_dislike=0;
        $dislike=DB::table('likes')->where('post_id',$post_id)->where('user_id',Auth::user()->id)->first();
        
        if (!$dislike) {

            $new_like=new Like;
            $new_like->post_id=$post_id;
            $new_like->user_id=Auth::user()->id;
            $new_like->like=0;
            $new_like->save();

            $is_dislike=1;


        }elseif($dislike->like == 0){
            DB::table('likes')
                ->where('post_id',$post_id)
                ->where('user_id',Auth::user()->id)
                ->delete();

                $is_dislike=0;

        }elseif($dislike->like == 1){
            DB::table('likes')
            ->where('post_id',$post_id)
            ->where('user_id',Auth::user()->id)
            ->update(['like'=>0]);

            $is_dislike=1;
            $change_dislike=1;
             
        }
        $response=array('is_dislike' => $is_dislike,'change_dislike'=>$change_dislike);
        return response()->json($response,200);
    }

    public function Statistics()
    {
        $users=DB::table('users')->count();
        $posts=DB::table('posts')->count();
        $comments=DB::table('comments')->count();

        // $most_comments=User::withCount('comments')
        // ->orderBy('comment_count','desc')
        // ->first();
        // $active_user=;
        // $most_likes=User::withCount('likes')
        // ->orderBy('like_count','desc')
        // ->first();
        // // $active_user=;
        // dd($most_likes->like_count);
        
        return view('Statistics',compact('users','posts','comments'));
    }
}
