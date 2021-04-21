<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTicket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable=['assunto', 'descricao'];
}
