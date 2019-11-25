<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produto extends Model
{
    use Notifiable;
    protected $fillable = [
        'nome','preco'
    ];
    protected $primaryKey = 'id_produto';
    public $timestamps = true;   
}
