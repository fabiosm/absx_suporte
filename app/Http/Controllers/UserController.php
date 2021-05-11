<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\ModelTicket;
use App\Models\ModelStatus_ticket;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    private $objTicket;
    private $objStatus;
    private $objUser;

    public function __construct(){
        $this->objUser   = new User;
        $this->objTicket = new ModelTicket;
        $this->objStatus = new ModelStatus_ticket;
    }

    public function index(){      
        $perfil  = $this->objUser->get_perfil(auth()->user()->id);        
        $status  = $this->objStatus;

        if($perfil<>2){
            $tickets = $this->objTicket->quant_por_status(auth()->user()->id);              
            return view('exibe_tickets', compact('tickets', 'status'));
        }else{
            $users = $this->objUser->listar();
            foreach($users AS $user){
                $tickets[$user->id] = $this->objTicket->quant_por_status($user->id);      
            }
            return view('admin_tickets', compact('users', 'tickets', 'status'));
        }
    }

    public function show($id){
        $status  = $this->objStatus->get_nome($id);
        $tickets = $this->objTicket->lista_por_status(auth()->user()->id, $id);   
        return view('lista_tickets', compact('status','tickets','id'));
    }

    public function muda_status($id_status, $id_ticket){
        $this->objTicket->muda_status($id_status, $id_ticket);
        return back();
    }

    public function usuarios(){
        $perfil  = $this->objUser->get_perfil(auth()->user()->id);      
        if($perfil<>2){ return redirect('/');}

        $users = $this->objUser->listar();
        return view('usuarios', compact('users'));
    }

    public function store(UserRequest $request){
        $perfil  = $this->objUser->get_perfil(auth()->user()->id); 
        if($perfil<>2){ return redirect('/');}


        if(isset($request->status)){ $status=1;}else{ $status=0;}
        if(isset($request->perfil)){ $perfil=2;}else{ $perfil=1;}

        $dados = array(
            'name'=>$request->name, 'email'=>$request->email, 
            'telefone'=>$request->telefone, 
            'perfil'=>$perfil, 'status'=>$status
        );

        // EDIÇÃO:
        if(!empty($request->id)){
            $this->objUser->editar($request->id,$dados);
            $msg = 'Usuário editado com sucesso.';
        // NOVO:
        }else{
            $dados['password'] = Hash::make('absx.123');
            $this->objUser->create($dados);
            $msg = 'Usuário cadastrado com sucesso. Senha padrão: absx.123';
        }
        return redirect('/usuarios')->with(['msg'=>$msg]);
    }
}
