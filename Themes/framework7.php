<?php
    header("Content-Type: text/html; charset=utf-8");
    header("Access-Control-Allow-Origin: *");

    error_reporting(E_ALL & ~E_NOTICE); # Notice: Use of undefined constant   - assumed ' ' in /home/theel0ja/dev/Themes/default.php on line 21 & 33

    function FoodList($data) {
        foreach($data as $food) {
            echo $food . "<br />";
        }
    }
    
?>
        <h1><?php echo $data["name"]; ?></h1>
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

        <?php if(isset($data["menu"]["$day"]["lunch"])) { ?>
            <h4><?php echo _("Lunch"); ?></h4>
            <?php FoodList($data["menu"]["$day"]["lunch"]); ?>
        <?php } ?>

        <?php if(isset($data["menu"]["$day"]["vegetarian_lunch"])) { ?>
            <h4><?php echo _("Vegetarian Lunch"); ?></h4>
            <?php FoodList($data["menu"]["$day"]["vegetarian_lunch"]); ?>
        <?php } ?>

        <?php if(isset($data["menu"]["$day"]["after_school_activity"])) { ?>
            <h4><?php echo _("After-school activity snack"); ?></h4>
            <?php FoodList($data["menu"]["$day"]["after_school_activity"]); ?>
        <?php } ?>
    </div>
<?php } ?>