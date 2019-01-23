<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    // whitelist
    protected $fillable = ['name','phone','email','website','logo']; 
    // blacklist
    protected $guarded = ['id']; 
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function person() {
        return $this->hasMany('App\Person');
    }

}
