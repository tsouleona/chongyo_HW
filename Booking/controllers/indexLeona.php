<?php 
class indexLeona extends Controller{
        
//-----------------------------------回首頁-------------------------------------------------------------
        function index(){
           
            $this->view("index");
            
        }
        function login(){
            
            $login = $this->model("check_login");
            $row = $login->select();
            
            $op = $login->login($row,$_POST);
            
        }
        function logout(){
            unset($_SESSION["username"]);
            session_destroy();
            header("location:".$this->result);
        }
        public function error($error){
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            $b='';
            $this->point($a,$b);
        }
        public function success($success){
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            $b='';
            $this->point($a,$b);
        }
}
?>