<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
    'nome', 'descricao', 'ano_fabricacao', 'modelo',
    'empresa', 'preco', 'raridade'
];
}
