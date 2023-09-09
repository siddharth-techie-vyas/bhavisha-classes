<div class="card-header"><h4>Library Book Allotment (Student) & (Teacher)</h4></div>


<div class="card-body">

	<div class="content">

		
	<div class="row">
		<div class="col-sm-12">
			<table class="table" id="data-table">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Book Name</th>
                        <th>User Type</th>
                        <th>User Name</th>
                        <th>Copies</th>
                        <th>Allotment Date</th>
						<th>Schedule Return Date</th>
                        <th>Return Date</th>
                        <th>Return / Return Date</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$counter=1;
						$viewall = $library->book_allotment_viewall();
						foreach($viewall as $row => $value)
						{
							echo "<tr id='".$viewall[$row]['id']."'>";
							echo "<th> BIB00".$viewall[$row]['id']."</th>";
							echo "<td>";
                                $bookname = $library->get_book_one($viewall[$row]['book_id']);
                                echo $bookname[0]['book_name'];
                            echo "</td>"; 
                            
                            echo "<td>";
                                $usertype= $admin->getone_meta_data('user_type',$viewall[$row]['user_type']);
                                echo $usertype[0]['meta_value1'];
                            echo "</td>"; 

                            echo "<td>";
                                if($viewall[$row]['user_type'] == '3')
                                {
                                    $username= $student->get_one_student($viewall[$row]['user_id']);
                                    echo strtoupper($username[0]['uname']);
                                }
                                else
                                {
                                    $username= $admin->getone_user($viewall[$row]['user_id']);
                                    echo strtoupper($username[0]['uname']);
                                }
                            echo "</td>"; 

                            echo "<td>".$viewall[$row]['copies']."</td>"; 
                            echo "<td>".date("d-m-Y", strtotime($viewall[$row]['alloted_date']))."</td>"; 
                            echo "<td>".date("d-m-Y", strtotime($viewall[$row]['schedule_return_date']))."</td>"; 

                            echo "<td>";
                                    if($viewall[$row]['return_date'] != '0000-00-00')
                                    { echo  date("d-m-Y", strtotime($viewall[$row]['return_date'])); }
                                    else
                                    { echo "Not Returned"; }
                                    echo "</td>"; 
                            ?>
							<td>
                            <?php if($viewall[$row]['return_date'] == '0000-00-00')
                                    {?>
                            <form name='return_book<?php echo $counter;?>' id="return_book<?php echo $counter;?>" action="<?php echo $base_url.'index.php?action=library&query=book_return';?>" method="post">
                            <input type="hidden" name="book_id" value="<?php echo $viewall[$row]['book_id']; ?>"/>    
                            <input type="hidden" name="id" value="<?php echo $viewall[$row]['id']; ?>"/>
                                <input type="hidden" name="copies" value="<?php echo $viewall[$row]['copies']; ?>"/>
                                <input type="date" value="" class="form-control" style="width:70%; display:inline;" name="return_date"/>    
                                <i class='fa fa-rotate-left' onclick="form_submit3('return_book<?php echo $counter;?>')"></td>
                                <span id="msgreturn_book<?php echo $counter;?>"></span>
                            </form>
                            <?php }?>
                                    </td>
							<?php echo "<tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php include('footer2.php');?>