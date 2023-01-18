<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="my-block">
        <div class="result">
        <?php 
            $A = (int)$_POST['number_a'];
            $B = (int)$_POST["number_b"];
            $C = (int)$_POST["number_c"];

            $D=$B*$B-4*$A*$C; 

            echo $A."x^2+".$B."x+".$C."=0<br>"; 
            if ($D>0) {
                $x1= (-$B -sqrt($D))/(2*$A); 
                $x2= (-$B +sqrt($D))/(2*$A);  
            ?>
                    <p class='green'>
                        x1=<?php 
                            echo $x1;
                        ?>
                    </p>
                    <p class='green'>
                        x2=<?php 
                            echo $x2;
                        ?>
                    </p>   
            <?php 
            } else if ($D==0) {  
                $x = -$B/(2*$A);    
            ?>
                <p class="one">x=<?php echo $x; ?></p>    
                <br>
            <?php  
            } else {
            ?>
                <p class='error'> 
                    Решений нет
                </p>  
            <?php
            }
        ?>
        </div>
    </div>
</body>
</html>