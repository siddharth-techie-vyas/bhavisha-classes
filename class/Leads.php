<?php 
require_once ("DBController.php");

class Leads {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function create_lead($ldate,$uname,$course_name,$subject,$school,$xper,$xiiper,$contact,$email,$dob,$medium,$reference,$remark,$branch,$demo)
	{
		
		$subject = implode(',',$subject);

		$status = 'pending';
		$query = "insert into leads(ldate,uname,course_name,subject,school,xper,xiiper,contact,email,dob,medium,reference,remark,status,branch,demo)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $paramType = "ssssssssssssssss";
        $paramValue = array($ldate,$uname,$course_name,$subject,$school,$xper,$xiiper,$contact,$email,$dob,$medium,$reference,$remark,$status,$branch,$demo);
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        if($insertId)
			{
				echo "<div class='alert alert-success'>Lead Added Successfully !!!</div>";
			}
		else
			{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}

	}

	function edit_lead($ldate,$uname,$course_name,$subject,$school,$xper,$xiiper,$contact,$email,$dob,$medium,$reference,$remark,$branch,$demo,$id)
	{
		
		 $subject = implode(',',$subject);
		$query = "update leads SET ldate='$ldate',uname='$uname',course_name='$course_name',subject='$subject',school='$school',xper='$xper',xiiper='$xiiper',contact='$contact',email='$email',dob='$dob',medium='$medium',reference='$reference',remark='$remark',branch='$branch',demo='$demo' where id = '$id' ";
       $insertId = $this->db_handle->runSingleQuery($query);
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
