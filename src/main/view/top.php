<html>

<head>
    <?php require_once dirname(__FILE__) . '/head.php'; ?>
    <title>TOP</title>
</head>
<body>
<div class="container">
    <h1 class="main-title">現在の運行状況<br></h1>
    <div class="accordion" id="accordion2" role="tablist">
        <?php
        require_once dirname(__DIR__) . '/controller/TrainController.php';
        $class = new getTrainInfo();
        foreach ($class->getTrainInfoData() as $item) {
            $id = $item["id"];
            $date = $item["date"];
            $valid = $item["valid"];
            $operator = $item["operator"];
            $railway = $item["railway"];
            $timeOfOrigin = $item["timeOfOrigin"];
            $trainInformationText = $item["trainInformationText"];

            if ($railway === "Marunouchi") {
                echo '<div class="card-header" role="tab" id="heading1">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #F62E36;" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="true" aria-controls="collapse1"> 丸ノ内線 / Marunouchi </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse1" class="collapse" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #F62E36;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">丸ノ内線 / Marunouchi</h4>';
                echo '<p class="railway-main-text">';
                echo $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Hanzomon") {
                echo '<div class="card-header" role="tab" id="heading2">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #8F76D6;" class="text-body stretched-link text-decoration-none" href="#collapse2" aria-expanded="false" aria-controls="collapse2"> 半蔵門線 / Hanzomon </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #8F76D6;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">半蔵門線 / Hanzomon</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Hibiya") {
                echo '<div class="card-header" role="tab" id="heading3">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #B5B5AC;" class="text-body stretched-link text-decoration-none" href="#collapse3" aria-expanded="false" aria-controls="collapse3"> 日比谷線 / Hibiya </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #B5B5AC;">';
                echo '<div  class="card-body">';
                echo '<h4 class="railway-title-text">日比谷線 / Hibiya</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Chiyoda") {
                echo '<div class="card-header" role="tab" id="heading4">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #00BB85;" class="text-body stretched-link text-decoration-none" href="#collapse4" aria-expanded="false" aria-controls="collapse4"> 千代田線 / Chiyoda </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="heading4" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #00BB85;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">千代田線 / Chiyoda</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Ginza") {
                echo '<div class="card-header" role="tab" id="heading5">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #FF9500;" class="text-body stretched-link text-decoration-none" href="#collapse5" aria-expanded="false" aria-controls="collapse5"> 銀座線 / Ginza </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse5" class="collapse" role="tabpanel" aria-labelledby="heading5" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #FF9500;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">銀座線 / Ginza</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Tozai") {
                echo '<div class="card-header" role="tab" id="heading6">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #009BBF;" class="text-body stretched-link text-decoration-none" href="#collapse6" aria-expanded="false" aria-controls="collapse6"> 東西線 / Tozai </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse6" class="collapse" role="tabpanel" aria-labelledby="heading6" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #009BBF;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">東西線 / Tozai</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Namboku") {
                echo '<div class="card-header" role="tab" id="heading6">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #00AC9B;" class="text-body stretched-link text-decoration-none" href="#collapse7" aria-expanded="false" aria-controls="collapse7"> 南北線 / Namboku </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse7" class="collapse" role="tabpanel" aria-labelledby="heading7" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #00AC9B;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">南北線 / Namboku</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } elseif ($railway === "Fukutoshin") {
                echo '<div class="card-header" role="tab" id="heading8">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #9C5E31;" class="text-body stretched-link text-decoration-none" href="#collapse8" aria-expanded="false" aria-controls="collapse8"> 副都心線 / Fukutoshin </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse8" class="collapse" role="tabpanel" aria-labelledby="heading8" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #9C5E31;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">副都心線 / Fukutoshin</h4>';
                echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="card-header" role="tab" id="heading9">';
                echo '<h5 class="mb-0">';
                echo '<a data-toggle="collapse" style="color: #C1A470;" class="text-body stretched-link text-decoration-none" href="#collapse9" aria-expanded="false" aria-controls="collapse9"> 有楽町線 / Yurakucho </a>';
                echo '</h5>';
                echo '</div>';
                echo '<div id="collapse9" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">';
                echo '<div class="card" style=" background-color: #C1A470;">';
                echo '<div class="card-body">';
                echo '<h4 class="railway-title-text">有楽町線 / Yurakucho</h4>';
                echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
        <br><br>
</div>
</div>
<footer>
    <?php require_once dirname(__FILE__) . '/foot.php'; ?>
</footer>

</html>