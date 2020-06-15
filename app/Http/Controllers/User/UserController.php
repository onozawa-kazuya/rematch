<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Userlist;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function mypage() {
        return view('user.mypage');
    }
    
    public function profile() {
        
        return view('user.profile');
    }
    
    public function profilecreate(Request $request) {

        //バリデーション
        $this->validate($request, Userlist::$rules);
        
        $userlist = new Userlist;
        $form = $request->all();
        
        //画像があれば保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $userlist->image_path = basename($path);
        } else {
            $userlist->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        //データべースに保存
        $userlist->fill($form);
        $userlist->user_id = Auth::id();
        $userlist->save();
        
        return redirect('user/profile');
    }
    
}
