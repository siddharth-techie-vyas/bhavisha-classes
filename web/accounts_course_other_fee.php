<div class='card-header'>

                        <h4>Add Course Other Fee (Mendetory / Non Mendetory)</h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

                <div class="card-body">

                  <div id="msgcreate_course_other"></div>

                  <form action="<?php echo $base_url.'index.php?action=master&query=add_course_other_fee';?>" method="post" name="create_course" id="create_course_other" class="form-sample">

                    

                    <div class="row">

                      <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course</label>

                          <div class="col-sm-9">

                            <select name='course' class='form-control' multiple="multiple">
                                <option disabled='disabled' selected='selected'>- Select Course -</option>
                                <?php 
                                $course_list = $course->viewall();
                                foreach($course_list as $crow=>$value)
                                {
                                    echo "<option value='".$course_list[$crow]['id']."'>".$course_list[$crow]['course_name']."</option>";
                                }
                                ?>
                            </select>

                          </div>

                        </div>

                      </div>

                        
                        
                        
                    <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Fee Type</label>

                          <div class="col-sm-8">

                            <input type="text" name="fee_type" class="form-control" required/>

                          </div>

                        </div>

                      </div>
                    
                    
                    <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Amount</label>

                          <div class="col-sm-8">

                            <input type="text" name="amount" class="form-control" required/>

                          </div>

                        </div>

                      </div>
                      
                      
                      
                      <div class="col-md-3">

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Preference</label>

                          <div class="col-sm-8">

                            <input type='radio'  name="preference" value="0"> Non Mendetory<br>
                            <input type='radio'  name="preference" value="1"> Mendetory

                          </div>

                        </div>

                      </div>
                    
                    
                    

                      <div class="col-md-12">

                        <div class="form-group row">

                         

                          <div class="col-sm-2"><input type="button" onclick="form_submit('create_course_other')" class="btn btn-success btn-md" value="Save"></div>

                          <div class="col-sm-2"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 

                        </div>

                      </div>



                    </div>

                  </form>

                </div>

              </div>

            </div>



<div class="row">            

<div class="col-sm-12">

                  <table class="table">

                    <thead>

                      <tr>

                        <th>S.No.</th>

                        <th>Course Name</th>
                        <th>Fee</th>
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

                      <tr id="<?php echo $allcourses[$key]['id'];?>">

                        <td><?php echo $counter++;?></td>

                        <td><?php echo $allcourses[$key]['course_name'];?></td>
                        <td><?php echo $allcourses[$key]['fee'];?></td>
                        <td><input type="button" class="btn btn-xs btn-danger" name="delete" value="Delete" onclick="deleteme('course','delete','<?php echo $allcourses[$key]['id'];?>')"></td>
                        <td><input onclick="show_page_model('index.php?action=nocss_pages&page=course_edit&id=<?php echo $allcourses[$key]['id'].'&type=course';?>')" data-toggle="modal" data-target="#myModal" type="button" name="edit" value="Edit" class="btn btn-warning btn-xs"></td>

                      </tr>

                    <?php } ?>

                    </tbody>

                  </table>

                </div>



        

</div>

</div>