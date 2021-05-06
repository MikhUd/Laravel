<?php
namespace App\Http\Controllers;
use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }
    public function review(){

        $reviews = new ContactModel();


        $user = Auth::user();


        return view('review', ['reviews'=>$reviews->all()->reverse(), 'user'=> $user]);
    }
    public function review_check(Request $request){
        $valid = $request->validate([
            'email' => 'required|min:4|max:100', //Валидация формы обращаемся к названию инпутов из review.php
            'subject' => 'required|min:4|max:100',
            'message' => 'required|min:15|max:300'
            ]);

        $review = new ContactModel();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->message = $request->input('message');

        $review->save();

        return redirect()->route('review');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login');
    }
}

