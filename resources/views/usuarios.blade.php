@extends('template/template')

@section('content')
    <div class="row">
        <br/>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Usuários</div><!-- /.panel-heading -->
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
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->telefone}}</td>
                                <td>{{$user->perfil==1 ? 'Usuário Comum' : 'Administrador'}}</td>
                                <td>{{$user->status==1 ? 'Ativo' : 'Inativo'}}</td>
                                <td>
                                    <a href="">
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
    <div class="modal fade" id="addSetor" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 id="modal-title">Vincular novo setor - </h4>
                </div>
                <form action="" method="post">
                    <div class="modal-body">					
                        <div class="form-group">
                            <select name="idSetor" id="setor" class="form-control" required>
                                <option value="">Selecione o Setor</option>       
                            </select>
                            <input type="hidden" name="idUser" id="idUser">
                        </div>            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection