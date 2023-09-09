
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Subject</h4>
                  <div id="msgcreate_course"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=create_subject';?>" method="post" name="create_subject" id="create_subject" class="form-sample">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Subject Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="subject_name" class="form-control" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Course</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>"><?php echo $allcourses[$key]['course_name'];?></option>  
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group row">
                         
                          <div class="col-sm-6"><input type="button" onclick="form_submit('create_subject')" class="btn btn-success btn-md" value="Save"></div>
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
                        <th>Course Name</th>
                        <th>Subject</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allsubject = $course->viewall_subject();
                      foreach ($allsubject as $key => $value) {
                       ?>
                      <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $allsubject[$key]['course_name'];?></td>
                        <td><?php echo $allsubject[$key]['subject'];?></td>
                        <td><i class="mdi mdi-delete"></i></td>
                        <td><i class="mdi mdi-grease-pencil"></i></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  
