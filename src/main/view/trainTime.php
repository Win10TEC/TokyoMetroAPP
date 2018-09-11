<html>
<head>
    <?php
    require_once dirname(__FILE__) . '/../view/head.php';
    require_once dirname(__FILE__) . '/../controller/TrainController.php';
    ?>
</head>
<body>
<div class="container">
    <h2>時刻表</h2>
    <div class="row">
        <div class="col-md-8">
            <?php
            $this->getStationList;
//            foreach ($this->getStationList as $item){
//                var_dump($item);
//            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
