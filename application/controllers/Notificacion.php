<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Notificacion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Notificacion_model');
    } 

    /*
     * Listing of notificacion
     */
    function index()
    {
        $data['notificacion'] = $this->Notificacion_model->get_all_notificacion();
        
        $data['_view'] = 'notificacion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new notificacion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'idusuario' => $this->input->post('idusuario'),
				'idevento' => $this->input->post('idevento'),
				'idconfig' => $this->input->post('idconfig'),
				'token' => $this->input->post('token'),
            );
            
            $notificacion_id = $this->Notificacion_model->add_notificacion($params);
            redirect('notificacion/index');
        }
        else
        {
			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Evento_model');
			$data['all_evento'] = $this->Evento_model->get_all_evento();

			$this->load->model('Configuracion_model');
			$data['all_configuracion'] = $this->Configuracion_model->get_all_configuracion();
            
            $data['_view'] = 'notificacion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a notificacion
     */
    function edit($id)
    {   
        // check if the notificacion exists before trying to edit it
        $data['notificacion'] = $this->Notificacion_model->get_notificacion($id);
        
        if(isset($data['notificacion']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idusuario' => $this->input->post('idusuario'),
					'idevento' => $this->input->post('idevento'),
					'idconfig' => $this->input->post('idconfig'),
					'token' => $this->input->post('token'),
                );

                $this->Notificacion_model->update_notificacion($id,$params);            
                redirect('notificacion/index');
            }
            else
            {
				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Evento_model');
				$data['all_evento'] = $this->Evento_model->get_all_evento();

				$this->load->model('Configuracion_model');
				$data['all_configuracion'] = $this->Configuracion_model->get_all_configuracion();

                $data['_view'] = 'notificacion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The notificacion you are trying to edit does not exist.');
    } 

    /*
     * Deleting notificacion
     */
    function remove($id)
    {
        $notificacion = $this->Notificacion_model->get_notificacion($id);

        // check if the notificacion exists before trying to delete it
        if(isset($notificacion['id']))
        {
            $this->Notificacion_model->delete_notificacion($id);
            redirect('notificacion/index');
        }
        else
            show_error('The notificacion you are trying to delete does not exist.');
    }
    
}
