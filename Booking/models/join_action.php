<?php 
    class join_action extends connect_two{
        
        function select_action(){
            $array = array();
            $cmd = "SELECT * FROM `action`";
            $row = $this->connect_getdata($cmd);
            return $row;
        }
        function select_action_view($ID){
            $array = array($ID);
            $cmd = "SELECT * FROM `action` WHERE `action_ID`=?";
            $row = $this->connect_getdata($cmd,$array);
            
            return $row;
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
            $array = array($member_ID,$action_ID);
            $cmd="SELECT * FROM `front` WHERE `action_ID`='".$action_ID."' AND `mem_number`='".$member_ID."';";
            $row = $this->connect_getdata($cmd,$array);
            if($row[0]['mem_number']==NULL)
            {
                return 'ok';
            }
        }
        function select_member($member_ID){
            $cmd ="SELECT * FROM `member`";
            $row = $this->connect_getdata($cmd);
            
            $x = count($row);
            for($i=0;$i<$x;$i++)
            {
                if($row[$i]['mem_number'] == $member_ID)
                {
                    return $row[$i]['mem_name'];
                    exit;
                }
                
            }
            
        }
        function insert_front($join,$op){
            
            $cmd = "INSERT INTO `front`(`action_ID`,`mem_number`,`mem_name`,`mem_number_get`)
            VALUES('".$join['action_ID']."','".$join['mem_number']."','".$op."','".$join['front_get']."')";
            $this->connect_mysql($cmd);
            return 'ok';
        }
        function select_action_ID($ID)
        {
            $cmd = "SELECT `action_count` FROM `action` WHERE `action_ID`='".$ID."'";
            return $row = $this->connect_getdata($cmd);
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
                $cmd = "UPDATE `action` SET `action_count`='".$count."' WHERE `action_ID`='".$ID."';";
                $this->connect_mysql($cmd);
                return 'ok';
            }
            
            
            
            
        }
        
    }

?>