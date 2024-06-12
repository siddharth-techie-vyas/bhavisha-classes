

<div class='card-header'>

                        <h4>Add New Subject</h4>

                    </div>

<div class="content">

<div class="row">



<div class="col-sm-12">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Add New Subject</h4>

                  <div id="msgcreate_subject"></div>

                  <form action="<?php echo $base_url.'index.php?action=course&query=create_subject';?>" method="post" name="create_subject" id="create_subject" class="form-sample">

                    

                    <div class="row">

                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Subject Name</label>

                          <div class="col-sm-8">

                            <input type="text" name="subject" class="form-control" required/>

                          </div>

                        </div>

                      </div>



                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course</label>

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


                      <div class="col-md-4">

                        <div class="form-group row">

                          <label class="col-sm-4 col-form-label">Fee</label>

                          <div class="col-sm-8">

                            <input type="text" name="fee" class="form-control" required/>

                          </div>

                        </div>

                      </div>
                      

                      <div class="col-md-12">

                        <div class="form-group row">

                         

                          <div class="col-sm-2"><input type="button" onclick="form_submit('create_subject')" class="btn btn-success btn-md" value="Save"></div>

                          <div class="col-sm-2"><input type="reset" class="btn btn-info btn-md" value="Reset"></div> 

                        </div>

                      </div>



                    </div>

                  </form>

                </div>

              </div>

            </div>

</div>



<div class="row">

            <div class="col-sm-12">

                

                  <table class="table" id="data-table">

                    <thead>

                      <tr>

                        <th>S.No.</th>

                        <th>Course Name</th>

                        <th>Subject</th>

                        <th>Fee</th>
                        <th>Level / Position</th>

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

                      <tr id="<?php echo $allsubject[$key]['id'];?>">

                        <td><?php echo $counter++;?></td>

                        <td><?php $cname = $course->get_one($allsubject[$key]['course_name'],'id'); 

                        echo $cname[0]['course_name'];?></td>

                        <td><?php if(is_numeric($allsubject[$key]['subject']))

                                  {

                                    $sname = $course->get_one($allsubject[$key]['subject'],'id'); 

                                    echo $sname[0]['subject'];

                                  }

                                  else

                                  {

                                   echo $allsubject[$key]['subject']; 

                                  }



                          ?></td>

                        <td><?php echo $allsubject[$key]['fee'];?></td>  
                        <td>
                            <form id="sort<?php echo $allsubject[$key]['id'];?>" name="sort<?php echo $allsubject[$key]['id'];?>" action="<?php echo $base_url.'index.php?action=course&query=sort_set'?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $allsubject[$key]['id'];?>" />   
                            <select name="sort" onchange="form_submit3('sort<?php echo $allsubject[$key]['id'];?>')">
                                <option value="0">0</option>
                                <?php
                                    for($i=1; $i<=count($allsubject); $i++)
                                    {
                                        echo "<option value='".$i."' ";  
                                        if($allsubject[$key]['sort'] == $i) {echo "selected='selected'";}
                                        echo ">".$i."</option>";
                                    }
                                ?>
                            </select>
                            </form>
                            <span id="msgsort<?php echo $allsubject[$key]['id'];?>"></span>
                            
                        </td>

                        <td><input type="button" class="btn btn-xs btn-danger" name="delete" value="Delete" onclick="deleteme('course','delete','<?php echo $allsubject[$key]['id'];?>')"></td>

                        <td><input onclick="show_page_model('index.php?action=nocss_pages&page=course_edit&id=<?php echo $allsubject[$key]['id'];?>&type=subject')" data-toggle="modal" data-target="#myModal" type="button" name="edit" value="Edit" class="btn btn-warning btn-xs"></td>

                      </tr>

                    <?php } ?>

                    </tbody>

                  </table>

                </div>



              </div>  

</div>