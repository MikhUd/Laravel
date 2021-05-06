<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use App\Models\PostsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Filters\PostFilter;


class PostController extends Controller
{



    //public function posts(){
        
    //    $posts = PostsModel::paginate(9);

   //     $user = Auth::user();

     //   return view('posts', compact(['posts', 'user']));
   // }



    public function post_add(Request $request){

        $validatedData = $request->validate([
            'file' => 'required|max:2048',
            'topic' => 'required|min:5',
            'text'=>'required|min:50'
        ]);
        $name = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->store('public/files');


        $post = new PostsModel();

        $post->username = Auth::user()->name;

        $post->topic = $request->input('topic');

        $post->text = $request->input('text');

        $post->image = '/storage/files/'.substr($path, 13);


        $post->save();
        
        return redirect()->route('posts');
        

    }

    public function post_filter(PostFilter $filter){
        $posts = PostsModel::filter($filter)->paginate(9);

        $user = Auth::user();

        return view('posts',compact(['posts', 'user']));
    }























    public function sendTelega(){
        echo('Хуй');
        $chat_id = "-494292070";
        $token = "1655001833:AAHu9mPHk6fnlXcRwZN1x5O2hDUj7xrRCPg";
        /////
        ///
        $bot_url = "https://api.telegram.org/bot{$token}/";
        $url = $bot_url . "sendPhoto?chat_id={$chat_id}";

        $post_fields = array('chat_id' => $chat_id,
            'photo' => new \CURLFile("C:\\Users\\Mikhail\\Desktop\\project\\test\\storage\\app\\public\\files\\".substr($path, 13))
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        dd(curl_exec($ch));



        $arr = array(
            'Добавлен новый пост: ' => '',
            'Заголовок поста: ' => $post->topic,
            'Автор поста: ' => $post->username
        );

        $txt = "";
        foreach ($arr as $key => $value) {
            $txt .= $key . $value . "%0A";
        }

        $send_to_telegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$txt}","r");

    }
    public function show(Request $request, $id){


        $post = PostsModel::find($id);



        return view('MainPost', ['comments'=>$post->comment(), 'post'=>$post::find($id)]);
    }

    public function comment_add(Request $request){

        $validatedData = $request->validate([
            'comment'=>'required|min:10'
        ]);


        $comment = new CommentModel();

        $comment->task_id = $request->input('id');

        $comment->body = $request->input('comment');

        $comment->author_name = Auth::user()->name;


//https://api.telegram.org/bot1655001833:AAHu9mPHk6fnlXcRwZN1x5O2hDUj7xrRCPg/getUpdates,
//


        $comment2 = $request->input('comment');

        $token = "1655001833:AAHu9mPHk6fnlXcRwZN1x5O2hDUj7xrRCPg";
        $chat_id = "-494292070";

        $arr = array(
            'Добавлен новый ответ на пост с айди: '=> $comment->task_id,
            'Текст ответа: ' => $comment2,
            'Автор ответа: ' => $comment->author_name
        );

        $txt = "";
        foreach ($arr as $key => $value) {
            $txt .=   $key . $value . "%0A";
        }

        $send_to_telegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&text={$txt}","r");

        $comment->save();
        if ($send_to_telegram) {

            return redirect()->route('show',['id'=>$request->id]);
        } else {

        }



        return redirect()->route('show',['id'=>$request->id]);
    }
    public function comment_delete(Request $request){

        $comment = CommentModel::find($request->id);

        $comment->delete();

        return redirect()->route('show',['id'=>$request->post_id]);
    }
}
