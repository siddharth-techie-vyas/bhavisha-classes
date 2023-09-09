
<?php 
include('class_calls.php');

if($_REQUEST['page']=='barcode_label')
{

?><input type="button" onclick="printDiv('msgbarcode')" value="Print Bar Codes" /><?php
echo "<hr>";
						$label = $library->get_upc_labels($_REQUEST['course_name']);

						foreach ($label as $row => $value) {

							?>
                        <div style="width:32%; margin-right:1%; display:inline; float:left;">
                            <table border="1" class="table" style="min-height:220ox;">
                                <tr style="background:#000; color:#FFF; text-align:center;">
                                    <td colspan="3"><em><b><?php echo $label[$row]['book_name'];?></b></em></td>
                                </tr>
                                <tr>
                                    <td width="20%" rowspan="5">
                                        <center><img src="<?php echo $base_url.'theme/images/logo.png'?>" width="auto" height="50px"/>
                                        <span class="barcode"><?php echo $label[$row]['upc'];?></span></center>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Course & Subject</th>
                                    <td><?php $course0=$course->get_one($label[$row]['course'],'id'); echo $course0[0]['course_name']; ?> >> <?php $sub0=$course->get_one($label[$row]['subject'],'id'); echo $sub0[0]['subject']; ?></td>
                                </tr>
                                
                                <tr>
                                    <th>Author & Publication</th>
                                    <td><?php $author = $library->get_author_one($label[$row]['author']); echo $author[0]['author'];?> <br>(<em><small><?php $publication = $library->get_publication_one($label[$row]['publication']); echo $publication[0]['publication'];?></em>)</td>
                                </tr>
                                <tr>
                                    <th>Code & Edition</th>
                                    <td><?php echo 'BIB00'.$label[$row]['id'];?> / <?php echo $label[$row]['edition'];?></td>
                                </tr>
                                
                            </table>    
                        </div>   
							

					<?php }?>		

				

<?php } ?>

