<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ModelTicket;
use App\Models\ModelStatus_ticket;

class UserController extends Controller
{

    private $objTicket;
    private $objStatus;

    public function __construct()
    {
        $this->objTicket = new ModelTicket;
        $this->objStatus = new ModelStatus_ticket;
    }


    public function index()
    {      
        $tickets = $this->objTicket->quant_por_status(auth()->user()->id);  
        $status  = $this->objStatus;
        return view('exibe_tickets', compact('tickets', 'status'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $status  = $this->objStatus->get_nome($id);
        $tickets = $this->objTicket->lista_por_status(auth()->user()->id, $id);   
        return view('lista_tickets', compact('status','tickets'));
    }

    public function muda_status($id_status, $id_ticket){
        $this->objTicket->muda_status($id_status, $id_ticket);
        return back();
    }

    public function store(Request $request){
  
    }
}
