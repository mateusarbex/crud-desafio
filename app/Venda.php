<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function produto(){
        return $this->hasMany('App\Produto');
    }
    protected $fillable = [
        'numero_venda','valor','vendendor_responsavel'
    ];

    public $timestamps = true;   
    //
}
