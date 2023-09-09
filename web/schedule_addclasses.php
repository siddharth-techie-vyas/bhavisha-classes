
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Class</h4>
                  <div id="msgschedule_addroom"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=schedule_addroom';?>" method="post" name="schedule_addroom" id="schedule_addroom" class="form-sample">
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Room Number / Name</label>
                          <div class="col-sm-9">
                            <select name="classes" class="form-control">
                              <option>Room 1</option>
                              <option>Room 2</option>
                              <option>Room 3</option>
                              <option>Room 4</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Course Name</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="course_name">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option value="<?php echo $allcourses[$key]['id'];?>"><?php echo $allcourses[$key]['course_name'];?></option>  
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                         
                          <div class="col-sm-6"><input type="button" onclick="form_submit('schedule_addroom')" class="btn btn-success btn-md" value="Save"></div>
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
                        <th>Room Name / Number</th>
                        <th>Delete</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $counter=1;
                      $allcourses = $course->viewall();
                      foreach ($allcourses as $key => $value) {
                       ?>
                      <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $allcourses[$key]['course_name'];?></td>
                        <td><i class="mdi mdi-delete"></i></td>
                        <td><i class="mdi mdi-grease-pencil"></i></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>

              </div>  
