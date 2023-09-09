<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/css/calendar.css">

<!-- CSS only 
<style>
    .days_col{width:12%; padding:5px; text-align:center; display:inline; min-height: float:left; border:1px solid #d8d8d8; }
    #day{display:inline; float:left; margin-right:2%; background:#E8E8E8; font-size:20px; width:20%;}
    #day_detail{display:inline; float:right; width:75%; background:#ACE1AF; border:0.5px solid #e8e8e8; border-radius:3px; }
</style>-->



<div class="card-header"><h4>Class Schedule</h4></div>

<div class="card-body">

	<div class="row">



<?php 

$branchid=$_SESSION['branch'];
$syear=$_SESSION['syear'];

$ids=array();

$date =date('Y-m-d');
if(isset($_GET['month']))
{$date =date($_GET['month']);}
$calendar = new Calendar($date);


$previous_cal =  date('Y-m-d', strtotime ( '-1 month' , strtotime ( $date ) )) ;
$next_cal =  date('Y-m-d', strtotime ( '+1 month' , strtotime ( $date ) )) ;
//- gat classes from batch id

$calendar->add_event('Birthday', '2022-08-03', 1, 'green');

$calendar->add_event('Doctors', '2022-08-04', 1, 'red');

//-- get holiday list
$holidays = $teacher->get_holidays_range( date('Y-m-01'), date('Y-m-t'));
foreach ($holidays as $key => $value) 
{
	$calendar->add_event($holidays[$key]['holiday'], $holidays[$key]['holiday_date'], 1, 'blue');
}

//-- get student birthdays
$mm_yy=date('Y-m');
$birthday = $student->get_birthdays($mm_yy, $syear);
foreach ($birthday as $key => $value) 
{
	$calendar->add_event($birthday[$key]['uname'].' <i class="fa fa-cake-candles"></i>', $birthday[$key]['dob'], 2, 'green');
}


?>
		<div class="card" style="padding:25px;">
<div class="row">
<div class='col-sm-3'> 	
<h4 class="text-left"><a href="<?php echo $base_url.'index.php?action=dashboard&page=dashboard&page=calender&month='.$previous_cal;?>"><< Previous Month</a></h4> </div>
<div class='col-sm-5'>
<label class="btn btn-danger">Class</label>
<label class="btn btn-primary">Holiday</label>
<label class="btn btn-warning">Event</label>
<label class="btn btn-success">Student Birthday</label>
<label class="btn btn-info">Exam / Assessment</label>
</div>
<div class='col-sm-3'> <h4 class="text-right"><a href="<?php echo $base_url.'index.php?action=dashboard&page=dashboard&page=calender&month='.$next_cal;?>">Next Month >></a></h4></div>
</div>	

<?=$calendar?>
		</div>

</div>
</div>
