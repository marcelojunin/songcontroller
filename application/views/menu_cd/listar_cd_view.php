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
                        
                        $("#formulario_cd").validate({
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
        //http://t4t5.github.io/sweetalert/
        /*
    	 * Função que carrega após o DOM estiver carregado.
    	 * Como estou usando o ajaxForm no formulário, é aqui que eu o configuro.
    	 * Basicamente somente digo qual função será chamada quando os dados forem postados com sucesso.
    	 * Se o retorno for igual a 1, então somente recarrego a janela.
    	 */
    	$(function(){
    		$('#formulario_cd').ajaxForm({
    			success: function(data) {
    				if (data == 1 || data == 11) {
    					
    					//Algo esta acontecendo no controller que está trazendo 11 no lugar de 1.
    					//Faço esse if com || pq preciso que atualize a pagina.
    					//se for sucesso, simplesmente recarrego a página. Aqui você pode usar sua imaginação.
                                        
    					//document.location.href = document.location.href;
                                        success: minhaCallCack();
                                        limparCampo();
				    	
    				}else{
                                    alert(data);
                                }
    			}
    		});
    	});
    
    	//Aqui eu seto uma variável javascript com o base_url do CodeIgniter, para usar nas funções do post.
    	var base_url = "<?= base_url() ?>";
    	
	    /*
	     *	Esta função serve para preencher os campos do cliente na janela flutuante
	     * usando jSon.  
	     */
    	function carregaDadosCdJSon(idcd){
    		$.post(base_url+'/index.php/cd/cd_controller/dados_cd', {
    			idcd: idcd
    		}, function (data){
    			$('#nomecd').val(data.nomecd);
    			$('#gravadora').val(data.gravadora);
    			$('#idcd').val(data.idcd);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente. 
    		}, 'json');
    	}
    
    	function janelaNovoCd(idcd){
    		
    		//antes de abrir a janela, preciso carregar os dados do cliente e preencher os campos dentro do modal
    		carregaDadosCdJSon(idcd);
                //alert(idcd);
    		
	    	$('#modalEditarCliente').modal('show');
    	}
        
        function limparCampo(){
            $("#idcd").val(''); 
            $("#nomecd").val(''); 
            $("#gravadora").val(''); 
        }
        
    	function janelaCadastroCd(){
            // na função limparCampo() eu apago os valores que estão no modal
            // devido ter aberto o modal anteriormente, fica salvo os valores.
                limparCampo();
            
    		$('#modalEditarCliente').modal('show');
    	}
        
        function confirma(idcd){
        resposta = confirm("Deseja realmente excluir esse aluno?");
        if (resposta){
            $.ajax({
                type: "POST",
                data: {
                    idcd: idcd
                },
                
                url: "http://localhost/cd/index.php/cd/cd_controller/excluir_cd/"+idcd,
                success: function(data) {
                    if(data == 1 || data == 11){
                        swal("Excluído!", "Dado excluída com sucesso!", "success"); 
                    }else{
                        swal("Erro ao excluir", "Houve algum erro ao excluir!", "error"); 
                        alert("Houve algum erro ao excluir!");
                    }
                },
                error: function(){
                    alert("Houve algum erro ao excluir!");
                }
            });
        }
    }

        function refresh(){
            document.location.href = document.location.href;
        }
        
        </script>
        
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
</head>
<body>
<?php if(empty(($this->session->userdata('email')))){
    
    redirect('login/login_controller/proteger');
    
}
?>
<div id="container">
	<h1>Hello <?php echo $this->session->userdata('nome');?>, Welcome to CodeIgniter!  </h1>

	<div id="body">
          
                
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
              <?php if($this->session->userdata('perfil') == 'administrador'){
              echo'<li class="active"><a href="http://localhost/cd/index.php/perfil/p_administrador">Home</a></li>';
              echo'<li><a href="http://localhost/cd/index.php/usuario/usuario_controller/listar_usuario">Manter Usuário</a></li>';
              echo'<li><a href="http://localhost/cd/index.php/cd/cd_controller/listar_cd">Manter CD</a></li>';
              echo' <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#"> Configurações
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/cd/index.php/setor/setor_controller/listar_setor" class="glyphicon glyphicon-cog"> Setor A</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor B</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor C</a></li>
                </ul>
              </li>';
              echo'<li><a href="http://localhost/cd/index.php/login/login_controller/sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>';
              echo'<li><a href="#">Page 3</a></li>';
              }else{
              echo'<li class="active"><a href="http://localhost/cd/index.php/perfil/p_usuario">Home</a></li>';
              echo'<li><a href="http://localhost/cd/index.php/cd/cd_controller/listar_cd">Manter CD</a></li>';
              echo'<li><a href="http://localhost/cd/index.php/login/login_controller/sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>';
              echo'<li><a href="#">Page 3</a></li>';
              }
              ?>
            </ul>
          </div>
        </nav>
           
	</div>
	
</head>
<body>

<div id="container">
	<h1>Manter CD</h1>
        <div id="body">
        <div id="bts_manter_cd">
            <div class="btn-group btn-group-justified">
                <button type="button" class="glyphicon glyphicon-plus"  onclick="janelaCadastroCd()"></button>
                <button type="button" class="glyphicon glyphicon-apple"  onclick="confirma()"></button>
                <button type="button" class="glyphicon glyphicon-home"></button>
                <button type="button" class="glyphicon glyphicon-off"></button>
            </div>
        </div>
           <table cellspacing="0"  cellpadding="0" border="0" class="display" id="tabela1">
                <thead>
                    <tr>
                    <th>Código do CD</th>
                    <th>Nome do CD</th>
                    <th>Gravadora</th>
                    <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php foreach ($consulta -> result() as $linha): ?> 
                    
                <tr>
                    <td style="text-align: center;"><?php echo $linha->idcd ?></td>
                    <td style="text-align: center;"><?php echo $linha->nomecd ?></td>
                    <td style="text-align: center;"><?php echo $linha->gravadora ?></td>
                    <td style="text-align: center;"><a href="javascript:;"  onclick="janelaNovoCd(<?= $linha->idcd ?>)"><button type="button" class="glyphicon glyphicon-cog"></button></a><a href="javascript:;"  onclick="confirma(<?= $linha->idcd ?>)"><button type="button" class="glyphicon glyphicon-trash"></button></a></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            
	</div>
        
         <!--START MODAL-->
        <div class="modal fade bs-example-modal-lg" id="modalEditarCliente" data-backdrop="static" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Manter CD</h4>
	      </div>
	      <div class="modal-body">
	      	
			<form role="form" method="post" action="<?= base_url('index.php/cd/cd_controller/salvar_cd')?>" id="formulario_cd">
			  <div class="form-group">
			    <label for="nome">Nome do CD</label>
			    <input type="text" class="form-control" id="nomecd"  name='nomecd'>
			  </div>
			  <div class="form-group">
			    <label for="email">Gravadora</label>
			    <input type="text" class="form-control" id="gravadora" name='gravadora'>
			  </div>
			  <input type="hidden" name="idcd" id="idcd" value="" />
			</form>	    
			    
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>
	       
               <button type="button" class="btn btn-primary" onclick="$('#formulario_cd').submit()">Salvar</button>
	      </div>
	    </div>
	  </div>
	</div>
        
        
	<p class="footer"><a href="javascript: history.back()">Voltar</a> <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
