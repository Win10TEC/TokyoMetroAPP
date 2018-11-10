<html>
<head>
    <?php
    require_once dirname(__FILE__) . '/../view/head.php';
    ?>
    <title>時刻表</title>
    <link rel="stylesheet" href="/../../resource/css/jquery.flexdatalist.css">
    <script type="text/javascript" src="/../../resource/js/jquery.flexdatalist.js"></script>
    <script type="text/javascript">

        $('.flexdatalist').flexdatalist({
            minLength: 2,
            valueProperty: 'sameAs',
            visibleProperties: '["title","railway","sameAs"]',
            searchIn: 'title',
            data: <?php echo $this->stationList; ?>
        });
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><h2>時刻表</h2><br>
            <p>駅名を入力してください。</p>
            <form class="form-inline input-group" action="/index.php/trainTime"  method="get">
                <input type="text" placeholder="Search" class="form-control flexdatalist"
                       data-data= '<?php echo $this->stationList; ?>' data-search-in= "title"
                       data-visible-properties = '["title","railway","sameAs"]'
                       data-value-property='sameAs' data-min-length="2" name="search">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
	            </span>
            </form>
            <h2><br>検索結果</h2>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr><th>時間</th><th>行き先</th><th>タイプ</th></tr>
                    </thead>
            <?php
          //  var_dump($this->TrainTimeList($_GET));
            foreach ($this->stationList as $item) {
                var_dump($item);
            }
//            foreach ($this->trainTimeList as $item) {
//                echo '<tbody>';
//                echo '<tr>';
//                echo '<td>';
//                echo $item["departureTime"];
//                echo '</td>';
//                echo '<td>';
//                echo $item["destinationStation"];
//                echo '</td>';
//                echo '<td>';
//                echo $item["trainType"];
//                echo '</td>';
//                echo '</tr>';
//                echo '</tbody>';
//            }

            ?>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
