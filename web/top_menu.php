
    <div class="row">
<div class="brand pull-left">
<img src="<?php echo $base_url.'theme/images/logo.png'?>">
</div>

<div class="pull-right">
<span class="btn btn-primary btn-xs">Welcome <?php echo $_SESSION['uname']; ?></span>&nbsp;

<span class="btn btn-danger btn-xs">Branch : <?php $branch0 = $admin->get_branch_one($_SESSION['branch']); echo $branch0[0]['branch_name']; ?></span>&nbsp;

<span class="btn btn-success btn-xs">Session : <?php $session0=$admin->get_session_year_one($_SESSION['syear']); echo $session0[0]['syear'];?></span>
<h4><?php echo date("d / M / Y g:i a");?></h4>
</div>

</div>
    <!------------- Navbar -------------->
    <nav class="navbar navbar-inverse bs-dark">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
          <li> <a href="<?php echo $base_url.'index.php?action=dashboard'; ?>" ><i class="fas fa-home"></i> </a></li>


<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='4') {?>
<!--<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"><i class="fas fa-inr"></i> Accounts <span class="caret"></span></a>
<ul class="dropdown-menu">
    <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Master(s) <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=acc_bank'; ?>">Bank Details</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=acc_beneficiery'; ?>">Banefieciry</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=acc_transaction_type'; ?>">Transaction Type</a></li>
            <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=accounts_transaction_daily'; ?>">Daily Transaction & Updates</a></li>
        </ul>    
    </li>    
    <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=accounts_fee'; ?>">Student Fee</a></li>
</ul>
</li>-->
<?php }?>

<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='5') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> <i class="fas fa-users"></i> Leads <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_addnew'; ?>" >Add Lead / Inquiry</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_viewall'; ?>" >View All</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=lead_reports'; ?>" >Report(s)</a></li>
</ul>
</li>
<?php }?>

<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='5') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> <i class="fas fa-book-reader"></i> Question Bank <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_addnew'; ?>">Course(s)</a></li>

<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_addsubject'; ?>">Subject(s)</a></li>

<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_addchapters'; ?>">Chapter(s)</a></li>

<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_addtopic'; ?>">Topic(s)</a></li>

<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_addassessment'; ?>">Assessment(s)</a></li>
<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_list_download'; ?>">Course List & Download(s)</a></li>
<li><a  href="<?php echo $base_url.'index.php?action=dashboard&page=course_handmade_notes'; ?>">Notes For Student(s)</a></li>
</ul>
</li>
<?php }?>



<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='5') {?>
<li> <a href="<?php echo $base_url.'index.php?action=dashboard&page=course_test'; ?>" ><i class="fas fa-clock"></i> Create Test </a></li>
<?php }?>


<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='5' || $_SESSION['utype']=='3') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> <i class="fa-solid fa-graduation-cap"></i> Student <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_viewall'; ?>">All</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_createnew'; ?>">Create New</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_createex'; ?>">Enroll Exsting</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_attendence'; ?>">Attendence</a></li>
</ul>
</li>
<?php }?>

<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='5') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> <i class="fas fa-book"></i> Notes <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=notes_viewall'; ?>">All</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=course_addtopic'; ?>">Create New</a></li>
</ul>
</li>
<?php }?>

<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='2' || $_SESSION['utype']=='5') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> <i class="fas fa-book-open-reader"></i> Library <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_author'; ?>">Add Author</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_location'; ?>">Add Location</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_publication'; ?>">Add Publication</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_books'; ?>">Add Book</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_allotment'; ?>">Teacher Book Allotment</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_allotment_student'; ?>">Student Book Allotment</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_barcode_label'; ?>">Print Barcode Label</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=library_allotment_viewall'; ?>">Viewall Book Allotment</a></li>
</ul>
</li>
<?php }?>

<?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='5') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"> <i class="fas fa-chalkboard-teacher"></i> Batch & Classes <span class="caret"></span></a>
<ul class="dropdown-menu">

<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=teacher_createbatch'; ?>">Create a Batch</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=teacher_createclass'; ?>">Create a Class</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=teacher_class_list'; ?>">View Class List</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=calender'; ?>">View Schedule</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=teacher_holidays'; ?>">Holidays</a></li>

</ul>
</li>
<?php }?>


<?php if($_SESSION['utype']=='1') {?>
<li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"><i class="fas fa-hammer"></i> Admin <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=admin_page&utility=admin_create_user'; ?>">Create User</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=student_bulk_upload'; ?>">Student Bulk Upload</a></li>                    
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=admin_page&utility=admin_branch'; ?>">Branch</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=admin_page&utility=admin_meta_data'; ?>">Meta data</a></li>
<li><a href="<?php echo $base_url.'index.php?action=dashboard&page=admin_page&utility=admin_task'; ?>">Add / Update Task</a></li>
</ul>
</li>
<?php }?>


          </ul>
          
          <ul class="nav navbar-nav navbar-right" style="padding-top:8px;">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle navbar-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user fa-2x"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-list-check"></i> My Task</a></li>
                <li> <a href="<?php echo $base_url.'logout.php'?>" ><i class="fas fa-door-open"></i> Log out</a></li>
                
              </ul>
            </li>
          </ul>
        </div>
    </nav>
    