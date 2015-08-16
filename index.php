<?php

   include('html/header.html');
  
   if(isset($_GET['search'])) {
     include('php/MovieList.php');
   }
   else {
     echo "<br /><div class = 'title' align = 'center'>Please select above</div>";
   }
  
   include('html/footer.html');
	
?>
