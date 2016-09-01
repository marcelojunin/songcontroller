<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manter CD</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../bootstrap/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.form.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootbox.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.forms.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootbox.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.confirm.js" type="text/javascript"></script>
        
        <script src="../../../bootstrap/js/jquery.validate.js" type="text/javascript"></script>
        
        <script src="../../../sweet/sweetalert-dev.js" type="text/javascript"></script>
        <script src="../../../sweet/sweetalert.min.js" type="text/javascript"></script>
        
        <link href="../../../sweet/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        
     
        
        $(document).ready(function(){
				$('#tabela1').dataTable();
                                
                                $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
                        
                        $("#formulario_usuario").validate({
                            rules : {
                                  nomecd:{
                                         required:true,
                                         minlength:3
                                  },
                                  gravadora:{
                                         required:true,
                                         minlength:3
                                  }                               
                            },
                            messages:{
                                  nomecd:{
                                         required:"Informe o nome do CD!",
                                         minlength:"O nome deve ter pelo menos 3 caracteres"
                                  },
                                  gravadora:{
                                         required:"Informe a gravadora!",
                                         minlength:"O nome deve ter pelo menos 3 caracteres"
                                  }    
                            }
                     });
		});
        function minhaCallCack(){
         swal({   title: "Registro salvo com sucesso!",
             text: "Exito ao realizar operação.",
             timer: 1000, 
             showConfirmButton: false 
         });
        }

    	$(function(){
    		$('#formulario_usuario').ajaxForm({
    			success: function(data) {
    				if (data == 1 || data == 11) {
                                    
                                    success: minhaCallCack();
                                    limparCampo();
				    	
    				}else{
                                    alert(data);
                                }
    			}
    		});
    	});
        
    	var base_url = "<?= base_url() ?>";
    	
	function carregaDadosUsuarioJSon(id){
    		$.post(base_url+'/index.php/usuario/usuario_controller/dados_usuario', {
    			id: id
    		}, function (data){
    			$('#id').val(data.id);
    			$('#nome').val(data.nome);
    			$('#senha').val(data.senha);
    			$('#email').val(data.email);
                        $('select[name=setor_fk]').val(data.setor_fk);
    			$('#'+data.perfil).prop('checked', true);
                        $('#'+data.status).prop('checked', true);
    			  
    		}, 'json');
    	}
    
    	function janelaNovoUsuario(id){
    		
    		carregaDadosUsuarioJSon(id);
                
	    	$('#modalUsuario').modal('show');
    	}
        
        function limparCampo(){
            $("#id").val(''); 
            $("#nome").val(''); 
            $("#senha").val(''); 
            $("#email").val(''); 
            $("#perfil").val(''); 
            $('select[name=setor_fk]').val(''); 
        }
        
    	function janelaCadastroUsuario(){
                limparCampo();
            
    		$('#modalUsuario').modal('show');
    	}
        
        function confirma(id){
            
            $.confirm({
            title: 'Excluir Usuário',
            content: 'Deseja excluir esse usuário?',
            confirm: function(){
               
            $.ajax({
                type: "POST",
                data: {
                    id: id
                },
                
                url: "http://localhost/cd/index.php/usuario/usuario_controller/excluir_usuario/"+id,
                success: function(data) {
                    if(data == 1 || data == 11){
                        //swal("Excluído!", "Dado excluída com sucesso!", "success");
                        $.alert('Usuário excluido com sucesso!');
                        document.location.href = document.location.href;
                    }else{
                        swal("Erro ao excluir", "Houve algum erro ao excluir!", "error"); 
                       
                    }
                },
                error: function(){
                    alert("Houve algum erro ao excluir!");
                }
            });
                        }, cancel: function(){
                    $.alert('Canceled!');
                }
            });
        }
   
    
        function refresh(){
            document.location.href = document.location.href;
        }
        
        $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
            confirm: function(){
                $.alert('Confirmed!');
            },
            cancel: function(){
                $.alert('Canceled!');
            }
        });
        
        </script>
        
      
</head>
<body>
<?php if(empty(($this->session->userdata('email')))){
    
    redirect('login/login_controller/proteger');
    
}
?>
<div id="container">
	<h1>Hello <?php echo $this->session->userdata('nome');?>, Welcome to CodeIgniter!  </h1>
        <?php 
        
        if($this->session->userdata('perfil') != 'administrador'){
            
            redirect('perfil/p_usuario');
            
        }
            
        ?>
	<div id="body">
          
                
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="http://localhost/cd/index.php/perfil/p_administrador">Início</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a onclick="janelaCadastroUsuario()"><span class="glyphicon glyphicon-plus"  ></span> Novo</a></li>
              <li><?php echo anchor('usuario/usuario_controller/listar_usuario', 'Manter Usuário'); ?></li>
              <li><?php echo anchor('cd/cd_controller/listar_cd', 'Manter CD'); ?></li>
               <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#"> Configurações
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/cd/index.php/setor/setor_controller/listar_setor" class="glyphicon glyphicon-cog"> Setor A</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor B</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor C</a></li>
                </ul>
              </li>
              <li><a href="http://localhost/cd/index.php/login/login_controller/sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>
          </div>
        </nav>
           
	</div>
	
</head>
<body>

<div id="container">
	<h1>Manter Usuário</h1>
        <div id="body">

           <table cellspacing="0"  cellpadding="0" border="0" class="display" id="tabela1">
                <thead>
                    <tr>
                    <th>Código do Usuário</th>
                    <th>Usuário</th>
                    <th>E-Mail</th>
                    <th>Perfil</th>
                    <th>Setor</th>
                    <th>Status</th>
                    <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php foreach ($consulta -> result() as $linha): ?> 
                    
                <tr>
                    <td style="text-align: center;"><?php echo $linha->id ?></td>
                    <td style="text-align: center;"><?php echo $linha->nome ?></td>
                    <td style="text-align: center;"><?php echo $linha->email ?></td>
                    <td style="text-align: center;"><?php echo $linha->perfil ?></td>
                    <td style="text-align: center;"><?php echo $linha->nomesetor ?></td>
                    <td style="text-align: center;"><?php echo $linha->status ?></td>
                    <td style="text-align: center;"><a href="javascript:;"  onclick="janelaNovoUsuario(<?= $linha->id ?>)"><button type="button" class="glyphicon glyphicon-cog"></button></a><a href="javascript:;"  onclick="confirma(<?= $linha->id ?>)"><button type="button" class="glyphicon glyphicon-trash"></button></a></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            
	</div>
        
         <!--START MODAL-->
        <div class="modal fade bs-example-modal-lg" id="modalUsuario" data-backdrop="static" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Manter Usuário</h4>
	      </div>
	      <div class="modal-body">
	      	
			<form role="form" method="post" action="<?= base_url('index.php/usuario/usuario_controller/salvar_usuario')?>" id="formulario_usuario">
			  <div class="form-group">
			    <label for="nome">Nome</label>
                            <input type="text"  class="form-control" id="nome"  name='nome'>
			  </div>
			 
			  <div class="form-group">
			    <label for="email">Senha</label>
                            <input type="password"  class="form-control" id="senha" name='senha'>
			  </div>
			  <div class="form-group">
			    <label for="nome">E-mail</label>
			    <input type="text"  class="form-control" id="email"  name='email'>
			  </div>
			  <div class="form-group">
                              <label for="email">Perfil:</label><br>
			    <label class="radio-inline">
                                <input type="radio" name="perfil" id="usuario" value="usuario" checked="checked"> Usuário
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="perfil" id="administrador" value="administrador"> Administrador
                              </label>
                            </div>
			  <div class="form-group">
                              <label for="email">Status:</label><br>
			    <label class="radio-inline">
                                <input type="radio" name="status" id="ativo" value="ativo" checked="checked"> Ativo
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="status" id="inativo" value="inativo"> Inativo
                              </label>
                            </div>
			  <div class="form-group">
			    <label for="setor">Setor</label>
                            <select class="form-control" name="setor_fk" id="setor_fk" required="required">
                                
                                <option value="">Selecione um Setor</option>
                                
                                 <?php foreach ($setor_ativo -> result() as $linha): ?> 
                                
                                <option value="<?php echo $linha->idsetor?>"><?php echo $linha->nomesetor?></option>
                                
                                <?php endforeach;?>
                                
                            </select>
			  </div>
			  
			  <input type="hidden" name="id" id="id" value="" />
			</form>	    
			    
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>
	       
               <button type="button" class="btn btn-primary" onclick="$('#formulario_usuario').submit()">Salvar</button>
	      </div>
	    </div>
	  </div>
	</div>
        
        
	<p class="footer"><a href="javascript: history.back()">Voltar</a> <strong>{elapsed_time}</strong> seconds</p>
</div>
  <style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</body>
</html>
