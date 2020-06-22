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
        'equipment' => 'required_without_all:equipment1,equipment2,equipment3,equipment4,equipment5,equipment6,equipment7,equipment8',
        'building' => 'required',
        'introduction' => 'required',
    );
}
