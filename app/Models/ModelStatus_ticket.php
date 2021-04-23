<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelStatus_ticket extends Model
{
    use HasFactory;

    protected $table = 'status_tickets';
    protected $fillable=['id', 'nome'];

    public function get_nome($id){
        $result = $this->select('nome')->where('id',$id)->get();   

        if(isset($result[0])){
            return($result[0]->nome);
        }else{
            return(NULL);
        }    
    }

    public function get_cor($id){
        $result = $this->select('cor')->where('id',$id)->get();   

        if(isset($result[0])){
            return($result[0]->cor);
        }else{
            return(NULL);
        }    
    }
}
