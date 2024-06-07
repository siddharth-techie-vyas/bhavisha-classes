<div class='card-header'>

                        <h4>Add New Course</h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

                <div class="card-body">

                  <div id="msgcreate_course"></div>

                  <form action="<?php echo $base_url.'index.php?action=course&query=create_course';?>" method="post" name="create_course" id="create_course" class="form-sample">

                    

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course Name</label>

                          <div class="col-sm-9">

                            <input type="text" name="course_name" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                        <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Fee</label>

                          <div class="col-sm-8">

                            <input type="text" name="fee" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-2">

                        <div class="form-group row">

                         

                          <div class="col-sm-6"><input type="button" onclick="form_submit('create_course')" class="btn btn-success btn-md" value="Save"></div>

                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 

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
                        <th>Level / Position</th>
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
                        <td>
                            <!--<form id="sort<?php echo $allcourses[$key]['id'];?>" name="sort<?php echo $allcourses[$key]['id'];?>" action="<?php echo $base_url.'index.php?action=course&query=sort_set'?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $allcourses[$key]['id'];?>" />   
                            <select name="sort" onchange="form_submit3('sort<?php echo $allcourses[$key]['id'];?>')">
                                <option value="0">0</option>
                                <?php
                                    for($i=1; $i<=count($allcourses); $i++)
                                    {
                                        echo "<option value='".$i."' ";  
                                        if($allcourses[$key]['sort'] == $i) {echo "selected='selected'";}
                                        echo ">".$i."</option>";
                                    }
                                ?>
                            </select>
                            </form>-->
                            <span id="msgsort<?php echo $allcourses[$key]['id'];?>"></span>
                            
                        </td>
                        <td><input type="button" class="btn btn-xs btn-danger" name="delete" value="Delete" onclick="deleteme('course','delete','<?php echo $allcourses[$key]['id'];?>')"></td>

                        <td><input onclick="show_page_model('index.php?action=nocss_pages&page=course_edit&id=<?php echo $allcourses[$key]['id'].'&type=course';?>')" data-toggle="modal" data-target="#myModal" type="button" name="edit" value="Edit" class="btn btn-warning btn-xs"></td>

                      </tr>

                    <?php } ?>

                    </tbody>

                  </table>

                </div>



        

</div>

</div>