<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; // Como a migration adicionou a table como fornecedors, precisa renomea-la
    protected $fillable = ['nome', 'site', 'uf', 'email']; // Autorizando a inserção de dados via create no tinker

    public function produtos(){ // "Fornecedor tem 'muitos' produtos"
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id'); // 3° param é a fk de fornecedores, 2° param é a fk em produtos
    }
}
