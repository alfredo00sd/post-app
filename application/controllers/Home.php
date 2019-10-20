 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('articulos');
        $this->load->model('user');
        //Do your magic here
    }
   
    public function index()
    {
        $data=array("TITLE"=>"Tarea 9","App"=>"Inicio","header"=>"Aqui podras ver y postear nuevos articulos");
        $data['user'] = $this->user->getRows(array('id'=>$this->session->userdata('userId')));

        $this->load->view('home/head',$data);
        $this->load->view('home/navBar',$data);
        $this->load->view('home/header',$data['header']);
        $this->load->view('home/contenido',$data);
        $this->load->view('home/footer');
        
    }

}

/* End of file Controllername.php */
 ?>