<!DOCTYPE html>

<html>

<head>


<title>Bhavisha ERP</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/css/menu.css<?php echo "?ver=".rand();?>">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/plugins/fontawesome/css/all.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/css/bootstrap-3.3.2.min.css">


<!--------- data table------>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>theme/plugins/datatable/dataTables.bootstrap4.min.css">

<!-- ckeditor --->
<script src="<?php echo $base_url.'theme/plugins/ckeditor/ckeditor.js' ?>"></script>
<script>
        function ck_config(id)
        {
            var $ckfield =CKEDITOR.replace( id, { //eslint-disable-line
                extraPlugins: 'ckeditor_wiris',
                // Allow MathML content.
                allowedContent: true,
                toolbar: [
                    { name: 'wirisplugins', items: ['ckeditor_wiris_formulaEditor', 'ckeditor_wiris_formulaEditorChemistry'] },
                    { name: 'other', items: ['Bold','Italic','Underline','RemoveFormat','NumberedList','BulletedList','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','UIColor','TextColor'] }
                ],
                
              });
              

                
                     /*var $ckfield =CKEDITOR.replace(id);
                    $ckfield.on('change', function() {
                        $ckfield.updateElement();         
                    });
              
             // $ckfield.skin = 'moonocolor';*/
        }
    </script>

<!-- chart -->
<script type="text/javascript" src="<?php echo $base_url;?>theme/js/Chart.js"></script>

<!-- jquery and bootstrap------>


<script src="<?php echo $base_url;?>theme/js/jquery-2.1.3.min.js"></script>
<script src="<?php echo $base_url;?>theme/js/bootstrap-3.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>theme/js/function.js?ver=<?php echo rand(0,9999);?>"></script>

<!--- multiselect-->
<script type="text/javascript" src="<?php echo $base_url;?>theme/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="<?php echo $base_url;?>theme/css/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript">
    // Make Dropdown Submenus possible
$('.dropdown-submenu a.dropdown-submenu-toggle').on("click", function(e){
    $('.dropdown-submenu ul').removeAttr('style');
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
});
// Clear Submenu Dropdowns on hidden event
$('#bs-navbar-collapse-1').on('hidden.bs.dropdown', function () {
    $('.navbar-nav .dropdown-submenu ul.dropdown-menu').removeAttr('style');
});
</script>

</head>

<body>

<div class='dashboard'>

    