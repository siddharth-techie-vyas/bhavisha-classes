
<?php

switch ($action) {

				
case "dashboard":
 		if($_GET['action']=='dashboard')
 		{
 			
 			if(isset($_GET['page']))
 				{
 					require_once("web/header.php");
 					require_once("web/top_menu.php");
 					
 					//============================================ OPEN ALL PAGES		
 					if(!file_exists("web/".$_GET['page'].".php"))
 						{require_once("web/404.php");}
 					else
 						{require_once("web/".$_GET['page'].".php");}
 					
 					require_once("web/footer.php");
 				}
 			else
 				{require_once("web/dashboard.php");}
 		}
 		break;

case "nocss_pages":
 		if($_GET['action']=='nocss_pages')
 		{
 			
 			if(isset($_GET['page']))
 				{
 					require_once("web/".$_GET['page'].".php");
 				}
 		}		
 		break; 		

//================= C O M M O N  F U N C T I O N S
case "get_details":
		if($_GET['action']=='get_details')
 		{
 			$column = $_GET['column'];
 			$id = explode(",", $_GET['id']);
 			$input = $_GET['input'];
 			//print_r($id);
 			$get = $course->get_details($column,$id);
 			if(count($get)>0)
 			{	
 			echo "<option value='' disabled='disabled' selected='selected'>-- Select --</option>";	
 			foreach ($get as $key => $value) {
 				$searchForValue=',';
 				if(!is_numeric($get[$key][$input]) && $get[$key][$input]!=NULL && strpos($get[$key][$input], $searchForValue) != true ){
 				echo "<option value=".$get[$key]['id'].">".$get[$key][$input]."</option>";
 					}
 				}
 			}
 			else
 			{
 			echo "<option>--No data found --</option>";	
 			}	
 		}
break;

case "get_batch_details":
		if($_GET['action']=='get_batch_details')
 		{
 			$id = $_GET['id'];
 			$column = $_GET['column'];
 			$result = $teacher->get_batch_details($id,$column);
 			if(count($result)>0)
 			{	
 				echo "<option disabled='' selected=''>--Select Course--</option>";
 			foreach ($result as $key => $value) {
                $cname = $course->get_one($result[$key]['course'],'id'); 
                $cname = $cname[0]['course_name'];
   				echo "<option value='".$result[$key]['course']."'>".$cname."</option>";
        		}
        	}
        	else
        	{
        		echo "<option value='0'>No Subject Found</option>";	
        	}	
 			
 		}
break;


case "get_related_data":
		if($_GET['action']=='get_related_data')
 		{
 			$id = $_GET['id'];
 			$class = $_GET['class'];
 			$function = $_GET['function'];
 			$result = $$class->$function($id);
 			
 			
 		}
break;

//================= G E T RANDOM QUESTIONS 
case "get_rand_question":
		if($_GET['action']=='get_rand_question')
 		{
 			/*$course 	= $_GET['qtype'];
 			$subject = $_GET['tid'];*/
 			$chapter = $_GET['chapter'];
 			
			$asses_id = $_GET['asses_id'];	 			

 			$counter=1;

 			if(isset($_POST['rand_question']))
 			{$get = $course->get_question_rand($chapter,$_GET['level']);}
 			else
 			{$get = $course->get_question($chapter);}	
 			
 			if(count($get)>0)
 			{
 			$counter =1;	
 			echo "<table class='table'>";
 			echo "<tr>";
			echo '<td>
			<input type="hidden" name="asid" value="'.$_GET['asses_id'].'" >
			<input type="hidden" name="posturl" value="'.$base_url.'index.php?action=dashboard&page=course_add_questions_assesment_pdf&id='.$_GET['asses_id'].'" >
			<br><input type="button" onclick="select_all_checkbox()" id="selectall" class="btn btn-primary btn-sm" name="selectall" value="Select All"></td>';
			echo "<td colspan='3'><label>Maximum Marks</label><input type='number' min='0' max='500' class='form-control' id='totalmarks' name='max_marks' required></td>";
			echo "<td><label>Hours</label><input type='number' max='5' min='0'  class='form-control' name='hours' value='0'></td>";
			echo "<td><label>Minutes</label><input type='number' max='60' min='0'  class='form-control' name='minutes' value='0'></td>";
			echo "<td><label>Negative Marks (%) Per Question</label>
				<input type='number' max='50' min='0'  class='form-control' name='neg_marks' value='0'>
				<input type='checkbox' name='neg_mark_mcq' value='1' checked='checked'> MCQ
				<input type='checkbox' name='neg_mark_mcq' value='1'> Fill In The Blanks
				<input type='checkbox' name='neg_mark_mcq' value='1'> Short Question
				<input type='checkbox' name='neg_mark_mcq' value='1'> Long Question
			</td>"; 			
 			echo "</tr>";
 			echo "<tr>";
 			echo "<th>S.No.</th><th>Select</th><th colspan='2'>Question</th><th>Marks</th><th>Type</th><th>Delete</th>";
 			echo "</tr>";
 				foreach($get as $k =>$value)
 				{
 					$qtype = $admin->getone_meta_data('question_type_level',$get[$k]['qtype']);
 					echo "<tr id='".$get[$k]['id']."'>";
 						echo "<td>".$counter++."</td>";
 						echo "<td><input type='checkbox' onclick='get_summarks()' class='qcheck' name='qid[]' value='".$get[$k]['id']."'/></td>";
 						echo "<td>".str_replace('\r\n', '', $get[$k]['part1'])."</td>";
 						echo "<td>".str_replace('\r\n', '', $get[$k]['part2'])."</td>";
 						echo "<td><input type='number' onchange='get_summarks()'  min='0' class='marks' name='marks[]' value='".$get[$k]['marks']."' /></td>";
 						echo "<td>".$qtype[0]['meta_value1']."</td>";
 						echo "<td><button><i class='fa fa-trash' onclick='removetr(".$get[$k]['id'].")' ></i></td>";
 					echo "<tr>";
 				}
 			echo "<tr>";
 				echo "<td colspan='4'><input type='submit' class='btn btn-success' name='submit'  value='Create Assessment and Generate PDF'/></td>";
 				echo "<td colspan='4'><input type='button' class='btn btn-info' name='reset' onclick='location.reload()' value='Cancel & Create New'/></td>";
 			echo "</tr>";	
 			echo "</table>"	;
 			}

 			else
 			{
 			echo "<div class='alert alert-info'>No data found</div>";
	 			if(empty($chapter))
	 			{echo "<div class='alert alert-danger'>Select atleast one chapter !!!</div>";}	
 			}	
 		} 		
break;
//================= C O U R S E
case "course":
		if($_GET['action']=='course')
 		{
 			
 			if($_GET['query']=='create_course')
 			{ $save = $course->create_course($_POST['course_name'],$_POST['fee']); }

 			if($_GET['query']=='create_subject')
 			{ $save = $course->create_subject($_POST['course_name'],$_POST['subject'],$_POST['fee']); }

 			if($_GET['query']=='create_chapter')
 			{ $save = $course->create_chapter($_POST['course_name'],$_POST['subject'],$_POST['chapter']); }

 			if($_GET['query']=='create_topic')
 			{

 				if(isset($_POST['topic_level']))
 				{
 					$level = $_POST['topic_level'];
 				}	
 				else
 				{
 					$level = '0';
 				}
 			 $save = $course->create_topic($_POST['course_name'],$_POST['subject'],$_POST['chapter'],$_POST['topic'],$_POST['content'],$level); 
 			}

 			if($_GET['query']=='create_topic_bulk')
 			{

 				
 					$level = '0';
 					$content = 'NULL';
	 				$topic_array = $_POST['topic'];
	 				for ($i = 0; $i < count($topic_array); $i++) 
								{
									$topic = mysqli_real_escape_string($con, $topic_array[$i]);
									
									//=== save
					 			 $save = $course->create_topic($_POST['course_name'],$_POST['subject'],$_POST['chapter'],$topic,$content,$level); 
						        }	

 			}

			 if($_GET['query']=='create_chapter_bulk')
 			{

 				
 					$level = '0';
 					$content = 'NULL';
	 				$chapter_array = $_POST['chapter'];
	 				for ($i = 0; $i < count($chapter_array); $i++) 
								{
									$chapter = mysqli_real_escape_string($con, $chapter_array[$i]);
									
									//=== save
					 			 $save = $course->create_chapter($_POST['course_name'],$_POST['subject'],$chapter); 
						        }	

 			}

			if($_GET['query']=='create_handmade_notes')
 			{
				if($_POST['course_name'] == '' || $_POST['subject'] == '' || $_POST['chapter'] == '' )
				{
					echo "<div class='alert alert-danger'>All fields are mendetory</div>";
					exit();
				}
 			 $save = $course->create_handmade_notes($_POST['course_name'],$_POST['subject'],$_POST['chapter']); 
			 
			}

			if($_GET['query']=='create_handmade_notes_add')
 			{
				$save = $course->create_handmade_notes_add($_POST['hid'],$_POST['tid'],$_POST['tcontent']); 
				if($save)
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=course_homemade_notes_add&id=".$_POST['hid']."&status=success';</script>";
				}
				else
				{
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=course_homemade_notes_add&id=".$_POST['hid']."&status=danger';</script>";
				}
			}

			if($_GET['query']=='create_handmade_notes_add_file')
 			{
 	    	    $file = $admin->upload_files($_FILES["topic_file"]);
 	    	    
 	    	    if(!empty($file))
			    {   
			        $course->create_handmade_notes_add_file($_POST['tid'],$_POST['hid'],$file);
			        echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=course_homemade_notes_add&id=".$_POST['hid']."&status=success';</script>";
			    }
			    else
			    {	echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=course_homemade_notes_add&id=".$_POST['hid']."&status=danger';</script>";}
			}

			if($_GET['query']=='delete_handmade_notes')
 			{
				$course->delete_handmade_notes($_GET['delid']);
			}

 			if($_GET['query']=='create_topic_edit')
 			{
				
 			 $save = $course->create_topic_edit($_POST['course_name'],$_POST['subject'],$_POST['chapter'],$_POST['topic'],$_POST['content'],$_POST['topic_level'],$_POST['id']); }

 			if($_GET['query']=='create_assessment')
 			{ 
 				 //$chapter = implode(',',$_POST['chapter']);
 				//$subject = implode(',',$_POST['subject']);

 				$save = $course->create_assessment($_POST['course_name'],$_POST['subject'],$_POST['chapter'],$_POST['assessment'],$_POST['test']); }

 			if($_GET['query']=='course_add_questions_assesment')
 			{
 				$topic = $_POST['tid'];
 				$qtype = $_POST['qtype'];
				$part1_array = $_POST['part1'];
				$level_array = $_POST['level'];
				$qused_array = $_POST['qused'];
				$marks_array = $_POST['marks'];
				$explanation_array = $_POST['explanation'];
				if(isset($_POST['part2']))
					{$part2_array = $_POST['part2'];}
				else
					{$part2_array='0';}
 
	
				//------------- option
				if(isset($_POST['opt1']))
					{$opt1_array = $_POST['opt1'];}
				else
					{$opt1_array='0';}
							
				if(isset($_POST['opt2']))
					{$opt2_array = $_POST['opt2'];}
				else
					{$opt2_array='0';}
							
				if(isset($_POST['opt3']))
					{$opt3_array = $_POST['opt3'];}
				else
					{$opt3_array='0';}
							
				if(isset($_POST['opt4']))
					{$opt4_array = $_POST['opt4'];}
				else
					{$opt4_array='0';}
							
	
				$solution_array = $_POST['solution'];
				
				for ($i = 0; $i < count($part1_array); $i++) 
							{
								$part1 = mysqli_real_escape_string($con, $part1_array[$i]);
								$part2 = mysqli_real_escape_string($con, $part2_array[$i]);
								$opt1 = mysqli_real_escape_string($con, $opt1_array[$i]);
								$opt2 = mysqli_real_escape_string($con, $opt2_array[$i]);
								$opt3 = mysqli_real_escape_string($con, $opt3_array[$i]);
								$opt4 = mysqli_real_escape_string($con, $opt4_array[$i]);		
								$solution =mysqli_real_escape_string($con, $solution_array[$i]);
								$topic =mysqli_real_escape_string($con, $topic);
								$qtype =mysqli_real_escape_string($con, $qtype);
								$level =mysqli_real_escape_string($con, $level_array[$i]);
								$qused =mysqli_real_escape_string($con, $qused_array[$i]);
								$explanation =mysqli_real_escape_string($con, $explanation_array[$i]);
								$marks =mysqli_real_escape_string($con, $marks_array[$i]);
								
					        	//=== save
					        	$course->save_questions($part1,$part2,$opt1,$opt2,$opt3,$opt4,$solution,$topic,$qtype,$level,$explanation,$qused,$marks);
					        }	

				echo "<script>window.location.href='".$base_url."/index.php?action=dashboard&page=course_add_questions_assesment&id=".$topic."&status=1';</script>";
 			}

 			//--- edit question
 			if($_GET['query']=='edit_question')
 			{
 				$tid = $_POST['tid'];
 				$qtype = $_POST['qtype'];
				$part1 = $_POST['part1'];
				$level = $_POST['level'];
				$qused = $_POST['qused'];
				$marks = $_POST['marks'];
				$explanation = $_POST['explanation'];
				
				if(isset($_POST['part2']))
					{$part2 = $_POST['part2'];}
				else
					{$part2='0';}

	
				//------------- option
				if(isset($_POST['opt1']))
					{$opt1 = $_POST['opt1'];}
				else
					{$opt1='0';}
							
				if(isset($_POST['opt2']))
					{$opt2 = $_POST['opt2'];}
				else
					{$opt2='0';}
							
				if(isset($_POST['opt3']))
					{$opt3 = $_POST['opt3'];}
				else
					{$opt3='0';}
							
				if(isset($_POST['opt4']))
					{$opt4 = $_POST['opt4'];}
				else
					{$opt4='0';}
							
	
				$solution = $_POST['solution'];

				$course->edit_question($part1,$part2,$opt1,$opt2,$opt3,$opt4,$solution,$qtype,$level,$explanation,$qused,$marks,$tid);
			}	

 			//--- course delete

 			if($_GET['query']=='delete')
 			{
 				$delete = $course->delete($_GET['id']);
 			}

 			//--- question delete

 			if($_GET['query']=='question_delete')
 			{
 				$delete = $course->question_delete($_GET['id']);
 			}

 			//--- save final pdf assessment

 			if($_GET['query']=='create_allquestion_final_pdf')
 			{
 				$qid_array = $_POST['qid'];
 				$qids = array();
 				for ($i = 0; $i < count($qid_array); $i++) 
 				{
 					$qid = mysqli_real_escape_string($con, $qid_array[$i]);
 					 array_push($qids,$qid);
 				}
 				//print_r($qid_array);

 				//print_r($qids);
 				$qd = implode(',', $qids);
 				
 				$save_question = $course->create_final_assessment($qd,$_POST['max_marks'], $_POST['hours'], $_POST['minutes'],$_POST['neg_marks'],$_POST['asid']);
 				
 				if($save_question)
 				{	
	 				$href=$_POST['posturl'];	
					echo ("<script type='text/javascript'>location.href='".$href."&status=success'</script>");
				}	
 			}

 			//--- edit course

 			if($_GET['query']=='edit_course')
 			{
 				$id = $_POST['id'];
 				$course_name = $_POST['course'];
 				if(isset($_POST['subject']))
 					{$subject = $_POST['subject'];}
 				else
 					{$subject = NULL;}

 				if(isset($_POST['fee']))
 					{$fee = $_POST['fee'];}
 				else
 					{$chapter = NULL;}

 				if(isset($_POST['chapter']))
 					{$chapter = $_POST['chapter'];}
 				else
 					{$chapter = NULL;}

 				if(isset($_POST['topic']))
 					{$topic = $_POST['topic'];}
 				else
 					{$topic = NULL;}

 				if(isset($_POST['assessment']))
 					{$assessment = $_POST['assessment'];}
 				else
 					{$assessment = NULL;}

 				/*$chapter = $_POST['chapter'];
 				$topic = $_POST['topic'];
 				$assessment = $_POST['assessment'];*/

 				$edit = $course->edit_course($course_name,$subject,$fee,$chapter,$topic,$assessment,$id);
 				
 			}

 			//--------- csv upload
 			if($_GET['query']=='csvupload_question')
 			{
 				
 				$tid = $_POST['tid'];
 				$qtype = $_POST['qtype'];
 				$fileName = $_FILES["file"]["tmp_name"];
    
			    if ($_FILES["file"]["size"] > 0) 
			    {

			        
			        $file = fopen($fileName, "r");
			        $row=1;
			        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
			            
			                /*$part1 = mysqli_real_escape_string($conn, $column[0]);
			                $opt1 = mysqli_real_escape_string($conn, $column[1]);
			                $opt2 = mysqli_real_escape_string($conn, $column[2]);
			                $opt3 = mysqli_real_escape_string($conn, $column[3]);
			                $opt4 = mysqli_real_escape_string($conn, $column[4]);
			                $solution = mysqli_real_escape_string($conn, $column[5]);
			                $explanation = mysqli_real_escape_string($conn, $column[6]);
			                $level = mysqli_real_escape_string($conn, $column[7]);
			                $qused = mysqli_real_escape_string($conn, $column[8]);
			            */

			            //print_r ($column);
			           
			            if($qtype=='2')
			            {$insertId=$course->csv_moq($tid,$column[0],$column[1],$column[2],$column[3],$column[4],$column[5],$column[6],$column[7],$column[8],$column[8],$qtype);}
			        	elseif($qtype=='3' || $qtype=='4')
			        	{$insertId=$course->csv_short_long($tid,$column[0],$column[1],$column[2],$column[3],$column[4],$column[5],$qtype);}
			        	elseif($qtype=='1')
			        	{$insertId=$course->csv_fill($tid,$column[0],$column[1],$column[2],$column[3],$column[4],$column[5],$column[6],$qtype);}
			        	else{}		


			            
			            if (! empty($insertId)) {
			                $type = "success";
			                $message = "CSV Data Imported into the Database from row ".$row;
			            } else {
			                $type = "danger";
			                $message = "Problem in Importing CSV Data";
			            }
			            //echo $message.'<br>';
			            $row++;
		 			}
		 		}
		 		$url = $_POST['url']."&type=".$type;
		 		//echo "<script>location.href='".$url."'</script>";
 			}
 			
 			//--- delete hand made notes 
 			if($_GET['query']=='delete_handmade_detail_one')
 			{ $course->delete_handmade_detail_one($_GET['id']);}


 			//--- sort courses
 			// if($_GET['query']='sort_set')
 			// {
 			//    // $sort_update = $course->sort_update($_POST['id'],$_POST['sort']);
 			// }
 			
 			
 }		
break;
//================= L E A D S
case "lead":
		if($_GET['action']=='lead')
 		{
 			
 			if($_GET['query']=='create_leads')
 			{ 
				
				$class_array = $_POST['class'];
				$subject_array = $_POST['subject'];
				$min_array = $_POST['min_marks'];
				$max_array = $_POST['max_marks'];
				$school_array = $_POST['school'];
				//$file_array = $_FILES['marksheet'];

				$education_array=array();
				for ($i = 0; $i < count($class_array); $i++) 
							{
								$education0=array("class"=>$class_array[$i],"subject"=>$subject_array[$i],"min_marks"=>$min_array[$i],"max_marks"=>$max_array[$i],"school"=>$school_array[$i]);								
								array_push($education_array,$education0);
					        }	
				$education = json_encode($education_array);
				$save = $leads->create_lead($_POST['ldate'],$_POST['uname'],$_POST['course_name'],$_POST['subject'],$_POST['contact'],$_POST['email'],$_POST['dob'],$_POST['medium'],$_POST['reference'],$_POST['remark'],$_POST['branch'],$_POST['demo'],$education); 
			echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_addnew&status=success';</script>";
			}

 			if($_GET['query']=='edit_leads')
 			{ $save = $leads->edit_lead($_POST['ldate'],$_POST['uname'],$_POST['course_name'],$_POST['subject'],$_POST['school'],$_POST['xper'],$_POST['xiiper'],$_POST['contact'],$_POST['email'],$_POST['dob'],$_POST['medium'],$_POST['reference'],$_POST['remark'],$_POST['branch'],$_POST['demo'],$_POST['id']); }

 			if($_GET['query']=='change_status')
 			{
 				$status = $leads->change_status($_GET['id'],$_GET['status']);
 				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_viewall&status=success';</script>";
 					
 			}

			if($_GET['query']=='register_byuser')
 			{ $save = $leads->register_byuser($_POST['udate'],$_POST['fname'],$_POST['address'],$_POST['email'],$_POST['course'],$_POST['email'],$_POST['contact'],$_POST['status']); }


 			if($_GET['query']=='delete')
 			{
 				$delete = $leads->delete($_GET['id']);
 			}

 			if($_GET['query']=='viewone')
 			{
 				$view = $leads->viewone($_GET['id']);
 				require('web/lead_viewone.php');
 			}


 		} 		
break;
//=============== admin
 	case "admin":
		if($_GET['action']=='admin')
 		{
 			
			//========== branches
 			if($_GET['utility']=='create_branch')
 			{
 				$save = $admin->create_branch($_POST['branch_name'],$_POST['address'],$_POST['contact']);
 				if($save)
 				{echo "<div class='alert alert-success'>Branch Created Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 					
 			}

 			if($_GET['utility']=='branch_addroom')
 			{

 				$branch_total_rooms=$admin->branch_getrooms($_POST['branchid']);
				$total_room=count($branch_total_rooms)+1;
 				
 				$branchid = $_POST['branchid'];
 				
				$nuseat_array = $_POST['seats'];
				
				for ($i = 0; $i < count($nuseat_array); $i++) 
							{
								$room = $total_room++;
								$nuseat = mysqli_real_escape_string($con, $nuseat_array[$i]);
								
					        	//=== save
					        	$save=$admin->branch_addroom($room,$nuseat,$branchid);
					        }	
				if($save)
 				{echo "<div class='alert alert-success'>Rooms Added Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 						        
 			}

 			if($_GET['query']=='delete_room')
 			{
 				$delete = $admin->delete_room($_GET['id']);
 			}

 			if($_GET['query']=='edit_room')
 			{
 				$edit = $admin->edit_room($_POST['id'],$_POST['nu_seats']);
 				if($edit)
 				{echo "<div class='alert alert-success'>Edited Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 			}
            //====== holidays
            if($_GET['query']=='add-holiday')
            {
                $save=$admin->add_holiday($_POST['date'],$_POST['holiday']);
				if($save)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=teacher_holidays&status=1';</script>";}
				else
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=teacher_holidays&status=2';</script>";}    
            }
            
            if($_GET['query']=='delete_holiday')
 			{
 				$delete = $admin->delete_holiday($_GET['id']);
 			}    
 			
 			//=============== user
 			if($_GET['utility']=='create_user')
 			{
 				$save=$admin->create_user($_POST['uname'],$_POST['upass'],$_POST['utype'],$_POST['email'],$_POST['contact'],$_POST['branch']);
 				if($save)
 				{echo "<div class='alert alert-success'>User Created Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 					
 			}
 			
 			if($_GET['utility']=='edit_user')
 			{
 				$edit=$admin->edit_user($_POST['uname'],$_POST['upass'],$_POST['utype'],$_POST['email'],$_POST['contact'],$_POST['branch'],$_POST['id']);
 				if(!$edit)
 				{echo "<div class='alert alert-success'>User Edit Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 					
 			}
 			
 			if($_GET['query']=='delete_user')
 			{
 				$delete = $admin->delete_user($_GET['id']);
 			}

 			if($_GET['query']=='edit_meta_data')
 			{
 				$id_array = $_POST['id'];
 				$data1_array = $_POST['meta_value1'];
 				$data2_array = $_POST['meta_value2'];
				
				for ($i = 0; $i < count($id_array); $i++) 
							{
								$id = mysqli_real_escape_string($con, $id_array[$i]);
								$data1 = mysqli_real_escape_string($con, $data1_array[$i]);
								$data2 = mysqli_real_escape_string($con, $data2_array[$i]);
								
					        	//=== save
					        	$edit=$admin->edit_meta_data($id,$data1,$data2);
					        }

 				
 			}

 		

 		}
 	break;


 //=============== teacher
 	case "teacher":
		if($_GET['action']=='teacher')
 		{
			if($_GET['query']=='student_bacth_allotment')
 			{
					$stu_id = $_POST['student_id'];
 			        $course = $_POST['course'];
 			        $batch  = $_POST['batchid'];
					$session = $_SESSION['syear'];
 			      	$save = $student->allot_batch($course,$batch,$session,$stu_id); 
					
			}	

			if($_GET['query']=='student_bacth_allotment2')
 			{
					$stu_id = $_POST['student_id2'];
 			        $course = $_POST['course2'];
 			        $batch  = $_POST['batchid2'];
					$session = $_SESSION['syear'];
 			      	$save = $student->allot_batch2($course,$batch,$session,$stu_id); 
					
			}	

 			if($_GET['query']=='edit_batch')
 			{
 				
 				$edit=$teacher->edit_batch($_POST['branch'],$_POST['course'],$_POST['batch_name'],$_POST['start_date'],$_POST['session'],$_POST['id']);
				if(!empty($edit))
 				{echo "<div class='alert alert-success'>Batch Edited Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 					
 			}	

			if($_GET['query']=='student_attendence')
 			{
				$id_array = $_POST['student_id'];
				$ids =  implode(",",$id_array);
				
				$save=$teacher->student_attendence($ids,$_POST['batch'],$_POST['teacherid'],$_POST['subjectid'],$_POST['classid'],$_POST['chapterid'],$_POST['topicid'],$_POST['remark'],$_POST['date']);
				

			}	
			
			if($_GET['query']=='student_edit_attendence')
 			{
				$id_array = $_POST['student_id'];
				$ids =  implode(",",$id_array);
				$save=$teacher->student_edit_attendence($ids,$_POST['attid']);
				if($save)
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_edit_attendence&status=1';</script>";}
				else
				{echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_edit_attendence&status=2';</script>";}
				

			}

 			if($_GET['query']=='create_batch')
 			{
 				//print_r($_POST['days']);
				$save=$teacher->create_batch($_POST['branch'],$_POST['course'],$_POST['batch_name'],$_POST['start_date'],$_SESSION['syear']);
				if(!empty($save))
 				{echo "<div class='alert alert-success'>Batch Added Successfully</div>";}
 				else
 				{echo "<div class='alert alert-danger'>Something went wrong !! Please try again later !!</div>";}
 					
 			}
 			
 			if($_GET['query']=='create_class')
 			{
 				if($_POST['syear']=="" ||  $_POST['branch'] =="" || $_POST['batch'] =="" || $_POST['course'] =="" || $_POST['subject'] =="" || $_POST['days'] =="" || $_POST['teacher'] =="" || $_POST['start_date'] =="" || $_POST['timing'] =="" || $_POST['duration']=="")
 				{
 					echo "<div class='alert alert-info'>Please fill all the mendetory field(s)</div>";
 					exit();
 				}

				$save=$teacher->create_class($_POST['syear'],$_POST['branch'],$_POST['batch'],$_POST['course'],$_POST['subject'],$_POST['days'],$_POST['teacher'],$_POST['start_date'],$_POST['timing'],$_POST['duration']);
				if($save)
 					{echo "<div class='alert alert-success'>Class Scheduled Successfully</div>";}
 				else
 					{echo "<div class='alert alert-danger'>Something went wrong or Class combination is not available !! Please try again later !!</div>";}
 			}


			if($_GET['query']=='edit_class')
 			{
 				
				$save=$teacher->edit_class($_POST['course'],$_POST['subject'],$_POST['days'],$_POST['teacher'],$_POST['start_date'],$_POST['timing'],$_POST['duration'],$_POST['branchid'],$_POST['id']);
				if(empty($save))
 					{echo "<div class='alert alert-success'>Class Schedule Edited Successfully</div>";}
 				else
 					{echo "<div class='alert alert-danger'>Something went wrong or Class combination is not available !! Please try again later !!</div>";}
 			}

 			
 			if($_GET['query']=='delete_class')
 			{
 				$delete=$teacher->delete_class($_GET['id']);
 			}

 			if($_GET['query']=='delete_batch')
 			{
 				$delete=$teacher->delete_batch($_GET['id']);
 			}
 			
 			if($_GET['query']=='close_batch')
 			{
					$id = $_POST['id'];
 			        $close_date = $_POST['close_date'];
 			        if(!empty($close_date))
 			        {$save = $teacher->close_batch($id,$close_date); }
 			        else
 			        {echo "<div class='alert alert-info'>Close date should not be blank !!!</div>";}
					
			}

 			
 		}



 //========= student
 case "student":
		if($_GET['action']=='student')
 		{
 			if($_GET['query']=='create_student')
 			{

 			   $check=$student->check_availability($_POST['email'],$_POST['contact']);
 				
 			    //print_r($_POST);
 				
 				if($check>0)
 				{
 				    echo "<div class='alert alert-info'>Email or Contact Number is already available.</div>";
 			//	echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=lead_proceedsuccess&leadid=".$_GET['leadid']."&status=not_available&count=$check';</script>";	
 				}
				elseif($_POST['course'] == $_POST['course2'])
				 {
				 echo "<div class='alert alert-info'>Course 1 and Course 2 Cannot Be same.</div>";
				// echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_createnew&status=not_available';</script>";
				 }
				 
				 /*elseif($_POST['subject'] == $_POST['subject2'])
				 {
					echo "<div class='alert alert-info'>Subject 1 and Subject 2 Cannot Be same.</div>";
				 	echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_createnew&status=not_available';</script>";
				 }*/
				 
				 elseif($_POST['batchid'] == $_POST['batchid2'])
				 {
					echo "<div class='alert alert-info'>Batch 1 and Batch 2 Cannot Be same.</div>";
				//	echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_createnew&status=not_available';</script>";
				 }
				 
		  
			  
 				else
 				{	
	 				$save=$student->create_student($_POST['uname'],$_POST['fname'],$_POST['mname'],$_POST['focc'],$_POST['mocc'],$_POST['address'],$_POST['email'],$_POST['contact'],$_POST['fcontact'],$_POST['mcontact'],$_POST['course'],$_POST['course2'],$_POST['subject'],$_POST['subject2'],$_POST['status'],$_POST['school'],$_POST['xper'],$_POST['xiiper'],$_POST['reference'],$_POST['dob'],$_POST['medium'],$_POST['jdate'],$_POST['branch'],$_POST['democlass'],$_POST['batchid'],$_POST['batchid2'],$_POST['syear'],$_POST['grace_period']);
	 				
					
	 			}
 			}

 			if($_GET['query']=='edit_student')
 			{

				if($_POST['course'] == $_POST['course2'])
				 {
				 echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_edit&id=".$_POST['id']."&status=failed&failed_id=course';</script>";
				 }
				 elseif($_POST['subject'] == $_POST['subject2'])
				 {
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_edit&id=".$_POST['id']."&status=failed&failed_id=subject';</script>";
				 }
				 elseif($_POST['batchid'] == $_POST['batchid2'])
				 {
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_edit&id=".$_POST['id']."&status=failed&failed_id=batch';</script>";
				 }
				 else
				 {
	 				$edit=$student->edit_student($_POST['uname'],$_POST['fname'],$_POST['mname'],$_POST['focc'],$_POST['mocc'],$_POST['address'],$_POST['email'],$_POST['contact'],$_POST['fcontact'],$_POST['mcontact'],$_POST['course'],$_POST['course2'],$_POST['subject'],$_POST['subject2'],$_POST['status'],$_POST['school'],$_POST['xper'],$_POST['xiiper'],$_POST['reference'],$_POST['dob'],$_POST['medium'],$_POST['jdate'],$_POST['branch'],$_POST['democlass'],$_POST['batchid'],$_POST['batchid2'],$_POST['syear'],$_POST['grace_period'],$_POST['id']);
					
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_edit&id=".$_POST['id']."&status=success';</script>";
				 }
 			}

			 if($_GET['query']=='ex_student_add')
 			{

				if($_POST['course'] == $_POST['course2'])
				 {
				 echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_createex&id=".$_POST['id']."&status=failed&failed_id=course';</script>";
				 }
				 elseif($_POST['subject'] == $_POST['subject2'])
				 {
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_createex&id=".$_POST['id']."&status=failed&failed_id=subject';</script>";
				 }
				 elseif($_POST['batchid'] == $_POST['batchid2'])
				 {
					echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_createex&id=".$_POST['id']."&status=failed&failed_id=batch';</script>";
				 }
				 else
				 {
	 				$edit=$student->ex_student_add($_POST['uname'],$_POST['fname'],$_POST['mname'],$_POST['focc'],$_POST['mocc'],$_POST['address'],$_POST['email'],$_POST['contact'],$_POST['fcontact'],$_POST['mcontact'],$_POST['course'],$_POST['course2'],$_POST['subject'],$_POST['subject2'],$_POST['status'],$_POST['school'],$_POST['xper'],$_POST['xiiper'],$_POST['reference'],$_POST['dob'],$_POST['medium'],$_POST['jdate'],$_POST['branch'],$_POST['democlass'],$_POST['batchid'],$_POST['batchid2'],$_POST['syear'],$_POST['grace_period'],$_POST['id'],$_POST['ex_student']);
					
						echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_viewall&status=successex';</script>";
				 }
 			}

 			if($_GET['query']=='generate_userid')
 			{
 				$uname=substr($_GET['uname'], 0, 5).rand(0,1000);
 				$utype='student';
 				$uemail=$_GET['uemail'];
 				$ucontact=$_GET['ucontact'];
 				$branch=$_GET['branch'];
 				//--- generate password 
 				$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
			    $upass = substr(str_shuffle($str_result),0,10);

			    // generate user
 				$user = $admin->create_user($uname,$upass,$utype,$uemail,$ucontact,$branch);
 				$maxid= $admin->get_maxid();
 				$maxid= $maxid[0]['id'];
 				//update student data
 				$student = $student->update_one($_GET['id'],'uid',$maxid);

 				echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=student_viewall&status=success';</script>";
 			}
 			
 			if($_GET['query']=='add_fee_cash')
 			{
 			    $add_fee=$accounts->add_fee_cash($_POST['stu_id'],$_POST['amt'],$_SESSION['syear'],$_SESSION['branch'],$_POST['transaction_type'],$_POST['debit_credit'],$_POST['account_type'],$_POST['status']);
 			    if(empty($add_fee))
 			    {echo "<div class='alert alert-success'>Fee added Successfully !!!</div>";}
 			    else
 			    {echo "<div class='alert alert-danger'>Something went wrong, Please try again later !!!</div>";}
 			}
 			
 			if($_GET['query']=='add_fee_chaque')
 			{
 			    $add_fee_chq=$accounts->add_fee_chaque($_POST['debit_credit'],$_POST['transaction_type'],$_POST['branchid'],$_POST['syear'],$_POST['stu_id'],$_POST['amt'],$_POST['account_type'],$_POST['chaque_nu'],$_POST['sign_auth'],$_POST['chaque_date'],$_POST['status']);
 			    if(empty($add_fee_chq))
 			    {echo "<div class='alert alert-success'>Fee added Successfully !!!</div>";}
 			    else
 			    {echo "<div class='alert alert-danger'>Something went wrong, Please try again later !!!</div>";}
 			}
 			
 			if($_GET['query']=='add_fee_upi')
 			{
 			    $add_fee_upi=$accounts->add_fee_upi($_POST['debit_credit'],$_POST['transaction_type'],$_POST['branchid'],$_POST['syear'],$_POST['stu_id'],$_POST['amt'],$_POST['account_type'],$_POST['tra_id'],$_POST['status']);
 			    if(empty($add_fee_upi))
 			    {echo "<div class='alert alert-success'>Fee added Successfully !!!</div>";}
 			    else
 			    {echo "<div class='alert alert-danger'>Something went wrong, Please try again later !!!</div>";}
 			}
 			
 			if($_GET['query']=='default_fee_add')
 			{
 			        echo $type_array = $_POST['amt_type'];
 			        $amt_array = $_POST['amt'];
 			        $stu_id  = $_POST['stu_id'];
 			        $date_time=date('Y-m-d H:i:s');
 			        
	 				for ($i = 0; $i < count($type_array); $i++) 
								{
									$type = mysqli_real_escape_string($con, $type_array[$i]);
									$amt = mysqli_real_escape_string($con, $amt_array[$i]);
									
									//=== save
					 			    $save = $student->default_fee_add($type,$amt,$stu_id,$_SESSION['syear'],$_SESSION['branch'],$date_time); 
					 			    if($save)
					 			    {echo "<div class='alert alert-success'>".$type." added successfully !!!</div>";}
					 			    else
					 			    {echo "<div class='alert alert-danger'>Something went wrong, Please try again later !!!</div>";}
						        }	
 			}
 			
 			if($_GET['query']=='delete')
 			{
 			    $student->delete($_GET['id']);
 			}
 		}


	//----- masters & accounts
	case "master":
	if($_GET['action']=='master')
	{
		if($_GET['query']=='approved_transaction')
		{
			$accounts->approved_transaction($_POST['tra_id'],$_POST['submit'],$_POST['amount'],$_POST['acc_id'],$_POST['tra_type']);
			if($_POST['submit']=='1') {echo "<b class='text-success'>Approved</b>";}
			else{echo "<b class='text-danger'>Rejected</b>";}
		}
		
		
        if($_GET['query']=='add_course_other_fee')
		{
		    $course_ids=implode(",",$_POST['course']);
			$accounts->add_course_other_fee($course_ids,$_POST['fee_type'],$_POST['amount'],$_POST['preference']);
		}
		
		if($_GET['query']=='add_transaction_type')
		{
			$accounts->add_transaction_type($_POST['tid'],$_POST['type_name'],$_POST['type_transaction']);
		}
		
		if($_GET['query']=='edit_transaction_type')
		{
			$accounts->edit_transaction_type($_POST['tid'],$_POST['type_name'],$_POST['type_transaction'],$_POST['id']);
		}
		
		if($_GET['query']=='add_bank')
		{
			$bank = $accounts->add_bank($_POST['acc_nu'],$_POST['acc_name'],$_POST['bank_name'],$_POST['ifsc'],$_POST['acc_type'],$_POST['upi'],$_POST['opening_balance']);
			if($bank)
			{
			   	echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=acc_bank&status=success';</script>";
			}
			else
			{
			   	echo "<script>window.location.href='".$base_url."index.php?action=dashboard&page=acc_bank&status=success';</script>";
			}
		}
		
		if($_GET['query']=='edit_bank')
		{
			$bank = $accounts->update_bank($_POST['acc_nu'],$_POST['acc_name'],$_POST['bank_name'],$_POST['ifsc'],$_POST['acc_type'],$_POST['upi'],$_POST['opening_balance'],$_POST['id'],$_POST['status']);
			if(!$bank)
			{
			   	echo "<div class='alert alert-success'>Bank Details Updated</div>";
			}
			else
			{
			   	echo "<div class='alert alert-error'>Something went wrong, Please try again !!!</div>";
			}
		}

		if($_GET['query']=='delete_transaction_type')
		{
			$delete=$accounts->delete_transaction_type($_GET['id']);
		}
	}
}
?>