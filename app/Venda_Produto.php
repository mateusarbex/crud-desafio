<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produto;
use App\Venda;

class Venda_Produto extends Model
{
    public function produto(){
        $this->hasMany('App\Produto');
    }
    public function venda(){
        $this->belongsTo('App\Venda');
}
    protected $fillable = [
        'venda','produto','qtd'
    ];
    protected $primaryKey = 'id_venda_produto';
}
