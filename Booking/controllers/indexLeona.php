<?php 
class indexLeona extends Controller{
        
//**回首頁**//
        function index(){
           
            $this->view("index");
            
        }
//**登入**//
        function login(){
            
            $login = $this->model("check_login");
            $row = $login->select();
            
            $op = $login->login($row,$_POST);
            
        }
//**登出**//
        function logout(){
            unset($_SESSION["username"]);
            session_destroy();
            header("location:".$this->result);
        }

}
?>