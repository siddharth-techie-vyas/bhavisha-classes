<?php $edit=$course->viewone_course($_GET['id']); ?>
<div id="msgedit_topic"></div>
<form action="<?php echo $base_url.'index.php?action=course&query=create_topic_edit';?>" method="post" name="edit_topic" id="edit_topic" class="form-sample">
                    <input type="hidden" value="<?php echo $edit[0]['id'];?>" name="id">
                    <div class="row">
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Class</label>
                          <div class="col-sm-8">
                           <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')">
                              <option disabled="" selected="">-- Select Course --</option>
                              <?php $allcourses = $course->viewall();  foreach ($allcourses as $key => $value) {?>
                              <option <?php if($edit[0]['course_name']==$allcourses[$key]['id']){?>selected='selected'<?php }?> value="<?php echo $allcourses[$key]['id'];?>">
                                <?php echo $allcourses[$key]['course_name'];?>
                              </option>  
                            <?php }?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Subject</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                             <option disabled="">-- Select ---</option>
                             <?php $allsubject = $course->viewall_subject(); foreach($allsubject as $key =>$value) {?>
              <option <?php if($edit[0]['subject']==$allsubject[$key]['id']){?>selected='selected'<?php }?> value="<?php echo $allsubject[$key]['id'];?>"><?php echo $allsubject[$key]['subject'];?></option>
             <?php }?>  

                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Chapter Name</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="chapter" id="chapter">
                             <option disabled="">-- Select ---</option>
                             <?php $allchapter = $course->viewall_chapter(); foreach($allchapter as $key =>$value) {?>
              <option <?php if($edit[0]['chapter']==$allchapter[$key]['id']){?>selected='selected'<?php }?> value="<?php echo $allchapter[$key]['id'];?>"><?php echo $allchapter[$key]['chapter'];?></option>
             <?php }?>  

                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Topic Name</label>
                          <div class="col-sm-8">
                            <input type="text" name="topic" class="form-control" value="<?php echo $edit[0]['topic'];?>" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Topic Level</label>
                          <div class="col-sm-8">
                            <select class="form-control" name="topic_level">
                              <option disabled="" selected="">--Select--</option>
                              <?php 
                              $level = $admin->getonetype_meta_data('topic_level');
                              foreach ($level as $key => $value) {
                                ?>
                                <option <?php if($edit[0]['topic_level']==$level[$key]['meta_value2']){?>selected='selected'<?php }?> value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option>
                                <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Topic Content</label>
                          <div class="col-sm-10">
                            <textarea cols="10" rows="10" name="content" id="editor2"> <?php echo $edit[0]['content'];?></textarea>
                          </div>
                        </div>
                      </div>
                     
                      <div class="col-md-8">
                        <div class="form-group row">
                         
                          <div class="col-sm-12"><input type="button" onclick="form_submit('edit_topic')" class="btn btn-success btn-md" value="Edit"></div> 
                        </div>
                      </div>

                    </div>
                  </form>

<script src="<?php echo $base_url;?>theme/js/jquery.min.js"></script>
<script src="<?php echo $base_url;?>theme/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>theme/js/menu.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>theme/js/function.js"></script>



<!-- ck editor-->
<script>
        var $ckfield =CKEDITOR.replace( 'editor2' );
         $ckfield.on('change', function() {
          
            $ckfield.updateElement();         
          });
</script>