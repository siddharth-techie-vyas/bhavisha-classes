<div class="card-header">
    <h4>Add / View Student(s) in <em>Batch 
        <?php //get batch name  1
        $batchname = $teacher->get_one_batch($_REQUEST['id']);
        echo " :- ".$batchname[0]['batch_name'];

        $course0 = $course->get_one($batchname[0]['course'],'id');
                            echo ' &  Course :-'.$course0[0]['course_name'].'</em>';

     

        ?>
    </h4>
</div>


<div class="card-body">

	<div class="row">
    
        <div class="col-sm-12">
        <?php 
        if(isset($_REQUEST['status'])=='1')
        {
            echo "<div class='alert alert-success'>Student Alloted Successfully !!!</div>";
        }
        
        
    ?>
           <table class="table"  id="data-table">

                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Image</th>
                        <th>Student Name</th>
                        <th>Joining Date</th>
                        <th>Primary Batch</th>
                        <th>Secondary Batch</th>
                        <th>Course 1</th>
                        <th>Batch 1</th>
                        <th>Course 2</th>
                        <th>Batch 2</th> 
                       
                    </tr>
                </thead>
                <tbody>
                
                <?php 
                // -- get all student with same course id or blank course id 
                $batch_stu =$teacher->get_all_student_batch_nonbatch($batchname[0]['course'],$batchname[0]['session']);
                if(count($batch_stu)>0)
                {   $counter=1;
                    
                    foreach($batch_stu as $row => $value)
                    {
                        echo "<tr>";
                        echo "<th>".$counter."</th>";
                        echo "<td><i class='fa fa-user fa-2x'></i></td>";
                        echo "<td>".$batch_stu[$row]['uname']."</td>";
                        echo "<td>".date("d-m-Y", strtotime($batch_stu[$row]['jdate']))."</td>";
                        
                        echo "<td>";
                         //-- get alltoted primary batch name
                            $batch_name = $teacher->get_one_batch($batch_stu[$row]['batchid']);
                            echo $batch_name[0]['batch_name'];
                        echo "</td>";
                        
                        echo "<td>";
                         //-- get alltoted secondary batch name
                            $batch_name2 = $teacher->get_one_batch($batch_stu[$row]['batchid2']);
                            echo $batch_name2[0]['batch_name'];
                        echo "</td>";
                        
                        
                        //--batch 1 details
                        echo "<td>";
                            $coursename = $course->get_one($batch_stu[$row]['course'],'id');
                            echo $coursename[0]['course_name'];
                        echo "</td>";

                        echo "<td>";
                        if($batch_stu[$row]['batchid'] != $batchname[0]['id'] && $batch_stu[$row]['batchid']!='0')
                        {
                            //-- get alltoted batch name
                            $batch_name = $teacher->get_one_batch($batch_stu[$row]['batchid']);
                            echo $batch_name[0]['batch_name'];

                        }
                        else
                        {
                        /*echo "<input type='checkbox' name='student_id[]' value='".$batch_stu[$row]['id']."' class='form-control'";
                        if($batch_stu[$row]['batchid']==$batchname[0]['id'])
                        {echo "checked='checked'";}
                        echo ">";*/
                        ?>
                        <form name='batch_allotment<?php echo $counter;?>' id='batch_allotment<?php echo $counter;?>' method='post' action='<?php echo $base_url."index.php?action=teacher&query=student_bacth_allotment";?>'>
                        <span id="msgbatch_allotment<?php echo $counter;?>"></span>    
                        
                        <input type='hidden' value='<?php echo $batch_stu[$row]['id'];?>' name='student_id'>
                        <input type='hidden' value='<?php echo $batchname[0]['course'];?>' name='course'>
                        <label class="btn btn-primary btn-on btn-xs"  styel="display:inline;">                            
                        <input onclick="form_submit('batch_allotment<?php echo $counter;?>')"  <?php if($batch_stu[$row]['batchid']==$batchname[0]['id']){echo "checked='checked'";} ?> type="radio" value="<?php echo $batchname[0]['id'];?>" name="batchid">Allow</label>
                        
                        <label  class="btn btn-primary btn-off btn-xs">
                        <input onclick="form_submit('batch_allotment<?php echo $counter;?>')" type="radio" value="0" name="batchid">Deny</label>
                        
                        </form>       
                            <?php    
                        } 
                        //echo "<small>(".$batch_stu[$row]['batchid'].")</small>";
                        echo "</td>";


                        //--- batch 2 details
                        echo "<td>";
                            $coursename2 = $course->get_one($batch_stu[$row]['course2'],'id');
                            if($coursename2) {echo $coursename2[0]['course_name'];}
                            else{echo 'N/A';}
                        echo "</td>";
                        echo "<td>";

                        if($batch_stu[$row]['batchid2'] == $batchname[0]['id'] && $batch_stu[$row]['batchid2'] != '0')
                        {
                            //-- get alltoted batch name
                            $batch_name = $teacher->get_one_batch($batch_stu[$row]['batchid2']);
                            echo $batch_name[0]['batch_name'];

                        }
                        else
                        {
                        ?>
                        <form name='batch_allotment2<?php echo $counter;?>' id='batch_allotment2<?php echo $counter;?>' method='post' action='<?php echo $base_url."index.php?action=teacher&query=student_bacth_allotment2";?>'>
                        <span id="msgbatch_allotment2<?php echo $counter;?>"></span>    
                        <input type='hidden' value='<?php echo $batch_stu[$row]['id'];?>' name='student_id2'>
                        <input type='hidden' value='<?php echo $batchname[0]['course'];?>' name='course2'>

                        <label onclick="form_submit('batch_allotment2<?php echo $counter;?>')" class="btn btn-info btn-on btn-xs"  styel="display:inline;">                            
                        <input <?php if($batch_stu[$row]['batchid2']==$batchname[0]['id']){echo "checked='checked'";} ?> type="radio" value="<?php echo $batchname[0]['id'];?>" name="batchid2">Allow</label>
                        
                        <label onclick="form_submit('batch_allotment2<?php echo $counter;?>')" class="btn btn-info btn-off btn-xs">
                        <input  type="radio" value="0" name="batchid2">Deny</label>                        
                        </form>       
                            <?php 
                          }  //echo "<small>(".$batch_stu[$row]['batchid2'].")</small>";
                        echo "</td>";
                        echo "</tr>";
                        $counter++;
                    } 
                    
                    
                }
                else
                {
                    echo "<tr>";
                    echo "<td colspan='8'>No Data Found</td>";
                    echo "</tr>";

                }

                
                ?>
            
            
            </tbody>    
            </table>
           
        </div>

    </div>

</div>