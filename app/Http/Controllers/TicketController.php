<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketResquest;
use App\Models\ModelTicket;
use App\Models\User;

class TicketController extends Controller{

    private $objTicket;
    private $objUser;

    public function __construct()
    {
        $this->objTicket = new ModelTicket;
        $this->objUser   = new User;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketResquest $request){
        // Pega o ID do usuário com menos chamados:
        $id_user = $this->objUser->responsavel_atual();
     
        $cad = $this->objTicket->create([
            'id_user'=>$id_user,
            'assunto'=>$request->assunto,
            'descricao'=>$request->descricao
        ]);
        if($cad){
            return redirect('/');
        }else{
            echo 'ERRO AO CADASTRAR.';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketResquest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
