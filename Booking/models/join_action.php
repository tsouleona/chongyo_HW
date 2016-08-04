<?php 
    class join_action extends connect_two{
        
        function select_action(){
            $array = array();
            $cmd = "SELECT * FROM `action`";
            $row = $this->connect_getdata($cmd,$array);
            return $row;
        }
        function select_action_view($ID){
            $array = array($ID);
            $cmd = "SELECT * FROM `action` WHERE `action_ID`=?";
            $row = $this->connect_getdata($cmd,$array);
            return $row;
        }
        function insert_can($join){

            $array = array($join['action_ID'],$join['mem_number']);
            $cmd = "INSERT INTO `can_join`(`action_ID`,`mem_number`)VALUES(?,?);";
            $this->connect_mysql($cmd,$array);
            return 'ok';
        }
        
        function select_view_front($ID)
        {
            $array = array($ID);
            $cmd = "SELECT `mem_number`,`mem_name`,`mem_number_get` FROM `front` WHERE `action_ID`=?;";
            $row = $this->connect_getdata($cmd,$array);
            return $row;
        }
        
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
        function select_can_join($action_ID,$member_ID){
            $array = array($action_ID);
            $cmd ="SELECT * FROM `can_join` WHERE `action_ID`=?";
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
        function select_mem($member_ID){
            $array = array($member_ID);
            $cmd = "SELECT * FROM `member` WHERE `mem_number`=?";
            $row = $this->connect_getdata($cmd,$array);
            return $row[0]['mem_name'];
        }
        function insert_front($join,$op){
            $array = array($join['action_ID'],$join['mem_number'],$op,$join['front_get']);
            $cmd = "INSERT INTO `front`(`action_ID`,`mem_number`,`mem_name`,`mem_number_get`)
            VALUES(?,?,?,?)";
            $this->connect_mysql($cmd,$array);
            return 'ok';
        }
        function select_action_ID($ID)
        {
            $array = array($ID);
            $cmd = "SELECT `action_count` FROM `action` WHERE `action_ID`=?;";
            return $row = $this->connect_getdata($cmd,$array);
        }
        function update_action($get,$ID){
            $count = 1 ;
            $count = $count + (int)$get;
            $row = $this-> select_action_ID($ID);//找剩餘人數
            $count = (int)($row[0]['action_count']) - $count;
            if($count < 0)
            {
                return 'more';
                exit;
            }
            else{
                $array = array($count,$ID);
                $cmd = "UPDATE `action` SET `action_count`=? WHERE `action_ID`=?;";
                $this->connect_mysql($cmd,$array);
                return 'ok';
            }
            
            
            
            
        }
        
    }

?>