<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * User Management class created by CodexWorld
 */
class Users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user');
       
        $this->load->helper('articulos');
    }
    /*
     * User login
     */
    public function login(){
        $data = array();
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        if($this->input->post('loginSubmit')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'email'=>$this->input->post('email'),
                    'password' => $this->input->post('password'),
                    'status' => '1'
                );
                $checkLogin = $this->user->getRows($con);
                if($checkLogin){
                    $this->session->set_userdata('isUserLoggedIn',TRUE);
                    $this->session->set_userdata('userId',$checkLogin['id']);
                    redirect('home');
                }else{
                    $data['error_msg'] = 'Error de e-mail o contraseña, si no estas logeado por favor registrate.';
                }
            }
        }
        //load the view
        $data['TITLE']="Tarea 9";$data['App']="Inicio";$data['fondo']="Tell me Now";
        
        $this->load->view('users/head', $data);
        $this->load->view('home/navBar', $data);
        $this->load->view('users/login', $data);
        $this->load->view('users/footer');
    }

    /*
     * User Posts
     */

     public function posts()
     {
        $data=array("TITLE"=>"Tarea 9","App"=>"Inicio");
         $this->load->view('users/head',$data);
         $this->load->view('home/navBar',$data);
         $this->load->view('users/contenido');
         $this->load->view('users/footer');
     }

    /*
     * User account information
     */
    public function account(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            
        $data['TITLE']="Tarea 9";$data['App']="Inicio";$data['fondo']="Tell me Now";
        
        $this->load->view('users/head', $data);
        $this->load->view('home/navBar', $data);
        $this->load->view('users/account', $data);    
        $this->load->view('users/footer');
    
        }else{
            redirect('users/login');
        }
    }
    
    /*
     * Posteo del articulo por el cliente
     */
    
    public function articulo(){
        $data = array();
        if($this->session->userdata('isUserLoggedIn')){
            $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));
            //load the view
            $this->load->view('head');
            $this->load->view('navBar');
            $this->load->view('header');
            $this->load->view('contenido', $data);
            $this->load->view('footer');
        }else{
            redirect('users/login');
        }
    }
    /*
     * User registration
     */
    public function registration(){
        $data = array();
        $userData = array();
        if($this->input->post('regisSubmit')){
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]');

            $userData = array(
                'name' => strip_tags($this->input->post('name')),
                'email' => strip_tags($this->input->post('email')),
                'password' => $this->input->post('password'),
                'gender' => $this->input->post('gender'),
                'phone' => strip_tags($this->input->post('phone'))
            );

            if($this->form_validation->run() == true){
                $insert = $this->user->insert($userData);
                if($insert){
                    $this->session->set_userdata('success_msg', 'Tu usuario se a creado exitosamente!! Ahora digita tus credenciales.');
                    redirect('users/login');
                }else{
                    $data['error_msg'] = 'Hubo un error, Por favor intentalo de nuevo.';
                }
            }
        }
        $data['user'] = $userData;
        //load the view
        $data['TITLE']="Tarea 9";$data['App']="Inicio";$data['fondo']="Tell me Now";
        
        $this->load->view('users/head', $data);
        $this->load->view('home/navBar', $data);
        $this->load->view('users/registration', $data);
        $this->load->view('users/footer');
    
    }
    
    /*
     * User logout
     */
    public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        redirect('home');
    }
    
    /*
     * Existing email check during validation
     */
    public function email_check($str){
        $con['returnType'] = 'count';
        $con['conditions'] = array('email'=>$str);
        $checkEmail = $this->user->getRows($con);
        if($checkEmail > 0){
            $this->form_validation->set_message('email_check', 'Elije otro e-mail por favor -este ya existe-.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
