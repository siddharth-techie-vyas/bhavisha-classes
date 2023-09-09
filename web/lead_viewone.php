<?php																																										
 $view = $leads->viewone($_GET['id']); ?>

<div class='card-header'>

                        <h4>View / Edit New Leads</h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

              <div class="card">

                <div class="card-body">

                  <div id="msgcreate_leads"></div>

                  <form action="<?php echo $base_url.'index.php?action=lead&query=edit_leads';?>" method="post" name="create_leads" id="create_leads" class="form-sample">

                   <input type="hidden" value="<?php echo $view[0]['id'];?>" name="id">

                   <input type="hidden" value="0" name="branch">

                   <input type="hidden" value="0" name="demo">

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Date</label>

                          <div class="col-sm-9">

                            <input type="date" name="ldate" class="form-control"  value="<?php echo $view[0]['ldate'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Name</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" name="uname" value="<?php echo $view[0]['uname'];?>" required>

                          </div>

                        </div>

                       

                    </div>

                  </div>



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course</label>

                          <div class="col-sm-9">

                           <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')">

                              <option disabled="" selected="">-- Select Course --</option>

                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>

                              <option <?php if($allcourses[$key]['id']==$view[0]['course_name']){?>selected=""<?php }?> value="<?php echo $allcourses[$key]['id'];?>">

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

                            <select class="form-control" name="subject[]" id="subject" multiple='multiple'>

                             
                             <?php $subject = preg_split ("/\,/", $view[0]['subject']); 
                             //print_r($subject0);
                              foreach($subject as $k=>$value)
                              {
                              ?>

                                <option  value="<?php echo $subject0[$k];?>" selected='selected'/>
                                  <?php $sname=$course->get_one($subject[$k],'id'); echo $sname[0]['subject'];?>
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

                              <label class="col-sm-3 col-form-label">School / College</label>

                              <div class="col-sm-9">

                                    <input type="text" class="form-control" name="school" id="membershipRadios1" value="<?php echo $view[0]['school'];?>">

                              </div>

                            </div>

                          </div>



                          <div class="col-md-3">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">X %</label>

                            <div class="col-sm-9">

                              <input type="text" name="xper" value="<?php echo $view[0]['xper'];?>" class="form-control" required/>

                            </div>

                          </div>

                      </div>



                      <div class="col-md-3">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">XII %</label>

                            <div class="col-sm-9">

                              <input type="text" name="xiiper" value="<?php echo $view[0]['xiiper'];?>" class="form-control"  required/>

                            </div>

                          </div>

                      </div>



                    </div>



                  



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">DOB</label>

                          <div class="col-sm-9">

                            <input type="date" name="dob" class="form-control" value="<?php echo $view[0]['dob'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Medium</label>

                          <div class="col-sm-9">

                            <select class="form-control" name="medium">

                              <option disabled="" selected="">-- Select --</option>

                              <option <?php if($view[0]['medium']=='Hindi'){?>selected=""<?php }?> >Hindi</option>

                              <option <?php if($view[0]['medium']=='English'){?>selected=""<?php }?>>English</option>

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

                            <input name="reference" type="text" class="form-control" value="<?php echo $view[0]['reference'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Remark</label>

                          <div class="col-sm-9">

                            <input name="remark" type="text" class="form-control" value="<?php echo $view[0]['remark'];?>" required/>

                          </div>

                        </div>

                      </div>

                    </div>



                      <div class="row">

                    

                      

                      <div class="col-md-6">

                         <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Contact</label>

                          <div class="col-sm-9">

                            <input type="text" name="contact" class="form-control" value="<?php echo $view[0]['contact'];?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Email</label>

                          <div class="col-sm-9">

                            <input type="email" name="email" value="<?php echo $view[0]['email'];?>" class="form-control" required/>

                          </div>

                        </div>

                      </div>



                    </div>





                    



                     <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div>

                          <div class="col-sm-6"><input type="button" onclick="form_submit('create_leads')" class="btn btn-success btn-md" value="Save"></div>

                          

                        </div>

                      </div>



                    </div>

                  </form>

                </div>

              </div>

            </div>

         </div>   

    </div>   