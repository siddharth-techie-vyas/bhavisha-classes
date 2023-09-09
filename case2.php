<?php
switch ($action) {
   //============ book / library functions
//   echo $_GET['action'];
   case "library_details":
		   if($_GET['query']=='library_books')
         {
            $subject = $_GET['input'];
            $get = $library->get_book_by_subject($subject);
            if(count($get)>0)
            {	
               echo "<option value='' disabled='disabled' selected='selected'>-- Select --</option>";	
               foreach ($get as $key => $value) 
               {
                  echo "<option value='".$get[$key]['id']."'>".$get[$key]['book_name']."</option>";
               }
            }   
               else
               {
               echo "<option>--No book found --</option>";	
               }
            
         }
         //-- get qty
         if($_GET['query']=='library_book_qty')
         {
            $bookid = $_GET['input'];
            $get = $library->get_book_one($bookid);
            if(count($get)>0)
            {	
               $nu=$get[0]['copies']-$get[0]['alloted'];
               echo "Copies Available : ".$nu;
            }   
               else
               {
               echo "No book found";	
               }
            
         }
         
 		
break;
				
case "library":
         if($_GET['query']=='add_author')
 			{
				$save = $library->add_author($_POST['author_name']); 
            }

            if($_GET['query']=='add_location')
            {
               $save = $library->add_location($_POST['location']); 
           }

           if($_GET['query']=='add_publication')
            {
               $save = $library->add_publication($_POST['publication']); 
           }

         if($_GET['query']=='delete_publication')
 			{
				$save = $library->delete_publication($_GET['id']); 
            } 
           
           if($_GET['query']=='delete_author')
 			{
				$save = $library->delete_author($_GET['id']); 
            }

            if($_GET['query']=='delete_book')
 			{
				$save = $library->delete_book($_GET['id']); 
            }

            if($_GET['query']=='delete_location')
 			{
				$save = $library->delete_location($_GET['id']); 
            }

         if($_GET['query']=='add_book')
 			{
                /*if($_POST['book_name'] == '' OR $_POST['author'] == '' OR $_POST['location'] OR $_POST['copies'] == '')
                {
                    echo "<div class='alert alert-danger'>All fileds are mendetory</div>";
                    exit();
                }*/
				$save = $library->add_book($_POST['book_name'],$_POST['author'],$_POST['location'],$_POST['copies'],$_POST['course_name'],$_POST['subject'],$_POST['publication'],$_POST['remark'],$_POST['edition']); 
            }


            if($_GET['query']=='add_book_allotment')
              {
                  $save = $library->book_allotment($_POST['book'],$_POST['copies'],$_POST['alloted_date'],$_POST['schedule_return_date'],$_POST['user_type'],$_POST['user_id']);
              }

              if($_GET['query']=='book_return')
              {
                $update = $library->book_return($_POST['id'],$_POST['return_date'],$_POST['copies'],$_POST['book_id']); 
                }  

    break;

}