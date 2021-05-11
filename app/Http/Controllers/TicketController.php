<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\ModelTicket;
use App\Models\User;

class TicketController extends Controller{

    private $objTicket;
    private $objUser;

    public function __construct(){
        $this->objTicket = new ModelTicket;
        $this->objUser   = new User;
    }

    public function index($id_user=NULL, $id_ticket=NULL){
        if(!empty($id_user) && !empty($id_ticket)){
            $vendedor = $this->objUser->get_nome_responsavel($id_user);
            return view('index',compact('ids'));
        }else{
            return view('index');
        }
    }

    public function store(TicketRequest $request){
        // Pega o ID do usuário com menos chamados:
        $id_user = $this->objUser->responsavel_atual();
     
        if(!empty($id_user)){
            $cad = $this->objTicket->create([
                'id_user'=>$id_user,
                'assunto'=>$request->assunto,
                'descricao'=>$request->descricao
            ]);
     
            if($cad){
                $id_ticket        = $cad->id; 
                $nome_responsavel = $this->objUser->get_nome_responsavel($id_user);

                $msg  = 'Ticket cadastrado com sucesso.<br/>Ticket N° '.$id_ticket;
                $msg .= '<br/>Venderdor Responsável: '.$nome_responsavel;     
                $cor  = 'success';    
            }else{
                $msg = 'ERRO AO CADASTRAR.';
                $cor = 'danger';
            }
        }else{
            $msg = 'Nenhum vendedor disponível para atender esse ticket... Tente mais tarde.';
            $cor = 'danger';
        }
        return redirect('/')->with(['msg'=>$msg, 'cor'=>$cor]);
    }
}
