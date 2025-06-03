<?php 
require_once ("DBController.php");

class Leads {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function create_lead($ldate,$uname,$course_name,$subject,$contact,$email,$dob,$medium,$reference,$remark,$branch,$demo,$education)
	{
		
		$subject = implode(',',$subject);
		$status = 'pending';

		$query = "insert into leads(ldate,uname,course_name,subject,contact,email,dob,medium,reference,remark,branch,demo,education,status)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssssssssss";
        $paramValue = array($ldate,$uname,$course_name,$subject,$contact,$email,$dob,$medium,$reference,$remark,$branch,$demo,$education,$status);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        if($insertId)
			{
				echo "<div class='alert alert-success'>Lead Added Successfully !!!</div>";
			}
		else
			{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}

	}

	function edit_lead($ldate,$uname,$course_name,$subject0,$contact,$email,$dob,$medium,$reference,$remark,$branch,$demo,$education,$id)
	{
		
		$subject = implode(',',$subject0);
		echo $query = "update leads SET ldate='?',uname='?',course_name='?',subject='?',contact='?',email='?',dob='?',medium='?',reference='?',remark='?',branch='?',demo='?',education='?' where id = '?' ";
		$paramType = "sssssssssssss";
        $paramValue = array($ldate,$uname,$course_name,$subject,$contact,$email,$dob,$medium,$reference,$remark,$branch,$demo,$education,$id);
       	$insertId = $this->db_handle->update($query, $paramType, $paramValue);
        if(!$insertId)
			{echo "<div class='alert alert-success'>Lead Updated Successfully !!!</div>";}
		else
			{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}

	}

	function register_byuser($uname,$fname,$address,$email,$course,$contact,$status)
	{

		$regdate = date('Y-m-d h:i:s');
		$query = "insert into student(uname,fname,address,email,course,email,contact,status,regdate)VALUES(?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssssss";
        $paramValue = array($udate,$fname,$address,$email,$course,$email,$contact,$status,$regdate);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        if($insertId)
			{
				echo "<div class='alert alert-success'>Registered Successfully !!! <br>Password has been send to your reg email id !!!</div>";
			}
		else
			{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}

	}


	function viewall()
	{
		$query = "select * from leads Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function viewall_dashboard_pending()
    {
		$query = "select * from leads where status = 'pending' Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function viewall_bydate($date)
    {
        
		$query = "select * from leads where idate = '$date' Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function delete($id)
	{
		 $query = "delete from leads where id = '$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}

	function viewone($id)
	{
		$query = "select * from leads where id = '$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function change_status($id,$status)
	{
		$edit = "update leads SET status='$status' where id='$id'";
		$result = $this->db_handle->runSingleQuery($edit);
        return $result;
	}

}
?>
