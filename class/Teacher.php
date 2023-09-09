<?php 
require_once ("DBController.php");

class Teacher {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function get_all_classes($syear,$branchid)
    {
        $query="select * from class_schedule where branchid='$branchid' AND syear='$syear' Order by id DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_all_classes_branch($branchid,$syear)
    {
        $query="select * from class_schedule where branchid='$branchid' AND syear='$syear' Order by id DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_all_classes_schedule()
    {
        $query="select * from class_schedule Order by timing DESC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_one_class($id)
    {
       $query="select * from class_schedule where id = '$id' ";
       $result = $this->db_handle->runBaseQuery($query);
        return $result; 
    }

    function get_one_batch($id)
    {
        $query="select * from batch where id = '$id' ";
       $result = $this->db_handle->runBaseQuery($query);
       return $result; 
    }

    function create_batch($branch,$course,$batch_name,$start_date,$syear)
    {
       $select = "select * from batch where session='$syear' AND start_date='$start_date' AND branch='$branch' AND course='$course' AND batch_name='$batch_name' ";
       $result = $this->db_handle->runBaseQuery($select);
       if(count($result)>0)
       {
        echo "<div class='alert alert-danger'>Combination of batch information is already available. Please edit the details</div>";
        exit();
       } 
       else
       { 
           $query = "insert into batch(branch,course,batch_name,start_date,session)Values('$branch','$course','$batch_name','$start_date','$syear')";
            $paramType = "iissi";
            $paramValue = array($branch,$course,$batch_name,$start_date,$syear);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertId;
        }    
    }

    function edit_batch($branch,$course,$batch_name,$start_date,$syear,$id)
    {
       
       $query = "update batch SET branch='$branch',course='$course',batch_name='$batch_name',start_date='$start_date',session='$syear' where id = '$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return   $result;
          
    }

    function create_class($syear,$branch,$batch,$course,$subject,$days,$teacher,$start_date,$timing,$duration)
    {
        $days = implode(',',$days);

        $select = "select * from class_schedule where batchid='$batch' AND branchid='$branch' AND teacherid='$teacher' AND timing='$timing' AND day IN ($days)";
            $result = $this->db_handle->runBaseQuery($select);

            //--- checking scheduled time 
        if(count($result)>0)
        { return false;}   
        else
        {    
            $query = "insert into class_schedule(syear,branchid,batchid,courseid,subjectid,day,teacherid,start_date,timing,duration)VALUES(?,?,?,?,?,?,?,?,?,?)";
            $paramType = "iiiiisisss";
            $paramValue = array($syear,$branch,$batch,$course,$subject,$days,$teacher,$start_date,$timing,$duration);
            $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
            return $insertId;
        }   
    }

    function edit_class($course,$subject,$days,$teacher,$start_date,$timing,$duration,$branchid,$id)
    {
        $days = implode(',',$days);

            $query = "update class_schedule SET courseid='$course',subjectid='$subject',day='$days',teacherid='$teacher',start_date='$start_date',timing='$timing',duration='$duration',branchid='$branchid' where id='$id' ";
            $paramType = "iisisssii";
            $paramValue = array($course,$subject,$days,$teacher,$start_date,$timing,$duration,$branchid,$id);
            $insertId = $this->db_handle->update($query, $paramType, $paramValue);
            return $insertId;
           
    }

    function delete_class($id)
    {
        $query="delete from class_schedule where id='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }


    function delete_batch($id)
    {
        $query="delete from batch where id='$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }


    function get_holidays()
    {
        $query="select * from holidays ORDER by holiday_date ASC ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_holidays_range($from,$to)
    {
        $query="SELECT * FROM `holidays` WHERE holiday_date BETWEEN '$from' AND '$to'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }   

    function get_all_batches($syear,$branch)
    {
        $query="select * from batch where branch='$branch' AND session='$syear' ORDER by id DESC ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    } 

    function get_student_count_in_batch($batchid)
    {
         $query="select COUNT(id) AS stu_count  from student where batchid = '$batchid' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_student_count_in_batch2($batchid)
    {
         $query="select COUNT(id) AS stu_count  from student where batchid2 = '$batchid' ";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_batch_details($id)
    {
        $query="select * from batch where id ='$id'";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_list_class($branchid,$teacher,$duration)
    {
        $query="select * from class_schedule where branchid ='$branchid' OR teacherid='$teacherid' OR duration='$duration' Order by timing";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
    function get_list_by_teacher_id($branchid,$teacherid)
    {
        $query="select * from class_schedule where branchid ='$branchid' AND teacherid='$teacherid' Order by timing";
        if($_SESSION['uid']=='1')
        {
            $query="select * from class_schedule where branchid ='$branchid' Order by timing";    
        }
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

    function get_all_branch_batches($branchid)
    {
        $query="select * from batch where branch ='".$branchid."' AND session='".$_SESSION['syear']."' ";
        $result = $this->db_handle->runBaseQuery($query);
        if(count($result)>0)
            {   
                echo "<option value='0'>-- Select --</option>";
                foreach($result as $k => $value)
                {echo "<option value='".$result[$k]['id']."'>".$result[$k]['batch_name']."</option>";}
            }
            else
            {
                echo "<option value='0'>No Data Found</option>"; 
            }   
    }

    function get_student_fee_list($branchid,$batchid,$student_name,$id)
    {
        
        $query_array=array("branch"=>$branchid,"batchid"=>$batchid,"id"=>$id);
        $query_array=array_filter($query_array);
        $data=array_filter($query_array);
       
        $output = implode(', ', array_map(
            function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
            $data,
            array_keys($data)
        ));
        
        $output = str_replace(","," AND ",$output);
        
        $query="select * from student where $output ";
        if(!empty($student_name))
        {$query="select * from student where $output AND uname LIKE '%$student_name%' ";}
        if(!empty($student_name) || empty($output))
        { $query="select * from student where uname LIKE '%$student_name%' ";}    
       
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }
    
    function get_class_student($id)
    {
        $query="select * from class_schedule where id = '$id' ";
        $result = $this->db_handle->runBaseQuery($query);
        //-- get student
        $query="select * from student where syear = '".$_SESSION['syear']."' AND '".$result[0]['batchid']."' IN (batchid, batchid2) ORDER BY uname ASC";
        $result = $this->db_handle->runBaseQuery($query);
        return $result;

    }

    function student_attendence($ids,$batch,$teacherid,$subjectid,$classid,$chapterid,$topicid,$remark)
    {
        $date = date('Y-m-d h:i:s');
        $date_now = date('Y-m-d');
        //-- check by date if already added
        $query0="select * from student_attendence where teacherid='$teacherid' AND subjectid='$subjectid' AND batch='$batch' AND date_time LIKE '%$date_now%' AND classid='$classid' ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        
        if(count($result0)<1)
				{
                    
                    echo $query="insert into student_attendence(stu_ids,batch,session,added_by,date_time,teacherid,subjectid,classid,chapterid,topicid,remark)Values('$ids','$batch','".$_SESSION['syear']."','".$_SESSION['uid']."','$date','$teacherid','$subjectid','$classid','$chapterid','$topicid','$remark')";
                    $result = $this->db_handle->runSingleQuery($query);
                    
					echo "<div class='alert alert-success'>Attendence Saved Successfully</div>";
				}
				else
				{
				    $query="update student_attendence SET stu_ids='$ids',batch='$batch',session='".$_SESSION['syear']."',added_by='".$_SESSION['uid']."',date_time='$date',teacherid='$teacherid',subjectid='$subjectid',chapterid='$chapterid',topicid='$topicid',remark='$remark' where id='".$result0[0]['id']."' ";
				    $result = $this->db_handle->runSingleQuery($query);
				    echo "<div class='alert alert-info'>Attendence Updated Successfully !!!</div>";
				}
    }
    
    function check_attendence($batchid,$subjectid,$teacherid,$stuid,$classid)
    {
        $date_now = date('Y-m-d');
        //-- check by date if already added
        $query0="select * from student_attendence where teacherid='$teacherid' AND subjectid='$subjectid' AND batch='$batchid' AND date_time LIKE '%$date_now%' AND find_in_set('$stuid',stu_ids) AND classid='$classid'  ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        return $result0;
    }
    
    function get_attendence_details($class_id)
    {
        $date_now = date('Y-m-d');
        //-- check by date if already added
        $query0="select * from student_attendence where classid='$class_id' AND date_time LIKE '%$date_now%' ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        return $result0;
    }
    
    function get_attendence_class_byid($classid)
    {
        $query0="select * from student_attendence where classid='$classid'  ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        return $result0;
    }
    
    function get_attendence_class_byteacher_batchid($classid,$teacherid)
    {
        $query0="select * from student_attendence where classid='$classid' AND teacherid='$teacherid' AND session='".$_SESSION['syear']."'  ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        return $result0;
    }
    
    function get_classes_held_on($topicid,$teacherid)
    {
        $query0="select * from student_attendence where teacherid='$teacherid' AND topicid='$topicid' AND session='".$_SESSION['syear']."'  ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        return $result0;
    }
    /*function get_alldata($formno,$name,$fname,$mname,$admissionfor,$status,$mobile,$category,$fdfrom,$fdto,$fdfrom1,$nextfollowup,$dfrom,$dto,$lastinstitute,$gender,$remark,$subjects,$enquiry)
    {
     
        $dataarray=array("formno"=>$formno,"name"=>$name,"fname"=>$fname,"mname"=>$mname,"admissionfor"=>$admissionfor,"status"=>$status,"mobileself"=>$mobile,"category"=>$category,"fdform"=>$fdform,"fdto"=>$fdto,"nectfollowup"=>$fdform1,"nextfollowup"=>$nextfollowup,"edate"=>$dfrom,"edate"=>$dto,"lastschool"=>$lastinstitute,"gender"=>$gender,"remark"=>$remark,"subjects"=>$subjects);
        //print_r($dataarray);
        
        $data=array_filter($dataarray);
       
        $output = implode(', ', array_map(
            function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
            $data,
            array_keys($data)
        ));
        
        $output = str_replace(","," AND ",$output);

        if(empty($output))
        {  $query = "select * from $enquiry  "; }
        else
        { $query = "select * from $enquiry where $output  ";}
        $result=mysqli_query($this->vars, $query);
        return $result;
        
    }*/

    function get_all_student_batch_nonbatch($course,$session)
    {
        $query0="select * from student where syear = '$session' AND course='$course' OR course2='$course2' OR course='' OR course2=''   ";
        $result0 = $this->db_handle->runBaseQuery($query0);
        return $result0;
    }

}    

 