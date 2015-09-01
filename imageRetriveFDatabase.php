
<?php include 'connect.php'; ?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
   
        <div align="center" id="section"></div>
         <h2 align="center">Suggested Items</h2>
         
         <table width="900" cellspacing="20">

             <tr >
                   <?php
                        mysql_connect("$host", "$user", "$pass") or die(mysql_error()); // check mysql locahost, user name , password 	
                        mysql_select_db("$db") or die(mysql_error());   // check db is existing or not 

                        $counter = 0; // initializa a integer value
                        $cells = 0;   // initializa a integer value



                        if (isset($_COOKIE['viewed'])) { //use the isset() function to find out if the cookie is set  
                            $category = $_COOKIE['viewed'];  //We then retrieve the value of the cookie "user" using the global variable $_COOKIE

                            $query = "select * from item where category ='" . $category . "' ORDER BY  hits DESC";
                        } else {
                            $query = "select * from item  ORDER BY  hits DESC"; // DESC-Wrap your SELECT - that gets only the 3 rows with highest hits.
                        }

                        $rs = mysql_query($query); //Send an SQL query to MySQL without fetching and buffering the result rows.



                        while ($row = mysql_fetch_array($rs)) {  //Fetch a result row as an object

                            echo "<td align=center>";


                            echo "<a href=details.php?itemnumber=" . $row['itemnumber'] . " ><h5 align=center><u>" . $row['manufacturer'] . " " . $row['model'] . "</u> </h5></a>";


                            if ($row['image'] != NULL)// when click image display same image next page
                                echo "<a href=details.php?itemnumber=" . $row['itemnumber'] . " ><img align=center src=images/" . $row['image'] . " width='180' height='200'></img></a><br>";
                            if ($row['price'] > 0) // display price & krona from database 
                                echo "<font color=red align=center >Price:<br></font><b> KRONA " . $row['price'] . "</b><br>";

                            echo "</td>";               // php echo println for table data 
                            $cells = $cells + 1;        // table raw increment.....    
                            if ($cells == 7) {          // 7 cell in a line 
                                echo "</tr><tr>";       // if condition is true its dispaly 2 table rows and 7 table data .....
                                $cells = 0;
                            }


                            $counter = $counter + 1;
                            if ($counter == 24)
                                break;
                        }
                        ?>
             </tr>
         </table>
                  
    </body>
</html>
