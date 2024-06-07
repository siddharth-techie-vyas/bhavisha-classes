
<div class='card-header'>
    <h4>Student Attendence</h4>
</div>


<div class="card-body">
<div class="content">
<div class="row">
                    <div class="col-sm-12">
                    <?php $counter=1; $result = $teacher->get_list_by_teacher_id($_SESSION['branch'], $_SESSION['uid']); 

                        if(empty($result))
                        {
                            echo "<div class='alert alert-info'><h4>No class has been alloted to you. !!!</h4></div>";
                        }
                                
                     foreach($result as $k => $value)
                            {
                            $randcolor = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
                            $time = date("d-m-Y H:i:s", strtotime($result[$k]['timing']));
                            $cname=$course->get_one($result[$k]['courseid'],'id'); 
                            $cname = $cname[0]['course_name'];
                            
                            $batch = $teacher->get_batch_details($result[$k]['batchid']);
                            $batch = $batch[0]['batch_name'];
                            
                            $sname=$course->get_one($result[$k]['subjectid'],'id'); 
                            $sname=$sname[0]['subject'];
                            
                            $minutes=$result[$k]['duration'].' Minutes';
                            
                            $teachername = $admin->getone_user($result[$k]['teacherid']);
                            ?>
                            <div class="col-sm-3" style="  padding:10px;">
                                <div style="text-align:left; padding-left:10px; border:2px solid #d8d8d8; border-radius:2px;">
                                    <a href="<?php echo $base_url.'index.php?action=dashboard&page=student_attendence2&id='.$result[$k]['id']; ?>" style="text-decoration:none; color:#000;">
                                    <h4><?php echo 'Lecture '.$counter++;?></h4>
                                    <?php echo '<b>Batch</b> : '.$batch;?><br>
                                    <?php echo '<b>Course</b> : '.$cname;?><br>
                                    <?php echo '<b>Subject</b> : '.$sname;?><br>
                                    <?php echo '<b>Time</b> : '.$result[$k]['timing'];?> To <?php $time2 = strtotime(''.$time.' + '.$result[$k]['duration'].' minute'); echo date("H:i:s", $time2);?><br>
                                    <?php echo '<b>Duration</b> : '.$minutes.' Minutes';?><br>
                                    <?php echo '<b>Teacher</b> : '.$teachername[0]['uname'];?>
                                    </a>
                                 </div>   
                            </div>    
                            
                            
                            <?php }
                            ?>
                        
                </div>
                
                
</div>
</div>
</div>



                                          