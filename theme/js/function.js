//var base_url = window.location.origin;
var base_url = 'https://www.bhavishaclasses.com/';
var loading_img = base_url+'theme/images/loading.gif';
function form_submit(x) 
{
 // -- form by id   
//alert(x);
 var form = $("#"+x);
 //alert(form.serialize);
		$('#msg'+x).html("<div class='alert alert-warning'>Please Wait ... </div>");
        form.hide(800);
		$.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(data)
           {
               //$('#data_'+x).html("<img src='+loading_img+'>");
               $('#msg'+x).focus(); 
               $('#msg'+x).html('');  
               $('#msg'+x).html(data);  
                
               $(function() {
	   					 setTimeout(function() 
	   					 {
	        			 	$('#msg'+x).html("")
	    				 }, 4500);
                            form.show(800);
					});
               form.reset();
           }
        });  
}


//== this will hide the form and show a msg only
function form_submit2(x) 
{
 // -- form by id   
//alert(x);
 var form = $("#"+x);
 //alert(form.serialize);
        $('#msg'+x).html("Please Wait !");
        form.hide();
        $.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(data)
           {
               $('#msg'+x).html(data);  
                form.reset();
           }
        });  
}

function form_submit3(x) 
{
 // -- form by id   
//alert(x);
 var form = $("#"+x);
 //alert(form.serialize);
		$('#msg'+x).html("Please Wait...");
        $.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(data)
           {
               $('#msg'+x).html(data);  
               $(function() {
	   					 setTimeout(function() 
	   					 {
	        			 	$('#msg'+x).html("")
	    				 }, 4500);
                            
					});
               
           }
        });  
}


function form_result(x) 
{
 // -- form by id   
//alert(x);
 var formData = new FormData(document.getElementById(x))
 //alert(form.serialize);
        $('#msg'+x).html("<div class='alert alert-warning'>Please Wait ... </div>");
        

        //$("#"+formid).hide();
        $.ajax({
        url:$("#"+x).attr("action"),
        method:"POST",
        data:formData,
        contentType:false,
        cache:false,
        processData:false,
        success:function(data)
        {
            
            $('#msg'+x).html(data);     
           
        }
        });

        /*$.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
            data: form.serialize(),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false, 
           
               success: function(data)
               {
                   $('#msg'+x).html(data);  
                   form.reset();
               }
           
        });  */
}


function deleteme(h,i,j)
{
  var r = confirm("Are you sure you want to delete  ??");
  if (r == true) 
  {
     $.ajax({
           type: "GET",
           url: base_url+'index.php?action='+h+'&query='+i+'&id='+j,
           success: function(data)
           {
               //alert(base_url+'index.php?action='+h+'&query='+i+'&id='+j);
               $('#'+j).hide(750); 
              // alert(base_url+'index.php?action='+h+'&delete='+i+'&id='+j);
           }
       }); 
  } 
}

function deleteme_checking(url0,id)
{
  var r = confirm("Are you sure you want to delete this data ??");
  if (r == true) 
  {
     $.ajax({
           type: "GET",
           url: base_url+'index.php?'+url0,
           success: function(data)
           {
               
               $('#'+id).hide(750); 
               let text = data;
                let result = text.trim();
               alert(result);
           }
       }); 
  } 
}

function get_details(column,id,inputid)
{

  $('#'+inputid).html('');
  var id=$('#'+id).val();
  /*alert(column);
  alert(id);
  alert(inputid);*/
  $.ajax({
           type: "POST",
           url: base_url+'index.php?action=get_details&column='+column+'&id='+id+'&input='+inputid,
           success: function(data)
           {
              //alert(data);
               $('#msg'+inputid).html(data);  
                          
               $(function() {
               setTimeout(function() 
               {
                  $('#msg'+input).html("")
               }, 3000);

               $('#'+inputid).html(data);
              });
           }
        });

}

//-- for second course box 
function get_details2(column,id,inputid,outputid)
{

 // $('#'+inputid).html('');
  var id=$('#'+id).val();
  /*alert(column);
  alert(id);
  alert(inputid);
  alert(outputid);*/

  $.ajax({
           type: "POST",
           url: base_url+'index.php?action=get_details&column='+column+'&id='+id+'&input='+inputid,
           success: function(data)
           {
              //alert(data);
               $('#msg'+inputid).html(data);  
                          
               $(function() {
               setTimeout(function() 
               {
                  $('#msg'+input).html("")
               }, 3000);

               $('#'+outputid).html(data);
              });
           }
        });

}

function get_batch_details(column,id,inputid)
{

  $('#'+inputid).html('');
  var id=$('#'+id).val();
  $.ajax({
           type: "POST",
           url: base_url+'index.php?action=get_batch_details&id='+id,
           success: function(data)
           {
               $('#'+inputid).html(data);
            }
        });

}


function get_related_data(class_name,function_name,inputid,outputid)
{

  $('#'+outputid).html('');
  var id=$('#'+inputid).val();
  $.ajax({
           type: "POST",
           url: base_url+'index.php?action=get_related_data&class='+class_name+'&function='+function_name+'&id='+id,
           success: function(data)
           {
               $('#'+outputid).html(data);
            }
        });  
}


//-- show model
function show_page_model(page)
{
  //alert(base_url+page);
  $('#modal-body').html('<img src='+loading_img+'>');
  
  $('#modal-body').load(base_url+page); 
}


function show_hide(id)
{
  var classme = $('#'+id).attr('class');
  
}


function get_rand_question()
{
   var course = $("#course").val();
   var subject = $("#subject").val();
   var asses_id = $("#asses_id").val();
   var chapter = $("#chapter").val();
   /*alert(course);
   alert(subject);
   alert(asses_id);*/
   //alert(base_url+'index.php?action=get_rand_question&asses_id='+asses_id+'&course='+course+'&subject='+subject+'&chapter='+chapter);

   $('#msgcreate_assessment').html("<div class='alert alert-success'>Please Wait...</div>");  
               
  $.ajax({
           type: "POST",
           url: base_url+'index.php?action=get_rand_question&asses_id='+asses_id+'&course='+course+'&subject='+subject+'&chapter='+chapter,
           success: function(data)
           {
              //alert(data);
                          
               $(function() {
               setTimeout(function() 
               {
                  $('#msgcreate_assessment').html("")
               }, 1000);

               $('#allquestion').html(data);
              });


           }
        });

}


function removeme(x)
{
    //alert(x);
    $('#'+x).remove();
    
}

function select_all_checkbox()
{
    var btn_val = $('#selectall').val();
    //alert(btn_val);
    if(btn_val=='Select All')
    {
        $(".qcheck").prop('checked', true); 
        $('#selectall').removeClass('btn-primary');
        $('#selectall').addClass('btn-danger');
        $('#selectall').val('Deselect All'); 
    }
    else
    {
        $(".qcheck").prop('checked', false);
        $('#selectall').addClass('btn-primary');
        $('#selectall').removeClass('btn-danger');
        $('#selectall').val('Select All'); 
    }   
}

function uploadcsv()
{
    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
}

function show_edit(id)
{
    //alert(id);
    if($('#'+id).css("display") == "none" )
    {
        $('#'+id).show();
    }
}

function get_branch_details(id1,id2,tblname)
{
    
    var id = $('#'+id1).val();
    $.ajax({
           type: "POST",
           url: base_url+'index.php?action=get_branch_classes&tblname='+tblname+'&id='+id,
           success: function(data)
           {
               $(function() {
               $('#'+id2).html(data);
              });
           }
        });

}


function generate_pdf(id)
{
    //Create a new PDF canvas context.
    var ctx = new canvas2pdf.Context(blobStream());

    //draw your canvas like you would normally
    ctx.fillStyle='yellow';
    ctx.fillRect(100,100,100,100);
    // more canvas drawing, etc...

    //convert your PDF to a Blob and save to file
    ctx.stream.on('finish', function () {
        var blob = ctx.stream.toBlob('application/pdf');
        saveAs(blob, 'example.pdf', true);
    });
    ctx.end();
}


function get_summarks()
{
    

    var sum = 0;

        $('.qcheck:checked').each(function() {
            var row = $(this).closest("tr").find("td");  // Gets a descendent with class="td"
            //alert(row);
            var txtValue = row.find(".marks").val(); 
            
               sum += parseFloat(txtValue); 
               
            });

        $('#totalmarks').val(sum);
  
}


function load_page(url,id)
{
    $("#"+id).html('<img src='+loading_img+'>');
    $("#"+id).load(url);
}


function enable_metabox(id)
{
     $("#"+id).removeAttr('disabled');
}

function fnExcelReport(x)
{    
   var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(x); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE"); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}


//--- dropdown populate
function drop_down_populate(action,query_type,result_input,fetch_input)
{
    var action = action;
    var query_type = query_type;
    var result_input = result_input;
    var fetch_input = $('#'+fetch_input).val();

    $.ajax({
        type: "GET",
        url: base_url+'index.php?action='+action+'&query='+query_type+'&input='+fetch_input,
        success: function(data)
        {
           // alert(data);
            $('#'+result_input).html(data);
          
        }
     });

}