<?php 
$get_details = $course->get_one_handmade_notes($_GET['id']);
                                    $cname = $course->get_one($get_details[0]['courseid'],'id'); 
                                    $course0 = $cname[0]['course_name'];
                                    $sname = $course->get_one($get_details[0]['subjectid'],'id'); 
                                    $subject = $sname[0]['subject'];                                 
                                    $chname = $course->get_one($get_detail[0]['chapterid'],'id'); 
                                    $topic = $chname[0]['chapter'];                              
                                    ?>

<span class="text-danger">You can only print text content. For Uploaded content view go for detailed view *</span>

<button type='button' name='class_list_btn' class="btn btn-default btn-xs"  onclick="getpdf()"><i class='fa fa-file-pdf'></i> Download Pdf</button>

<div id="pdf_editor"></div>

<div id="canvas_div_pdf">

                                            
                                            <table border="1" valign="top" style="max-width:700px;">
                                                <thead>
                                                    <tr>
                                                        <td colspan="2"> <img src="<?php echo $base_url.'theme/images/logo.png'?>"></td>
                                                        <td>
                                                        410 – Nandanwan, Aakhaliya Circle, Chopasni Road, Jodhpur (Raj.)<br>Contact : 0291–2760178, 9810060308, 9829524103<br>www.bhavisha.co.in Email : info@bhavisha.co.in
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Topic : </th>
                                                        <td>
                                                            <?php echo "<h5>".$topic."</h5><br>";
                                                                    echo "<span>".$course0." / ".$subject;
                                                            ?>
                                                        </td>

                                                    </tr>
                                                </thead>
                                            <?php 
                                            $counter=1;
                                              $topics =$course->get_one_handmade_notes_content_preview($_GET['id']);
                                              foreach($topics as $row=> $value){
                                            ?>
                                            <tr id="<?php echo $topics[$row]['id'];?>">
                                              <td style="vertical-align:top"><?php echo $counter++; ?></td>
                                              <td style="vertical-align:top"><?php $tname = $course->get_one($topics[$row]['tid'],'id'); 
                                                   echo $tname[0]['topic'];?></td>
                                              <td><?php echo $topics[$row]['tcontent'];?></td>
                                              
                                            </tr>
                                            <?php }?>
                                            </table> 
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<script>
function getpdf()
{
 var element = document.getElementById('canvas_div_pdf');
 html2pdf(element);
}

</script>