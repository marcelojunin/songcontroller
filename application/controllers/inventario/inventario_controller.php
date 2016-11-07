<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario_controller extends CI_Controller {

    function hardware_list(){
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->view('inventario/hardware/hardware_view',$variaveis);
    }
    
    function listagem(){
        
        $this->load->model('inventario/inventario_model');
        
        $inventario = $this->inventario_model->m_hardware_list();
        
        echo $inventario;
    }
    
    function registro_hardware(){
        
        $this->load->model('inventario/inventario_model');
        
        $insert = $this->inventario_model->m_registro_hardware();
        
        if($insert){
            
            echo 1;
            
        }else{
            
            echo 0;
        }
        
    }
    
    function listagem_where($idinventario = NULL){
        
        $this->load->model('inventario/inventario_model');
        
        $inventario = $this->inventario_model->m_hardware_list_where($idinventario);
        
        echo $inventario;
        
    }
    
    function exclui_hardware(){
        
        $this->load->model('inventario/inventario_model');
        
        $deletar = $this->inventario_model->m_exclui_hardware();
        
        if($deletar){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
        
    }
    
    //SOFTWARE
    
    function software_list(){
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->view('inventario/hardware/hardware_view',$variaveis);
        
    }
    
    function listagem_software(){
        
        $this->load->model('inventario/inventario_model');
        
        $software = $this->inventario_model->m_software_list();
        
        echo $software;
        
    }
    
    function registrar_software(){
        
        $this->load->model('inventario/inventario_model');
        
        $registro = $this->inventario_model->m_registrar_software();
        
        if($registro){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
        
    }
    
    function excluir_software(){
        
        $this->load->model('inventario/inventario_model');
        
        $exclusao = $this->inventario_model->m_excluir_software();
        
        if($exclusao){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
    }
    
}