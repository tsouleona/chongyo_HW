<?php 
    class action extends connect_two{

//**搜尋編號並編號**//
        function select_ac($date){
            $array = array($date);
            $cmd = "SELECT `action_ID` FROM `action` WHERE `action_ID` LIKE '%?%' ORDER BY `action_ID` DESC LIMIT 0,1;";
            $row = $this->connect_getdata($cmd,$array);
            $one="001";
            //編號若不為第一筆則從當天的最後一筆+1
            if($row[0]['action_ID'] == NULL)
            {
                $ans = $date.$one;
                
            }
            //片編號若不為第一筆則從當天的最後一筆+1
            else{
                $ans = substr($row[0]['action_ID'],8,3);
                $ans = (int)($ans) + 1;
                $ans = str_pad($ans,3, "0", STR_PAD_LEFT);
                $ans = $date.$ans;
            } 
            return $ans;
        }
//**新增活動**//
        function insert_ac($action,$ans){
            $date = $action['date']." ".$action['time'];
            $start = $action['start_date']." ".$action['start_time'];
            $end = $action['end_date']." ".$action['end_time'];
            
            $array = array($ans,$action['action_name'],$date,$action['action_data'],$action['action_count'],$action['action_count'],$action['action_get'],$start,$end);
            $cmd = "INSERT INTO `action` (`action_ID`,`action_name`,`action_datetime`,`action_data`,`action_total`,`action_count`,`action_get`,`action_start`,`action_end`)
            VALUES(?,?,?,?,?,?,?,?,?);";
            
            $this->connect_mysql($cmd,$array);
            
            return "YES";
        }
        
    }

?>