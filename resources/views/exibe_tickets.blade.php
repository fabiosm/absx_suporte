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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="javascript:configuracao_fila();" 
                    title="Configuração da Fila de chamado">
                        <span>	
                            <i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;
                            <b>TICKETS</b>
                        </span>  
                    </a>                   
                </div><!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Chamados Aberto -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=number_format(10, 0, ',', '.');?></div>
                                        <div>Abertos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
    
                    <!-- Chamados Pendentes -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                            <?=number_format(12, 0, ',', '.');?>
                                        </div>
                                        <div>Em andamento</div>
                                    </div>
                                </div>
                            </div>
                            <a href="">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>            
            
                    <!-- Chamados em Andamento -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=number_format(10, 0, ',', '.');?></div>
                                        <div>Atrasados</div>
                                    </div>
                                </div>
                            </div>
                            <a href="">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <!-- Chamados Fechados -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?=number_format(10, 0, ',', '.');?></div>
                                        <div>Encerrados</div>
                                    </div>
                                </div>
                            </div>
                            <a href="">
                                <div class="panel-footer">
                                    <span class="pull-left">Ver Detalhes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><!-- ./panel-body -->
            </div><!-- ./panel panel-default -->	
        </div><!-- ./row -->
    <!-- FIM FOREACH -->
    </div>
@endsection