</div>

</div>



<script>

  </script>








<!-- <script>tinymce.init({selector:'textarea'});</script> -->

<script type="text/javascript" src="<?php echo $base_url;?>theme/js/menu.js"></script>





<!--------- data table-------->

<style>
.dt-length{display:inline; float:left; width:33%; text-align:left;}
.dt-info{display:inline; float:left; text-align:left;}

.dt-buttons {display:inline; float:none; width:33%; text-align:center;}
.dt-search{display:inline; float:right; width:33%; text-align:right;}

.dt-paging{display:inline; float:right; text-align:right;}
</style>
<script type="text/javascript" src="<?php echo $base_url;?>theme/plugins/datatable/datatables.min.js"></script>

<script type="text/javascript" src="<?php echo $base_url;?>theme/plugins/datatable/datatables.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

    
      $('#data-table').DataTable({
        dom: 'lBfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
    });


  new DataTable('#data-table1', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
  });

  new DataTable('#data-table4', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
  });

  new DataTable('#data-table3', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
  });

  new DataTable('#data-table4', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
  });

  new DataTable('#data-table5', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
  });

} );

</script>

<!-- select 2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
$('.select2').select2();
});
</script>

<!-- ck editor-->

<script>

        var $ckfield =CKEDITOR.replace( 'editor' );

         $ckfield.on('change', function() {

          

            $ckfield.updateElement();         

          });



         





        //CKEDITOR.replace( 'editor2' );

         $(function () {

             $('#datetimepicker').datetimepicker();

         });

</script>



<!-- model Popup-->



<!-- Modal -->

<div id="myModal" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        

      </div>

      <div class="modal-body">

       <p id="modal-body"></p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

      </div>

    </div>



  </div>

</div>

<!-- Modal -->
<style>
  .modal-dialog {
  width: auto;
  max-width: 900px; // Optional, maximum width
}
</style>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <p id="modal-body"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class='text-center col-sm-12'>Developed & Maintained by <a href="https://www.prodhyogiki.com" target="_blank">Prodhyogiki</a></div>
</body>

</html>