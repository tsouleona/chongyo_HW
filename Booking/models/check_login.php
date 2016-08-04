<?php 
    class check_login extends connect_two{
        function select(){
            $array = array();
            $cmd = "SELECT * FROM `admin`;";
            $row = $this->connect_getdata($cmd,$array);
            return $row;
        }
        function login($row,$admin){
            $x = count($row);
            for($i=0;$i<$x;$i++){
                if($admin['username']==$row[0]['user_ID'] && $admin['password']==$row[0]['password'])
                {
                    $_SESSION['username'] = $admin['username'];
                    
                }
                
            }
            
        }
    }
?>