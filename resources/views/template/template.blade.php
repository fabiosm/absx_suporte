<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de Chamados do ABSX Suporte">
        <meta name="author" content="Fábio de Sá Marcelino">
        <!-- <link rel="icon" href="" type="image/ico" /> -->
        <title>Gestão de Chamados - ABSX Suporte</title>
        <!-- Bootstrap Core CSS -->
        <link href="{{url('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{url('assets/metisMenu/metisMenu.min.css')}}" rel="stylesheet">        
         <!-- DataTables CSS -->
        <link href="{{url('assets/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="{{url('assets/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">
        <!-- Estilo CSS Personalizado -->
        <link href="{{url('css/style.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{url('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Switch Input -->
        <link href="{{url('css/switch.css')}}" rel="stylesheet">
    </head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0">                     
            <ul class="nav navbar-top-links navbar-right">
            @if(Auth::check())
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>        
                        {{auth()->user()->name}}
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">  
                    @if(auth()->user()->perfil==2)
                        <li>
                            <a href="{{url('usuarios')}}">
                                <i class="fa fa-users fa-fw"></i> Usuários
                            </a>
                        </li>  
                    @endif
                        <li>                            
                            <!-- Logout -->
                            <form method="POST" id="form_logout" action="{{ route('logout') }}">
                                @csrf                          
                                <a href="javascript:" onClick="$('#form_logout').submit();">
                                    <i class="fa fa-sign-out fa-fw"></i> Sair
                                </a>
                            </form>
                        </li>
                    </ul><!-- /.dropdown-user -->
                </li><!-- /.dropdown -->
            @endif
            </ul><!-- /.navbar-top-links -->
    
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">     
                        <li>
                            <a href="{{url('/')}}" title="Abrir chamado">
                                <i class="fa fa-plus-square fa-fw"></i>
                            </a>
                        </li>               
                        <li>
                            <a href="{{url('user')}}" title="Meus chamados">
                                <i class="fa fa-tasks fa-fw"></i> 
                            </a>
                        </li>                
                    </ul>
                </div><!-- /.sidebar-collapse -->
            </div><!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            @yield('content')              
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{url('assets/jquery/jquery.min.js')}}"></script>
    <!-- Scripts Personalizados 
    <script src="{{url('assets/js/script.js')}}"></script>-->
    <!-- JQuery UI  
    <script src="{{url('assets/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>-->      
    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('assets/metisMenu/metisMenu.min.js')}}"></script>
    <!-- DataTables JavaScript -->
    <script src="{{url('assets/datatables/js/jquery.dataTables.min.js')}}"></script>
    <!-- <script src="{{url('assets/datatables-plugins/dataTables.bootstrap.min.js')}}"></script> -->
    <script src="{{url('assets/datatables-responsive/dataTables.responsive.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{url('js/sb-admin-2.js')}}"></script>
    <!-- Mascara para Input -->
    <script src="{{url('js/jquery.mask.js')}}"></script>
    <!-- Mascara para dinheiro 
    <script src="{{url('js/jquery.maskMoney.js')}}"></script>-->
    <!-- INICIALIZAÇÃO DE SCRIPTS -->
    <script>
        $(function(){
            // Data Table:
            $('.dataTable').DataTable({
                "iDisplayLength": 25, 
                "order": [[0,"desc"],[1,"asc"]], // Ordem preferencial na frente, depois ordem de chegada
                responsive: true,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json'
                }
            });	

            // Mascaras para Input:
            $('.tel').mask('(00) 0000-0000');
            $('.num').mask("#", {reverse: true});
            $('.data').mask('00/00/0000');
            $('.hora').mask('00:00');
            $('.time').mask('00:00:00');
            $('.cpf').mask('000.000.000-00');
            
            // Tooltip utilizado na tela de Chamados pendentes do Admin e do Usuário:
            $('[data-toggle="tooltip"]').tooltip();	
        });
     </script>
    </body>
</html>
