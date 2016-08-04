<?php 
require_once("mysql_connect.inc.php");

class connect_two extends connect_one{
    
<<<<<<< HEAD
    function connect_getdata($com,$array){
        
        $this->connect_mysql($com,$array);
        
=======
    function connect_getdata($com){
        
        $this->connect_mysql($com);
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
        $row = $this->result->fetchAll(PDO::FETCH_ASSOC);
        
        //法二
        //$g = 0 ;
        // while($tmp = mysql_fetch_assoc($this->result))
        // {
        //     $i = $g;
            
        //     $row[$i] = $tmp;
            
        //     $g = $g + 1;
        // }
        
        return $row;
        
    }
}


?>