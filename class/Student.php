<?php 
require_once ("DBController.php");
require_once ("Admin.php");

class Student {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
        $this->admin = new Admin();
    }

    function create_student($uname,$fname,$mname,$focc,$mocc,$address,$email,$contact,$fcontact,$mcontact,$course,$course2,$subject,$subject2,$status,$school,$xper,$xiiper,$reference,$dob,$medium,$jdate,$branch,$democlass,$batchid,$batchid2,$syear,$grace_period)
	{
	   $subject = implode(',',$subject);
	   $subject2 = implode(',',$subject2);

	   
		 echo $query = "insert into student(uname,fname,mname,focc,mocc,address,email,contact,fcontact,mcontact,course,course2,subject,subject2,status,school,xper,xiiper,reference,dob,medium,jdate,branch,democlass,batchid,batchid2,syear,grace_period)VALUES('$uname','$fname','$mname','$focc','$mocc','$address','$email','$contact','$fcontact','$mcontact','$course','$course2','$subject','$subject2','$status','$school','$xper','$xiiper','$reference','$dob','$medium','$jdate','$branch','$democlass','$batchid','$batchid2','$syear','$grace_period')";
        $insertId = $this->db_handle->runSingleQuery($query);
        
        if(!$insertId)
	 				{ 
	 					// change status of lead to demo
	 					if(isset($_GET['leadid']))
	 					{$status_changed = $leads->change_status($_GET['leadid'],'demo');}

	 					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_proceedsuccess&leadid=".$_GET['leadid']."&status=success';</script>";
	 					//echo "<div class='alert alert-success'>Student Added Successfully !!!</div>";
	 				}
	 				else
	 				{ //echo "<script>window.location.href=".$base_url."index.php?action=dashboard&page=lead_proceedsuccess&leadid=".$_GET['leadid']."&status=failed';</script>";
	 				
	 				    echo "<div class='alert alert-danger'>Something went wrong !!!</div>";
	 				}
	 				
	 				
        //return $insertId;
	}


    function edit_student($uname,$fname,$mname,$focc,$mocc,$address,$email,$contact,$fcontact,$mcontact,$course,$course2,$subject,$subject2,$status,$school,$xper,$xiiper,$reference,$dob,$medium,$jdate,$branch,$democlass,$batchid,$batchid2,$syear,$grace_period,$id)
	{
		$subject = implode(',',$subject);
		$subject2 = implode(',',$subject2);

		$query = "update student SET uname='$uname',fname='$fname',mname='$mname',focc='$focc',mocc='$mocc',address='$address',email='$email',contact='$contact',course='$course',subject='$subject',status='$status',school='$school',xper='$xper',xiiper='$xiiper',reference='$reference',dob='$dob',medium='$medium',jdate='$jdate',branch='$branch',democlass='$democlass',batchid='$batchid',syear='$syear',grace_period='$grace_period',fcontact='$fcontact',mcontact='$mcontact',course2='$course2',subject2='$subject2',batchid2='$batchid2' where id='$id'";
        $result = $this->db_handle->runSingleQuery($query);
        return $result;

	}

	function ex_student_add($uname,$fname,$mname,$focc,$mocc,$address,$email,$contact,$fcontact,$mcontact,$course,$course2,$subject,$subject2,$status,$school,$xper,$xiiper,$reference,$dob,$medium,$jdate,$branch,$democlass,$batchid,$batchid2,$syear,$grace_period,$id,$ex_student)
	{
		$subject = implode(',',$subject);
		$subject2 = implode(',',$subject2);

		//--- maintain records from previous adminssion / enrollment
		$stu=$this->get_one_student($id);

		//--- save to exstudent tables
		$query0 = "insert into ex_student(sid,course,subject,batchid,course2,subject2,batchid2,doj)Values('".$stu[0]['id']."','".$stu[0]['course']."','".$stu[0]['subject']."','".$stu[0]['batchid']."','".$stu[0]['course2']."','".$stu[0]['subject2']."','".$stu[0]['batchid2']."','".$stu[0]['jdate']."')";
		$result0 = $this->db_handle->runSingleQuery($query0);

		$query = "update student SET uname='$uname',fname='$fname',mname='$mname',focc='$focc',mocc='$mocc',address='$address',email='$email',contact='$contact',course='$course',subject='$subject',status='$status',school='$school',xper='$xper',xiiper='$xiiper',reference='$reference',dob='$dob',medium='$medium',jdate='$jdate',branch='$branch',democlass='$democlass',batchid='$batchid',syear='$syear',grace_period='$grace_period',fcontact='$fcontact',mcontact='$mcontact',course2='$course2',subject2='$subject2',batchid2='$batchid2',ex_student='$ex_student' where id='$id'";
        $result = $this->db_handle->runSingleQuery($query);
        return $result;

	}

	

	function check_availability($email,$contact)
	{
		//$query="select * from student where  email='$email' OR contact='$contact' ";
		$query="select * from student where  contact='$contact' ";
		$result = $this->db_handle->runBaseQuery($query);
		$result = COUNT($result);
        return $result;
	}

	function viewall($syear,$branch)
	{
		 $query = "select * from student where syear = '$syear' AND branch='$branch' Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function view_exstudent($syear)
	{
		//$query = "select * from student where syear < '$syear'  Order by id DESC";
		$query = "select * from student Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function update_one($id,$clm,$clmdata)
	{
		$query = "update student SET $clm = $clmdata where id ='$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}

	function get_one_student($id)
	{
		$query = "select * from student where id ='$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	
	
	function default_fee_add($type,$amt,$stu_id,$syear,$branch,$date_time)
	{
	    $query = "insert into accounts(stu_id,amt,syear,branchid,amt_type,date_time) Values ('$stu_id','$amt','$syear','$branch','$type','$date_time')";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}

    function get_class_student($class_id)
    {
        //$query = "insert into accounts(stu_id,amt,syear,branchid,amt_type,date_time) Values ('$stu_id','$amt','$syear','$branch','$type','$date_time')";
        $query = "select * from class_schedule where id ='$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
    }

	function get_birthdays($month,$session)
	{
		$query = "select * from student where dob LIKE '%".$month."%' AND syear='".$session."' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function allot_batch($course,$batch,$session,$stu_id)
	{
		$query = "update student SET batchid='$batch' where id = '$stu_id' AND syear='$session' ";
		$result = $this->db_handle->runSingleQuery($query);
        echo "<i class='fa fa-check'></i> Updated";
	}

	function allot_batch2($course,$batch,$session,$stu_id)
	{
		if(!empty($course))
		{  $query = "update student SET batchid2='$batch', course2='$course' where id = '$stu_id' AND syear='$session' "; }
		else
		{  $query = "update student SET batchid2='$batch' where id = '$stu_id' AND syear='$session' "; }


		$result = $this->db_handle->runSingleQuery($query);
        echo "<i class='fa fa-check'></i> Updated";
	}

	function attendece_month($sid,$month,$classid)
	{
		$date=date('Y');
		$monthNum  = date($month);
		// $d=cal_days_in_month(CAL_GREGORIAN,$monthNum,date('Y'));
		// $at=array();
		// for($i=1; $i<=$d; $i++)
    	// {
		// 	$mdate=$date.'-'.$monthNum.'-'.$i;
		// 	$attd="select * from student_attendence where stu_ids LIKE '%$sid%' AND date_time LIKE '$mdate%' AND classid='$classid' ";
		// 	$result = $this->db_handle->runSingleQuery($attad);
		// 	if(COUNT($result)>0){array_push($at,'P');}
		// 	else{array_push($at,'A');}
		// }

            $i=cal_days_in_month(CAL_GREGORIAN,$monthNum,$date);
            $day_present=array();
			$mdate=$date.'-'.$monthNum;
			$attd="select * from student_attendence where date_time LIKE '$mdate%' AND classid='$classid' ORDER BY date_time ASC";
			$result = $this->db_handle->runBaseQuery($attd);
			foreach($result as $row=> $value)
			{
			  //-- cross check date and $i
			  $date_found= date("d-m-Y", strtotime($result[$row]['date_time']));
			  $day= date('d', strtotime($date_found));
			    
			  		$stu_ids=$result[$row]['stu_ids'];
    				$stus = explode(',',$stu_ids);
    				if (in_array($sid, $stus)) 
    				{
    				    array_push($day_present,$day);
    				}
    				else{array_push($day_present,'N');}
			  
				
			}
		
		
		    //-- get holiday in this month
        	$hmonth=date('Y-m');
        	$holiday_month=$this->admin->get_holiday_this_month($hmonth);
        	$harray=array();
        	foreach($holiday_month as $h=>$v)
        	{
        	    $timestamp = strtotime($holiday_month[$h]['holiday_date']);
                $day = date('d', $timestamp);
        	    array_push($harray,$day);    
        	}
        	
			
			for($j=1;$j<=$i;$j++)
			{
			    //-- check array holiday
			    if(in_array($j, $harray))
			    {$color="bg-danger";}else{$color='';}
			    //-- check for sunday
			    $sunday = strtotime($hmonth.'-'.$j);
                $sunday = date("l", $sunday);
                $sunday = strtolower($sunday);
                if($sunday == "sunday" ){$color='bg-info';}
        
			    echo "<td class='".$color."'>";
			    //-- check status in array
			    if (in_array($j, $day_present)) 
    				{echo "<i class='fa fa-check-circle text-success fa-2x'></i>";}
    			else
    			{echo "<i class='fa fa-times text-danger'></i>";}
			    echo "</td>";
			}
			

	//	return $at;
	}
	
	function delete($id)
	{
	    
	    $query = "delete from student where id='$id'";
		$result = $this->db_handle->runBaseQuery($query);
        
	}
	
	function get_student_as_primary($batchid)
	{
	    $query = "select * from student where batchid='$batchid'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function get_student_as_secondary($batchid)
	{
	    $query = "select * from student where batchid2='$batchid'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
}	
?>
