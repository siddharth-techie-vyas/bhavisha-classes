
<div class='card-header'>
                  <h4>Add A New Student</h4>
                    </div>


                    <div class='card-body'>

              <div class="card">
                <div class="card-body">
                  <div id="msgcreate_student"></div>
                  
                  <?php if(isset($_GET['leadid'])){?>
                  <form action="<?php echo $base_url.'index.php?action=student&query=create_student&leadid='.$_GET['leadid'];?>" method="post" name="create_student" id="create_student" class="form-sample">
                  <?php }else{?>    
                  <form action="<?php echo $base_url.'index.php?action=student&query=create_student';?>" method="post" name="create_student" id="create_student" class="form-sample">
                    <?php }?>      
                      
                    <input type="hidden" value="demo" name="status">
                    

                    <?php
                    if(isset($_GET['status']))
                    {
                        if($_GET['status']=='not_available')
                        {
                          echo "<div class='alert alert-danger'>This user has been already added or the contact details has been already availble.</div>";
                        }
                        elseif($_GET['status']=='failed')
                        {
                          echo "<div class='alert alert-danger'>Something went wrong!! Please try again...</div>";
                        }
                        elseif($_GET['status']=='success')
                        {
                          echo "<div class='alert alert-success'>Student added successfully. Student yet not received any login id but can be a part of a demo class.</div>";
                        }
                        else{}                    
                    }    

                     ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date Of Joining <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input type="date" name="jdate" class="form-control"  value="" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="uname" value="" required>
                          </div>
                        </div>
                       
                    </div>
                  </div>


                  <!------ personal details --------->
                   <div class="row">
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Father Name <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input name="fname" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Father Contact <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input name="fcontact" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mother Name <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">                            
                            <input name="mname" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mother Contact</label>
                          <div class="col-sm-9">
                            <input name="mcontact" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                    </div>


                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Father Occupation <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input name="focc" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mother Occupation</label>
                          <div class="col-sm-9">                            
                            <input name="mocc" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                    </div>



                   <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Address <span class='text-danger'>*</span></label>
                          <div class="col-sm-10">
                            <input name="address" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                  <!------ personal details ends--------->

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Course <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                           <select class="form-control" id="courseid" name="course" onchange="get_details('course_name','courseid','subject')" required>
                              <option  selected="">-- Select Course --</option>
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
                          <label class="col-sm-3 col-form-label">Subject <span class='text-danger'>*</span>
                              <small style="color:red; display: block;">Ctrl + A to Select All</small>
                          </label>
                          <div class="col-sm-9">
                            <select class="form-control" name="subject[]" id="subject" multiple="multiple" requried>
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Batch <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <select class="form-control" id="batchid" name="batchid" required>
                              <option  selected="">-- Select Batch --</option>
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
                              <option selected="">-- Select Course --</option>
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
                              <option selected="">-- Select Batch --</option>
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
                              <label class="col-sm-3 col-form-label">School <span class='text-danger'>*</span></label>
                              <div class="col-sm-9">
                                    <input type="text" class="form-control" name="school" id="membershipRadios1" value="">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">X %</label>
                            <div class="col-sm-9">
                              <input type="text" name="xper" class="form-control" value="" required/>
                            </div>
                          </div>
                          </div>

                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">XII %</label>
                            <div class="col-sm-9">
                              <input type="text" name="xiiper" class="form-control" value="" required/>
                            </div>
                          </div>
                          </div>
                    </div>

                    <div class="row">
                    
                      
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name="contact" class="form-control" value="" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" value="" />
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">DOB <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <input type="date" name="dob" class="form-control" value="" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Medium</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="medium">
                              <option disabled="" selected="">-- Select --</option>
                              <option value="hindi">Hindi</option>
                              <option value="english">English</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Reference <span class='text-danger'>*</span></label>
                          <div class="col-sm-9">
                            <select name="reference" class="form-control" required>
                              <option disabled="disabled" style="font-weight: bold;" selected="selected">-- Select --</option>
                              <?php $reference = $admin->getonetype_meta_data('reference');
                                    foreach($reference as $k => $value)
                                    {
                                      echo "<option value='".$reference[$k]['meta_value2']."'>".$reference[$k]['meta_value1']."</option>";
                                    }
                               ?>
                               <option disabled="disabled" style="font-weight: bold;">-- Faculties --</option>
                              <?php $reference1 = $admin->getonetype_user('2');
                                    foreach($reference1 as $k => $value)
                                    {
                                      echo "<option value='".$reference1[$k]['id']."'>".$reference1[$k]['uname']."</option>";
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
                            <input name="grace_period" type="number" value="" minlength="0" maxlength="10" class="form-control" required/>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                    
                      
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Branch</label>
                          <div class="col-sm-9">
                            <select name="branch" onchange="get_branch_details('branch','demo','class_schedule')" class="form-control" id="branch" required>
                              <option>-- Select --</option>
                              <?php $branch = $admin->get_allbranch(); 

                                //  $user = array_unique($user0);
                                  foreach($branch as $k=>$value)
                                  {
                                    echo "<option value='".$branch[$k]['id']."'>".$branch[$k]['branch_name']."</option>";
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
                                    echo "<option value='".$session_y[$key]['id']."'>".$session_y[$key]['syear']."</option>";
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
                            <input type="radio" value="1" name="democlass"> Yes
                            <input type="radio" value="1" name="democlass"> No
                          </div>
                        </div>
                      </div>      

                      



                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                        <div class="col-sm-6"></div>
                          <div class="col-sm-3"><input type="reset" class="btn btn-info btn-lg" value="Reset"></div>
                          <div class="col-sm-3"><input type="button" onclick="form_submit('create_student')" class="btn btn-success btn-lg" value="Varify" id="submit_check"></div>
                          
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