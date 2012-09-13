<? php

 if ($searching =="yes") 
 { 
 echo "<h2>Results</h2><p>"; 
 

 if ($find == "") 
 { 
 echo "<p>You forgot to enter a search term"; 
 exit; 
 } 
 
 
 mysql_connect("localhost", "user_name", "password") or die(mysql_error()); 
 mysql_select_db("database_name") or die(mysql_error()); 
 

 $find = strtoupper($find); 
 $find = strip_tags($find); 
 $find = trim ($find); 
 
 //Now we search for our search term, in the field the user specified 
 $data = mysql_query("SELECT * FROM college WHERE upper($field) LIKE'%$find%'"); 
 
 
 while($result = mysql_fetch_array( $data )) 
 { 
 echo $result['name']; 
 echo " "; 
 echo $result['id']; 
 echo "<br>"; 
 echo $result['address']; 
 echo "<br>"; 
 echo "<br>"; 
 } 
 

 $matches=mysql_num_rows($data); 
 if ($matches == 0) 
 { 
 echo "cannot find an entry to match your query<br><br>"; 
 } 
 

 echo "<b>Searched For:</b> " .$find; 
 } 
 ?> 
