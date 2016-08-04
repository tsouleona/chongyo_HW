<?php 
    class session{
        
        function username($username){
            
            $_SESSION['username'] = $username;
            
            if($_SESSION['username'] != $username)
            {
                return false;
            }
            
        }
        function unset_username(){
            unset($_SESSION['username']);
            
        }
        
    }
?>