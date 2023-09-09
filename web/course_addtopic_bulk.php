<div class='card-header'>
                        <h4>Bulk Add Topic</h4>

                    </div>
                    
<div class="">
   <div id="msgcourse_topic_bulk"></div>
                  <form action="<?php echo $base_url.'index.php?action=course&query=create_topic_bulk';?>" method="post" name="course_topic_bulk" id="course_topic_bulk" class="form-sample">
<div class="row">                      
<div class="col-sm-12">
                      
                      <div class="col-md-4">
                        <div class="form-group row">
                           <label class="col-form-label">Class</label> 
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

                      <div class="col-md-4">
                        <div class="form-group row">
                          <label>Subject</label>
                            <select class="form-control" name="subject" id="subject" onchange="get_details('subject','subject','chapter')">
                             <option disabled="">-- Select ---</option>
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group row">
                          
                          <label>Chapter Name</label>
                            <select class="form-control" name="chapter" id="chapter">
                             <option disabled="">-- Select ---</option>
                            </select>
                          </div>
                      </div>

                      <div class="col-md-12">
                                  <div id="addmore_topic"></div>
                                  
                        
                      </div>

                      <div class="col-sm-6">

                        <input type="button" name="topic" class="btn btn-md btn-primary" value="Add More Topics" id="topic_btn">
                        <input type="button" name="bulkupload" value="Save" class="btn btn-success btn-md" onclick="form_submit('course_topic_bulk')">
                      </div>

                     
</div>                      
</div>

</form>
</div>

</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- Tabs content -->
<!--- MCQ SCRIPT--->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_topic"); //Fields wrapper
var add_button      =  $("#topic_btn"); //Add button ID
var x = 0; //initlal text box count

        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_topic'+x+'"  class="form-group row"><div class="col-sm-4"><label>Topic Name '+x+'</label></div><div class="col-sm-7"><input type="text" name="topic[]" class="form-control" required/></div><div class="col-sm-1"><input type="button" onclick=removeme("addmore_topic'+x+'") class="btn btn-xs btn-danger" value="X"></div></div></div>'); 

        
        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});



</script>
