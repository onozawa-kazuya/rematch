<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'company' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'establishment' => 'required',
        'area' => 'required',
        'equipment' => 'required',
        'building' => 'required',
        'introduction' => 'required',
    );
}
