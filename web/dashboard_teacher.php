                    <div class='card-header'>                        <h1>Dashboard</h1>                                            </div>                    <div class='card-body  content'>                        <div class="row">                                                        <div class='col-sm-8'>                                                        <H4>Today's Lecture(s)</h4>                            <?php                                                         $result = $teacher->get_list_by_teacher_id($_SESSION['branch'], $_SESSION['uid']);                                    if(count($result)>0)                                    {                                                                                        $counter=1;                                                                                        if(count($result)==0)                                                                                        {                                                                                        echo "<div class='alert alert-warning'>No result found</div>";                                                                                        }                                                                                        else                                                                                        {	                                                                                        foreach($result as $k=>$value){                                                                                        $time = date("Y-m-d H:i:s", strtotime($result[$k]['timing']));                                            ?>                                                                                                                                    <a href='<?php echo $base_url; ?>index.php?action=dashboard&page=student_attendence&id=<?php echo $result[$k]['id']?>'>                                            <div class='col-sm-4 card1'>                                                <h4></em><?php echo 'Lecture '.$counter++;?></h4><hr>                                                <?php $batch_name = $teacher->get_one_batch($result[$k]['batchid']); echo '<b>Batch</b> : '.$batch_name[0]['batch_name'];?><br>                                                <?php $cname=$course->get_one($result[$k]['courseid'],'id'); echo '<b>Course</b> : '.$cname[0]['course_name'];?><br>                                                <?php $sname=$course->get_one($result[$k]['subjectid'],'id'); echo '<b>Subject</b> : '.$sname[0]['subject'];?><br>                                                <?php echo '<b>Time</b> : '.$result[$k]['timing'];?> To <?php $time2 = strtotime(''.$time.' + '.$result[$k]['duration'].' minute'); echo date("H:i:s", $time2);?><br>                                                <?php echo '<b>Duration</b> : '.$result[$k]['duration'].' Minutes';?>                                                                                        </div>                                            </a>                                                                                                                                    <?php } }?>                                                                                                                                                                <?php }                                    else{  echo "<div class='alert alert-info'>No Lecture found</div>";}                                                                                                 ?>                            </div>                                                            <div class='col-sm-4'>                                 <h4>My Task(s)</h4>                                </div>                                                             </div>                    </div>                                        