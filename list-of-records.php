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
                          

<?php
$lineNumber = 0;


echo "<table>\n\n";
$f = fopen("data.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        if($lineNumber <1 ){
        echo "<td style='border : 1px solid black; padding: 10px;'>" . Num . "</td>";
        $lineNumber++;
        }else{
            echo "<td style='border : 1px solid black; padding: 10px;'>" . $lineNumber . "</td>";
            $lineNumber++;
        }

        foreach ($line as $cell) {
                if($lineNumber ==1){
                    echo "<td style='border : 1px solid black; padding: 10px; color : green; font-size : 24px;'>" . htmlspecialchars($cell) . "</td>";
                }else{
                echo "<td style='border : 1px solid black; padding: 10px;'>" . htmlspecialchars($cell) . "</td>";
            }
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table>";



?>






            </div>

			<div class="footer" style="font-color:green;"><?php print $footer; ?></div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        </body>
</html>
<?php ob_flush(); ?>