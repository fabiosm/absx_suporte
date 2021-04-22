@extends('template/template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Novo Chamado</h1>
        </div><!-- /.col-lg-8 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Preencha os dados para abrir um novo Ticket		      
                </div>
                <div class="panel-body">		
                    <form action="{{url('/')}}" method="post" id="form_ticket">	  
                        @csrf                 				
                        <div class="row">
                            <div class="col-lg-12">                    	
                                <div class="form-group">
                                    <label>Assunto:</label>
                                    <input type="text" class="form-control" name="assunto" required id="assunto">
                                </div>					
                            </div>                                        
                            <div>	
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Descricão:</label>
                                        <textarea class="form-control" rows="3" required
                                        name="descricao" id="descricao"></textarea>
                                    </div>
                                </div>	
                           
                                @if(isset($errors) && count($errors))  
                                <div class="col-lg-3">	        
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        @foreach ($errors->all() as $erro)
                                            <strong>{{$erro}}</strong><br/>
                                        @endforeach  
                                    </div>
                                </div>	                          
                                @endif  
                                
                                @if (session('msg'))
                                <div class="col-lg-6">	        
                                    <div class="alert alert-{{ session('cor') }} alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>                                  
                                        <strong>{!! session('msg') !!}</strong>                                  
                                    </div>
                                </div>	                              
                                @endif
                                			
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">
                                        Abrir Chamado
                                    </button>
                                </div>
                            </div>			
                        </div><!-- /.row -->
                    </form>
                </div><!-- /.panel-body -->
            </div><!-- /.panel -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
@endsection