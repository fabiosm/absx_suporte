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

    public function quant_por_status($id_user){
        $result = $this->select('status', DB::raw('count(id) AS quant'))
                ->groupBy('status')->where('id_user','=',$id_user)->get();
        return($result);
    }

    public function lista_por_status($id_user, $id_status){
        $result = $this->select(DB::raw('id, assunto, descricao, created_at, IF(DATE(created_at)<DATE(NOW()),1,0) AS atrasado'))
            ->where('status','=',$id_status)->where('id_user','=',$id_user)->get();
        return($result);
    }

    public function muda_status($id_status, $id_ticket){
        $edit = $this->where(['id'=>$id_ticket])->update(['status'=>$id_status]);
        return($edit);
    }
}
