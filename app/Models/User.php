<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'telefone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [];

    public function responsavel_atual(){
        $result = $this->select('users.id', DB::raw('COUNT(tickets.id) AS quant'))
            ->leftJoin('tickets', 'tickets.id_user', '=', 'users.id')    
            ->where('users.status','=','1')->where('users.perfil','=','1')
            ->groupBy('users.id')->orderBy('quant')->limit(1)->get();   
        if(isset($result[0])){
            return($result[0]->id);
        }else{
            return(NULL);
        }           
    }

    public function get_nome_responsavel($id){
        $result = $this->select('name')->where('id',$id)->get();   
        if(isset($result[0])){
            return($result[0]->name);
        }else{
            return(NULL);
        }    
    }

    public function get_perfil($id){
        $result = $this->select('perfil')->where('id',$id)->get();   
        if(isset($result[0])){
            return($result[0]->perfil);
        }else{
            return(NULL);
        }    
    }

    public function listar(){
        $result = $this->select(DB::raw('id, name, email, telefone, perfil, status'))
                    ->orderBy('name')->get();
        return($result);
    }
}
