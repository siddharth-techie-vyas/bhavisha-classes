<style>
    .menu-area{background: #d61a5e}
    .navbar-nav li{list-style-type: none; padding:8px;}
    
.dropdown-menu{padding:0;margin:0;border:0 solid transition!important;border:0 solid rgba(0,0,0,.15);border-radius:0;-webkit-box-shadow:none!important;box-shadow:none!important}

.mainmenu a, .navbar-default .navbar-nav > li > a, .mainmenu ul li a , .navbar-expand-lg .navbar-nav .nav-link{ color:#fff;font-size:14px;text-transform:capitalize;padding:4px 3px; block !important;}

.mainmenu .active a,.mainmenu .active a:focus,.mainmenu .active a:hover,.mainmenu li a:hover,.mainmenu li a:focus ,.navbar-default .navbar-nav>.show>a, .navbar-default .navbar-nav>.show>a:focus, .navbar-default .navbar-nav>.show>a:hover{list-style-type: none;color: #fff;background: #4CAF50;outline: 0;}
/*==========Sub Menu=v==========*/
.mainmenu .collapse ul > li:hover > a{background: #cfccc0;}
.mainmenu .collapse ul ul > li:hover > a, .navbar-default .navbar-nav .show .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .show .dropdown-menu > li > a:hover{background: #cfccc0  ;}
.mainmenu .collapse ul ul ul > li:hover > a{background: #cfccc0;}

.mainmenu .collapse ul ul, .mainmenu .collapse ul ul.dropdown-menu{background:#b0ada0;}
.mainmenu .collapse ul ul ul, .mainmenu .collapse ul ul ul.dropdown-menu{background:#918f84}
.mainmenu .collapse ul ul ul ul, .mainmenu .collapse ul ul ul ul.dropdown-menu{background:#706f66}

/******************************Drop-down menu work on hover**********************************/
.mainmenu{background: none;border: 0 solid;margin: 0;padding: 0;min-height:20px;width: 100%;}

@media only screen and (min-width: 767px) {
.mainmenu .collapse ul li:hover> ul{display:block}
.mainmenu .collapse ul ul{position:absolute;top:100%;left:0;min-width:250px;display:none}
/*******/
.mainmenu .collapse ul ul li{position:relative}
.mainmenu .collapse ul ul li:hover> ul{display:block}
.mainmenu .collapse ul ul ul{position:absolute;top:0;left:100%;min-width:250px;display:none}
/*******/
.mainmenu .collapse ul ul ul li{position:relative}
.mainmenu .collapse ul ul ul li:hover ul{display:block}
.mainmenu .collapse ul ul ul ul{position:absolute;top:0;left:-100%;min-width:250px;display:none;z-index:1}

}
@media only screen and (max-width: 767px) {
.navbar-nav .show .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 35px}
.navbar-nav .show .dropdown-menu .dropdown-menu .dropdown-menu > li > a{padding:16px 15px 16px 45px}
}


#mobileshow { 
display:none; 
}
@media screen and (max-width: 500px) {
#mobileshow { 
display:block; }
}
</style>

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
    <nav class="navbar navbar-light navbar-expand-lg mainmenu">
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                         <li> <a href="<?php echo $base_url.'index.php?action=dashboard'; ?>" ><i class="fas fa-home"></i> </a></li>
                            
                            <?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='4') {?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account(s) <span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master(s) <i class="fa fa-chevron-right"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="<?php echo $base_url.'index.php?action=dashboard&page=accounts_course_other_fee'; ?>">Course Fee</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=acc_bank'; ?>">Bank Details</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=acc_beneficiery'; ?>">Banefieciry</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=acc_transaction_type'; ?>">Transaction Type</a></li>
                                                <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=accounts_fee'; ?>">Student Fee</a></li>
                                    </ul>
                                </li>     
                                    
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report(s) <i class="fa fa-chevron-right"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="<?php echo $base_url.'index.php?action=dashboard&page=accounts_transaction_daily'; ?>">Daily Transaction & Updates</a></li>
                                    </ul>
                                </li>
                                </ul>
                            </li>
                            <?php }?>
                            
                            
                            <?php if($_SESSION['utype']=='1' || $_SESSION['utype']=='5') {?>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle"> <i class="fas fa-users"></i> Leads <span class="caret"></span></a>
                                <ul class="dropdown-menu"  aria-labelledby="navbarDropdown">
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


          
            <li class="dropdown pull-right">
              <a href="#" class="dropdown-toggle navbar-img" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-list-check"></i> My Task</a></li>
                <li> <a href="<?php echo $base_url.'logout.php'?>" ><i class="fas fa-door-open"></i> Log out</a></li>
                
              </ul>
            </li>
            
            
          </ul>
        </div>
           
           
           
           
            <button class="navbar-toggler" id="mobileshow" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i> Menu
                </button>             
                
                
                
                        <!--
                        <li><a href="#">Link</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown3</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                </ul>
                            </li>
                            </ul>
                        </li>
                        <li><a href="#">Service</a></li>
                         <li><a class="dropdown-item dropdown-toggle" href="#">Submenu 2</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Submenu 2 link</a></li>
                            <li><a class="dropdown-item" href="#">Submenu 2 link 2</a></li>
                            <li><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu 2</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Link</a></li>
                                    <li><a class="dropdown-item" href="#">Link</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                        -->
                    </ul>
                </div>
            </nav>
    
    
   
    
    <script>
        (function($){
	$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
	  if (!$(this).next().hasClass('show')) {
		$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
	  }
	  var $subMenu = $(this).next(".dropdown-menu");
	  $subMenu.toggleClass('show');

	  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		$('.dropdown-submenu .show').removeClass("show");
	  });

	  return false;
	});
})(jQuery)
    </script>