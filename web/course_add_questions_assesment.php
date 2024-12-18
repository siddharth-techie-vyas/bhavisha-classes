<?php $topic = $course->viewone_course($_GET['id']);

                                    $sname = $course->get_one($topic[0]['subject'],'id'); 
                                    $sname = $sname[0]['subject'];
                                    
                                     $Chapter = $course->get_one($topic[0]['chapter'],'id'); 
                                     $Chapter = $Chapter[0]['chapter'];
                                  
      $level = $admin->getonetype_meta_data('topic_level');
      $qused = $admin->getonetype_meta_data('question_used');  
      $qtype = $admin->getonetype_meta_data('question_type_level');                
?>
<style type="text/css">
  .nav-tabs li{min-width:80px; padding: 5px; margin-left: 5px; border:1px solid #d8d8d8; }
  .tab-content{width: auto; position: relative; background:#FFFFFF; padding: 5px;}
  .tab-pane{background: #FFF; border: 1px solid #d8d8d8; padding: 15px;}  


</style>

<div class='card-header'>
                        <h4>Add New Question for :- <?php echo '( Subject :- '.$sname.' ) '.' ( Chapter :- '.$Chapter.' ) (Topic :-'.$topic[0]['topic'].' )';?></h4>
                    </div>

<div class="row">
<div class="col-sm-12">
                <div class="card-body">
                        
                        <div id="msgcreate_assessment"></div>
                        <div id="msgcreate_fill"></div>
                        <div id="msgcreate_mcq"></div>
                        <div id="msgcreate_short"></div>
                        <div id="msgcreate_long"></div>
                        <div id="msgcreate_group"></div>
                        <div id="msgfrmCSVImport">
                          <?php 
                          if($_GET['type']=='success')
                          {echo "<div class='alert alert-success'>CSV Uploaded Successfully</div>";}
                          if($_GET['type']=='danger')
                          {echo "<div class='alert alert-danger'>CSV Uploaded Failed !!! Please try again</div>";}
                          ?>
                        </div>




                        <div id="exTab2"> 
                        <ul class="nav nav-tabs">
                              <li class="active">
                                <a  href="#1" data-toggle="tab">Fill In The Blanks</a>
                              </li>
                              <li><a href="#2" data-toggle="tab">MCQ</a>
                              </li>
                              <li><a href="#3" data-toggle="tab">Short Questions</a>
                              </li>
                              <li><a href="#4" data-toggle="tab">Long Questions</a>
                              </li>
                              <!--<li><a href="#5" data-toggle="tab">Group Questions</a>
                              </li>-->
                              <li><a href="#6" data-toggle="tab">Bulk Upload</a>
                              </li>
                            </ul>

                              <div class="tab-content ">
                                <!--- FILL IN THE BLANKS--->
                                <div class="tab-pane active" id="1">

                                  <form action="<?php echo $base_url.'index.php?action=course&query=course_add_questions_assesment';?>" method="post" name="create_fill" id="create_fill" class="form-sample">

                                    <input type="hidden" name="tid" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" name="qtype" value="1">
                                  <div id="addmore_fill"></div>
                                  <input type="button" name="fill_btn"  class="btn btn-xs btn-warning" value="Add Questions" id="fill_btn">
                                  <input type="button" onclick="form_submit('create_fill')" id="save_fill" class="btn btn-success btn-xs" value="Save Fill In the Blank Questions">

                                  <a href="<?php echo $base_url.'theme/images/fill_data.csv'?>" class="btn btn-xs btn-primary">Download CSV</a>

                                  </form>

                                  <div  class="col-sm-12" >
                                    <hr>
                                    <table class="table" id="datatable">
                                      <thead>
                                        <th>Part 1</th>
                                        <th>Part 2</th>
                                        <th>Solution</th>
                                        <th>Explanation</th>
                                        <th>Used For</th>
                                        <th>Utility</th>
                                      </thead>
                                      <tbody>
                                    <?php 

                                      if(isset($_GET['notes']))
                                      {$fill_question = $course->viewall_questions_notes($_GET['id'],'1');}
                                      else
                                      {$fill_question = $course->viewall_questions($_GET['id'],'1');}


                                      foreach ($fill_question as $key => $value) {
                                        
                                        ?>
                                        <tr id="<?php echo $fill_question[$key]['id'];?>">
                                          <td><?php echo $fill_question[$key]['part1']; ?></td>
                                          <td><?php echo $fill_question[$key]['part2']; ?></td>
                                          <td><?php echo $fill_question[$key]['solution']; ?></td>
                                          <td><?php echo $fill_question[$key]['explanation']; ?></td>
                                          <td><?php $fiqused = $admin->getone_meta_data('question_used',$fill_question[$key]['qused']); echo $fiqused[0]['meta_value1']; ?></td>
                                          <td><input type="button" name="delete" value="Delete" class="btn btn-xs btn-danger" onclick="deleteme('course','question_delete','<?php echo $fill_question[$key]['id'];?>')"> <input type="button" name="edit" value="Edit" class="btn btn-xs btn-info"></td>
                                        </tr>

                                      <?php } ?>
                                      </tbody>
                                      </table>
                                  </div>

                                </div>

                                <!--- MCQ--->
                                <div class="tab-pane" id="2">
                                  <form action="<?php echo $base_url.'index.php?action=course&query=course_add_questions_assesment';?>" method="post" name="create_mcq" id="create_mcq" class="form-sample">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" name="qtype" value="2">
                                  <div id="addmore_mcq"></div>
                                  <input type="button" name="fill_mcq" class="btn btn-xs btn-info" value="Add MCQ Questions" id="mcq_btn">
                                  <input type="button" id="save_mcq" onclick="form_submit('create_mcq')" class="btn btn-success btn-xs" value="Save MCQ Questions">

                                  <a href="<?php echo $base_url.'theme/images/mcq_data.csv'?>" class="btn btn-xs btn-primary">Download CSV</a>
                                  </form>

                                  <div  class="col-sm-12" >
                                    <hr>
                                    <table class="table" id="data-table1">
                                      <thead>
                                        <th>Question</th>
                                        <th>Option(s)</th>
                                        <th>Solution</th>
                                        <th>Used For</th>
                                        <th>Utility</th>
                                      </thead>
                                      <tbody>
                                    <?php 
                                      if(isset($_GET['notes']))
                                      {$fill_question = $course->viewall_questions_notes($_GET['id'],'2');}
                                      else
                                      {$fill_question = $course->viewall_questions($_GET['id'],'2');}


                                      foreach ($fill_question as $key => $value) {
                                        
                                        ?>
                                        <tr id="<?php echo $fill_question[$key]['id']; ?>">
                                          <td><?php echo $fill_question[$key]['part1']; ?></td>
                                          <td><?php echo $fill_question[$key]['opt1']; ?><br>
                                              <?php echo $fill_question[$key]['opt2']; ?><br>
                                              <?php echo $fill_question[$key]['opt3']; ?><br>
                                              <?php echo $fill_question[$key]['opt4']; ?></td>
                                          <td><?php echo $fill_question[$key]['solution']; ?></td>
                                          <td><?php $fqused = $admin->getone_meta_data('question_used',$fill_question[$key]['qused']); echo $fqused[0]['meta_value1']; ?></td>
                                          <td><input type="button" name="delete" value="Delete" class="btn btn-xs btn-danger" onclick="deleteme('course','question_delete','<?php echo $fill_question[$key]['id'];?>')"> 

                                            <input data-toggle="modal" data-target="#myModal" type="button" name="edit" value="Edit" class="btn btn-xs btn-info" onclick="show_page_model('index.php?action=nocss_pages&page=course_edit_question&id=<?php echo $fill_question[$key]['id'];?>')">
                                          </td>
                                        </tr>

                                      <?php } ?>
                                      </tbody>
                                      </table>
                                  </div>
                                </div>

                                <!--- SHORT QUESTIONS--->
                                <div class="tab-pane" id="3">
                                  <form action="<?php echo $base_url.'index.php?action=course&query=course_add_questions_assesment';?>" method="post" name="create_short" id="create_short" class="form-sample">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" name="qtype" value="3">
                                  <div id="addmore_short"></div>
                                  <input type="button" name="fill_short" class="btn btn-xs btn-danger" value="Add Short Questions" id="short_btn">
                                  <input type="button" id="save_short" onclick="form_submit('create_short')" class="btn btn-success btn-xs" value="Save Short Questions">
                                  <a href="<?php echo $base_url.'theme/images/short_data.csv'?>" class="btn btn-xs btn-primary">Download CSV</a>
                                  </form>

                                  <div  class="col-sm-12" >
                                    <hr>
                                    <table class="table" id="datatable2">
                                      <thead>
                                        <th>Question</th>
                                        <th>Solution</th>
                                        <th>Explanation</th>
                                        <th>Used For</th>
                                        <th>Utility</th>
                                      </thead>
                                      <tbody>
                                    <?php 
                                    if(isset($_GET['notes']))
                                      {$fill_question = $course->viewall_questions_notes($_GET['id'],'3');}
                                      else
                                      {$fill_question = $course->viewall_questions($_GET['id'],'3');}
 
                                      foreach ($fill_question as $key => $value) {
                                        
                                        ?>
                                        <tr id="<?php echo $fill_question[$key]['id']; ?>">
                                          <td><?php echo $fill_question[$key]['part1']; ?></td>
                                          <td><?php echo $fill_question[$key]['solution']; ?></td>
                                          <td><?php echo $fill_question[$key]['explanation']; ?></td>
                                          <td><?php $fqused = $admin->getone_meta_data('question_used',$fill_question[$key]['qused']); echo $fqused[0]['meta_value1']; ?></td>
                                          <td><input type="button" name="delete" value="Delete" class="btn btn-xs btn-danger" onclick="deleteme('course','question_delete','<?php echo $fill_question[$key]['id'];?>')"> <input type="button" name="edit" value="Edit" class="btn btn-xs btn-info"></td>
                                        </tr>

                                      <?php } ?>
                                      </tbody>
                                      </table>
                                  </div>
                                </div>

                                <!--- LONG QUESTIONS--->
                                <div class="tab-pane" id="4">
                                  <form action="<?php echo $base_url.'index.php?action=course&query=course_add_questions_assesment';?>" method="post" name="create_long" id="create_long" class="form-sample">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" name="qtype" value="4">
                                  <div id="addmore_long"></div>
                                  <input type="button" name="fill_long" class="btn btn-xs btn-primary" value="Add Long Questions" id="long_btn">
                                  <input type="button" id="save_long" onclick="form_submit('create_long')" class="btn btn-success btn-xs" value="Save Long Questions">
                                  <a href="<?php echo $base_url.'theme/images/long_data.csv'?>" class="btn btn-xs btn-primary">Download CSV</a>
                                  </form>

                                  <div  class="col-sm-12" >
                                    <hr>
                                    <table class="table" id="datatable3">
                                      <thead>
                                        <th>Question</th>
                                        <th>Solution</th>
                                        <th>Used For</th>
                                        <th>Utility</th>
                                      </thead>
                                      <tbody>
                                    <?php 
                                    if(isset($_GET['notes']))
                                      {$fill_question = $course->viewall_questions_notes($_GET['id'],'4');}
                                      else
                                      {$fill_question = $course->viewall_questions($_GET['id'],'4');}
 
                                      foreach ($fill_question as $key => $value) {
                                        
                                        ?>
                                        <tr>
                                          <td><?php echo $fill_question[$key]['part1']; ?></td>
                                          <td><?php echo $fill_question[$key]['solution']; ?></td>
                                          <td><?php $fqused = $admin->getone_meta_data('question_used',$fill_question[$key]['qused']); echo $fqused[0]['meta_value1']; ?></td>
                                          <td><input type="button" name="delete" value="Delete" class="btn btn-xs btn-danger" onclick="deleteme('course','question_delete','<?php echo $fill_question[$key]['id'];?>')"> <input type="button" name="edit" value="Edit" class="btn btn-xs btn-info"></td>
                                        </tr>

                                      <?php } ?>
                                      </tbody>
                                      </table>
                                  </div>
                                </div>


                                 <!--- Group QUESTIONS--->
                                <div class="tab-pane" id="5">
                                  <form action="<?php echo $base_url.'index.php?action=course&query=course_add_questions_assesment';?>" method="post" name="create_group" id="create_group" class="form-sample">
                                    <input type="hidden" name="tid" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" name="qtype" value="5">
                                    
                                    <div class="row">
                                    <div class="col-sm-7">
                                    <label>Primary Question</label>
                                    <input type="text"  name="part1" class="form-control">
                                    </div>
                                    <div class="col-sm-4"><label>Level</label><select class="form-control" name="level[]"><option disabled="" selected="">--Select--</option><?php foreach ($level as $key => $value) { ?><option value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option><?php } ?></select></div>
                                    </div>

                                  <div id="addmore_group"></div>
                                  <input type="button" name="fill_group" class="btn btn-xs btn-secondary" value="Add Long Questions" id="group_btn">
                                  <input type="button" id="save_group" onclick="form_submit('create_group')" class="btn btn-success btn-xs" value="Save Group Questions">
                                  </form>

                                  <div  class="col-sm-12" >
                                    <hr>
                                    <table class="table">
                                      <thead>
                                        <th>Part 1</th>
                                        <th>Solution</th>
                                        <th>Part 2</th>
                                        <th>Utility</th>
                                      </thead>
                                      <tbody>
                                    <?php 
                                    if(isset($_GET['notes']))
                                      {$fill_question = $course->viewall_questions_notes($_GET['id'],'5');}
                                      else
                                      {$fill_question = $course->viewall_questions($_GET['id'],'5');}
 
                                      foreach ($fill_question as $key => $value) {
                                        
                                        ?>
                                        <tr>
                                          <td><?php echo $fill_question[$key]['part1']; ?></td>
                                          <td><?php echo $fill_question[$key]['part2']; ?></td>
                                          <td><?php echo $fill_question[$key]['solution']; ?></td>
                                          <td><input type="button" name="delete" value="Delete" class="btn btn-xs btn-danger" onclick="deleteme('course','question_delete','<?php echo $fill_question[$key]['id'];?>')"> <input type="button" name="edit" value="Edit" class="btn btn-xs btn-info"></td>
                                        </tr>

                                      <?php } ?>
                                      </tbody>
                                      </table>
                                  </div>
                                </div>

                                 <!--- bulk upload--->
                                <div class="tab-pane" id="6">
                                 
                                  <form class="form-horizontal" action="<?php echo $base_url.'index.php?action=course&query=csvupload_question';?>" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                                    <div class="row">
                                      <div class="col-sm-4">
                                        <label class="control-label">Choose CSV File</label>
                                        <input type="hidden" name="url" value="<?php echo $base_url.'index.php?action=dashboard&page=course_add_questions_assesment&id='.$_GET['id'];?>">
                                        <input type="hidden" name="tid" value="<?php echo $_GET['id'];?>">
                                        <input class="form-control" type="file" name="file" id="file" accept=".csv">
                                      </div>
                                      <div class="col-sm-4">
                                        <label>Question Type</label>
                                        <select class="form-control" name="qtype" required>
                                          <option disabled="" selected="selected">--Select--</option>
                                          <?php /*foreach($qtype as $k => $value)
                                          {
                                            echo "<option value='".$qtype[$k]['meta_value2']."'>".$qtype[$k]['meta_value1']."</option>";
                                          }*/
                                          ?>
                                          <option value="2">MCQ</option>
                                          <option value="3">Short Question</option>
                                          <option value="4">Long Question</option>
                                        </select>
                                      </div>  
                                      <div class="col-sm-4">  
                                        <button type="submit" id="submit" name="import"  class="btn btn-success btn-md">Import</button>
                                      </div>  
                                    </div>
                                  </form>

                                </div>

                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                            


                </div>
            </div>
</div>  


<!-- fill in the blanks--->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_fill"); //Fields wrapper
var add_button      =  $("#fill_btn"); //Add button ID
var x = 0; //initlal text box count

        if(x=='0')
           {$('#save_fill').css("display","none");}
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_fill'+x+'"  class="row"><hr><div class="col-sm-12"><h4>Fill in the blanks '+x+'</h4><hr></div><div class="col-sm-4"><label>Part 1</label><input type="text" class="form-control" name="part1[]"></div><div class="col-sm-4"><label>Part 2</label><input type="text" class="form-control" name="part2[]"></div><div class="col-sm-4"><label>Solution</label><input type="text" class="form-control" name="solution[]"></div><div class="col-sm-4"><label>Explanation</label><input type="text" class="form-control" name="explanation[]"></div><div class="col-sm-3"><label>Level</label><select class="form-control" name="level[]"><option disabled="" selected="">--Select--</option><?php foreach ($level as $key => $value) { ?><option value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-2"><label>Marks</label><input type="number" min="0" max="100" name="marks[]" class="form-control"/></div><div class="col-sm-2"><label>Used For</label><select class="form-control" name="qused[]"><option disabled="" selected="">--Select--</option><?php foreach ($qused as $key => $value) { ?><option value="<?php echo $qused[$key]['meta_value2'];?>"><?php echo $qused[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-1"><br><input type="button" onclick=removeme("addmore_fill'+x+'") class="btn btn-xs btn-danger" value="X"></div></div>'); 

         if(x>'0')
           {$('#save_fill').show();}

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


</script>


<!--- MCQ SCRIPT--->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_mcq"); //Fields wrapper
var add_button      =  $("#mcq_btn"); //Add button ID
var x = 0; //initlal text box count

        if(x=='0')
           {$('#save_mcq').css("display","none");}
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_mcq'+x+'"  class="row"><hr><div class="col-sm-12"><h4>MCQ '+x+'</h4></div><div class="col-sm-6"><label>Question</label><textarea name="part1[]" id="editor1'+x+'" class="editor_all"></textarea></div><div class="col-sm-6"><div class="col-sm-6"><label>Option A</label><input type="text" class="form-control" name="opt1[]"></div><div class="col-sm-6"><label>Option B</label><input type="text" class="form-control" name="opt2[]"></div><div class="col-sm-6"><label>Option C</label><input type="text" class="form-control" name="opt3[]"></div><div class="col-sm-6"><label>Option D</label><input type="text" class="form-control" name="opt4[]"></div><div class="col-sm-6"><label>Solution</label><input type="text" class="form-control" name="solution[]"></div><div class="col-sm-6"><label>Level</label><select class="form-control" name="level[]"><option disabled="" selected="">--Select--</option><?php foreach ($level as $key => $value) { ?><option value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-6"><label>Marks</label><input type="number" min="0" max="100" name="marks[]" class="form-control" value="1"/></div><div class="col-sm-5"><label>Used For</label><select class="form-control" name="qused[]"><option disabled="" selected="">--Select--</option><?php foreach ($qused as $key => $value) { ?><option value="<?php echo $qused[$key]['meta_value2'];?>"><?php echo $qused[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-1"><br><input type="button" onclick=removeme("addmore_mcq'+x+'") class="btn btn-xs btn-danger" value="X"></div> </div><div class="col-sm-12"><label>Explanation</label><textarea name="explanation[]" id="editor2'+x+'"  class="editor_all"></textarea></div></div>'); 

         if(x>'0')
           {$('#save_mcq').show();}

          
          //  ck_config('editor1'+x+'');
          //  ck_config('editor2'+x+'');
         
          $('.editor_all').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});



</script>


<!----- short question --->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_short"); //Fields wrapper
var add_button      =  $("#short_btn"); //Add button ID
var x = 0; //initlal text box count

        if(x=='0')
           {$('#save_short').css("display","none");}
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_short'+x+'"  class="row"><hr><div class="col-sm-12"><h4>Short Question '+x+'</h4></div><div class="col-sm-4"><label>Question</label><textarea class="form-control" name="part1[]" id="editor12'+x+'" ></textarea></div> <div class="col-sm-8"><label>Solution</label><textarea class="form-control" name="solution[]" id="editor11'+x+'" ></textarea></div><div class="col-sm-12"><div class="col-sm-4"><label>Level</label><select class="form-control" name="level[]"><option disabled="" selected="">--Select--</option><?php foreach ($level as $key => $value) { ?><option value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-4"><label>Used For</label><select class="form-control" name="qused[]"><option disabled="" selected="">--Select--</option><?php foreach ($qused as $key => $value) { ?><option value="<?php echo $qused[$key]['meta_value2'];?>"><?php echo $qused[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-3"><label>Marks</label><input type="number" min="0" max="100" name="marks[]" class="form-control"/></div><div class="col-sm-1"><input type="button" onclick=removeme("addmore_short'+x+'") class="btn btn-xs btn-danger" value="X"></div></div></div></hr></div>'); 

         if(x>'0')
           {$('#save_short').show();}
    
           ck_config('editor11'+x+'');
           ck_config('editor12'+x+'');
                
        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});


</script>


<!----- long question --->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_long"); //Fields wrapper
var add_button      =  $("#long_btn"); //Add button ID
var x = 0; //initlal text box count

        if(x=='0')
           {$('#save_long').css("display","none");}
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_long'+x+'"  class="row"><hr><div class="col-sm-12"><h4>Long Question '+x+'</h4></div><div class="col-sm-4"><label>Question</label><textarea class="form-control" name="part1[]" id="editor22'+x+'" ></textarea></div> <div class="col-sm-8"><label>Solution</label><textarea class="form-control" name="solution[]" id="editor21'+x+'" ></textarea></div><div class="col-sm-12"><div class="col-sm-4"><label>Level</label><select class="form-control" name="level[]"><option disabled="" selected="">--Select--</option><?php foreach ($level as $key => $value) { ?><option value="<?php echo $level[$key]['meta_value2'];?>"><?php echo $level[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-4"><label>Used For</label><select class="form-control" name="qused[]"><option disabled="" selected="">--Select--</option><?php foreach ($qused as $key => $value) { ?><option value="<?php echo $qused[$key]['meta_value2'];?>"><?php echo $qused[$key]['meta_value1'];?></option><?php } ?></select></div><div class="col-sm-3"><label>Marks</label><input type="number" min="0" max="100" name="marks[]" class="form-control"/></div><div class="col-sm-1"><input type="button" onclick=removeme("addmore_long'+x+'") class="btn btn-xs btn-danger" value="X"></div></div></div></hr></div>'); 

         if(x>'0')
           {$('#save_long').show();}

           ck_config('editor21'+x+'');
           ck_config('editor22'+x+'');

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});



});
</script>



<!----- group question --->
<script type="text/javascript">

$(document).ready(function() {

var max_fields      = 50; //maximum input boxes allowed
var wrapper         =  $("#addmore_group"); //Fields wrapper
var add_button      =  $("#group_btn"); //Add button ID
var x = 0; //initlal text box count

        if(x=='0')
           {$('#save_group').css("display","none");}
        

$(add_button).click(function(e)
{ //on add input button click
    e.preventDefault();
    if(x < max_fields){ 
        x++; 
    $(wrapper).append('<div id="addmore_group'+x+'"  class="row"><div class="col-sm-3"><label>Question '+x+'</label><input type="text" class="form-control" name="part2[]"></div> <div class="col-sm-3"><label>Solution</label><textarea class="form-control" name="solution[]" id="editor3'+x+'"></textarea></div><div class="col-sm-3"><label>Explanation</label><input type="text" class="form-control" name="explanation[]"></div><div class="col-sm-2"><label>Marks</label><input type="number" min="0" max="100" name="marks[]" class="form-control"/></div><div class="col-sm-1"><input type="button" onclick=removeme("addmore_group'+x+'") class="btn btn-xs btn-danger" value="X"></div></div>'); 

         if(x>'0')
           {$('#save_group').show();}

        }
        var $ckfield =CKEDITOR.replace( 'editor3'+x );
          $ckfield.on('change', function() {
            $ckfield.updateElement();         
          });

        }
      
    
    else
    {alert("Sorry, you can add only 50 Items in this segment");}

});




</script>


<script type="text/javascript">

function removeme(x)
{
  alert(x);
  $('#'+x).remove();
    //get_subtotal(x);
}    

</script>



<script>
    $('.editor_all').each(function () {
        CKEDITOR.replace($(this).prop('id'));
    });
</script>