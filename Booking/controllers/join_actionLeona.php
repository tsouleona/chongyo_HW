<?php 
class join_actionLeona extends Controller{
        
//-----------------------------------回首頁-------------------------------------------------------------
        function together(){
<<<<<<< HEAD
            $row = $this->join_select();
=======
           $row = $this->join_select();
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
            $this->view("join_action",Array($row));
            
        }
        function join_view(){
            $ID = $_GET['ID'];
            $row = $this->join_select_view($ID);
<<<<<<< HEAD
            $row2 = $this->join_select_front($ID);
            $this->view("join_view",Array($row,$row2));
=======
            $this->view("join_view",Array($row));
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
            
        }
        
        function join_select(){
<<<<<<< HEAD
            $join = $this->model("join_action");
            $row = $join->select_action();
            return $row;
        }
        function join_select_view($ID){
            $join = $this->model("join_action");
            $row = $join->select_action_view($ID);
            return $row;
        }
        function join_select_front($ID)
        {
            $join = $this->model("join_action");
            $row = $join->select_view_front($ID);
            return $row;
        }
        
=======
            $action = $this->model("join_action");
            $row = $action->select_action();
            return $row;
        }
        function join_select_view($ID){
            $action = $this->model("join_action");
            $row = $action->select_action_view($ID);
            return $row;
        }
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
        function check_member(){
            if($_POST['mem_number']=="" || $_POST['action_ID']=="" || $_POST['front_get']=="")
            {
                $this->error("尚未輸入完整");
                exit;
            }
            if($_POST['front_get'] > $_POST['count'])
            {
                $this->error("可攜帶人數超過");
                exit;
            }
            $join = $this->model("join_action");
            
            $op = $join->select_member($_POST['mem_number']);//檢查有沒有個人
<<<<<<< HEAD
            
            if($op != NULL)
=======
            if($op == 'OK')
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
            {
                $op2 = $join->select_front($_POST['mem_number'],$_POST['action_ID']);//檢查有沒有在活動名單內
                if($op2=='ok')
                {
<<<<<<< HEAD
                    
                    $op3 = $join->update_action($_POST['front_get'],$_POST['action_ID']);//看人數
                    if($op3 =='more')
                    {
                        $this->error("超過人數限制");
                        exit;
                    }
                    
                    if($op3 == 'ok')
                    {
                        $op4 = $join->insert_front($_POST,$op);//加入活動
=======
                    $op3 = $join->insert_front($_POST);//加入活動
                    if($op3 == 'ok')
                    {
                        $op4 = $join->update_action($_POST['front_get'],$_POST['action_ID']);
                        if($op4 =='more')
                        {
                            $this->error("超過人數限制，建議不攜伴參加");
                            exit;
                        }
                        if($op4 =='end')
                        {
                            $this->error("人數已滿");
                            exit;
                        }
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
                        if($op4 == 'ok')
                        {
                            $this->success($_POST['mem_number']."申請成功");
                            exit;
                        }
<<<<<<< HEAD
                    }
                        
                    
=======
                        
                    }
                    exit;
>>>>>>> 6a5980578a658c68c22a31277c0e72843de9ef00
                }
                
                else{
                    $this->error("已加入該活動名單");
                    exit;
                }
                
            }
            else
            {
                $this->error("查無此人");
                exit;
            }
                
            
        }
        public function error($error){
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            
            $this->point($a);
        }
        public function success($success){
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            
            $this->point($a);
        }
        public function point($a)
        {
            $this ->view("point",Array($a));
        }
}
?>