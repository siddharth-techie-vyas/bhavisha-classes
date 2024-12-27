<?php 
$get_details = $course->get_one_handmade_notes($_GET['id']);
                                    $cname = $course->get_one($get_details[0]['courseid'],'id'); 
                                    $course0 = $cname[0]['course_name'];
                                    $sname = $course->get_one($get_details[0]['subjectid'],'id'); 
                                    $subject = $sname[0]['subject'];                                 
                                    $chname = $course->get_one($get_detail[0]['chapterid'],'id'); 
                                    ?>
<div class="content">
                                            
                                            <table border="1">
                                                <thead>
                                                    <tr>
                                                        <td colspan="2"> <img src="<?php echo $base_url.'theme/images/logo.png'?>"></td>
                                                        <td>
                                                        410 – Nandanwan, Aakhaliya Circle, Chopasni Road, Jodhpur (Raj.)<br>Contact : 0291–2760178, 9810060308, 9829524103<br>www.bhavisha.co.in Email : info@bhavisha.co.in
                                                        </td>
                                                    </tr>
                                                </thead>
                                            <?php 
                                            $counter=1;
                                              $topics =$course->get_one_handmade_notes_content_preview($_GET['id']);
                                              foreach($topics as $row=> $value){
                                            ?>
                                            <tr id="<?php echo $topics[$row]['id'];?>">
                                              <td><?php echo $counter++; ?></td>
                                              <td><?php $tname = $course->get_one($topics[$row]['tid'],'id'); 
                                                   echo $tname[0]['topic'];?></td>
                                              <td><?php echo $topics[$row]['tcontent'];?></td>
                                              
                                            </tr>
                                            <?php }?>
                                            </table> 
</div>