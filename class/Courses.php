
<?php 
require_once ("DBController.php");

class Courses {
    private $db_handle;
   
    function __construct() {
        $this->db_handle = new DBController();
    }

    function create_course($name,$fee)
	{
		$chk = "select * from courses where course_name = '$name'";
		$result = $this->db_handle->runSingleQuery($chk);
		
		if($result)
		{
			echo "<div class='alert alert-info'>Course is already added !!!</div>";
			return false;
		}
		else
		{	
			$query = "insert into courses(course_name,fee)VALUES(?,?)";
	        $paramType = "ss";
	        $paramValue = array($name,$fee);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        if($insertId)
				{
					echo "<div class='alert alert-success'>Course Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
		}

	}

	function create_subject($name,$subject,$fee)
	{
		$chk = "select * from courses where course_name = '$name' AND subject='$subject'";
		$result = $this->db_handle->runBaseQuery($chk);
		
		if($result)
		{
			//return false;
			echo "<div class='alert alert-info'>Subject and course combination is already exist !!!</div>";
			
		}
		else
		{	
			$query = "insert into courses(course_name,subject,fee)VALUES(?,?,?)";
	        $paramType = "ssi";
	        $paramValue = array($name,$subject,$fee);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        if($insertId)
				{
					echo "<div class='alert alert-success'>Subject Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
		}

	}

	function create_chapter($course,$subject,$chapter)
	{
		$chk = "select * from courses where chapter = '$chapter' AND subject='$subject' AND course_name = '$course'";
		$result = $this->db_handle->runSingleQuery($chk);
		
		if(count($result) > 0)
		{
			//return false;
			echo "<div class='alert alert-info'>Combination is already exist !!!</div>";
			return false;
		}
		else
		{	
			$query = "insert into courses(chapter,subject,course_name)VALUES(?,?,?)";
	        $paramType = "sss";
	        $paramValue = array($chapter,$subject,$course);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        if($insertId)
				{
					echo "<div class='alert alert-success'>Chapter Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
		}

	}

	function create_topic($course,$subject,$chapter,$topic,$content,$topic_level)
	{
		$chk = "select * from courses where chapter = '$chapter' AND subject='$subject' AND course_name = '$course' AND topic='$topic";
		$result = $this->db_handle->runSingleQuery($chk);
		
		if(count($result) > 0)
		{
			//return false;
			echo "<div class='alert alert-info'>Combination is already exist !!!</div>";
			return false;
		}
		else
		{	
			$query = "insert into courses(chapter,subject,course_name,topic,content,topic_level)VALUES(?,?,?,?,?,?)";
	        $paramType = "ssssss";
	        $paramValue = array($chapter,$subject,$course,$topic,$content,$topic_level);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        if($insertId)
				{
					echo "<div class='alert alert-success'>Chapter Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
		}

	}

	function create_topic_edit($course,$subject,$chapter,$topic,$content,$topic_level,$id)
	{

			$query = "update courses SET chapter='$chapter',subject='$subject',course_name='$course',topic='$topic',content='$content',topic_level='$topic_level' where id='$id' ";
	        $insertId =  $this->db_handle->runSingleQuery($query);
        
	        		echo "<div class='alert alert-success'>Topic Updated Successfully !!!</div>";
			
	}


	function create_assessment($name,$subject,$chapter,$assessment,$test)
	{
		/*$chk = "select * from courses where course_name = '$name' AND subject='$subject' AND chapter='$chapter' AND assessment='$assessment'";
		$result = $this->db_handle->runSingleQuery($chk);
		
		if(count($result) > 0)
		{
			//return false;
			echo "<div class='alert alert-info'>Combination is already exist !!!</div>";
			return false;
		}
		else
		{*/	
			
			$query = "insert into courses(course_name,subject,chapter,assessment,test)VALUES(?,?,?,?,?)";
	        $paramType = "ssssi";
	        
	        $paramValue = array($name,implode(',',$subject),implode(',',$chapter),$assessment,$test);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        if($insertId)
				{
					echo "<div class='alert alert-success'>Assessment / Test Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
		//}

	}


	function viewall()
	{
		$query = "select * from courses where course_name NOT REGEXP '^[0-9]+$' Order by sort ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function viewall_subject()
	{
		$query = "select * from courses where concat('',subject * 1) != subject AND subject !='' Order by sort ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function viewall_chapter()
	{
		$query = "select * from courses where abs(chapter) = 0 Order by sort ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function viewall_topic()
	{
		$query = "select * from courses where topic != '0' AND topic != '' Order by sort ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function viewall_topic_single_chapter($chapter)
	{
		$query = "select * from courses where chapter='$chapter' AND !topic > 0 ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function viewall_chapter_single_subject($subject)
    {
		$query = "select * from courses where subject='$subject' AND !chapter > 0 ";
		//$query = "select * from courses where subject='$subject'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function viewall_assessment($test)
	{
		$query = "select * from courses where assessment != '0' AND assessment != '' AND test='$test'  Order by sort ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function viewall_questions($tid,$qtype)
	{
		$query = "select * from questions where topic = '$tid' and qtype='$qtype' Order by id DESC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function viewall_questions_notes($tid,$qtype)
	{
		$query = "select * from questions where topic = '$tid' and qtype='$qtype' and qused IN (2,3) Order by sort ASC";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}
	
	function viewone_course($id)
	{
		$query = "select * from courses where id= '$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function delete($id)
	{
		$query = "delete from courses where id = '$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}

	function question_delete($id)
	{
		$query = "delete from questions where id = '$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;
	}

	function get_one($id,$type)
	{
		$query = "select * from courses where $type = '$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function get_nonmnumeric_only($id,$search_filed,$req_filed)
	{
		$query = "select * from courses where $search_filed = '$id' AND $req_filed REGEXP '[a-zA-Z]' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}


	function get_details($column,$id)
	{
		$id = implode("', '", $id);
		$query = "select * from courses where $column IN ('$id') AND $column !='' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function get_rand_question($id)
	{
		
		$query = "select * from courses where id = '$id'";
		$result = $this->db_handle->runBaseQuery($query);
		$subject = $result[0]['chapter'];

		//-- get chapter
		$chapter = "select * from courses where chapter IN ($subject) AND assessment = ''";
		$result0 = $this->db_handle->runBaseQuery($chapter);	
		return $result0;
	}
	function get_question($id)
	{
		
		$splittedNumbers = explode(",", $id);
		$ids = "'" . implode("', '", $splittedNumbers) ."'";
		$query = "select * from questions where topic IN ($ids) Order By qtype";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	//---- questions
	function save_questions($part1,$part2,$opt1,$opt2,$opt3,$opt4,$solution,$topic,$qtype,$level,$explanation,$qused,$marks)
	{
		   $query = "insert into questions(part1,part2,opt1,opt2,opt3,opt4,solution,topic,qtype,level,explanation,qused,marks)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        $paramType = "sssssssssssss";

	        
	        $paramValue = array($part1,$part2,$opt1,$opt2,$opt3,$opt4,$solution,$topic,$qtype,$level,$explanation,$qused,$marks);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        if($insertId)
				{
					echo "<div class='alert alert-success'>Questions Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
	}

	//--- edit question
	function edit_question($part1,$part2,$opt1,$opt2,$opt3,$opt4,$solution,$qtype,$level,$explanation,$qused,$marks,$tid)
	{
		    
		   echo $query = "Update questions SET part1='$part1',part2='$part2',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',solution='$solution', qtype='$qtype',level='$level',explanation='$explanation',qused='$qused',marks='$marks' where id='$tid' ";
	      	$insertId0=$this->db_handle->runSingleQuery($query);
	       if($insertId0)
				{
					echo "<div class='alert alert-success'>Questions Added Successfully !!!</div>";
				}
			else
				{echo "<div class='alert alert-danger'>Something went wrong !!! Please try again !!!</div>";}
	}


	function csv_moq($tid,$part1,$opt1,$opt2,$opt3,$opt4,$solution,$explanation,$level,$qused,$marks,$qtype)
	{
		
		    $query = "insert into questions(topic,part1,opt1,opt2,opt3,opt4,solution,explanation,level,qused,marks,qtype)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
	        $paramType = "ssssssssssss";
	        $paramValue = array($tid,$part1,$opt1,$opt2,$opt3,$opt4,$solution,$explanation,$level,$qused,$marks,$qtype);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        return $insertId;
	}

	function csv_short_long($tid,$part1,$solution,$explanation,$level,$qused,$marks,$qtype)
	{
		
		    $query = "insert into questions(topic,part1,solution,explanation,level,qused,marks,qtype)VALUES(?,?,?,?,?,?,?,?)";
	        $paramType = "ssssssss";
	        $paramValue = array($tid,$part1,$solution,$explanation,$level,$qused,$marks,$qtype);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        return $insertId;
	}

	function csv_fill($tid,$part1,$part2,$solution,$explanation,$level,$qused,$marks,$qtype)
	{
		//echo "insert into questions(tid,part1,part2,solution,explanation,level,qused,marks,qtype)VALUES($tid,$part1,$part2,$solution,$explanation,$level,$qused,$marks,$qtype)";
		    $query = "insert into questions(tid,part1,part2,solution,explanation,level,qused,marks,qtype)VALUES(?,?,?,?,?,?,?,?,?)";
	        $paramType = "sssssssss";
	        $paramValue = array($tid,$part1,$part2,$solution,$explanation,$level,$qused,$marks,$qtype);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        return $insertId;
	}


	//--get topic list from chapter
	function get_topic_assesment($chapter)
	{
		$query = "select * from courses where chapter IN ($chapter) AND topic != '' AND topic != '0' ";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function create_final_assessment($ids,$max_mark,$hours,$minutes,$neg_marks,$asid)
	{
		$date = date('Y-m-d h:i:s');
		$user = $_SESSION['uid'];
		$query = "insert into assessment_pdf(qids,max_marks,hours,minutes,datetime,user,neg_marks,asid)VALUES(?,?,?,?,?,?,?,?)";
	        $paramType = "ssssssss";
	        $paramValue = array($ids,$max_mark,$hours,$minutes,$date,$user,$neg_marks,$asid);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	        return $insertId;
	}

	function edit_course($course,$subject,$fee,$chapter,$topic,$assessment,$id)
	{
			$query = "update courses SET course_name='$course', fee='$fee',subject='$subject',chapter='$chapter',topic='$topic',assessment='$assessment' where id='$id' ";
	        $result = $this->db_handle->runSingleQuery($query);
        	if($query)
 					{echo "<div class='alert alert-success'>Course Edited Successfully !!!</div>";}
 				else
 					{echo "<div class='alert alert-success'>Something Went Wrong, Please try again later !!!</div>";}

	}


	function count_question($topicid)
	{
		$query = "select * from questions where topic = $topicid";
		$result = $this->db_handle->runBaseQuery($query);
		$count = count($result);
		return $count;
	}

	function count_question_frm_chapter($chapterid)
	{
		$chapter = "select * from courses where chapter = '$chapterid' ";
		$result0 = $this->db_handle->runBaseQuery($chapter);

		
		$topic = array();
		foreach ($result0 as $key => $value) {
			 array_push($topic,$result0[$key]['id']);
		}

		 $topic0 = implode(" ,",$topic);


		$query = "select * from questions where topic IN ($topic0)";
		$result = $this->db_handle->runBaseQuery($query);
		$count = count($result);
		return $count;
	}

	function count_question_notes($topicid)
	{
		$query = "select * from questions where topic = $topicid AND qused IN (2,3)";
		$result = $this->db_handle->runBaseQuery($query);
		$count = count($result);
		return $count;
	}

	function get_question_single($id)
	{
		$query = "select * from questions where id = $id";
		$result = $this->db_handle->runBaseQuery($query);
		return $result;
	}

	function get_assessment_details($id)
	{
		$query = "select * from assessment_pdf where asid = $id";
		$result = $this->db_handle->runBaseQuery($query);
		return $result;
	}

	function get_assessment_details_papers($id)
	{
	echo	$query = "select * from assessment_pdf where id = $id";
		$result = $this->db_handle->runBaseQuery($query);
		return $result;
	}
	
	function get_pdf_questions($qids,$qtype)
	{
		$query = "select * from questions where id IN ($qids) AND qtype ='$qtype' ";
		$result = $this->db_handle->runBaseQuery($query);
		return $result;
	}

	function get_assessment_paper($assid)
	{
		$query = "select * from assessment_pdf where asid='$assid' ";
		$result = $this->db_handle->runBaseQuery($query);
		return $result;
	}
	
	function get_list_course($course,$subject,$chapter)
    {
        //if($chapter='--No data found --'){$chapter='';}
        $dataarray=array("course_name"=>$course,"subject "=>$subject,"chapter"=>$chapter);
        
        $data=array_filter($dataarray);
       
        $output = implode(', ', array_map(
            function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
            $data,
            array_keys($data)
        ));
        
        $output = str_replace(","," AND ",$output);

        if(empty($output))
        {  $query = "select * from `courses` GROUP BY subject "; }
        else
        {  $query = "select * from `courses` where $output  GROUP BY subject ";}
        
        $result = $this->db_handle->runBaseQuery($query);
        return $result;
    }

	

	function viewall_handmade_notes()
	{
		if($_SESSION['uid']=='1')
		{
			$query = "select * from handmade_notes Order by id DESC";		
		}
		else
		{
		$query = "select * from handmade_notes where added_by = '".$_SESSION['uid']."' Order by id DESC";
		}
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function create_handmade_notes($course,$subject,$chapter)
	{
		$added_on = date('Y-m-d h:i:s');
		$added_by = $_SESSION['uid'];
		//-- select the duplicacy
		
			$query0 = "select * from handmade_notes where courseid='$course' AND subjectid='$subject' AND chapterid='$chapter' ";
			$result0 = $this->db_handle->runBaseQuery($query0);
			if(count($result0)>0)
			{
				
				echo "<div class='alert alert-info'>Group has been already created on ".$result0[0]['added_on']." !!! Please Create a new one or edit the old group.</div>";
				exit();
			}
			else
			{
		
			$query = "insert into handmade_notes(courseid,subjectid,chapterid,added_on,added_by)VALUES(?,?,?,?,?)";
	        $paramType = "sssss";
	        $paramValue = array($course,$subject,$chapter,$added_on,$added_by);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	       		 if($insertId)
			 	{
				echo "<div class='alert alert-success'>Notes Group added successfully</div>";
				} 
			}
	}

	function get_one_handmade_notes($id)
	{
		$query = "select * from handmade_notes where id='$id'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

	function delete_handmade_notes($delid)
	{
		$query = "select * from handmade_notes_details where tid='$delid'";
		$result = $this->db_handle->runBaseQuery($query);
        if(!empty($result))
		{
			echo "Some Notes exist... Please delete them before delete the group.";
		}
		else
		{
			$query0 = "delete from handmade_notes where id='$delid'";
			$result0 = $this->db_handle->runSingleQuery($query0);

			echo "Group Deleted Successfully !!!";
		}
	}

	function create_handmade_notes_add($hid,$tid,$tcontent)
	{
			$query = "insert into handmade_notes_detail(hid,tid,tcontent)VALUES(?,?,?)";
	        $paramType = "iis";
	        $paramValue = array($hid,$tid,$tcontent);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	       	return $insertId;
	}

	function create_handmade_notes_add_file($hid,$file)
	{
			$query = "insert into handmade_notes_detail(hid,file_upload)VALUES(?,?)";
	        $paramType = "is";
	        $paramValue = array($hid,$file);
	        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
	       	return $insertId;
	}
	function get_one_handmade_notes_content($hid)
	{
		 $query = "select * from handmade_notes_detail where hid='$hid'";
		$result = $this->db_handle->runBaseQuery($query);
        return $result;
	}

    function delete_handmade($id)
    {
        $query = "delete from handmade_notes_details where id = '$id'";
		$result = $this->db_handle->runSingleQuery($query);
        return $result;        
    }

    //function sort_update($id,$sort)
    //{
	//	$result = $this->db_handle->runBaseQuery($query);
		//if($result)
	//	{echo "<i class='fa fa-check'></i> Updated";}
	//	else
	//	{echo "<i class='fa fa-xmark'></i> Something Went Wrong";}
    //}
}
?>
