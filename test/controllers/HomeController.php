<?php

class HomeController
{
    public $user;
    public function __construct(){
        $this->user= new User ;

    }
    
    function chitiet(){
        if(isset($_GET['ID'])){
            $user = $this->user->chitiet($_GET['ID']);
            require_once PATH_VIEW . 'chitiet.php';
        }
    }
    public function index() 
    {
        $userList = $this->user->getAll();
        require_once PATH_VIEW . 'main.php';
    }
    
    function delete(){
        if(isset($_GET['ID'])){
            $user = $this->user->delete($_GET['ID']);
     header('Location: ' . BASE_URL);

        }
    }
    function create(){
        require_once PATH_VIEW . 'create.php';
    }
    function add(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = $_POST+$_FILES;
        
            if($data['Avatar_url']['size']>0){
                $data['Avatar_url']=upload_file('user',$data['Avatar_url']);
            
            }else{
                $data['Avatar_url'] = 'user/1.jpg';
            }
        }
        $this->user->add($data);
        header('Location:'.BASE_URL);drfdrfdrfdrf
    }
}