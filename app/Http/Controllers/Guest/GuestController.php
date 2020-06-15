<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Userlist;
use App\Contactform;

class GuestController extends Controller
{
    
    public function userlist(Request $request) {
        
        $cond_title = $request->cond_title;
        //検索されたら取得
        if($cond_title != '') {
            $posts = Userlist::where('company', 'area', 'equipment', 'building', $cond_title)->get();
        //検索されなかったら全て取得
        }else {
            $posts = Userlist::all();
        }
        return view('guest.userlist', ['posts' => $posts, 'cond_title => $cond_title']);
    }
    
    
    public function userlist_detail(Request $request) {
        return view('guest.userlist_detail');
    }
    
    
    public function contactform() {
        
        $type = Contactform::$types;
        return view('guest.contactform', compact('types'));
    }
    
    
    public function confirm(ContactFormRequest $request) {
        $contactform = new Contactform($request->all());
        $type = '';
        if(isset($request->type)) {
            $type = implode(', ',$request->type);
        }
        
        return view('guest.confirm', compact('contactform', 'type'));
    }
    
    
    public function complete(ContactFormRequest $request) {
        $input = $request->except('action');
        if($request->action === '戻る') {
            return redirect()->action('GuestController@contactform')->withInput($input);
        }
        //チェックボックスを区切りのある文字列に
        if(isset($request->type)) {
            $request->merge(['type' => implode(', ', $request->type)]);
        }
        //データを保存
        Contactform::create($request->all());
        
        //二重送信を防ぐ
        $request->session()->regenerateToken();
        
        return view('guest.complete');
    }
    
}
