<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelTicket extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable=['id_user', 'assunto', 'descricao'];

    public function quant_por_status(){
        $result = $this->select('status', DB::raw('count(id) AS quant'))->groupBy('status')->get();
        return($result);
    }
}
