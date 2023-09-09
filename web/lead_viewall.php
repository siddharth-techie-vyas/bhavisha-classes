<div class='card-header'>
                        <h4>View All Leads</h4>
                    </div>

                    <?php

                    if($_GET['status']=='success')
                    {
                      echo "<div class='alert alert-success'>Status changed successfully</div>";
                    }
                    if($_GET['status']=='error')
                    {
                      echo "<div class='alert alert-danger'>Something went wrong, please try again later !!!</div>";
                    }

                     ?>
<div class="content">
        
              <div class="card">
                <div class="card-body">
                  <table class="table" id="data-table">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>Name</th>
                      <th>Course Name</th>
                      <th>Subject</th>
                      
                      <th>Contact</th>
                      <th>Reference</th>
                      <th>Status</th>
                      <th>Utility</th>
                    </tr>
                    </thead>
                    <tbody>
                  <?php $view = $leads->viewall(); 
                    $counter='1';
                   foreach ($view as $k => $value) 
                   {
                     ?>

                      <tr id="<?php echo $view[$k]['id']; ?>">
                          <td><?php echo $counter++;?></td>
                          <td><?php echo $view[$k]['ldate'];?></td>
                          <td><?php echo $view[$k]['uname'];?></td>
                          <td><?php  $cname  = $course->get_one($view[$k]['course_name'],'id'); 
                          echo $cname[0]['course_name'];?>
                          </td>
                          <td><?php  $sname  = $course->get_one($view[$k]['subject'],'id'); 
                          echo $sname[0]['subject'];?></td>
                          
                          <td><?php echo $view[$k]['contact'];?><br><?php echo $view[$k]['email'];?></td>
                          <td><?php echo $view[$k]['reference'];?></td>
                          <td><?php echo $view[$k]['status'];?></td>
                          <td>
                            
                            <?php if($view[$k]['status']!='demo'){?>
                           <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Utility
                            <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                              <li> <a href="#"  onclick="deleteme('lead','delete','<?php echo $view[$k]['id']; ?>')">Delete</a> </li>
                              <li><a href
                                ="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewone&id='.$view[$k]['id']; ?>" >View / Edit</a></li>                              
                                <li><a href="<?php echo $base_url.'index.php?action=lead&query=change_status&id='.$view[$k]['id'].'&status=cancelled';?>">Cancelled</a></li>
                              <li><a href="<?php echo $base_url.'index.php?action=lead&query=change_status&id='.$view[$k]['id'].'&status=pending';?>">Pending</a></li>
                              <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_proceedsuccess&leadid='.$view[$k]['id'];?>">Success</a></li>
                            </ul>
                          </div>
                          <?php } ?>
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
            