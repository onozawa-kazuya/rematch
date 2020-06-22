<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Userlist;
use App\Contactform;
use App\Http\Requests\ContactFormRequest;

class GuestController extends Controller
{
    
    public function userlist(Request $request) {
        
        $query = Userlist::query();
        
        //検索時に入力した項目を取得
        $search1 = $request->input('area');
        $search2 = $request->input('equipment');
        $search3 = $request->input('building');
        $search4 = $request->input('company');
        
        //指定なし以外を選択した場合、選択したエリアと一致するカラムを取得
        if($request->has('area') && $search1 != ('指定なし')) {
            $query->where('area', $search1)->get();
        }
            
        //指定なし以外を選択した場合、選択した設備と一致するカラムを取得
        if($request->has('equipment') && $search2 != ('指定なし')) {
            $query->where('equipment', $search2)->get();
        }
            
        //指定なし以外を選択した場合、選択した建物と一致するカラムを取得
        if($request->has('building') && $search3 != ('指定なし')) {
            $query->where('building', $search3)->get();
        }
            
        //入力した文字列含むカラムを取得
        if($request->has('company') && $search4 != ('指定なし')) {
            $query->where('company', 'like', '%'.$search4.'%')->get();
        }
            
        //5件ずつ表示
        $posts = $query->paginate(5);
        
        return view('guest.userlist', ['posts' => $posts]);
        
        
        }
        
    
    public function userlist_detail(Request $request,$id,Userlist $userlist) {
        
        $userlist = Userlist::find($id);
        
        return view('guest.userlist_detail', ['userlist' => $userlist]);
    }
    
    public function contactform() {
        
        $types = Contactform::$types;
        return view('guest.contactform', compact('types'));
    }
    
    
    public function confirm(ContactFormRequest $request) {
        $contactform = new Contactform($request->all());
        $type = '';
        if(isset($request->type)) {
            $type = implode(', ', $request->type);
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
