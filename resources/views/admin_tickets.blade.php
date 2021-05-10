@extends('template/template')

@section('content')
<!-- Opções avançadas para tabela -->
    <div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">ABSX Suporte</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
        <!-- INICIO FOREACH -->
        <div class="row">	
        @foreach($users as $user)	
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="javascript:configuracao_fila();" 
                    title="Configuração da Fila de chamado">
                        <span>	
                            <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;
                            <b>TICKETS - {{$user->name}}</b>
                        </span>  
                    </a>                   
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                @if(count($tickets[$user->id]))                
                    @foreach($tickets[$user->id] as $ticket)
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-{{ $status->get_cor($ticket->status)}}">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ number_format($ticket->quant, 0, ',', '.')}}</div>
                                        <div>{{ $status->get_nome($ticket->status)}}</div>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <a href="{{url('/user/'.$ticket->status)}}">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            -->
                        </div>
                    </div>
                    @endforeach                  
                @else
                    <div class="col-lg-12">	        
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>                                  
                            <strong>O usuário não possui nenhum chamado!</strong>                                  
                        </div>
                    </div>	 
                @endif     
                </div><!-- ./panel-body -->
            </div><!-- ./panel panel-default -->	
        @endforeach 
        </div><!-- ./row -->
    <!-- FIM FOREACH -->
    </div>
@endsection