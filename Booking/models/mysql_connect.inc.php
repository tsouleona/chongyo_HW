<?php

class connect{
        protected $result;
        public $dbgo;
        function connect(){
               //資料庫設定
                //資料庫位置
                $db_server = "localhost";
                //資料庫名稱
                $db_name = "Booking";
                //資料庫管理者帳號
                $db_user = "tsouleona";
                //資料庫管理者密碼
                $db_passwd = "830606";
                //對資料庫連線
                $dbconnect = "mysql:host=".$db_server.";dbname=".$db_name;
                $this->dbgo = new PDO($dbconnect, $db_user, $db_passwd);
                $this->dbgo->exec("SET NAMES utf8");
                
                //法二
                // $this->Link = mysql_connect($db_server, $db_user, $db_passwd) or die("無法對資料庫連線");
                // //資料庫連線採UTF8
                // $this->result = mysql_query("SET NAMES utf8",$this->Link);
                // mysql_selectdb($db_name, $this->Link);
                //$this->result = mysql_query($com);
                
                
        }
        function connect_mysql($com,$array){
                $this->connect();
                $this->result = $this->dbgo->prepare($com);
                $this->result->execute($array);
        }
        function connect_getdata($com,$array){
                $this->connect();
                $this->connect_mysql($com,$array);
                $row = $this->result->fetchAll(PDO::FETCH_ASSOC);
                
                //法二
                //$g = 0 ;
                // while($tmp = mysql_fetch_assoc($this->result))
                // {
                //     $i = $g;
                    
                //     $row[$i] = $tmp;
                    
                //     $g = $g + 1;
                // }
                
                return $row;
                
            }
        
}
        
?> 