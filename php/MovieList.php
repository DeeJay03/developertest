<?php
	
   define('URL', 'http://api.rottentomatoes.com/api/public/v1.0/movies.json?apikey=snxgbr8pwkzjnjdsawptsdwg&q=');
   define('DIR', 'data/movies');

   if(isset($_GET['search'])) {
      $search = $_GET['search'];
      $page = $_GET['page'];;
      $data = file_get_contents(DIR . $search . '.json'); //file_get_contents(URL . $search . '&page=' . $page)
      print_r(URL . $search . '&page=' . $page); //check proper json url
      $movies = json_decode($data, true);		
?>		
      <div id = "content">
       <div class = "navigation" style = "padding:0"><a href = "<?php echo 'index.php?search=' . $search . '&page=' . ($page+1) ?>">Next</a></div>
        <div class = "container">
         <table border = "0" class = "results">
         <tr>
            <th class = "title" colspan = "3" align = "left">Search results for: <?php echo $search ?></th>
         </tr>
	 <tr>
<?php	 foreach($movies['movies'] as $field => $value) { 
	    if($field % 3 == 0) {
?>	       </tr>
	       <tr>
<?php 	    } 

	    $colour = "";	
	    $titleArr = explode(" ", $value['title']);
	
	    foreach($titleArr as $f => $v) {
	       switch(strtolower($v)) {
	          case 'red':
		  case 'green':
		  case 'blue':
		  case 'yellow':
		     $colour = $titleArr[$f];
		     break;
	       }
	       if($colour != "") {
	          break;
	       }
	   }
?>	   <td>
			
	      <table border = "1" bgcolor = "<?php echo $colour ?>">
	         <tr>
		    <th class = "thumb" rowspan = "4"><img src = "<?php echo $value['posters']['original'] ?>" height = "110" width = "80"></img></td>
		    <th>Title:</th>
		    <td><?php echo $value['title'] ?></td>
		 </tr>
		 <tr>
		    <th>Year:</th>
		    <td><?php echo $value['year'] ?></td>
		 </tr>
		 <tr>
		    <th>Runtime</th>
		    <td><?php echo $value['runtime'] ?></td>
		 </tr>
		 <tr>
		    <td colspan = "2"><a class = "linkColour" href = "<?php echo $value['links']['alternate'] ?>">Full Details</a></td>
		 </tr>
	      </table>
		
	    </td>
<?php	 } 
?>	 </tr>
	</table>
       </div> 
      </div>
<?php  } 		
?>
