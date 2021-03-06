<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactform extends Model
{
    protected $fillable = [
        'userlist_id', 'name', 'phone', 'email', 'address', 'type', 'equipment', 'comment',
        ];
        
        static $types = [
            '相談したい', '点検して欲しい', 'お見積もりが欲しい', 'その他',
        ];
        
        public function contactdates() {
            return $this->hasMany('App\ContactDate');
        }
}
