

<div class='card-header'>
                  <h4>Enroll Existing Student In a New Batch</h4>
                    </div>

                    
                    
                    <div id="simpleModal" class="modal" tabindex="-1" role="dialog" >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ex Student</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   <form name='exstudent' id='exstudent' action='<?php echo $base_url.'index.php?action=dashboard&page=student_createex'?>' method='get'>
                                   <input type='hidden' name='page' value='student_createex'>
                                   <input type='hidden' name='action' value='dashboard'>
                                    <label>Enter Mobile Number</label>
                                    <select class="select2" class="form-control" style="width:50%;" name='id'>
                                      <option disabled='' selected='selected'>-- Select -- </option>
                                    <?php $exstudent = $student->view_exstudent($_SESSION['syear']);
                                    foreach($exstudent as $row => $value){?>
                                    <option value='<?php echo $exstudent[$row]['id'];?>'><?php echo $exstudent[$row]['contact'].' - '.$exstudent[$row]['uname'].' ( '.$exstudent[$row]['fname'].' )';?></option>
                                    <?php }?>
                                    </select>
                                    <br>
                                    <input type='submit' class='btn btn-xs btn-info'  value='Get Details'/>
                                </form>
                                        
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php if(!isset($_GET['id'])){?>
                    <script type="text/javascript">
                        $( document ).ready(function() {
                        $("#simpleModal").modal({ backdrop: "static", keyboard: false });
                        });
                    </script>
                    <?php } else {
                       $edit=$student->get_one_student($_GET['id']);
                        } ?>    
                    <div class='card-body'>



<div class="card">

  <div class="card-body">

    <?php if($_GET['status']=='success'){?>
      <div class="alert alert-success">Ex Student data updated successfully</div>
    <?php }?>
    
    <?php if($_GET['status']=='failed'){?>
      <div class="alert alert-warning">Ex Student data updated failed. Failed by duplicate : <?php echo $_GET['failed_id'];?></div>
    <?php }?>

    <form action="<?php echo $base_url.'index.php?action=student&query=ex_student_add';?>" method="post" name="create_student" id="create_student" class="form-sample">

      <input type="hidden" value="<?php echo $edit[0]['id'];?>" name="id">
      <input type="hidden" value="<?php echo $edit[0]['status'];?>" name="status">
      <input type="hidden" value="1" name="ex_student">
      

      <div class="row">

        <div class="col-md-6">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Date Of Re-Joining</label>

            <div class="col-sm-9">

              <input type="date" name="jdate" class="form-control"  value="<?php echo $edit[0]['jdate'];?>" required/>

            </div>

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Name</label>

            <div class="col-sm-9">

              <input readonly='readonly' type="text" class="form-control" name="uname" value="<?php echo $edit[0]['uname'];?>" required>

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

              <input readonly='readonly' name="fname" type="text" value="<?php echo $edit[0]['fname'];?>" class="form-control" required/>

            </div>

          </div>

        </div>

        <div class="col-md-3">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Father Contact</label>

            <div class="col-sm-9">

              <input name="fcontact" readonly='readonly' type="text" value="<?php echo $edit[0]['fcontact'];?>" class="form-control" required/>

            </div>

          </div>

        </div>

        <div class="col-md-3">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Mother Name</label>

            <div class="col-sm-9">                            

              <input name="mname" readonly='readonly' type="text" value="<?php echo $edit[0]['mname'];?>" class="form-control" required/>

            </div>

          </div>

        </div>

        <div class="col-md-3">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Mother Contact</label>

            <div class="col-sm-9">

              <input name="mcontact" readonly='readonly' type="text" value="<?php echo $edit[0]['mcontact'];?>" class="form-control" required/>

            </div>

          </div>

        </div>

      </div>





     <div class="row">

        <div class="col-md-6">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Father Occupation</label>

            <div class="col-sm-9">

              <input name="focc" readonly='readonly' type="text" value="<?php echo $edit[0]['focc'];?>" class="form-control" required/>

            </div>

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Mother Occupation</label>

            <div class="col-sm-9">                            

              <input name="mocc" readonly='readonly' type="text" value="<?php echo $edit[0]['mocc'];?>" class="form-control" required/>

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
                          <label class="col-sm-3 col-form-label">Course</label>
                          <div class="col-sm-9">
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>">
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject
                              <small style="color:red; display: block;">Ctrl + A to Select All</small>
                          </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="subject[]" id="subject" multiple="multiple">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Batch</label>
                          <div class="col-sm-9">
                            <select class="form-control" id="batchid" name="batchid" >
                              <option disabled="" selected="">-- Select Batch --</option>
                              <?php $batch = $teacher->get_all_batches($_SESSION['syear'],$_SESSION['branch']);  foreach ($batch as $key => $value) {?>
                              <option value="<?php echo $batch[$key]['id'];?>">
                                <?php echo $batch[$key]['batch_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                    </div>

                    <!--- subject 2 -->
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Course 2</label>
                          <div class="col-sm-9">
                           <select class="form-control" id="course2" name="course2"  onchange="get_details2('course_name','course2','subject','subject2')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>">
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
                              <option disabled=''>-- Select --</option>
                            <!--<?php
                              $allsubject = $course->viewall_subject();  
                              foreach ($allsubject as $key => $value) {?>
                              <option value="<?php echo $allsubject[$key]['id'];?>">
                                <?php echo $allsubject[$key]['subject'];?>
                              </option> 
                              <?php }?>-->
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Batch 2</label>
                          <div class="col-sm-9">
                            <select class="form-control"  name="batchid2" >
                              <option disabled="" selected="">-- Select Batch --</option>
                              <?php $batch = $teacher->get_all_batches($_SESSION['syear'],$_SESSION['branch']);  foreach ($batch as $key => $value) {?>
                              <option value="<?php echo $batch[$key]['id'];?>">
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

                      <input type="text" readonly='readonly' class="form-control" name="school" id="membershipRadios1" value="<?php echo $edit[0]['school'];?>">

                </div>

              </div>

            </div>



            <div class="col-md-3">

            <div class="form-group row">

              <label class="col-sm-3 col-form-label">X %</label>

              <div class="col-sm-9">

                <input type="text" readonly='readonly' name="xper" class="form-control" value="<?php echo $edit[0]['xper'];?>" required/>

              </div>

            </div>

            </div>



            <div class="col-md-3">

            <div class="form-group row">

              <label class="col-sm-3 col-form-label">XII %</label>

              <div class="col-sm-9">

                <input type="text" readonly='readonly' name="xiiper" class="form-control" value="<?php echo $edit[0]['xiiper'];?>" required/>

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

              <input type="date" readonly='readonly'  name="dob" class="form-control" value="<?php echo $edit[0]['dob'];?>" required/>

            </div>

          </div>

        </div>

        <div class="col-md-6">

          <div class="form-group row">

            <label class="col-sm-3 col-form-label">Medium</label>

            <div class="col-sm-9">

              <select class="form-control" name="medium" >

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
                      if($_SESSION['syear']==$session_y[$key]['id']){ echo 'selected="selected"'; }  
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




