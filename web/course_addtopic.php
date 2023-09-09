<div class='card-header'>
                        <h4>Add New Topic</h4>

                    </div>
<div class="content">
  <div class="row">
<div class="col-sm-12">
                <div class="card-body">
                  <div id="msgcreate_topic"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=create_topic';?>" method="post" name="create_topic" id="create_topic" class="form-sample">
                    
                    <input type="hidden" name="content"  value="NULL">
                    <div class="row">
                      
                      <div class="col-md-3">
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

                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Subject</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Chapter Name</label>
                          <div class="col-sm-8">
                            <select class="form-control js-example-basic-multiple w-100"  name="chapter" id="chapter" onchange="get_details('chapter','chapter','topic')">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Topic Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="topic" class="form-control" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Topic Level</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="topic_level">
                              <option disabled="" selected="">--Select--</option>
                              <?php 
                              $level = $admin->getonetype_meta_data('topic_level');
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


                      <!--<div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Topic Content</label>
                          <div class="col-sm-10">
                            <textarea cols="10" rows="10" name="content" id="editor"> </textarea>
                          </div>
                        </div>
                      </div>-->
                     
                      <div class="col-md-9">
                        <div class="form-group row">
                          
                          
                          <div class="col-sm-2"><input type="reset" class="btn btn-default btn-md" value="Reset"></div>
                          <div class="col-sm-2"><input type="button" onclick="form_submit('create_topic')" class="btn btn-success btn-md" value="Submit"></div>
                          <div class="col-sm-2"><a href="<?php echo $base_url.'index.php?action=dashboard&page=course_addtopic_bulk'?>" class='btn btn-warning btn-warning'>Bulk Upload</a></div>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              
 <div class="row">
            <div class="col-sm-12">
               
                  <table class="table" id="data-table">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Chapter</th>
                        <th>Topic</th>
                        <th>Question</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allsubject = $course->viewall_topic();
                      foreach ($allsubject as $key => $value) {
                       ?>
                      <tr id="<?php echo $allsubject[$key]['id'];?>">
                        <td><?php echo $counter++;?></td>
                        <td><?php 
                                    $cname = $course->get_one($allsubject[$key]['course_name'],'id'); 
                                    echo $cname[0]['course_name'];
                                  
                          ?>
                        </td>
                        <td><?php 
                                    $sname = $course->get_one($allsubject[$key]['subject'],'id'); 
                                    echo $sname[0]['subject'];
                                  
                          ?>
                        </td>
                        <td><?php 
                                    $chname = $course->get_one($allsubject[$key]['chapter'],'id'); 
                                    echo $chname[0]['chapter'];
                                  
                          ?>
                        </td>
                        
                        <td><?php echo $allsubject[$key]['topic'];?></td>
                        
                        <td>
                          <a href="<?php echo $base_url.'index.php?action=dashboard&page=course_add_questions_assesment&id='.$allsubject[$key]['id'];?>" class="btn btn-info btn-xs">Add</a>
                          (<?php echo $course->count_question($allsubject[$key]['id']);?>)
                        </td>
                        <td><input type="button" name="edit" value="Edit" class="btn btn-xs btn-warning" onclick="show_page_model('index.php?action=nocss_pages&page=course_edit_topic&id=<?php echo $allsubject[$key]['id'];?>')" data-toggle="modal" data-target="#myModal"></td>
                        <td><input type="button" class="btn btn-xs btn-danger" name="delete" value="Delete" onclick="deleteme('course','delete','<?php echo $allsubject[$key]['id'];?>')"></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  

              </div>
            </div>