<?php 
$id=$_REQUEST['id'];
$get_details = $course->get_one_handmade_notes($id);
                                    $cname = $course->get_one($get_details[0]['courseid'],'id'); 
                                    $course0 = $cname[0]['course_name'];
                                    $sname = $course->get_one($get_details[0]['subjectid'],'id'); 
                                    $subject = $sname[0]['subject'];                                 
                                    $chname = $course->get_one($get_details[0]['chapterid'],'id'); 
                                    $chapter = $chname[0]['chapter'];
                                  
?>
<div class="content">
 
                      <div class='card-header'> 
                        <h4>Add Notes</h4>
                        <h5><?php echo $course0.' / '.$subject.' / '.$chapter;?></h5>
                      </div>

                      <div class='col-sm-12'>
                        <?php if(isset($_GET['status'])=='success')
                        {echo "<div class='alert alert-success'>Notes Addess Successfully !!!</div>";}
                        if(isset($_GET['status'])=='danger')
                        {echo "<div class='alert alert-danger'>Notes Addess failed !!!</div>";}
                        ?>
                      </div>
                      <div class="panel with-nav-tabs panel-default">
                          <div class="panel-heading">
                                  <ul class="nav nav-tabs">
                                      <li class="active"><a href="#tab1default" data-toggle="tab">File Upload</a></li>
                                      <li><a href="#tab2default" data-toggle="tab">Custom Add</a></li>
                                      <li><a href="#tab3default" data-toggle="tab">View / Print</a></li>
                                      
                                  </ul>
                          </div>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div class="tab-pane fade in active" id="tab1default">
                                  <form action="<?php echo $base_url.'index.php?action=course&query=create_handmade_notes_add_file';?>" method="post" name="create_handmade_notes_add_file">
                                    <div class='col-sm-12'>
                                      <div class='col-sm-4'>
                                        <label>File Upload (Doc / Docx / PDF)</label>
                                      </div>
                                      <div class='col-sm-4'>
                                      <input type='hidden' value='<?php echo $_GET['id']; ?>' name='hid'/>
                                        <input type='file' name='topic_file' class='form-control' accept="application/pdf,application/doc" required/>
                                      </div>
                                      <div class='col-sm-4'>
                                        <input type='reset' name='reset' value='Reset' name='reset' class='btn btn-info'/>
                                        <input type='button' name='submit' value='File Upload' name='submit' class='btn btn-success'/>
                                      </div>
                                    </div>
                                  </form>
                                  </div>


                                  <div class="tab-pane fade" id="tab2default">
                                    <h3>Manual Add</h3>
                                    <form action="<?php echo $base_url.'index.php?action=course&query=create_handmade_notes_add';?>" method="post" name="create_handmade_notes_add" id="create_handmade_notes_add">
                                              <div class="row">
                                                      <div class="col-md-4">
                                                                      <label>Topic Name 1</label>
                                                                      <input type='hidden' value='<?php echo $_GET['id']; ?>' name='hid'/>
                                                                      <select name="tid" class="form-control" required>
                                                                      <?php 
                                                                          $topicid = $course->viewall_topic_single_chapter($get_details[0]['chapterid']); 
                                                                          foreach($topicid as $row => $value)
                                                                          {
                                                                              echo "<option value='".$topicid[$row]['id']."'>".$topicid[$row]['topic']."</option>";
                                                                          }
                                                                      ?>
                                                                      </select> 
                                                      </div>
                                                      <div class="col-md-8">                                
                                                                      <label>Description</label>                                    
                                                                      <textarea name="tcontent"></textarea>
                                                      </div>
                                              </div>
                      
                                              <div id="addmore_topic"></div>
                      
                      
                                                <div class="row">
                                                    <!--<input type="button" name="topic" class="btn btn-md btn-primary" value="Add More Topics" id="topic_btn">-->
                                                    <input type="submit" class="btn btn-success btn-md" value="Submit">
                                                </div>
                                        
                                       
                                        </form>
                                  </div>



                                  <div class="tab-pane fade" id="tab3default"><h4>View / Print</h4>
                                      <table class='table'>
                                            <tr>
                                              <th>S.No.</th>
                                              <th>Topic</th>
                                              <th>Content</th>
                                              <th>Utility</th>
                                            </tr>
                                            <?php 
                                            $counter=1;
                                              $topics =$course->get_one_handmade_notes_content($_GET['id']);
                                              foreach($topics as $row=> $value){
                                            ?>
                                            <tr>
                                              <td><?php echo $counter++; ?></td>
                                              <td><?php  $tname = $course->get_one($topics[$row]['tid'],'id'); 
                                                   echo $tname[0]['topic'];?></td>
                                              <td><?php echo $topics[$row]['tcontent'];?></td>
                                              <td>
                                                <input type="button" name="edit" value="Edit" class="btn btn-sm btn-warning" >
                                                <input type="button" name="delete" value="Delete" class="btn btn-sm btn-danger" >
                                              </td>

                                            </tr>
                                            <?php }?> 
                                      </table>
                                  </div>
                              </div>
                          </div>
                        </div>


            </div>


<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_topic"); //Fields wrapper
var add_button      =  $("#topic_btn"); //Add button ID
var x = 1; //initlal text box count

        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div class="row"><div id="addmore_topic'+x+'"  class="form-group row"><div class="col-sm-1"><label>Topic Name '+x+'</label></div><div class="col-sm-3><input type="text" name="topic[]" class="form-control" required/></div><div class="col-md-7"><label>Description</<textarea name="description[]"></textarea></div><div class="col-sm-1"><input type="button" onclick=removeme("addmore_topic'+x+'") class="btn btn-xs btn-danger" value="X"></div></div></div>'); 

   // ('<div class="row" id="addmore_topic'+x+'"><div class="col-md-4" <label>Topic Name '+x+'</label><select name="topicid[]" class="form-control"><?php$topicid=$course->viewall_topic_single_chapter($get_details[0]['chapterid']);foreach($topicid as $row => $value)  { echo "<option value='".$topicid[$row]['id']."'>".$topicid[$row]['topic']."</option>";}  ?></select></div><div class="col-md-8"><label>Description</<textarea name="description[]"></textarea></div></div>')

        
        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});



</script>