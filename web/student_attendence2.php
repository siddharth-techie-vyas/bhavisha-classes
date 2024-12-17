<style>
ul{list-style:none; padding-left:0px;}
ul li{margin-top:10px; display:block;}
</style>


<div class='card-header'>
    <h4>Student Attendence for Batch </h4>
</div>



<div class="card-body">
<div class="content">
<div class="row">
    


                
                
                    <?php
                    if(isset($_REQUEST['id'])){?>
                    
                    <div class='col-sm-3'>
                    <?php
                    
                    $class_id=$_REQUEST['id'];
                    $result=$teacher->get_class_student($class_id);
                    $counter=1;
                    
                    //- get batch name 
                    $batch_details=$teacher->get_batch_from_class($class_id);
                    $batch_name = $teacher->get_batch_details($batch_details[0]['batchid']);
                    $branch_name = $admin->get_branch_one($result[0]['branch']);
                    
                    //- get class details
                    $class = $teacher->get_one_class($class_id);
                    
                    $sname = $course->get_one($class[0]['subjectid'],'id');
                    $url=$base_url.'submission/teacher.php?page=student_attendence&id='.$class_id;
                    
                    
                    if(!empty($batch_name))
                    {
                   
                    echo "<h3> Batch ".$batch_name[0]['batch_name']." - ".$branch_name[0]['branch_name']."</h3>";
                    echo "<h4> Lecture # ".$_GET['lecturenu']."</h4>";
                    echo "<h4> Subject :".$sname[0]['subject']."</h4>";
                    echo "<h5> Timing :".$class[0]['timing']."</h4>";
                    echo "<h6> Duration :".$class[0]['duration']."</h4>";
                    
                    
                    echo "<ul>";?>
                    
                    <li><a class='btn btn-primary btn-md' href='javascript:void(0)'  onclick="load_page('<?php echo $base_url.'submission/teacher.php?page=course_topic&id='.$class_id;?>','attendence_page')">Course & Topic</a></li>
                    <li><a href='javascript:void(0)' class='btn btn-warning btn-md' onclick="load_page('<?php echo $url;?>','attendence_page')">Student(s) Attendence</a></li>
                    <li><a href='javascript:void(0)'  onclick="load_page('<?php echo $base_url.'submission/teacher.php?page=total_attendence&id='.$class_id.'&teacherid='.$class[0]['teacherid'];?>','attendence_page')" class='btn btn-info btn-md'>Total Attendence Per Class</a></li>
                    <li><a href='javascript:void(0)'  onclick="load_page('<?php echo $base_url.'submission/teacher.php?page=student_report&id='.$class_id;?>','attendence_page')" class='btn btn-default btn-md'>Monthly Attendence Report(s)</a></li>
                    <li><a href='javascript:void(0)'  onclick="load_page('<?php echo $base_url.'submission/teacher.php?page=daily_dose&id='.$class_id;?>','attendence_page')" class='btn btn-success btn-md'>Assignment & Daily Dose</a></li>
                    <?php echo "</ul>";
                    
                    
                    ?>
                    </div>
                    
                    
                
                        <script>
                        window.onload = function() {
                            load_page('<?php echo $base_url.'submission/teacher.php?page=student_attendence';?>&id=<?php echo $_REQUEST['id'];?>','attendence_page');
                        };
                        </script>
                
                    
                    <?php }  
                    else
                    {echo "<div class='alert alert-info'>No Student Added in This Class</div>";}

                    }
                    ?>
                
                <div class='col-sm-8' style="margin:15px; overflow-x: scroll;" id='attendence_page'></div> 
                    
                
                
                </div>
</div>     

                    </div>