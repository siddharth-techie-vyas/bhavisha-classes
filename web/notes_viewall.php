<div class='card-header'>
                        <h4>View All Notes</h4>

                    </div>
<div class="content">
  <div class="row">
<div class="col-sm-12">
            
              
 <div class="row">
            <div class="col-sm-12">
               
                  <table class="table" id="data-table">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Topic</th>
                        <th>Chapter</th>
                        <th>Subject</th>
                        <th>Course</th>
                        <th>Question (Notes)</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allsubject = $course->viewall_topic();
                      foreach ($allsubject as $key => $value) {
                       ?>
                      <tr id="<?php echo $allsubject[$key]['topic'];?>">
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $allsubject[$key]['topic'];?></td>
                        <td><?php 
                                    $chname = $course->get_one($allsubject[$key]['chapter'],'id'); 
                                    echo $chname[0]['chapter'];
                                  
                          ?>
                        </td>
                        <td><?php 
                                    $sname = $course->get_one($allsubject[$key]['subject'],'id'); 
                                    echo $sname[0]['subject'];
                                  
                          ?>
                        </td>
                        <td><?php 
                                    $cname = $course->get_one($allsubject[$key]['course_name'],'id'); 
                                    echo $cname[0]['course_name'];
                                  
                          ?>
                        </td>
                        <td>
                          <a href="<?php echo $base_url.'index.php?action=dashboard&page=course_add_questions_assesment&id='.$allsubject[$key]['id'].'&notes=1';?>" class="btn btn-info btn-xs">View / Edit</a>
                          (<?php echo $course->count_question_notes($allsubject[$key]['id']);?>)
                        </td>
                        
                        <td><input type="button" class="btn btn-xs btn-danger" name="delete" value="Delete" onclick="deleteme('course','delete','<?php echo $allsubject[$key]['id'];?>')"></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  

              </div>
            </div>
          </div>  