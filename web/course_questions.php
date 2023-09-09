
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Questions and Answers</h4>
                  <div id="msgcreate_question"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=create_question';?>" method="post" name="create_question" id="create_question" class="form-sample">
                    
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
                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Chapter Name</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="chapter" id="chapter" onchange="get_details('chapter','chapter','topic')">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Topic Name</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="topic" id="topic">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Question</label>
                          <div class="col-sm-8">
                            <input type="text" name="question" class="form-control">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Type</label>
                          <div class="col-sm-8">
                            <select class="form-control" id="" onchange="show_hide(this.value)">
                              <option disabled="" selected="">--Select--</option>
                              <?php 
                              $level = $admin->getonetype_meta_data('question_type_level');
                              foreach ($level as $key => $value) {
                                ?>
                                <option value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                     

                    <!---- question row --->
                    <div class="col-md-4">
                        <div class="form-group row">
                          <div id="1" class="hide"></div>
                          <div id="2" class="hide"></div>
                          <div id="3" class="hide"></div>
                          <div id="4" class="hide"></div>
                        </div>
                    </div>      


                      <div class="col-md-4">
                        <div class="form-group row">
                         
                          <div class="col-sm-6"><input type="button" onclick="form_submit('create_question')" class="btn btn-success btn-md" value="Save"></div>
                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 grid-margin">
                <div class="row">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Assessment</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Add Question(s)</th>
                        <th>Utility</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allsubject = $course->viewall_assessment();
                      foreach ($allsubject as $key => $value) {
                       ?>
                      <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $allsubject[$key]['assessment'];?></td>
                        <td><?php $cname = $course->get_one($allsubject[$key]['course_name'],'id'); echo $cname[0]['course_name'];?></td>
                        <td><?php $cname = $course->get_one($allsubject[$key]['subject'],'id'); echo $cname[0]['subject'];?></td>
                        <td><a href="#" data-toggle="modal" data-target="#myModal" onclick="show_page_model('<?php echo $allsubject[$key]['id'];?>','course&query=course_add_questions_assesment&id=<?php echo $allsubject[$key]['id'];?>','Add Questions in Assessment')"><img src="<?php echo $base_url.'theme/images/question.png';?>"></a></td>
                        <td></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  
