<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cd_controller extends CI_Controller {

        public function salvar_cd(){
            
            $this->load->model('cd/cd_model');
            
           // $result = $this->cd_model->m_salvar_cd();
            
            if($this->input->post('nomecd') == '' && $this->input->post('gravadora') == ''){
                ?> Preencha os campos do formulario! <?php
            }else{
            
            if($this->cd_model->m_salvar_cd()){
                
                echo 1;
                
            }else{
                
                 echo 0;
                
            }
            }
        }
        
        public function listar_cd(){
            
            $this->load->model('cd/cd_model');

            $variaveis['consulta'] = $this->cd_model->exibe_cd();
            
            
            $this->load->helper('valida_login/valida_helper');
        
            $variaveis['validacao'] = getValida();
            
            
            $this->load->helper('preenche_dados/preenche_dados_helper');
        
            $variaveis['preenche_dados'] = getPreencheDados();
        
            
            $this->load->view("menu_cd/listar_cd_view",$variaveis);
        }
        
        public function excluir_cd($idcd) {
            
            $this->load->model('cd/cd_model');
            
            if($this->cd_model->excluir($idcd)){
                
               echo 1;
                
            }else{
                
                 echo 0;
                
            }
            
        }
        
        public function dados_cd() {
            
            $idcd = $this->input->post("idcd");
            
            $this->load->model("cd/cd_model");
            
            $consulta = $this->cd_model->m_list_cd($idcd);
            
            if($consulta->num_rows() == 0){
                die("CD não encontrado");
            }
            
            $array_clientes = array(
                
                "idcd" => $consulta->row()->idcd,
                "nomecd" => $consulta->row()->nomecd,
                "gravadora" => $consulta->row()->gravadora
            );
            
            echo json_encode($array_clientes);
        }
}


        

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */