<div class='card-header'>
                        <h4>Add New Assessment</h4>
                    </div>
<div class="content">
<div class="col-sm-12"><br>

                  <div id="msgcreate_assessment"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=create_assessment';?>" method="post" name="create_assessment" id="create_assessment" class="form-sample">
                    
                    <!-- mark not as a test --->
                    <input type="hidden" value="0" name="test">

                    <div class="row">
                      
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Class</label>
                          <div class="col-sm-9">
                           <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')">
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
                          <label class="col-sm-4 col-form-label">Subject</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="subject[]" id="subject" onchange="get_details('subject','subject','chapter')" multiple="multiple" >
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Chapter Name</label>
                          <div class="col-sm-8">
                            <select class="form-control js-example-basic-multiple w-100" multiple="multiple" name="chapter[]" id="chapter" onchange="get_details('chapter','chapter','topic')">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                     <!-- <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Topic Name</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="topic" id="topic">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div> -->

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Assesment Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="assessment" class="form-control">
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-md-4">
                        <div class="form-group row">  
                         
                          <div class="col-sm-6"><input type="button" onclick="form_submit('create_assessment')" class="btn btn-success btn-md" value="Save"></div>
                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              

            <div class="col-sm-12">
                <div class="row">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Assessment</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Utility</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allsubject = $course->viewall_assessment('0');
                      foreach ($allsubject as $key => $value) {
                       ?>
                      <tr id="<?php echo $allsubject[$key]['id'];?>">
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $allsubject[$key]['assessment'];?></td>
                        <td><?php $cname = $course->get_one($allsubject[$key]['course_name'],'id'); echo $cname[0]['course_name'];?></td>

                        <td><?php $subjects = explode(',', $allsubject[$key]['subject']); 

                                    for($i=0; $i<count($subjects); $i++)
                                    {
                                      $sname = $course->get_one($subjects[$i],'id'); 
                                      echo $sname[0]['subject'].',';
                                      //echo $sname.', ';
                                    }
                            ?>
                        </td>
                     
                        <td>
                          <i title="Delete Assessment" class="fa fa-trash text-danger" onclick="deleteme('course','delete','<?php echo $allsubject[$key]['id'];?>')"></i>
                          <i title="View PDF" class="fa fa-file-pdf text-info" onclick="show_page_model('index.php?action=nocss_pages&page=course_assessment_pdf&id=<?php echo $allsubject[$key]['id'];?>')" data-toggle="modal" data-target="#myModal"></i>

                          <a title="Add Question" href="<?php echo $base_url.'index.php?action=dashboard&page=course_add_questions_assesment_pdf&id='.$allsubject[$key]['id'];?>"><i class="fa fa-question text-success"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  
</div>

