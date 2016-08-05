<?php 
    class can_join extends connect{
        

//**新增可參加單一活動的員工名單**//
        function insert_can($join){

            $array = array($join['action_ID'],$join['mem_number']);
            $cmd = "INSERT INTO `can_join`(`action_ID`,`mem_number`)VALUES(?,?);";
            $this->connect_mysql($cmd,$array);
            $this->dbgo = NULL; 
            return 'ok';
        }

//**搜尋單一活動的可參加名單**//
        function select_can_join2($ID)
        {
            $array = array($ID);
            $cmd ="SELECT * FROM `can_join` WHERE `action_ID`=?";
            $row = $this->connect_getdata($cmd,$array);
            $this->dbgo = NULL; 
            return $row;
             
        }
//**搜尋單一活動的可參加名單有沒有該員工**//
        function select_can_join($action_ID,$member_ID){
            $array = array($action_ID);
            $cmd ="SELECT * FROM `can_join` WHERE `action_ID`=? FOR UPDATE";
            $row = $this->connect_getdata($cmd,$array);
            
            $x = count($row);
            for($i=0;$i<$x;$i++)
            {
                if($row[$i]['mem_number'] == $member_ID)
                {
                    return $row[$i]['mem_number'];
                    exit;
                }
                
            }
            
        }
}

?>