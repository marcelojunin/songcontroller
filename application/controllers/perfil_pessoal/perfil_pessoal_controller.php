<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_pessoal_controller extends CI_Controller {
    
    function alterar_perfil(){
        
       $this->load->helper('setor_ativo/setor_ativo_helper');
        
        $variaveis['consulta'] = $this->preenche_dados();
        
        $variaveis['setor_ativo'] = getSetorAtivo();
        
        $this->load->view('perfil_pessoal/perfil_pessoal_view', $variaveis);
        
    }
    
    function preenche_dados(){
        
        $this->load->model('usuario/usuario_model');
        
        $id = $this->session->userdata('id');
        
        $dados = $this->usuario_model->m_list_usuario($id);
        
        return $dados;
        
    }
    
}