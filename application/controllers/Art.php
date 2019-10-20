<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Art extends CI_Controller {

    
 public function __construct()
 {
     parent::__construct();
     
     $this->load->helper('articulos');
     //Do your magic here
 }

    public function index()
    {
        redirect('art/nuevo');
    }

    public function nuevo()
    { 
        if($this->session->userdata('isUserLoggedIn'))
        {
        $articulo=new obj_articulo();

        if($_POST)
        {
 //           var_dump($_POST);

            $articulo->id= $_POST['id'];
            $articulo->titulo= $_POST['titulo'];
            $articulo->resumen= $_POST['resumen'];
            $articulo->descripcion= $_POST['descripcion'];
            $articulo->fecha= date('Y-m-d');
            $articulo->user=$this->session->userdata('userId');
            //ingresar datos    
           $this->db->insert('articulos',$articulo);
            $id=$this->db->insert_id();       
        //    var_dump($_FILES);

            if($_FILES['foto']['error']==0){    
               
                $ext = end(explode(".", $_FILES['foto']['name']));
                
                move_uploaded_file($_FILES['foto']['tmp_name'], "articulos_fotos/{$id}.{$ext}");
            }

            //echo "<script> alert('Good job!')</script>";
            redirect('home');
         
            // $articulo->id = $this->db->insert_id();
            
         }
        
        $data=array("TITLE"=>"Tarea 9","App"=>"Inicio");

        $this->load->view('home/head',$data);
        $this->load->view('home/navBar',$data);
        $data['ArtTitle']="Agregar Nuevo Articulo";
        $this->load->view('articulos/form',$data);
        $this->load->view('home/footer');
 
    }else {redirect('home','refresh');}
    
}

    public function del($id=0)
    {
        
        if($this->session->userdata('isUserLoggedIn'))
        { 

        $a=$this->db->query("SELECT * FROM articulos WHERE user = {$_SESSION['userId']}")->result();
          //  var_dump($a);
        //    echo $_SESSION['userId'];

        if($a[0]->user == $_SESSION['userId']){

       $this->db->query("DELETE FROM articulos WHERE id = '{$id}'");
       redirect('home','refresh');
        
       echo $id;
       
        }else{ echo "Sabemos lo que tramas y no No lo lograras ";}   

        
    }else{redirect('home','refresh');}
}
    
    public function editar($id=0)
    {
        
        if($this->session->userdata('isUserLoggedIn'))
        { 

    $a=$this->db->query("SELECT * FROM articulos WHERE user = {$_SESSION['userId']}")->result();
        //echo $_SESSION['userId'];
        //echo $a[0]->user;

        
        if($a[0]->user == $_SESSION['userId']){ 
        //****/recuerda usar la funcion para quitar los espacios en blanco para los textarea
        if(isset($_POST['publicar'])){
        
            //var_dump($_POST);
            
        $articulo=new obj_articulo();        

        $articulo->id= isset($_POST['id']) ? $_POST['id'] :'';
        $articulo->titulo= isset($_POST['titulo']) ? $_POST['titulo'] :'';
        $articulo->resumen= isset($_POST['resumen']) ? $_POST['resumen'] :'';
        $articulo->descripcion= isset($_POST['descripcion']) ? $_POST['descripcion'] :'';
        $articulo->fecha= date('Y-m-d');
        $articulo->user=$this->session->userdata('userId');
        
             $this->db->where('id',$articulo->id);
             $this->db->update('articulos',$articulo);
              
            $id= $articulo->id;       
            //var_dump($_FILES);

            if($_FILES['foto']['error']==0)
            {
                
                $ext = end(explode(".", $_FILES['foto']['name']));
                
                move_uploaded_file($_FILES['foto']['tmp_name'], "articulos_fotos/{$id}.{$ext}");
            }
        
             echo"<script>
             alert('Hecho!!!');
             </script>";
             
             redirect('home','refresh');
             
            }
        if($id>0)
        {
        $this->db->where('id',$id);
        $rs= $this->db->get('articulos')->result();
            
        if(count($rs)>0){ 
            
        $articulo=$rs[0];

        
        $data= array( "TITLE"=>"Tarea 9",
                      "App"=>"Inicio",
                      "id"=>"{$id}",
                      "titulo"=>"{$articulo->titulo}",
                      "resumen"=>"{$articulo->resumen}",
                      "descripcion"=>"{$articulo->descripcion}");
        
                $this->load->view('home/head',$data);
                $this->load->view('home/navBar',$data);
                $data['ArtTitle']="Editar Articulo";
                $this->load->view('articulos/form',$data);
                $this->load->view('home/footer');
        }
        
    }
}else{ echo "Sabemos lo que tramas y no No lo lograras ";}   
    
}else {redirect('home','refresh');}
}


}

/* End of file Controllername.php */
