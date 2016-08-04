<?php
class Controller{
    protected $result;
        
    public function __construct(){
        $con = new connect_db();
        $this->result = $con->db();
    }
    public function model($model) {
        require_once "../Booking/models/mysql_getdata.php";
        require_once "../Booking/models/$model.php";
        
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        require_once "views/$view.php";
        
    }
    
    
    
    
    
    
}

?>
