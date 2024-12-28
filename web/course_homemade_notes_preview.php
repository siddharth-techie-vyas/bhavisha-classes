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

<button type='button' name='class_list_btn' class="btn btn-default btn-xs"  onclick="htmlget('canvas_div_pdf','Notes')"><i class='fa fa-file-pdf'></i> Download Pdf</button>

<div id="pdf_editor"></div>

<div id="canvas_div_pdf" style="width:100%; margin:2px; border:1px solid #000; text-align:justyify;">

                                            
                                            <table border="0" valign="top" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                    <?php 
                                                    $item = 'theme/images/logo.png';
                                                    $type = pathinfo($item, PATHINFO_EXTENSION);
                                                    $data = file_get_contents($item);
                                                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                                            ?>
                                                        <td colspan="2"><img src="<?php echo $base64;?>" height="40" width="auto"></td>
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
                                            </table>    


                                            <?php 
                                            $counter=1;
                                              $topics =$course->get_one_handmade_notes_content_preview($_GET['id']);
                                              foreach($topics as $row=> $value){
                                            ?>
                                           <h4>
                                                <?php echo $counter++; ?>
                                                <?php $tname = $course->get_one($topics[$row]['tid'],'id'); echo $tname[0]['topic'];?>
                                            </h4>

                                            <p><?php echo $topics[$row]['tcontent'];?></p>
                                            <hr>
                                            <?php }?>
                                            
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<script>
function getpdf()
{
 var element = document.getElementById('canvas_div_pdf');
 html2pdf(element);
}

</script>