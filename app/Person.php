<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    
    protected $table = 'persons';
    // whitelist
    protected $fillable = ['name','email','phone','avatar','organization_id']; 
    // blacklist
    protected $guarded = ['id']; 
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function organization() {
        return $this->belongsTo('App\Organization');
    }
}
