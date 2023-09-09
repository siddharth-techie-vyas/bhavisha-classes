<div class='card-header'>
                        <h4>Add Hand Made Notes For Student</h4>

                    </div>
<div class="content">
  <div class="row">
<div class="col-sm-12">
                <div class="card-body">
                  <div id="msgcreate_handmade_notes"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=create_handmade_notes';?>" method="post" name="create_handmade_notes" id="create_handmade_notes" class="form-sample">
                    
                  
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

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Chapter Name</label>
                          <div class="col-sm-8">
                            <select class="form-control js-example-basic-multiple w-100"  name="chapter" id="chapter" onchange="get_details('chapter','chapter','topic')">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-md-2">
                            <div class="form-group row">
                            <div class="col-sm-6"><input type="button" onclick="form_submit('create_handmade_notes')" class="btn btn-success btn-md" value="Submit"></div>
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
                        <th># of Topic(s) Added</th>
                        <th>Utility</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allsubject = $course->viewall_handmade_notes();
                      foreach ($allsubject as $key => $value) {
                       ?>
                      <tr id="tr<?php echo $allsubject[$key]['id'];?>">
                        <td><?php echo $counter++;?></td>
                        <td><?php 
                                    $cname = $course->get_one($allsubject[$key]['courseid'],'id'); 
                                    echo $cname[0]['course_name'];
                                  
                          ?>
                        </td>
                        <td><?php 
                                    $sname = $course->get_one($allsubject[$key]['subjectid'],'id'); 
                                    echo $sname[0]['subject'];
                                  
                          ?>
                        </td>
                        <td><?php 
                                    $chname = $course->get_one($allsubject[$key]['chapterid'],'id'); 
                                    echo $chname[0]['chapter'];
                                  
                          ?>
                        </td>
                        
                        
                        
                       
                        <td><a href="<?php echo $base_url;?>index.php?action=dashboard&page=course_homemade_notes_add&id=<?php echo $allsubject[$key]['id'];?>"  class="btn btn-xs btn-warning">Add Notes</a></td>
                       
                        <td>
                        <a href="index.php?action=nocss_pages&page=course_homemade_notes_add&id=<?php echo $allsubject[$key]['id'];?>" class="btn btn-info btn-xs">View / Print</a>  
                        <input type="button" class="btn btn-xs btn-danger" name="delete" value="Delete" onclick="deleteme_checking('action=course&query=delete_handmade_notes&delid=<?php echo $allsubject[$key]['id'];?>','tr<?php echo $allsubject[$key]['id'];?>')">
                        </td>

                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  

              </div>
            </div>