<?php 
    class front extends connect{
        
//**搜尋單一活動的可參加名單**//
        function select_view_front($ID)
        {
            $array = array($ID);
            $cmd = "SELECT `mem_number`,`mem_name`,`mem_number_get` FROM `front` WHERE `action_ID`=?;";
            $row = $this->connect_getdata($cmd,$array);
            return $row;
        }
//**搜尋該員工有沒有在參加活動名單內**//
        function select_front($member_ID,$action_ID)
        {
            $array = array($action_ID,$member_ID);
            $cmd="SELECT * FROM `front` WHERE `action_ID`=? AND `mem_number`=?;";
            $row = $this->connect_getdata($cmd,$array);
            if($row[0]['mem_number']==NULL)
            {
                return 'ok';
            }
        }
//**新增到單一活動的參加名單**//
        function insert_front($join,$op){
            $array = array($join['action_ID'],$join['mem_number'],$op,$join['front_get']);
            $cmd = "INSERT INTO `front`(`action_ID`,`mem_number`,`mem_name`,`mem_number_get`)
            VALUES(?,?,?,?)";
            $this->connect_mysql($cmd,$array);
            return 'ok';
        }
    }
?>