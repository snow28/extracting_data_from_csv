<!--20.contactform.php-->
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ITWE</title>
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        

    </head>
        <body>
        <?php
                    $color; //I will use this variable to store color for me date 
                    $timeHoursOnly=date('h');
                    $footer;//i will use this var to store text for footer

                    if($timeHoursOnly>=8){
                        $footer = "Its my free time";
                    }else if($timeHoursOnly<8){
                        $footer = "You must sleep!";
                    }
                    

                    //determining the day of week
                    if(date('l') != 'Sunday' || date('l') != 'Saturday'){
                        $color = "red";
                    }else{
                        $color='green';
                    }
                    
        ?>
        <div class="main">
    		<div class='date-time' style="color : <?php print $color; ?>;">
    			<?php 

                    $today=date("d M, Y"); 
                    echo $today;
                 ?>

    		</div>

			<div class="menu">
                <ul>
                    <li><a href="index.php">Main page</a></li>
                    <li><a href="list-of-records.php">List of records</a></li>
                    <li><a href="search.php">Search for records</a></li>
                </ul>         
            </div>
            <div class="php-area">
            <form method="get">

                <label for="subject">Subject</label>
                <input id="subject" name="subject" type="text" class="input">
                <label for="publisher">Publisher</label
                <input id="publisher" name="publisher" type="text" class="input">
                <label for="sales">Minimal sales</label>
                <input id="sales" name="sales" type="text" class="input">
                <input type="submit" value="Send" class="button">
                

            </form>


            <?php
                 $subject=$_GET["subject"];
                 $publisher=$_GET["publisher"];
                 $sales=$_GET["sales"];
                 $file="data.csv";

                echo "<br> <p style='font-size : 50;' > Parameters which you gave : </p> ";
                echo "Subject -> " . $subject . "<br>";
                echo "Publisher ->". $publisher . "<br>";
                echo "Sales ->" . $sales . "<br> <br> <br>";

                $f = fopen("data.csv", "r");

                class RowData {

                     public $representative;
                     public $Region;
                     public $Month;
                     public $Publisher;
                     public $Subject;
                     public $Sales;
                     public $Margin;
                     public $Quantity;
                     public $csv_data = array();
                  
                     
                     public function RowData($csv_data) {
                        $this->representative = $csv_data[0];
                        $this->Region = $csv_data[1];
                        $this->Month = $csv_data[2];
                        $this->Publisher = $csv_data[3];
                        $this->Subject = $csv_data[4];
                        $this->Sales = $csv_data[5];
                        $this->Margin = $csv_data[6];
                        $this->Quantity = $csv_data[7];
                        
 
                    }            
                    
                }


                $data_array = array();

                if (($handle = fopen("data.csv", "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                        $num = count($data);
                        array_push($data_array, new RowData($data));
                    }
                    fclose($handle);
                }

            

                echo "<table>\n\n";
                


                if($data_array[$x]->Subject == $subject && $data_array[$x]->Publisher == $publisher && $data_array[$x]->Sales >= $sales ){
                        echo "<tr>";
                
                echo "<td style='border : 1px solid black; padding: 10px; '>" . $data_array[0]->representative . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Region . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Month . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Publisher . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Subject . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Sales . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Margin . "</td>";
                echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[0]->Quantity . "</td>";


                

                    echo "</tr>";
                }





                 $currentLine=1;

                 for($x=1;$x<306;$x++){
                    

                    if($data_array[$x]->Subject == $subject && $data_array[$x]->Publisher == $publisher && $data_array[$x]->Sales >= $sales ){
                        echo "<tr>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->representative . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Region . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Month . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Publisher . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Subject . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Sales . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Margin . "</td>";
                        echo "<td style='border : 1px solid black; padding: 10px;'>" . $data_array[$x]->Quantity . "</td>";
                        echo "</tr>";
                    }


                   
                 }

                




                echo "\n</table>";




            ?>
            
                                  
            







            </div>

			<div class="footer" style="font-color:green;"><?php print $footer; ?></div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        </body>
</html>
<?php ob_flush(); ?>