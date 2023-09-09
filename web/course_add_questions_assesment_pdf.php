
<style type="text/css">
  .nav-tabs li{min-width:80px; padding: 5px; margin-left: 5px; border:1px solid #d8d8d8; }



</style>
  

<?php
  $asses = $course->viewone_course($_GET['id']);
  //$sname0 = $course->get_one($asses[0]['assessment'],'id'); 
                                    $sname = $asses[0]['assessment'];
  $level = $admin->getonetype_meta_data('topic_level');                                      
  $chapter = $course->get_topic_assesment($asses[0]['chapter'] );

  if(isset($_GET['status']))
  {
    echo "<div class='alert alert-success'>Assessment Created Successfully !!!</div>";
  }
 ?>

<div class='card-header'>
                        <h4>Assessment : <?php echo $sname; ?> </h4>
                    </div>


<div class="col-sm-12">
              <div class="content">
                <div class="card-body">
                  <div id="msgcreate_assessment"></div>
                  
                    
                    <div class="row" style="padding-bottom: 10px;">

                        <div class="col-sm-8">
                        <form action="<?php echo $base_url.'index.php?action=course&query=create_assessment_pdf';?>" method="post" name="create_assessment" id="create_assessment" class="form-sample">  
                          <input type="hidden" value="<?php echo $asses[0]['course_name']; ?>" name="course" id="course">
                          <input type="hidden" value="<?php echo $asses[0]['subject']; ?>" name="subject" id="subject">
                          <input type="hidden" value="<?php echo $asses[0]['id']; ?>" name="asses_id" id="asses_id">

                          
                          <div class="col-sm-4">
                            <h4><b>Course</b> : <?php $course0 = $course->viewone_course($asses[0]['course_name']); echo $course0[0]['course_name']; ?></h4>
                            <h4><b>Subject</b> : <?php $subject = $course->viewone_course($asses[0]['subject']); echo $subject[0]['subject']; ?> </h4>
                          </div>

                          <div class="col-sm-4">
                            <label>Chapter(s) Added</label>
                            <ul>
                              <?php $chp = explode(',',$asses[0]['chapter']); 
                              foreach($chp as $k => $value)
                              {
                                $cname = $course->viewone_course($chp[$k]);
                                echo '<li>'.$cname[0]['chapter'].'</li>';
                              }
                              ?>
                            </ul>
                          </div>


                          <div class="col-sm-4">
                          <label>Select Topic(s)</label>
                          <select class="js-example-basic-multiple w-100 form-control" id="chapter" name="chapters[]" multiple="multiple">
                            
                             <?php foreach($chapter as $c => $value){ ?>
                              <option value="<?php echo $chapter[$c]['id']?>"><?php echo $chapter[$c]['topic']?></option>
                             <?php }?> 
                          </select>
                          </div>


                          </form>


                        </div>

                        <div class="col-sm-2"><br>
                          <input type="button" class="btn btn-md btn-warning" onclick="get_rand_question()" value="Get All Question(s)">
                        </div>
                        <div class="col-sm-2"><br>
                          <button type="button" class="btn btn-success btn-md" onclick="show_page_model('index.php?action=nocss_pages&page=course_add_rand_question')" data-toggle="modal" data-target="#myModal">Custom Generate</button>
                        </div>  
                      
                    </div>
                    
                    <form action="<?php echo $base_url.'index.php?action=course&query=create_allquestion_final_pdf';?>" method="post" name="allquestion" id="allquestion">

                    <div class="row" id="allquestion">



                    </div>
                    </form>  

                  
                </div>
              </div>
</div>

<script type="text/javascript">
  

</script>