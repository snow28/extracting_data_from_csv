<!--20.contactform.php-->
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ITWE</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
                <div id="about-me"><em>Some text about me</em></div>
    			<p>Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language.[1] Although most often used to set the visual style of web pages and user interfaces written in HTML and XHTML, the language can be applied to any XML document, including plain XML, SVG and XUL, and is applicable to rendering in speech, or on other media. Along with HTML and JavaScript, CSS is a cornerstone technology used by most websites to create visually engaging webpages, user interfaces for web applications, and user interfaces for many mobile applications.</p>
            </div>
			<div class="footer" style="font-color:green;"><?php print $footer; ?></div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        </body>
</html>
<?php ob_flush(); ?>