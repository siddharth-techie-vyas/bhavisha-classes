
<?php  $edit=$student->get_one_student($_GET['id']);?>
<div class='card-header'>

                  <h4>Add A New Student</h4>

                    </div>





                    <div class='card-body'>



              <div class="card">

                <div class="card-body">

                  <?php if($_GET['status']=='success'){?>
                    <div class="alert alert-success">Student data updated successfully</div>
                  <?php }?>
                  
                  <?php if($_GET['status']=='failed'){?>
                    <div class="alert alert-warning">Student data updated failed. Failed by duplicate : <?php echo $_GET['failed_id'];?></div>
                  <?php }?>

                  <form action="<?php echo $base_url.'index.php?action=student&query=edit_student';?>" method="post" name="create_student" id="create_student" class="form-sample">

                    <input type="hidden" value="<?php echo $edit[0]['id'];?>" name="id">
                    <input type="hidden" value="<?php echo $edit[0]['status'];?>" name="status">
                    

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Date Of Joining</label>

                          <div class="col-sm-9">

                            <input type="date" name="jdate" class="form-control"  value="<?php echo $edit[0]['jdate'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Name</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" name="uname" value="<?php echo $edit[0]['uname'];?>" required>

                          </div>

                        </div>

                       

                    </div>

                  </div>





                  <!------ personal details --------->

                   <div class="row">

                      <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Father Name</label>

                          <div class="col-sm-9">

                            <input name="fname" type="text" value="<?php echo $edit[0]['fname'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Father Contact</label>

                          <div class="col-sm-9">

                            <input name="fcontact" type="text" value="<?php echo $edit[0]['fcontact'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Mother Name</label>

                          <div class="col-sm-9">                            

                            <input name="mname" type="text" value="<?php echo $edit[0]['mname'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Mother Contact</label>

                          <div class="col-sm-9">

                            <input name="mcontact" type="text" value="<?php echo $edit[0]['mcontact'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                    </div>





                   <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Father Occupation</label>

                          <div class="col-sm-9">

                            <input name="focc" type="text" value="<?php echo $edit[0]['focc'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Mother Occupation</label>

                          <div class="col-sm-9">                            

                            <input name="mocc" type="text" value="<?php echo $edit[0]['mocc'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                    </div>







                   <div class="row">

                      <div class="col-md-12">

                        <div class="form-group row">

                          <label class="col-sm-2 col-form-label">Address</label>

                          <div class="col-sm-10">

                            <input name="address" type="text" value="<?php echo $edit[0]['address'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                     

                    </div>

                  <!------ personal details ends--------->



                    <div class="row">

                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course 1</label>

                          <div class="col-sm-9">

                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">

                              <option disabled="" selected="">-- Select Course --</option>

                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>

                              <option value="<?php echo $allcourses[$key]['id'];?>" <?php if($edit[0]['course']==$allcourses[$key]['id']){?>selected="selected"<?php } ?>>

                                <?php echo $allcourses[$key]['course_name'];?>

                              </option>  

                            <?php }?>

                            </select>

                          </div>

                        </div>

                      </div>



                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Subject 1

                              <small style="color:red; display: block;">Ctrl + A to Select All</small>

                          </label>

                          <div class="col-sm-9">

                            <select class="form-control" name="subject[]" id="subject" multiple="multiple">

                             <?php $subject = preg_split ("/\,/", $edit[0]['subject']); 
                             //print_r($subject);
                              foreach($subject as $k=>$value)

                                {

                                ?>

                                <option  value="<?php echo $subject[$k];?>" selected='selected'/>
                                  <?php $sname=$course->get_one($subject[$k],'id'); echo $sname[0]['subject'];?>
                                 </option>

                            <?php }?>

                            </select>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Batch 1</label>

                          <div class="col-sm-9">

                            <select class="form-control" id="batchid" name="batchid" >

                              <option  selected="">-- Select Batch --</option>

                              <?php $batch = $teacher->get_all_batches($_SESSION['syear'],$_SESSION['branch']);  foreach ($batch as $key => $value) {?>

                              <option value="<?php echo $batch[$key]['id'];?>" <?php if($edit[0]['batchid']==$batch[$key]['id']){?>selected='selected'<?php }?>>

                                <?php echo $batch[$key]['batch_name'];?>

                              </option>  

                            <?php }?>

                            </select>

                          </div>

                        </div>

                        </div>

                    </div>

                      
                    <!-- course 2-->
                    <div class="row">

                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course 2</label>

                          <div class="col-sm-9">

                           <select class="form-control" id="course2" name="course2" onchange="get_details2('course_name','course2','subject','subject2')">

                              <option  selected="">-- Select Course --</option>

                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>

                              <option value="<?php echo $allcourses[$key]['id'];?>" <?php if($edit[0]['course2']==$allcourses[$key]['id']){?>selected="selected"<?php } ?>>

                                <?php echo $allcourses[$key]['course_name'];?>

                              </option>  

                            <?php }?>

                            </select>

                          </div>

                        </div>

                      </div>



                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Subject 2

                              <small style="color:red; display: block;">Ctrl + A to Select All</small>

                          </label>

                          <div class="col-sm-9">

                            <select class="form-control" name="subject2[]" id="subject2" multiple="multiple">

                            <?php $subject2 = preg_split ("/\,/", $edit[0]['subject2']); 
                             //print_r($subject);
                              foreach($subject2 as $k=>$value)
                                {
                                ?>
                                <option  value="<?php echo $subject2[$k];?>" selected='selected'/>
                                  <?php $sname2=$course->get_one($subject2[$k],'id'); echo $sname2[0]['subject'];?>
                                 </option>
                              <?php }?>

                            </select>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Batch 2</label>

                          <div class="col-sm-9">

                            <select class="form-control" id="batchid2" name="batchid2" >

                              <option selected="">-- Select Batch --</option>

                              <?php $batch = $teacher->get_all_batches($_SESSION['syear'],$_SESSION['branch']);  foreach ($batch as $key => $value) {?>

                              <option value="<?php echo $batch[$key]['id'];?>" <?php if($edit[0]['batchid2']==$batch[$key]['id']){?>selected='selected'<?php }?>>

                                <?php echo $batch[$key]['batch_name'];?>

                              </option>  

                            <?php }?>

                            </select>

                          </div>

                        </div>

                        </div>

                    </div>

                    

                    <div class="row">

                          <div class="col-md-6">

                            <div class="form-group row">

                              <label class="col-sm-3 col-form-label">School</label>

                              <div class="col-sm-9">

                                    <input type="text" class="form-control" name="school" id="membershipRadios1" value="<?php echo $edit[0]['school'];?>">

                              </div>

                            </div>

                          </div>



                          <div class="col-md-3">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">X %</label>

                            <div class="col-sm-9">

                              <input type="text" name="xper" class="form-control" value="<?php echo $edit[0]['xper'];?>" required/>

                            </div>

                          </div>

                          </div>



                          <div class="col-md-3">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">XII %</label>

                            <div class="col-sm-9">

                              <input type="text" name="xiiper" class="form-control" value="<?php echo $edit[0]['xiiper'];?>" required/>

                            </div>

                          </div>

                          </div>

                    </div>



                    <div class="row">

                    

                      

                      <div class="col-md-6">

                         <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Contact</label>

                          <div class="col-sm-9">

                            <input type="text" name="contact" class="form-control" value="<?php echo $edit[0]['contact'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Email</label>

                          <div class="col-sm-9">

                            <input type="email" name="email" class="form-control" value="<?php echo $edit[0]['email'];?>" required/>

                          </div>

                        </div>

                      </div>



                    </div>



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">DOB</label>

                          <div class="col-sm-9">

                            <input type="date" name="dob" class="form-control" value="<?php echo $edit[0]['dob'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Medium</label>

                          <div class="col-sm-9">

                            <select class="form-control" name="medium">

                              <option disabled="" selected="">-- Select --</option>

                              <option value="hindi" <?php if($edit[0]['medium']=='hindi'){?>selected="selected"<?php } ?>>Hindi</option>

                              <option value="english" <?php if($edit[0]['medium']=='english'){?>selected="selected"<?php } ?>>English</option>

                            </select>

                          </div>

                        </div>

                      </div>

                    </div>



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Reference</label>

                          <div class="col-sm-9">

                            <select name="reference" class="form-control" required>

                              <option disabled="disabled" style="font-weight: bold;" selected="selected">-- Select --</option>

                              <?php $reference = $admin->getonetype_meta_data('reference');

                                    foreach($reference as $k => $value)

                                    {

                                      echo "<option value='".$reference[$k]['meta_value2']."' ";
                                      if($edit[0]['reference']==$reference[$k]['meta_value2']){ echo 'selected="selected"'; } 
                                      echo ">".$reference[$k]['meta_value1']."</option>";

                                    }

                               ?>

                               <option disabled="disabled" style="font-weight: bold;">-- Faculties --</option>

                              <?php $reference1 = $admin->getonetype_user('2');

                                    foreach($reference1 as $k => $value)

                                    {

                                      echo "<option value='".$reference1[$k]['id']."' "; 
                                      if($edit[0]['reference']==$reference[$k]['meta_value2']){ echo 'selected="selected"'; } 
                                      echo ">".$reference1[$k]['uname']."</option>";

                                    }

                               ?>

                            </select>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Grace Period</label>

                          <div class="col-sm-9">

                            <input name="grace_period" type="number" value="<?php echo $edit[0]['grace_period'];?>" minlength="0" maxlength="10" class="form-control" required/>

                          </div>

                        </div>

                      </div>



                    </div>



                    <div class="row">

                    

                      

                      <div class="col-md-6">

                         <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Branch</label>

                          <div class="col-sm-9">

                            <select name="branch" onchange="get_branch_details('branch','demo','class_schedule')" class="form-control" id="branch" >

                              <option>-- Select --</option>

                              <?php $branch = $admin->get_allbranch(); 



                                //  $user = array_unique($user0);

                                  foreach($branch as $k=>$value)

                                  {

                                    echo "<option value='".$branch[$k]['id']."' ";
                                    if($edit[0]['branch']==$branch[$k]['id']){ echo 'selected="selected"'; }
                                    echo ">".$branch[$k]['branch_name']."</option>";

                                  }

                              ?>

                            </select> 

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Session</label>

                          <div class="col-sm-9">

                            <select class="form-control" name="syear" required>

                                <?php $session_y = $admin->get_session_year();

                                foreach ($session_y as $key => $value) {

                                    echo "<option value='".$session_y[$key]['id']."' ";
                                    if($edit[0]['syear']==$session_y[$key]['id']){ echo 'selected="selected"'; }  
                                    echo ">".$session_y[$key]['syear']."</option>";

                                }

                                ?>

                              

                            </select>

                          </div>

                        </div>

                        <input type="hidden" name="democlass" value="0">

                      </div>



                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Demo Require ??</label>

                          <div class="col-sm-9">

                            <input type="radio" value="1" <?php if($edit[0]['democlass']=='1'){?>checked='checked'<?php }?> name="democlass"> Yes

                            <input type="radio" value="0" <?php if($edit[0]['democlass']=='0'){?>checked='checked'<?php }?> name="democlass"> No

                          </div>

                        </div>

                      </div>      







                    </div>







                     <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div>

                          <div class="col-sm-6"><input type="button" id='submit_check' class="btn btn-success btn-md" onclick='student_form_check()' value="Varify"></div>

                          

                        </div>

                      </div>



                    </div>

                  </form>

                </div>

              </div>

            </div>



            <script>
  function student_form_check()
  {
    var course1 = $("#courseid").val();
    var course2 = $("#course2").val();
    if(course1 == course2)
    {
      alert('Both course should not be same');
    }
    else
    {
      $('#submit_check').attr('type','submit');
      $('#submit_check').attr('value','Save & Continue');
    }
  }
</script>

