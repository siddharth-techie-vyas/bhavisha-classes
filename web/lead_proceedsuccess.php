<?php 
$udetail = $leads->viewone($_GET['leadid']);
?>
<div class='card-header'>
                  <h4>Procced Lead to Success</h4>
                    </div>


                    <div class='card-body'>

              <div class="card">
                <div class="card-body">
                  <div id="msgcreate_student"></div>
                  <form action="<?php echo $base_url.'index.php?action=student&query=create_student&leadid='.$_GET['leadid'];?>" method="post" name="create_student" id="create_student" class="form-sample">
                    <input type="hidden" value="demo" name="status">
                    <h4 class="card-description">
                      Create Student and Allot a Demo Class
                    </h4>

                    <?php
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

                     ?>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date Of Joining</label>
                          <div class="col-sm-9">
                            <input type="text" name="jdate" class="form-control" readonly="" value="<?php echo $udetail[0]['ldate'];?>" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="uname" value="<?php echo $udetail[0]['uname'];?>" required>
                          </div>
                        </div>
                       
                    </div>
                  </div>


                  <!------ personal details --------->
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Father Name</label>
                          <div class="col-sm-9">
                            <input name="fname" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Mother Name</label>
                          <div class="col-sm-9">                            
                            <input name="mname" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                    </div>


                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Father Occupation</label>
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
                          <label class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input name="address" type="text" value="" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                     
                    </div>
                  <!------ personal details ends--------->

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Course</label>
                          <div class="col-sm-9">                           <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  
                              foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>" <?php if($udetail[0]['course_name']==$allcourses[$key]['id']){?>selected="selected"<?php }?>>
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>

                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Subject</label>
                          <div class="col-sm-9">

                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                             <option value="<?php echo $udetail[0]['subject'];?>"><?php $sname0=$course->get_one($udetail[0]['subject'],'id'); echo $sname0[0]['subject'];?></option>
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
                                    <input type="text" class="form-control" name="school" id="membershipRadios1" value="<?php echo $udetail[0]['school'];?>">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">X %</label>
                            <div class="col-sm-9">
                              <input type="text" name="xper" class="form-control" value="<?php echo $udetail[0]['xper'];?>" required/>
                            </div>
                          </div>
                          </div>

                          <div class="col-md-3">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">XII %</label>
                            <div class="col-sm-9">
                              <input type="text" name="xiiper" class="form-control" value="<?php echo $udetail[0]['xiiper'];?>" required/>
                            </div>
                          </div>
                          </div>
                    </div>

                    <div class="row">
                    
                      
                      <div class="col-md-6">
                         <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contact</label>
                          <div class="col-sm-9">
                            <input type="text" name="contact" class="form-control" value="<?php echo $udetail[0]['contact'];?>" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" name="email" class="form-control" value="<?php echo $udetail[0]['email'];?>" required/>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">DOB</label>
                          <div class="col-sm-9">
                            <input type="date" name="dob" class="form-control" value="<?php echo $udetail[0]['dob'];?>" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Medium</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="medium">
                              <option disabled="" selected="">-- Select --</option>
                              <option <?php if($udetail[0]['medium']=='Hindi'){?>selected="selected"<?php }?>>Hindi</option>
                              <option <?php if($udetail[0]['medium']=='English'){?>selected="selected"<?php }?>>English</option>
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
                            <input name="reference" type="text" value="<?php echo $udetail[0]['reference'];?>" class="form-control" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Grace Period (Days)</label>
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
                            <select name="branch" onchange="get_branch_details('branch','demo','class_schedule')" class="form-control" id="branch" >
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
                          <label class="col-sm-3 col-form-label">Demo Require ??</label>
                          <div class="col-sm-9">
                            <input type="radio" value="1" name="democlass"> Yes
                            <input type="radio" value="1" name="democlass"> No
                          </div>
                        </div>
                      </div>  

                    </div>



                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div>
                          <div class="col-sm-6"><input type="submit" class="btn btn-success btn-md" value="Save"></div>
                          
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>