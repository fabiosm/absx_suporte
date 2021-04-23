@extends('template/template')

@section('content')
    <!-- Opções avançadas para tabela -->
    <script> 	
        window.onload = function(){	  
            // Modal - so exibe quando tiver dado do Chamado selecionado:
            $("#chamado").on('show.bs.modal',function(event){
                var button    = $(event.relatedTarget); // Botão que Abre o Modal
                var id 	      = button.data('id'); // ID do Chamado
                var data      = button.data('data'); 
                var assunto   = button.data('assunto'); 
                var descricao = button.data('descricao'); 
         
                $("#titulo").html('Ticket - N° '+id);
                $("#input_data").val(data);
                $("#input_assunto").val(assunto);
                $("#input_descricao").html(descricao);
                $("#id_ticket").val(id);
            }); // Modal
        }

        function btn_confirmar(tipo){
            var id = $("#id_ticket").val();
            console.log(id);
            if(tipo == 1){
                var r = confirm('Colocar ticket como resolvido?');
                var url = "{{url('user/3/')}}"+'/'+id+'/status';
            }else{
                var r = confirm('Colocar ticket em andamento?'); 
                var url = "{{url('user/2/')}}"+'/'+id+'/status';              
            }
            if(r){
                location.href=url;
            }
        }
    </script>
    <div class="row">
        <div class="col-lg-9">
            <h1 class="page-header">Tickets - {{$status}}</h1>      
        </div><!-- /.col-lg-7 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$status}}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="dataTable table table-striped table-bordered table-hover">
                        <thead>
                            <tr>                       
                                <th class="text-center">Número</th>   
                                <th class="text-center">Assunto</th>                     
                                <th class="text-center">Descrição</th>
                                <th class="text-center">Data</th>
                            </tr>	
                        </thead>
                        <tbody>	
                        @foreach ($tickets as $tic)   
                            <tr align="center">                                 
                                <td>
                                    <a href="javascript:" data-toggle="modal" data-target="#chamado" data-toggle="tooltip"
                                    data-id="{{$tic->id}}" data-assunto="{{$tic->assunto}}" data-descricao="{{$tic->descricao}}" 
                                    data-data="{{date('d/m/Y', strtotime($tic->created_at))}}" title="Ticket" data-placement="right">
                                        {{$tic->id}}                             
                                        <img src="{{url('img/exclamacao.gif')}}" 
                                        alt="TICKET ATRASADO!" style="height:25px;"/>
                                    </a>				
                                </td>
                                <td>{{$tic->assunto}}</td>	
                                <td>{{$tic->descricao}}</td>
                                <td data-order="{{$tic->created_at}}">
                                   {{date('d/m/Y', strtotime($tic->created_at))}}  
                                </td>
                            </tr>       
                        @endforeach              					
                        </tbody>
                    </table><!-- /.table-responsive -->
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <!-- Modal - Resposta para Chamado -->
    <div class="modal fade" id="chamado" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                    <h4 class="modal-title" id="titulo">Chamado</h4>
                </div>
                <div class="modal-body">
                    <fieldset disabled>  
                        <div class="form-group col-lg-6">
                            <label id="tipoSit">Data de Abertura:</label>
                            <input class="form-control" id="input_data" type="text" value="" disabled />
                        </div>       
                        <div class="form-group col-lg-6">
                            <label>Assunto</label>
                            <input class="form-control" id="input_assunto" type="text" value="" disabled />
                        </div>               

                        <div class="form-group col-lg-12">
                            <label>Descrição:</label>
                            <textarea id="input_descricao" class="form-control" rows="4" disabled></textarea>
                        </div>   
                    </fieldset>   
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 text-right">
                        <input type="hidden" id="id_ticket" name="id_ticket" value="" />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <!-- Caso seja usuário pendente -->
                        <button type="button" onClick="btn_confirmar(1);" class="btn btn-primary" style="float:left;">Resolvido</button>
                        <button type="button" id="btn-devolver" onClick="btn_confirmar(2);;" style="float:left;" class="btn btn-warning">
                            Em andamento
                        </button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection