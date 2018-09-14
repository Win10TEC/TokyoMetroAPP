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
        <div class="col-12">
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
            <?php

            //var_dump($this->getTrainTimeList );
            foreach ($this->getTrainTimeList as $item) {
                var_dump($item);
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
