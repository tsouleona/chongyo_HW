<?php 
require_once("mysql_connect.inc.php");

class connect_two extends connect_one{
    
    function connect_getdata($com){
        
        $this->connect_mysql($com);
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