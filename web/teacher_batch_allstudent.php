<?php 
	$batch0=$teacher->get_one_batch($_GET['id']);
?>

<h3>Batch Student List</h3>
<hr>

<table class='table table-bordered'>
    <thead>
        <tr>
            <th>S.No.</th>
            <th>Student Name</th>
            <th>Mobile</th>
            <th>Student Id</th>
            <th>Primary Batch</th>
            <th>Secondnary Batch</th>
        </tr>
    </thead>
    <tbody>
        <!-- for primary batch-->
        <?php $counter=1; $primary=$student->get_student_common_bacth($_GET['id']); 
        if(COUNT($primary)<1){echo "<tr><th colspan='6' class='text-danger'>No Student as Primary Batch</th></tr>";}
        else{
        foreach($primary as $row=>$value){ ?>
        <tr>
            <th><?php echo $counter++; ?></th>
            <td><?php echo $primary[$row]['uname'];?></th>
            <td><?php echo $primary[$row]['contact'];?></th>
            <td><?php echo 'BHA00'.$primary[$row]['id'];?></td>
            <!-- primary-->
            <td>
                <?php $primary0=$student->get_student_as_primary($primary[$row]['id'],$_GET['id']);
                if($primary0){ echo "<i class='fa fa-check-circle text-success'>";}
                ?>
                
            </td>
            <!-- secondary-->
            <td>
            <?php $secondary=$student->get_student_as_secondary($primary[$row]['id'],$_GET['id']);
                if($secondary){ echo "<i class='fa fa-check-circle text-danger'>";}
                ?>
            </td>
        </tr>
        
        <?php }}?>
        
        <!-- <?php $secondary=$student->get_student_as_secondary($_GET['id']); 
        if(COUNT($secondary)<1){echo "<tr><th colspan='6' class='text-danger'>No Student as Seconday Batch</th></tr>";}
        else{
        foreach($secondary as $row=>$value){ ?>
        <tr>
            <th><?php echo $counter++; ?></th>
            <td><?php echo $secondary[$row]['uname'];?></th>
            <td><?php echo $secondary[$row]['contact'];?></th>
            <td><?php echo 'BHA00'.$secondary[$row]['id'];?></td>
            <td></td>
            
        </tr>
        <?php }}?> -->
        
        
    </tbody>
    </table>	