<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    //  apenas armazena as despesas do petshop
    protected $fillable = ['descricao', 'valor', 'data'];
}
