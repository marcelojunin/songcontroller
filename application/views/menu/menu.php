  <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="http://localhost/cd/index.php/perfil/p_administrador">Início</a>
            </div>
            <ul class="nav navbar-nav">
              <li><?php echo anchor('usuario/usuario_controller/listar_usuario', 'Manter Usuário'); ?></li>
              <li><?php echo anchor('cd/cd_controller/listar_cd', 'Manter CD'); ?></li>
               <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#"> Configurações
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/cd/index.php/setor/setor_controller/listar_setor" class="glyphicon glyphicon-cog"> Configuração Setor</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Configuração de Perfil</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor C</a></li>
                </ul>
              </li>
              <li><a href="http://localhost/cd/index.php/login/login_controller/sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>
          </div>
        </nav>