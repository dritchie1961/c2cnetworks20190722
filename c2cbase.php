<?php


// basic authenication for app
// includes login tracking

class c2cdb extends mysqli
{

    private $_host;
    private $_user;
    private $_pass;
    private $_db;
    private $_port;
    
    private $_peopleuserid;
    private $_logindate;
    private $_status;
    
    public $_link;

    
    
    public function setc2cdblink()
    {
  
        $user = $_COOKIE['peopleuserid'] ;
        $pass = $_COOKIE['peoplepassword'] ;
        
    //    $user = "dritchie1961";
     //   $pass = "N0drepus";
                
        $host = "localhost";
        $port = "3306";
        $db = "c2cnetworks";

        $this->_host = $host;
        $this->_user = $user;
        $this->_pass = $pass;
        $this->_db = $db;
        $this->_port = $port;

        $res = mysqli_connect($this->_host, $this->_user, $this->_pass, $this->_db, $this->_port);
        return $res;
        /*
         if (mysqli_connect_errno()) {
         echo "Failed to connect to MySQLi: " . mysqli_connect_error();
         } else {
         // echo "Failed to connect to MySQLi: " . mysqli_connect_error();
         }
         */

    }

    public function setc2cdbconnection()
    {
  //     $user = "dritchie1961";
   //     $pass = "nodrepus";
        
        $user = "dritchie1961";
        $pass = "N0drepus";
        
        $host = "localhost";
        $port = "3306";
        $db = "c2cnetworks";

        $this->_host = $host;
        $this->_user = $user;
        $this->_pass = $pass;
        $this->_db = $db;
        $this->_port = $port;
        
        $this->_link = mysqli_connect($this->_host, $this->_user, $this->_pass, $this->_db);
        $xyz = $this->_link;
         
        if (mysqli_connect_errno()) {
        //    echo "Connected FAILED";
            return ("Failed to connect to MySQLi: " . mysqli_connect_error());
            
        } else {
     //       echo "Connected okay";
            return ("found");
           
        }
    }

    
    /* moved to authentication
    public function validatec2cpw($id)
    {
   //     echo ("id is" . $id);
        $res = mysqli_query($this->_link, "Select * FROM c2cnetworks.collector WHERE peopleuserid='$id'");
        $row = mysqli_fetch_array($res);
        return $row['peoplepassword'];
    }
    */

    public function trackingpeopleuserid($trackingrequest)
    {    
        $this->_peopleuserid = $trackingrequest["peopleuserid"];
        $this->_logindate = $trackingrequest["logindate"];
        $this->_status = $trackingrequest["status"];
                
        
        $strsql = "'" . $this->_peopleuserid . "'";
        $strsql = $strsql . ", '" . $this->_logindate . "'";
        $strsql = $strsql . ", '" . $this->_status . "'";
        
        
    //    echo $strsql;        
        
        $strsql = "INSERT INTO c2cnetworks.usertracking(peopleuserid, logindate, status) VALUES(" . $strsql . " )";
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    
    
    }
    
    
    
    public function dropc2cdbconnection()
    {
        mysqli_close($this->_link);
    }
}


?>