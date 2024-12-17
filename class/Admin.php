<?php 
require_once ("DBController.php");

class Admin {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function get_session_year()
    {
    	$query="select * from session Order by syear DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
    function get_session_id($year)
    {
        $query="select * from session where syear='$year' Order by syear DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_session_year_one($id)
    {
    	$query="select * from session where id = '$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    

    function create_user($uname,$upass,$utype,$email,$contact,$branch)
	{
		
		$query = "insert into tbluser(uname,upass,utype,email,phone,branchid)VALUES(?,?,?,?,?,?)";
        $paramType = "ssssss";
        $paramValue = array($uname,$upass,$utype,$email,$contact,$branch);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
    	return $insertId;    
    }

    function get_maxid()
    {
    	$query="select MAX(id) as id from tbluser";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

	function edit_user($uname,$upass,$utype,$email,$contact,$branch,$id)
	{
	    
	    	
		$query = "Update tbluser SET uname='$uname',upass='$upass',utype='$utype',email='$email',phone='$contact',branchid='$branch' where id='$id' ";
        $result = $this->db_handle->runSingleQuery($query);
        return $result;	
	}

	function delete_user($id)
	{
		$query="delete from tbluser where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;	
	}

	function get_alluser()
	{
		$query="select * from tbluser";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function get_alluser_ofc()
	{
		$query="select * from tbluser where utype != '3' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}


	function getone_user($id)
	{
		$query="select * from tbluser where id = $id";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function getonetype_user($utype)
	{
		$query="select * from tbluser where utype = $utype Order by uname DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;	
	}

	//================META DATA
	function create_meta_data($data_name,$data1,$data2,$type,$company)
	{
		$query = "insert into meta_data(data_name,data1,data2,meta_type,company)VALUES(?,?,?,?,?)";
        $paramType = "sssss";
        $paramValue = array($data_name,$data1,$data2,$type,$company);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	}

	function getall_meta_data()
	{
		$query="select * from meta_data ORDER BY id desc";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function getonetype_meta_data($name)
	{
		$query="select * from meta_data where meta_name='$name' ORDER BY id ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function getone_meta_data($name,$id)
	{
		$query="select * from meta_data where meta_name='$name' AND meta_value2 = '$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function edit_meta_data($id,$data1,$data2)
	{
		$query = "Update meta_data SET meta_value1=?,meta_value2=? where id=? ";
        $paramType = "iss";
        $paramValue = array($id,$data1,$data2);
        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
	}



	function delete_meta_data($id)
	{
		$query="delete from meta_data where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;	
	}

	function get_meta_data_offers($x)
	{
		$query="select * from meta_data where type='offers' AND data1 <= '$x' Order by abs(data1 - $x) limit 1 ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function get_all_type_meta_type()
	{
		$query="select * from meta_data Group by meta_name ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;		
	}


//----------- branches
	function create_branch($name,$address,$contact)
	{
		$chk = "select * from branch where branch_name = '$name'";
		$result = $this->db_handle->runSingleQuery($chk);
		
		if(count($result) > 0)
		{
			echo "<div class='alert alert-info'>Course is already added !!!</div>";
			return false;
		}
		else
		{
		$query = "insert into branch(branch_name,address,contact)VALUES(?,?,?)";
        $paramType = "sss";
        $paramValue = array($name,$address,$contact);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    	}
	}

	function get_allbranch()
	{
		$query="select * from branch ORDER BY id ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function get_branch_classes($id,$tblname)
	{
		$query="select * from $tblname where branchid='$id' AND start_date >= CURRENT_DATE AND demo='1' ORDER  BY id ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function get_branch_one($id)
	{
		$query="select * from branch where id='$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}


	function get_branch_all()
	{
		$query="select * from branch Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function delete_branch($id)
	{
		$query = "delete from branch where id = '$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}

	function branch_addroom($room,$nuseat,$branchid)
	{
		$query = "insert into branch_room(room,nu_seats,branchid)VALUES(?,?,?)";
        $paramType = "sss";
        $paramValue = array($room,$nuseat,$branchid);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
	}

	function branch_getrooms($branchid)
	{
		$query="select * from branch_room where branchid='$branchid'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function delete_room($id)
	{
		$query="delete from branch_room where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;	
	}	


	function edit_room($id,$nu)
	{
		$query = "Update branch_room SET nu_seats=? where id=? ";
        $paramType = "ss";
        $paramValue = array($nu,$id);
        $insertId = $this->db_handle->update($query, $paramType, $paramValue);
        return $insertId;
	}
	
	function get_student_count_per_batch()
	{
	    $query="SELECT COUNT(id) AS count,batchid FROM `student` WHERE syear='".$_SESSION['syear']."' GROUP by batchid";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

    //-------- holidays
    function add_holiday($date,$holiday)
    {
        $query = "insert into holidays(holiday_date,holiday)VALUES(?,?)";
        $paramType = "ss";
        $paramValue = array($date,$holiday);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;        
    }
    function delete_holiday($id)
    {
        $query="delete from holidays where id='$id' ";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;	
    }
    function get_holiday_this_month($month)
    {
        $query="select * from holidays where holiday_date LIKE '$month%'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }
    
    function upload_files($pic)
	{
		$a=$pic;
		$filename = $a['name'];
		$tempname = $a["tmp_name"];
		

        //-- rename file
        $temp = explode(".", $filename);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $folder = "./theme/images/". $newfilename;
    
		if (move_uploaded_file($tempname, $folder)) {
			return $newfilename;
		} else {
			return 0;
		}
	}
}

