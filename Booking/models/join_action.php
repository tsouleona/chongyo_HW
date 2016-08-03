<?php 
    class join_action extends connect_two{
        
        function select_action(){
            $cmd = "SELECT * FROM `action`";
            $row = $this->connect_getdata($cmd);
            return $row;
        }
        function select_action_view($ID){
            $cmd = "SELECT * FROM `action` WHERE `action_ID`='".$ID."'";
            $row = $this->connect_getdata($cmd);
            return $row;
        }
        function select_front($member_ID,$action_ID)
        {
            $cmd="SELECT * FROM `front` WHERE `action_ID`='".$action_ID."' AND `mem_number`='".$member_ID."';";
            $row = $this->connect_getdata($cmd);
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
                    return 'OK';
                    exit;
                }
                
            }
            
        }
        function insert_front($join){
            
            $cmd = "INSERT INTO `front`(`action_ID`,`mem_number`,`mem_number_get`)
            VALUES('".$join['action_ID']."','".$join['mem_number']."','".$join['front_get']."')";
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
            $row = $this-> select_action_ID($ID);
            $count = (int)($row[0]['action_count']) - $count;
            if($count < 0)
            {
                return 'more';
                exit;
            }
            
            $cmd = "UPDATE `action` SET `action_count`='".$count."' WHERE `action_ID`='".$ID."';";
            $this->connect_mysql($cmd);
            return 'ok';
            exit;
            
            if($count == 0)
            {
                return 'end';
                exit;
            }
            
        }
        
    }

?>