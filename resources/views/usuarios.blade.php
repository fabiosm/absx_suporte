@extends('template/template')

@section('content')
    <script>  
        window.onload = function(){	  
            // Modal - so exibe quando tiver dado do Chamado selecionado:
            $("#modal-user").on('show.bs.modal',function(event){
                var button   = $(event.relatedTarget); // Botão que Abre o Modal
                var id 	     = button.data('id'); // ID do Chamado
                var name     = button.data('name'); 
                var email    = button.data('email'); 
                var telefone = button.data('telefone'); 
                var perfil   = button.data('perfil'); 
                var status   = button.data('status'); 
                
                if(id){
                    $("#modal-title").html('Editar usuário');
                    $("#id").val(id);
                    $("#name").val(name);
                    $("#email").val(email);
                    $("#telefone").val(telefone);

                    if(perfil==1){
                        $("#perfil").attr("checked",false);
                    }else{
                        $("#perfil").attr("checked",true);                   
                    }

                    if(status==1){
                        $("#status").attr("checked",true);
                    }else{
                        $("#status").attr("checked",false);
                    }
                }else{
                    $("#modal-title").html('Cadastrar usuário');
                    $("#id").val('');
                    $("#name").val('');
                    $("#email").val('');
                    $("#telefone").val('');
                    $("#perfil").attr("checked",false);
                    $("#status").attr("checked",false);
                }
            }); // Modal
        }
    </script>
    <div class="row">
    @if(session('msg'))
        <div class="col-lg-12">	        
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>                                  
                <strong>{!! session('msg') !!}</strong>                                  
            </div>
        </div>	                              
    @endif
        <br/>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            Usuários
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="javascript:" data-toggle="modal" data-target="#modal-user">
                                <i class="fa fa-plus-circle fa-fw"></i> Adicionar
                            </a>
                        </div>     
                    </div>               
                </div><!-- /.panel-heading -->
                <div class="panel-body" id="tabela">
                    <table class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                            <tr>							
                                <th class="text-center">Nome</th>
                                <th class="text-center">E-mail</th>
                                <th class="text-center">Telefone</th>
                                <th class="text-center">Perfil</th>	
                                <th class="text-center">Status</th>	
                                <th class="text-center">Opção</th>	
                            </tr>
                        </thead>
                        <tbody>	
                        @foreach($users as $user)
                            <tr class="{{$user->status==1 ? '' : 'danger'}}">
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telefone}}</td>
                                <td>{{$user->perfil==1 ? 'Usuário Comum' : 'Administrador'}}</td>
                                <td>{{$user->status==1 ? 'Ativo' : 'Inativo'}}</td>
                                <td>
                                    <a href="javascript:" data-toggle="modal" data-target="#modal-user" 
                                    data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}" 
                                    data-telefone="{{$user->telefone}}" data-perfil="{{$user->perfil}}"
                                    data-status="{{$user->status}}">
                                        <i class="fa fa-edit fa-fw"></i> Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- /.table-responsive -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <!-- Modal de NOVO ticker -->
    <div class="modal fade" id="modal-user" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 id="modal-title">Editar usuário</h4>
                </div>
                <form action="{{url('/edita_user')}}" method="post">
                    @csrf    
                    <div class="modal-body">	
                        <div class="row">		
                            <div class="form-group col-lg-6">
                                <label id="tipoSit">Nome:</label>
                                <input class="form-control" id="name" name="name" type="text" value="" />
                            </div>  
                            <div class="form-group col-lg-6">
                                <label id="tipoSit">E-mail:</label>
                                <input class="form-control" id="email" name="email" type="text" value="" />
                            </div>    
                            <div class="form-group col-lg-6">
                                <label id="tipoSit">Telefone:</label>
                                <input class="form-control" id="telefone" name="telefone" type="text" value="" />
                            </div>   
                            <div class="form-group col-lg-6">
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="perfil" id="perfil"> Perfil Adminstrador
                                    </label>                                   
                                </div>     
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="status" id="status"> Usuário Ativo
                                    </label>                                   
                                </div>              
                            </div>   
                        </div><!-- row -->		       
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id" value='' />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection