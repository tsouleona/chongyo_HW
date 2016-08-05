<?php 
    class admin extends connect{
    
//**檢查是不是管理員**//
        function login($admin){
            $array = array();
            $cmd = "SELECT * FROM `admin`;";
            $row = $this->connect_getdata($cmd,$array);
            $this->dbgo = NULL;
            $x = count($row);
            for($i=0;$i<$x;$i++){
                if($admin['username']==$row[0]['user_ID'] && $admin['password']==$row[0]['password'])
                {
                    return 'ok';
                    
                }
                
            }
            
        }
    }
?>