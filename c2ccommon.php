<?php

// common database objects
include 'c2cbase.php';

class c2clppasset extends c2cdb
{

    private $_lppssetid;

    private $_reversepic;

    public function selectfnc2clppasset($lppssetid)
    {
        $strsql = "Select reversepic FROM c2cnetworks.lppasset WHERE lppssetid='$lppssetid'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        $row = mysqli_fetch_array($res);
        
        return $row['reversepic'];
    }
}

class c2cpeople extends c2cdb
{

    private $_companyid;

    private $_portfolioid;

    private $_peopleid;

    private $_peoplefirstname;

    private $_peoplelastname;

    private $_peopleuserid;

    private $_peoplepassword;

    private $_peopleaccesslevel;

    private $_peopledepartment;

    private $_peopleaddress1;

    private $_peopleaddress2;

    private $_peoplecity;

    private $_peoplephonenumber1;

    private $_peoplephonenumber2;

    private $_peoplephonenumber3;

    private $_peopleemailaddress1;

    private $_peopleemailaddress2;

  //  private $_peoplepassword;
    
    
    public function validateidc2cperson($id)
    {
        $strsql = "Select count(*) FROM c2cnetworks.collector WHERE peopleuserid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        // $row = mysqli_fetch_array($res);
        $row = mysqli_fetch_array($res);
        
        // echo (">>>");
        // echo ("rows " . $row[0]);
        // echo ("<<<");
        if ($row[0] == 1) {
            return ("1");
        } else {
            return ("id0");
        }
        // return $row['peopleid'];
    }

    public function validatec2cpw($id, $pw)
    {
        // echo ("id is" . $id);
        $strsql = "Select * FROM c2cnetworks.collector WHERE peopleuserid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        $row = mysqli_fetch_array($res);
        
        if ($row['peoplepassword'] == $pw) {
            return ("1");
        } else {
            return ("pw0");
        }
    }

    public function selectidc2cperson($id)
    {
        $strsql = "Select * FROM c2cnetworks.collector WHERE peopleuserid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        $row = mysqli_fetch_array($res);
        return ($row['peopleid']);
        
        // return $row['peopleuserid'];
    }

    public function selectonec2cperson($id)
    {
        $strsql = "Select * FROM c2cnetworks.collector WHERE peopleid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }

    public function selectonec2cpeople($id)
    {
        $strsql = "Select * FROM c2cnetworks.collector WHERE companyid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }

    public function selectallc2cpeople()
    {
        $strsql = "SELECT * FROM c2cnetworks.collector ORDER BY companyid";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }

    public function selectuseriddefaults($userid)
    {
        $strsql = "Select * FROM c2cnetworks.collector WHERE peopleuserid='$userid'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        $row = mysqli_fetch_array($res);
        
        $UserDefaults['peopleaccesslevel'] = $row["peopleaccesslevel"];
        $UserDefaults['companyid'] = $row["companyid"];
        $UserDefaults['portfolioid'] = $row["portfolioid"];
        $UserDefaults['projectid'] = $row["projectid"];
        
        return $UserDefaults;
        // return $row->peopleid;
    }

    public function createnewmember($people)
    {
                
        
        $this->_peoplefirstname = $people[0];
        $this->_peoplelastname = $people[1];
        $this->_peopleaddress1 = $people[2];
        $this->_peopleaddress2 = $people[3];
        $this->_peopleregion = $people[4];
        $this->_peoplecountry = $people[5];
        $this->_peopleprovstate = $people[6];
        $this->_peoplecity = $people[7];
        $this->_peoplepostalcodezip = $people[8];
        $this->_peoplephonenumber1 = $people[9];
        $this->_peopleemailaddress1 = $people[10];
          
        $strsql = "insert into c2cnetworks.collector () values ()";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        $strsql = "select last_insert_id()";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        $row = mysqli_fetch_array($res);
        
        $this->_peopleuserid = $row[0];
        $list = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$%&*';
        
  //      $this->_peoplepassword = 'xxx';
        
        $this->_peoplepassword = substr(str_shuffle(str_repeat($list,8)),0,8);
             
        $strsql = "UPDATE c2cnetworks.collector set";
        
        $strsql = $strsql . " peopleuserid='" . $this->_peopleuserid . "'";
        $strsql = $strsql . ", peoplepassword='" . $this->_peoplepassword . "'";
        $strsql = $strsql . ", peoplefirstname='" . $this->_peoplefirstname . "'";
        $strsql = $strsql . ", peoplelastname='" . $this->_peoplelastname . "'";
        
        $strsql = $strsql . ", peoplestatus='" . "Active" . "'";
        
        $strsql = $strsql . ", peopleregion='" . $this->_peopleregion . "'";
        $strsql = $strsql . ", peoplecountry='" . $this->_peoplecountry . "'";
        $strsql = $strsql . ", peopleprovstate='" . $this->_peopleprovstate . "'";
        $strsql = $strsql . ", peoplecity='" . $this->_peoplecity . "'";
        $strsql = $strsql . ", peopleaddress1='" . $this->_peopleaddress1 . "'";
        $strsql = $strsql . ", peopleaddress2='" . $this->_peopleaddress2 . "'";  
        $strsql = $strsql . ", peoplepostalcodezip='" . $this->_peoplepostalcodezip . "'";
        $strsql = $strsql . ", peoplephonenumber1='" . $this->_peoplephonenumber1 . "'";
        $strsql = $strsql . ", peopleemailaddress1='" . $this->_peopleemailaddress1 . "'";
        $strsql = $strsql . " where peopleid='" . $row[0] . "'";       
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
 
        
  //      return "aa";
        
        $strsql = "CREATE USER '" . $row[0] . "'@'%'" . " IDENTIFIED BY '" .  $this->_peoplepassword . "'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());

        $strsql = "GRANT SELECT,INSERT,UPDATE,DELETE ON c2cnetworks.* to '" . $row[0] . "'@'%'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
 
        
 //       return "bb";
        
        $strsql = "FLUSH PRIVILEGES;";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        
        
        /// hard code // create 5 default records for the user...
   
        $a = $row[0];
        $b = "a";
        $c = $b . $row[0];       
        $strsqlv = "'" . $a . "'";
        $strsqlv = $strsqlv . ", '" . $b . "'";
        $strsqlv = $strsqlv . ", '" . $c . "'";       
        $strsql = "INSERT INTO c2cnetworks.collectordefaults(peopleid, dcode, did) VALUES(" . $strsqlv . " )";
        
         
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());

    //    return $res;
        
        
        
        
 //       $a = row[0];
        $b = "b";
        $c = $b . $row[0];
        $strsqlv = "'" . $a . "'";
        $strsqlv = $strsqlv . ", '" . $b . "'";
        $strsqlv = $strsqlv . ", '" . $c . "'";
        $strsql = "INSERT INTO c2cnetworks.collectordefaults(peopleid, dcode, did) VALUES(" . $strsqlv . " )";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
     
 //       $a = row[0];
        $b = "c";
        $c = $b . $row[0];
        $strsqlv = "'" . $a . "'";
        $strsqlv = $strsqlv . ", '" . $b . "'";
        $strsqlv = $strsqlv . ", '" . $c . "'";
        $strsql = "INSERT INTO c2cnetworks.collectordefaults(peopleid, dcode, did) VALUES(" . $strsqlv . " )";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        
 //       $a = row[0];
        $b = "d";
        $c = $b . $row[0];
        $strsqlv = "'" . $a . "'";
        $strsqlv = $strsqlv . ", '" . $b . "'";
        $strsqlv = $strsqlv . ", '" . $c . "'";
        $strsql = "INSERT INTO c2cnetworks.collectordefaults(peopleid, dcode, did) VALUES(" . $strsqlv . " )";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
  
 //       $a = row[0];
        $b = "e";
        $c = $b . $row[0];
        $strsqlv = "'" . $a . "'";
        $strsqlv = $strsqlv . ", '" . $b . "'";
        $strsqlv = $strsqlv . ", '" . $c . "'";
        $strsql = "INSERT INTO c2cnetworks.collectordefaults(peopleid, dcode, did) VALUES(" . $strsqlv . " )";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
   //     return $res;
        
        
        
        
        
        
        return $res;
   
    }

    public function changepeoplepassword($newpassword)
    {
        
        $this->_peopleid = $newpassword[0];
        $this->_peoplepassword = $newpassword[1];          
        $strsql = "ALTER USER '" . $this->_peopleid . "'@'%'" . " IDENTIFIED BY '" .  $this->_peoplepassword . "'";
   //     return $strsql;
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        
        
        $strsql = "FLUSH PRIVILEGES;";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }
    
    public function createc2cpeople($people) // old, should be deleted/ retired //// thingy...
    {
        $this->_companyid = $people["companyid"];
        $this->_portfolioid = $people["portfolioid"];
        $this->_peoplefirstname = $people["peoplefirstname"];
        $this->_peoplelastname = $people["peoplelastname"];
        $this->_peopleuserid = $people["peopleuserid"];
        $this->_peoplepassword = $people["peoplepassword"];
        $this->_peopleaccesslevel = $people["peopleaccesslevel"];
        $this->_peopledepartment = $people["peopledepartment"];
        $this->_peopleaddress1 = $people["peopleaddress1"];
        $this->_peopleaddress2 = $people["peopleaddress2"];
        $this->_peoplecity = $people["peoplecity"];
        $this->_peoplepostalcodezip = $people["peoplepostalcodezip"];
        $this->_peoplephonenumber1 = $people["peoplephonenumber1"];
        $this->_peoplephonenumber2 = $people["peoplephonenumber2"];
        $this->_peoplephonenumber3 = $people["peoplephonenumber3"];
        $this->_peopleemailaddress1 = $people["peopleemailaddress1"];
        $this->_peopleemailaddress2 = $people["peopleemailaddress2"];
        
        $strsqlv = "'" . $this->_companyid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_portfolioid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplefirstname . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplelastname . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleuserid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplepassword . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaccesslevel . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopledepartment . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaddress1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaddress2 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplecity . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplepostalcodezip . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplephonenumber1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplephonenumber2 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplephonenumber3 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleemailaddress1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleemailaddress2 . "'";
        
        $strsql = "INSERT INTO c2cnetworks.collector( ";
        $strsql = $strsql . " companyid, portfolioid, peoplefirstname, peoplelastname, peopleuserid, peoplepassword, peopleaccesslevel, peopledepartment, peopleaddress1, peopleaddress2 ";
        $strsql = $strsql . ", peoplecity, peoplepostalcodezip, peoplephonenumber1, peoplephonenumber2, peoplephonenumber3, peopleemailaddress1, peopleemailaddress2 ";
        $strsql = $strsql . " ) VALUES(" . $strsqlv . " )";
        
        // mysqli_query($strsql) or die(mysqli_error());
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }

    public function updatec2cpeople($people)
    {
        $this->_peopleid = $people["peopleid"];
        // $this->_companyid = $people["companyid"];
        // $this->_portfolioid = $people["portfolioid"];
        $this->_peoplefirstname = $people["peoplefirstname"];
        $this->_peoplelastname = $people["peoplelastname"];
        $this->_peopleuserid = $people["peopleuserid"];
        $this->_peoplepassword = $people["peoplepassword"];
        $this->_peopleaccesslevel = $people["peopleaccesslevel"];
        $this->_peopledepartment = $people["peopledepartment"];
        $this->_peopleaddress1 = $people["peopleaddress1"];
        $this->_peopleaddress2 = $people["peopleaddress2"];
        $this->_peoplecity = $people["peoplecity"];
        $this->_peoplepostalcodezip = $people["peoplepostalcodezip"];
        $this->_peoplephonenumber1 = $people["peoplephonenumber1"];
        $this->_peoplephonenumber2 = $people["peoplephonenumber2"];
        $this->_peoplephonenumber3 = $people["peoplephonenumber3"];
        $this->_peopleemailaddress1 = $people["peopleemailaddress1"];
        $this->_peopleemailaddress2 = $people["peopleemailaddress2"];
        
        $strsql = "UPDATE c2cnetworks.collector set";
        $strsql = $strsql . " peoplefirstname='" . $this->_peoplefirstname . "'";
        $strsql = $strsql . ", peoplelastname='" . $this->_peoplelastname . "'";
        $strsql = $strsql . ", peopleuserid='" . $this->_peopleuserid . "'";
        $strsql = $strsql . ", peoplepassword='" . $this->_peoplepassword . "'";
        $strsql = $strsql . ", peopleaccesslevel='" . $this->_peopleaccesslevel . "'";
        $strsql = $strsql . ", peopledepartment='" . $this->_peopledepartment . "'";
        $strsql = $strsql . ", peopleaddress1='" . $this->_peopleaddress1 . "'";
        $strsql = $strsql . ", peopleaddress2='" . $this->_peopleaddress2 . "'";
        $strsql = $strsql . ", peoplecity='" . $this->_peoplecity . "'";
        $strsql = $strsql . ", peoplepostalcodezip='" . $this->_peoplepostalcodezip . "'";
        $strsql = $strsql . ", peoplephonenumber1='" . $this->_peoplephonenumber1 . "'";
        $strsql = $strsql . ", peoplephonenumber2='" . $this->_peoplephonenumber2 . "'";
        $strsql = $strsql . ", peoplephonenumber3='" . $this->_peoplephonenumber3 . "'";
        $strsql = $strsql . ", peopleemailaddress1='" . $this->_peopleemailaddress1 . "'";
        $strsql = $strsql . ", peopleemailaddress2='" . $this->_peopleemailaddress2 . "'";
        $strsql = $strsql . " where peopleid='" . $this->_peopleid . "'";
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }

    public function deletec2cpeople($id)
    {
        $strsql = "DELETE FROM c2cnetworks.collector WHERE peopleid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }

    public function createuserrequest($people)
    {
        
        $this->_peoplefirstname = $people[0];
        $this->_peoplelastname = $people[1];
        $this->_peopleaddress1 = $people[2];
        $this->_peopleaddress2 = $people[3];
        $this->_peopleregion = $people[4];
        $this->_peoplecountry = $people[5];
        $this->_peopleprovstate = $people[6];
        $this->_peoplecity = $people[7];
        $this->_peoplepostalcodezip = $people[8];
        $this->_peoplephonenumber1 = $people[9];
        $this->_peopleemailaddress1 = $people[10];
        $Status = "0";
        
        $strsqlv = "'" . $this->_peoplefirstname . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplelastname . "'";
        $strsqlv = $strsqlv . ", '" . $Status . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaddress1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaddress2 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleregion . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplecountry . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleprovstate . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplecity . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplepostalcodezip . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplephonenumber1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleemailaddress1 . "'";
        
        $strsql = "INSERT INTO c2cnetworks.userrequests( ";
        $strsql = $strsql . " peoplefirstname, peoplelastname, peoplestatus, peopleaddress1, peopleaddress2, peopleregion, peoplecountry, peopleprovstate";
        $strsql = $strsql . ", peoplecity, peoplepostalcodezip, peoplephonenumber1, peopleemailaddress1 ";
        $strsql = $strsql . " ) VALUES(" . $strsqlv . " )";
        
        // mysqli_query($strsql) or die(mysqli_error());
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }
}

class c2cuserrequest extends c2cdb
{

    private $_companyid;

    private $_portfolioid;

    private $_peopleid;

    private $_peoplefirstname;

    private $_peoplelastname;

    private $_peopleuserid;

    private $_peoplepassword;

    private $_peopleaccesslevel;

    private $_peopledepartment;

    private $_peopleaddress1;

    private $_peopleaddress2;

    private $_peoplecity;

    private $_peoplephonenumber1;

    private $_peoplephonenumber2;

    private $_peoplephonenumber3;

    private $_peopleemailaddress1;

    private $_peopleemailaddress2;

    public function createuserrequest($people)
    {
        
      $this->_peoplefirstname = $people[0];
        $this->_peoplelastname = $people[1];
        $this->_peopleaddress1 = $people[2];
        $this->_peopleaddress2 = $people[3];
        $this->_peopleregion = $people[4];
        $this->_peoplecountry = $people[5];
        $this->_peopleprovstate = $people[6];
        $this->_peoplecity = $people[7];
        $this->_peoplepostalcodezip = $people[8];
        $this->_peoplephonenumber1 = $people[9];
        $this->_peopleemailaddress1 = $people[10];
        
        $strsqlv = "'" . $this->_peoplefirstname . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplelastname . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaddress1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleaddress2 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleregion . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplecountry . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleprovstate . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplecity . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplepostalcodezip . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peoplephonenumber1 . "'";
        $strsqlv = $strsqlv . ", '" . $this->_peopleemailaddress1 . "'";
        
        $strsql = "INSERT INTO c2cnetworks.userrequests( ";
        $strsql = $strsql . " peoplefirstname, peoplelastname, peopleaddress1, peopleaddress2, peopleregion, peoplecountry, peopleprovstate";
        $strsql = $strsql . ", peoplecity, peoplepostalcodezip, peoplephonenumber1, peopleemailaddress1 ";
        $strsql = $strsql . " ) VALUES(" . $strsqlv . " )";
        
        // mysqli_query($strsql) or die(mysqli_error());
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }
}

class c2cprovenance extends c2cdb
{

    private $_lppassetid;

    private $_pid;

    private $_nid;

    private $_type;

    private $_changedate;

    public function createc2cprovenancenew($item)
    {
        $this->_lppassetid = $item[1];
        $this->_pid = $item[2];
        $this->_nid = $item[3];
        $this->_type = $item[4];
        $this->_changedate = $item[5];
        
        $strsqlv = "'" . $this->_pid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_nid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_lppassetid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_type . "'";
        $strsqlv = $strsqlv . ", '" . $this->_changedate . "'";
        
        $strsql = "INSERT INTO c2cnetworks.c2cprovenance( ";
        $strsql = $strsql . " prvpeopleid, newpeopleid, lppassetid, type, changedate ";
        $strsql = $strsql . " ) VALUES(" . $strsqlv . " )";
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }
}


class c2cchat extends c2cdb
{
    private $_toid;
    private $_fromid;
    private $_lppassetid;
    private $_subject;
    private $_description;   
    private $_datetime;
    
    public function createc2cchatnew($item)
    {
        $this->_toid = $item[1];
        $this->_fromid = $item[2];
        $this->_lppassetid = $item[3];
        $this->_subject = $item[4];
        $this->_description = $item[5];
        $this->_datetime = $item[6];
        
        $strsqlv = "'" . $this->_toid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_fromid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_lppassetid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_subject . "'";
        $strsqlv = $strsqlv . ", '" . $this->_description . "'";
        $strsqlv = $strsqlv . ", '" . $this->_datetime . "'";
        
        $strsql = "INSERT INTO c2cnetworks.c2cchat( ";
        $strsql = $strsql . " toid, fromid, lppassetid, subject, description, datetime ";
        $strsql = $strsql . " ) VALUES(" . $strsqlv . " )";
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }
}


class c2cbestsell extends c2cdb
{

    private $_sellid;

    private $_lppssetid;

    private $_status;

    private $_price;

    private $_datelisted;

    private $_dateclosed;

    private $_region;

    private $_country;

    private $_federation;

    private $_series;

    private $_seriessubset;

    private $_assetdate;

    private $_denomination;

    private $_reversepic;

    private $_obversepic;

    private $_comments;

    private $_a1name;

    private $_a1grade;

    private $_description;

    private $_sellcomments;

    public function createc2cbestsell($Item)
    {
        $this->_lppssetid = $Item[1];
        $this->_status = $Item[2];
        $this->_price = $Item[3];
        $this->_datelisted = $Item[4];
        $this->_dateclosed = $Item[5];
        
        $this->_region = $Item[6];
        $this->_country = $Item[7];
        $this->_federation = $Item[8];
        $this->_series = $Item[9];
        $this->_seriessubset = $Item[10];
        
        $this->_assetdate = $Item[11];
        $this->_denomination = $Item[12];
        $this->_reversepic = $Item[13];
        $this->_obversepic = $Item[14];
        $this->_comments = $Item[15];
        $this->_a1name = $Item[16];
        $this->_a1grade = $Item[17];
        $this->_description = $Item[18];
        $this->_sellcomments = $Item[19];
        
        $strsqlv = "'" . $this->_lppssetid . "'";
        $strsqlv = $strsqlv . ", '" . $this->_status . "'";
        $strsqlv = $strsqlv . ", '" . $this->_price . "'";
        $strsqlv = $strsqlv . ", '" . $this->_datelisted . "'";
        $strsqlv = $strsqlv . ", '" . $this->_dateclosed . "'";
        
        $strsqlv = $strsqlv . ", '" . $this->_region . "'";
        $strsqlv = $strsqlv . ", '" . $this->_country . "'";
        $strsqlv = $strsqlv . ", '" . $this->_federation . "'";
        $strsqlv = $strsqlv . ", '" . $this->_series . "'";
        $strsqlv = $strsqlv . ", '" . $this->_seriessubset . "'";
        
        $strsqlv = $strsqlv . ", '" . $this->_assetdate . "'";
        $strsqlv = $strsqlv . ", '" . $this->_denomination . "'";
        $strsqlv = $strsqlv . ", '" . $this->_reversepic . "'";
        $strsqlv = $strsqlv . ", '" . $this->_obversepic . "'";
        $strsqlv = $strsqlv . ", '" . $this->_comments . "'";
        
        $strsqlv = $strsqlv . ", '" . $this->_a1name . "'";
        $strsqlv = $strsqlv . ", '" . $this->_a1grade . "'";
        $strsqlv = $strsqlv . ", '" . $this->_description . "'";
        $strsqlv = $strsqlv . ", '" . $this->_sellcomments . "'";
        
        $strsql = "INSERT INTO c2cnetworks.bestsell( ";
        $strsql = $strsql . " lppssetid, status, price, datelisted, dateclosed, region, country, federation,series, seriessubset ";
        $strsql = $strsql . ", assetdate, denomination, reversepic, obversepic,comments, a1name, a1grade, description, sellcomments ";
        $strsql = $strsql . " ) VALUES(" . $strsqlv . " )";
        
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        
        return $res;
    }

    public function deletec2cSell($id)
    {
        $strsql = "DELETE FROM c2cnetworks.bestsell WHERE sellid='$id'";
        $res = mysqli_query($this->_link, $strsql) or die(mysqli_error());
        return $res;
    }
}

?>
