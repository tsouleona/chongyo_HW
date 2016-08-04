<?php 
    class member extends connect{
        
//**搜尋該員工的姓名**//
        function select_mem($member_ID){
            $array = array($member_ID);
            $cmd = "SELECT * FROM `member` WHERE `mem_number`=?";
            $row = $this->connect_getdata($cmd,$array);
            return $row[0]['mem_name'];
        }   
    
    
    }
?>