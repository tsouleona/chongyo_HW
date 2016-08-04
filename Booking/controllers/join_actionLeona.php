<?php 
class join_actionLeona extends Controller{
        
//**活動列(頁面)**//
        function together(){
            $row = $this->join_select();
            $this->view("join_action",Array($row));
            
        }
//**活動細項(頁面)**//
        function join_view(){
            $ID = $_GET['ID'];
            $row = $this->join_select_view($ID);
            $row2 = $this->join_select_front($ID);
            $row3 = $this->select_can_join($ID);
            $this->view("join_view",Array($row,$row2,$row3));
            
        }
//**新增員工(頁面)**//
        function join_mem(){
            $ID = $_GET['ID'];
            $row = $this->join_select_view($ID);
            $row2 = $this->select_can_join($ID);
            $this->view("add_mem",Array($row,$row2));
        }
        
        
        
        

//**搜尋可參加某活動的名單**//
        function select_can_join($ID)
        {
            $join = $this->model("can_join");
            $row = $join->select_can_join2($ID);
            return $row;
        }
//**新增可參加某活動的員工**//
        function insert_can_join()
        {
            $member = $this->model("member");
            $join = $this->model("can_join");
            $front = $this->model("front");
            $action = $this->model("action");
            $op = $member->select_mem($_POST['mem_number']);
            if($op !=NULL)
            {
                $op2 = $join->select_can_join($_POST['action_ID'],$_POST['mem_number']);
                if($op2 == NULL)
                {
                    $op3 = $join->insert_can($_POST);
                    if($op3 == 'ok')
                    {
                        $this->success("新增成功");
                        exit;
                    }
                }
                else
                {
                    $this->error("已在名單內");
                    exit;
                }
            }
            else
            {
                $this->error("查無此人");
                exit;
            }
            
        }
//**搜尋全部的活動**//
        function join_select(){
            $action = $this->model("action");
            $row = $action->select_action();
            return $row;
        }
//**搜尋單一的活動**//
        function join_select_view($ID){
            $action = $this->model("action");
            $row = $action->select_action_view($ID);
            return $row;
        }
//**搜尋單一的活動以參加名單**//
        function join_select_front($ID)
        {
            $front = $this->model("front");
            $row = $front->select_view_front($ID);
            return $row;
        }
//**檢查有沒有此員工、有沒有在活動名單、檢查人數，都符合條件才加入活動**//
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
            $join = $this->model("can_join");
            $member = $this->model("member");
            $front = $this->model("front");
            $action = $this->model("action");
            $op = $join->select_can_join($_POST['action_ID'],$_POST['mem_number']);//檢查表單有沒有個人
            
            if($op != NULL)
            {
                $op4 = $member->select_mem($op);
                if($op4!=NULL){
                    
                }
                $op2 = $front->select_front($_POST['mem_number'],$_POST['action_ID']);//檢查有沒有在活動名單內
                if($op2=='ok')
                {
                    
                    $op3 = $action->update_action($_POST['front_get'],$_POST['action_ID']);//看人數
                    if($op3 =='more')
                    {
                        $this->error("超過人數限制");
                        exit;
                    }
                    
                    if($op3 == 'ok')
                    {
                        $op5 = $front->insert_front($_POST,$op4);//加入活動
                        if($op5 == 'ok')
                        {
                            $this->success($_POST['mem_number']."申請成功");
                            exit;
                        }
                    }
                        
                    
                }
                
                else{
                    $this->error("已加入該活動名單");
                    exit;
                }
                
            }
            else
            {
                $this->error("未列入可參加名單內");
                exit;
            }
                
            
        }
//**錯誤訊息**//
        public function error($error){
            $a = '<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$error.'</strong></h4></div>';
            
            $this->point($a);
        }
//**成功訊息**//
        public function success($success){
            $a = '<div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4><strong>'.$success.'</strong></h4></div>';
            
            $this->point($a);
        }
//**顯示訊息**//
        public function point($a)
        {
            $this ->view("point",Array($a));
        }
}

?>