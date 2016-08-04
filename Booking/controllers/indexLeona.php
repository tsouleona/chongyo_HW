<?php 
class indexLeona extends Controller{
        
//**回首頁**//
        function index(){
           
            $this->view("index");
            
        }
//**登入**//
        function login(){
            
            $login = $this->model("admin");
            $op = $login->login($_POST);
            if($op == 'ok')
            {
                $admin = $this->model("session");
                $op = $admin->username($_POST['username']);
                
                if(!$op)
                {
                    header("location:".$this->result);
                }
            }
            
        }
//**登出**//
        function logout(){
            $admin = $this->model("session");
            $admin->unset_username();
            header("location:".$this->result);
        }

}
?>