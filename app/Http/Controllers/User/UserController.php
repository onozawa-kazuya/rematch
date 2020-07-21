<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Userlist;
use Illuminate\Support\Facades\Auth;
use App\Contactform;
use App\User;

class UserController extends Controller
{
    
    public function mypage(Request $request) {
        
        $user = Auth::user();
        $userlist_id = $user->userlist->id;
        $contacts = Contactform::where('userlist_id', $userlist_id)->paginate(5);
            
        return view('user.mypage', ['contacts' => $contacts]);
    }
    
    
    public function profile() {
        
        $userlist = Userlist::where('user_id', Auth::id())->first();
        if($userlist === null) {
          $userlist = new Userlist;  
        }
        
        return view('user.profile', ['userlist' => $userlist]);
    }
    
    
    public function profilecreate(Request $request) {

        //バリデーション
        $this->validate($request, Userlist::$rules);
        
        $userlist = Userlist::where('user_id', Auth::id())->first();
        if($userlist === null) {
          $userlist = new Userlist;  
        }
        $form = $request->all();
        
        //画像があれば保存
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $userlist->image_path = basename($path);
        } else {
            $userlist->image_path = null;
        }
        
        
        $equipment = [];
        
        if (isset($form['equipment1'])) {
            $equipment[] = 1;
        }
        if (isset($form['equipment2'])) {
            $equipment[] = 2;
        }
        if (isset($form['equipment3'])) {
            $equipment[] = 3;
        }
        if (isset($form['equipment4'])) {
            $equipment[] = 4;
        }
        if (isset($form['equipment5'])) {
            $equipment[] = 5;
        }
        if (isset($form['equipment6'])) {
            $equipment[] = 6;
        }
        if (isset($form['equipment7'])) {
            $equipment[] = 7;
        }
        if (isset($form['equipment8'])) {
            $equipment[] = 8;
        }
        
        $userlist->equipment = implode(',', $equipment);
        
        
        $area = [];
        
        if (isset($form['area'])) {
            $area[] = $form['area'];
        }
        if (isset($form['area2'])) {
            $area[] = $form['area2'];
        }
        if (isset($form['area3'])) {
            $area[] = $form['area3'];
        }
        
        $userlist->area = implode(',', $area);
        
        $building = [];
        
        if (isset($form['building'])) {
            $building[] = $form['building'];
        }
        if (isset($form['building2'])) {
            $building[] = $form['building2'];
        }
        if (isset($form['building3'])) {
            $building[] = $form['building3'];
        }
        
        $userlist->building = implode(',', $building);
        
        
        unset($form['_token']);
        unset($form['image']);
        unset($form['equipment1'], $form['equipment2'], $form['equipment3'], $form['equipment4'], $form['equipment5'], $form['equipment6'], $form['equipment7'], $form['equipment8']);
        unset($form['area'], $form['area2'], $form['area3']);
        unset($form['building'], $form['building2'], $form['building3']);
        
        
        //データべースに保存
        $userlist->fill($form);
        $userlist->user_id = Auth::id();
        $userlist->save();
        
        return redirect('user/profile');
    }
    
    
    public function contact_detail(Request $request, $id, Contactform $contactform) {
        
        $contactform = Contactform::find($id);
        
        return view('user.contact_detail', ['contactform' => $contactform]);
    }
    
    
    public function withdrawal(Request $request) {
        
        $user = User::where('id', Auth::id())->first();
        
        $user->delete();
        
        return redirect('/guest/front');
    }
    
    public function withdrawalConfirm(Request $request) {
        
        return view('user.withdrawal');
    }
}
