</div>

</div>



<script>

  </script>








<script>tinymce.init({selector:'textarea'});</script>

<script type="text/javascript" src="<?php echo $base_url;?>theme/js/menu.js"></script>





<!--------- data table-------->

<script type="text/javascript" src="<?php echo $base_url;?>theme/plugins/datatable/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="<?php echo $base_url;?>theme/plugins/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

    $('#data-table').DataTable();

    $('#data-table1').DataTable();

    $('#data-table2').DataTable();

    $('#data-table3').DataTable();

    $('#data-table4').DataTable();

    $('#data-table5').DataTable();

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
  body .modal { /* Width */
    max-width: 100%;
    width: auto !important;
    display: inline-block;
}
.modal {
  z-index: -1;
  display: flex !important;
  justify-content: center;
  align-items: center;
}

.modal {
   z-index: 1050;
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