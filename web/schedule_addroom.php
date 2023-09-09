
<div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Class</h4>
                  <div id="msgschedule_addroom"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=schedule_addroom';?>" method="post" name="schedule_addroom" id="schedule_addroom" class="form-sample">
                    
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Room Number / Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="class_name" class="form-control" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
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
