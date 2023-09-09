
<div class='card-header'>
                        <h1>Dashboard</h1>
                    </div>
                    <div class='card-body  content'>
                        <div class="row">
                          <div class="col-sm-6">
                            <h4>Student Registration</h4>
                            <canvas id="myChart4" style="width:100%;max-width:700px"></canvas>
                          </div>

                          <div class="col-sm-6">
                            <h4>Question Bank</h4>
                            <canvas id="myChart1" style="width:100%;max-width:700px"></canvas>
                          </div>
                        

                        <div class="col-sm-6">
                            <h4>Revenues</h4>
                            <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                          </div>
                        

                        <div class="col-sm-6">
                            <h4>Success Rate</h4>
                            <canvas id="myChart3" style="width:100%;max-width:700px"></canvas>
                          </div>

                        <div class="col-sm-6">
                            <h4>Exam Status</h4>
                            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                          </div>  
                        
                        <div class="col-sm-6">
                            <h4>Accounting</h4>
                            <canvas id="myChart5" style="width:100%;max-width:700px"></canvas>
                          </div>
                    </div>
               
<!-- chart 0-->
<?php $student_count = $admin->get_student_count_per_batch(); ?>
<script>
var xyValues = [
<?php foreach($student_count as $k => $value){?>    
  {x:<?php echo $student_count[$k]['count'];?>, y:<?php echo $student_count[$k]['batchid'];?>},
<?php }?>  
];

new Chart("myChart", {
  type: "scatter",
  data: {
    datasets: [{
      pointRadius: 4,
      pointBackgroundColor: "rgb(0,0,255)",
      data: xyValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      xAxes: [{ticks: {min: 0, max:50}}],
      yAxes: [{ticks: {min: 0, max:40}}],
    }
  }
});
</script>

<!-- chart 1-->
<script>
var xValues = [50,60,70,80,90,100,110,120,130,140,150];
var yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("myChart1", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>

<!--- chart 2-------->
<script>
var xValues = [100,200,300,400,500,600,700,800,900,1000];

new Chart("myChart2", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478],
      borderColor: "red",
      fill: false
    }, { 
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }, { 
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100],
      borderColor: "blue",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>


<!-- chart 3--->

<script>
var xValues = ["2017", "2018", "2019", "2020", "2021"];
var yValues = [28, 31, 44, 49, 55];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart3", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Bhavisha <?php echo date('Y');?>"
    }
  }
});
</script>

<!--- chart 4-->
<?php $student_count = $admin->get_student_count_per_batch(); 
$batchid=array();
$students=array();
$color_rand=array();
foreach($student_count as $k => $value){
  $batch_name = $teacher->get_one_batch($student_count[$k]['batchid']);
  $batch_name = $batch_name[0]['batch_name'];

  array_push($students,$student_count[$k]['count']);
  array_push($batchid,$student_count[$k]['batchid']);  
  
  array_push($color_rand,mt_rand( 0, 0xDDD ));  
}
  
?>    
<script>
var xValues = [<?php echo implode(",",$batchid);?>];
var yValues = [<?php echo implode(",", $students);?>];
var barColors =  [
  <?php echo implode(",", $color_rand);?>
];

new Chart("myChart4", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Batches Student Strength (From All Brach)"
    }
  }
});
</script>


<script>
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart5", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "World Wide Wine Production 2018"
    }
  }
});
</script>