<div class='card-header'>

                        <h4>View All Students (All Branch)</h4>

                    </div>



                    <?php



                    if($_GET['status']=='success')
                    {

                      echo "<div class='alert alert-success'>Status changed successfully</div>";

                    }

                    if($_GET['status']=='successex')
                    {

                      echo "<div class='alert alert-success'>Ex Student Added In Current Session Successfully</div>";

                    }


                    if($_GET['status']=='error')

                    {

                      echo "<div class='alert alert-danger'>Something went wrong, please try again later !!!</div>";

                    }



                     ?>

<div class="content">

        

              <div class="card">

                <div class="card-body">

                  <table class="table"  id="data-table">

                    <thead>

                    <tr>

                      <th>#</th>

                      <th>Joining Date</th>

                      <th>Name</th>

                      <th>Course Name</th>

                      <th>Subject</th>

                      <th>Branch</th>
                      <th>Batch</th>

                      <th>Contact</th>

                      <th>User ID</th>

                      <th>Status</th>

                      <th>Utility</th>

                    </tr>

                    </thead>

                    <tbody>

                  <?php $view = $student->viewall($_SESSION['syear'],$_SESSION['branch']); 

                    $counter='1';

                   foreach ($view as $k => $value) 

                   {

                     ?>



                          <tr id="<?php echo $view[$k]['id']; ?>">

                          <td><?php echo $counter++;?></td>

                          <td><?php echo  date("d-m-Y", strtotime($view[$k]['jdate']));?></td>

                          <td><?php echo $view[$k]['uname'];
                          //-- check ex student or not
                          if($view[$k]['ex_student']=='1'){echo ' <span class="btn btn-xs btn-info">EX</span>';}
                          ?></td>

                          <td><?php  $cname  = $course->get_one($view[$k]['course'],'id'); 

                          echo $cname[0]['course_name'];?>

                          </td>

                          <td><?php  //$sname  = $course->get_one($view[$k]['subject'],'id'); 

                          //echo $sname[0]['subject'];
                          
                          $cid = explode(",", $view[$k]['subject']);
                          //print_r($cid);
                          
                          for($i=0;$i<=COUNT($cid);$i++)
                          {
                              $course_name=$course->get_one($cid[$i],'id');
                              echo $course_name[0]['subject'].'</br>';
                          }
                          
                          ?></td>

                          <td><?php $branch = $admin->get_branch_one($view[$k]['branch']) ; echo $branch[0]['branch_name'];?></td>

                          <td><?php $batch = $teacher->get_one_batch($view[$k]['batchid']) ; echo $batch[0]['batch_name'];?></td>

                          <td><?php echo $view[$k]['contact'];?><br><?php echo $view[$k]['email'];?></td>

                          <td><?php echo $view[$k]['uid'];?></td>

                          <td><?php echo $view[$k]['status'];?></td>

                          <td>

                            

                           <div class="dropdown">

                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Utility

                            <span class="caret"></span></button>

                            <ul class="dropdown-menu">

                              <li> <a href=""  onclick="deleteme('student','delete','<?php echo $view[$k]['id']; ?>')">Delete</a> </li>

                              

                              <li><a href="<?php echo $base_url.'index.php?action=lead&query=change_status&id='.$view[$k]['id'].'&status=disabled';?>">Blocked</a></li>

                              <?php if(empty($view[$k]['uid'])){?>

                              <li><a href="<?php echo $base_url.'index.php?action=student&query=generate_userid&id='.$view[$k]['id'].'&uname='.$view[$k]['uname'].'&uemail='.$view[$k]['email'].'&ucontact='.$view[$k]['contact'].'&branch='.$view[$k]['branch'];?>">Generate User ID</a></li>

                              <?php }?>

                              <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_edit&id='.$view[$k]['id'];?>">Edit</a></li>

                              <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_fee&id='.$view[$k]['id'];?>">Fee & Other</a></li>

                            </ul>

                          </div>



                          </td>

                      </tr>



                     <?php

                   }

                  ?>

                  </tbody>

                  </table>



                </div>

              </div>

            </div>

            