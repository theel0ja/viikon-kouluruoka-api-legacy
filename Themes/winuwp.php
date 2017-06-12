<?php
    function FoodList($data) {
        foreach($data as $food) {
            echo $food . "<br />";
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />

        <style>
            * {
                font-family: "Segoe UI";
            }
        </style>
    </head>
    <body>
        <?php
            for($day = 0; $day <= count($data["menu"]) -1; $day++) {
            
            $dayOfWeek = $day + 1;
            $dayOfWeekNow = date("N");
				
			echo "\n\n";
        ?>
            <div class="day-<?php echo $dayOfWeek; if($dayOfWeek == $dayOfWeekNow) { echo " current-day"; } ?>">
                <h3>
                    <?php $unixTime = strtotime($data["menu"]["$day"]["date"]); ?>
                    <?php echo strftime("%A", $unixTime) . " " . date("d.n.", $unixTime); ?>
                </h3>
                
                <?php if(isset($data["menu"]["$day"]["lunch"]["food"])) { ?>
                    <h4><?php echo _("Lunch"); ?></h4>
                    <?php FoodList($data["menu"]["$day"]["lunch"]["food"]); ?>
                <?php } ?>

                <?php if(isset($data["menu"]["$day"]["vegetarian_lunch"]["food"])) { ?>
                    <h4><?php echo _("Vegetarian Lunch"); ?></h4>
                    <?php FoodList($data["menu"]["$day"]["vegetarian_lunch"]["food"]); ?>
                <?php } ?>

                <?php if(isset($data["menu"]["$day"]["after_school_activity"]["food"])) { ?>
                    <h4><?php echo _("After-school activity snack"); ?></h4>
                    <?php FoodList($data["menu"]["$day"]["after_school_activity"]["food"]); ?>
                <?php } ?>
            </div>
        <?php
            }
        ?>
    </body>
</html>