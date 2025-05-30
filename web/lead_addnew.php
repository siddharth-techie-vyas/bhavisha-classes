<div class='card-header'>

                        <h4>Add New Leads</h4>

                    </div>

<div class="content">

<div class="row">

<div class="col-sm-12">

              <div class="card">

                <div class="card-body">

                  <div id="msgcreate_leads"></div>

                  <form action="<?php echo $base_url.'index.php?action=lead&query=create_leads';?>" method="post" name="create_leads" id="create_leads" class="form-sample" enctype='multipart/form-data'>

                   <input type="hidden" value="0" name="branch">

                   <input type="hidden" value="0" name="demo">

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Date <span class='text-danger'>*</span></label>

                          <div class="col-sm-9">

                            <input type="date" name="ldate" class="form-control"  value="<?php echo date("Y-m-d");?>" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Name <span class='text-danger'>*</span></label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" name="uname" required>

                          </div>

                        </div>

                       

                    </div>

                  </div>



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Course <span class='text-danger'>*</span></label>

                          <div class="col-sm-9">

                           <select class="form-control" id="courseid" name="course_name" onchange="get_details('course_name','courseid','subject')" required>

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



                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Subject <span class='text-danger'>*</span></label>

                          <div class="col-sm-9">

                            <select class="form-control" name="subject[]" id="subject" multiple='multiple' required>

                             <option disabled="">-- Select ---</option>

                            </select>

                          </div>

                        </div>

                      </div>



                      </div>

                      

                    

                    <!-- <div class="row">

                          <div class="col-md-6">

                            <div class="form-group row">

                              <label class="col-sm-3 col-form-label">School / College <span class='text-danger'>*</span></label>

                              <div class="col-sm-9">

                                    <input type="text" class="form-control" name="school" id="membershipRadios1" value="" required>

                              </div>

                            </div>

                          </div>



                          <div class="col-md-3">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">X %</label>

                            <div class="col-sm-9">

                              <input type="text" name="xper" class="form-control" />

                            </div>

                          </div>

                      </div>



                      <div class="col-md-3">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">XII % </label>

                            <div class="col-sm-9">

                              <input type="text" name="xiiper" class="form-control" />

                            </div>

                          </div>

                      </div>



                    </div> -->



                  



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">DOB <span class='text-danger'>*</span></label>

                          <div class="col-sm-9">

                            <input type="date" name="dob" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Medium </label>

                          <div class="col-sm-9">

                            <select class="form-control" name="medium">

                              <option disabled="" selected="">-- Select --</option>

                              <option>Hindi</option>

                              <option>English</option>

                            </select>

                          </div>

                        </div>

                      </div>

                    </div>



                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Reference </label>

                          <div class="col-sm-9">

                            <select name="reference" class="form-control" >

                              <option disabled="disabled" style="font-weight: bold;" selected="selected">-- Select --</option>

                              <?php $reference = $admin->getonetype_meta_data('reference');

                                    foreach($reference as $k => $value)

                                    {

                                      echo "<option value='".$reference[$k]['meta_value2']."'>".$reference[$k]['meta_value1']."</option>";

                                    }

                               ?>

                               <option disabled="disabled" style="font-weight: bold;">-- Faculties --</option>

                              <?php $reference1 = $admin->getonetype_user('2');

                                    foreach($reference1 as $k => $value)

                                    {

                                      echo "<option value='".$reference1[$k]['id']."'>".$reference1[$k]['uname']."</option>";

                                    }

                               ?>

                            </select>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Remark</label>

                          <div class="col-sm-9">

                            <input name="remark" type="text" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                    </div>



                      <div class="row">

                    

                      

                      <div class="col-md-6">

                         <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Contact <span class='text-danger'>*</span></label>

                          <div class="col-sm-9">

                            <input type="text" name="contact" class="form-control" required/>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Email</label>

                          <div class="col-sm-9">

                            <input type="email" name="email" class="form-control" required/>

                          </div>

                        </div>

                      </div>



                    </div>



                      <div class="row">
                        <div class="col-sm-12" id="addmore_edu_div"></div>
                        <div class="col-sm-12">
                          <div class="col-sm-4">
                            <input type="button" name="addmore_doc" value="Add More Education Detail(s)" class="btn btn-success btn-sm" id="addmore_edu_btn"/>
                          </div>
                        </div>
                      </div>              
                                    <hr>
                    



                     <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <div class="col-sm-6"><input type="reset" class="btn btn-info btn-md" value="Reset"></div>

                          <div class="col-sm-6"><input type="submit"  class="btn btn-success btn-md" value="Save"></div>

                          

                        </div>

                      </div>



                    </div>

                  </form>

                </div>

              </div>

            </div>

         </div>   

    </div>   



    
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_edu_div"); //Fields wrapper
var add_button      =  $("#addmore_edu_btn"); //Add button ID
var x = 0; //initlal text box count

        
$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div class="col-sm-12" id="addmoreedu'+x+'"><div class="col-sm-2">Class '+x+'<input type="text" name="class[]" class="form-control"></div><div class="col-sm-2">Subject '+x+'<input type="text" name="subject[]" class="form-control"></div><div class="col-sm-2">Min Marks '+x+'<input type="text" name="min_marks[]" class="form-control"></div><div class="col-sm-2">Max Marks '+x+'<input type="text" name="max_marks[]" class="form-control"></div><div class="col-sm-2">File '+x+'<input type="file" name="marksheet[]" class="form-control"></div><div class="col-sm-2">School '+x+'<input type="text" name="school[]" class="form-control"></div><div class="col-sm-1"><input type="button" onclick=removeme("addmoreedu'+x+'") class="btn btn-xs btn-danger" value="X"></div></div>'); 

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


</script>	