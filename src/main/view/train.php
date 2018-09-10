<html>
<head>
    <?php
    require_once dirname(__FILE__) . '/../view/head.php';
    require_once dirname(__FILE__) . '/../controller/TrainController.php';
    ?>
</head>

<body>

<div class="container">
    <h2>電車情報</h2>
    <div class="row">
        <div class="col-md-8">
            <?php
            echo '<div class="card">';
            echo '<div class="card-body">';
            foreach ($this->trainList as $item) {
                echo 'date==>'. $item["date"].'<br><br>';
                echo 'valid==>'.$item["valid"].'<br><br>';
                echo 'frequency==>'.$item["frequency"].'<br><br>';
                echo 'railway==>'.$item["railway"].'<br><br>';
                echo 'sameAs==>'.$item["sameAs"].'<br><br>';
                echo 'trainNumber==>'.$item["trainNumber"].'<br><br>';
                echo 'delay==>'.$item["delay"].'<br><br>';
                echo 'startingStation==>'.$item["startingStation"].'<br><br>';
                echo 'terminalStation==>'.$item["terminalStation"].'<br><br>';
                echo 'fromStation==>'.$item["fromStation"].'<br><br>';
                echo 'toStation==>'.$item["toStation"].'<br><br>';
                echo 'railDirection==>'.$item["railDirection"].'<br><br>';
                echo 'trainOwner==>'.$item["trainOwner"].'<br><br>';

                echo "<br>";
                echo "<br>";
            }
            echo '</div>';
            echo '</div>';
            ?>
        </div>
    </div>


</div>
</body>
</html>