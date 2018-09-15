<html>

<head>
    <?php
    require_once dirname(__FILE__) . '/head.php';
    ?>
    <title>運行状況</title>
</head>

<body>

<div class="container">
    <h1 class="main-title">現在の運行状況<br></h1>
    <div class="row">
        <div class="flex-wrap col-md-6">
            <h1 class="main-title">正常<br></h1>
            <?php
            foreach ($this->trainInfoList  as $item) {
                $id = $item["id"];
                $date = $item["date"];
                $valid = $item["valid"];
                $operator = $item["operator"];
                $railway = $item["railway"];
                $timeOfOrigin = $item["timeOfOrigin"];
                $trainInformationText = $item["trainInformationText"];

                echo '<div class="p-3 ">';

                if ($railway === "Marunouchi") {
                    echo '<div class="card" style=" background-color: #F62E36;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">丸ノ内線 / Marunouchi</h4>';
                    echo '<p class="railway-main-text">';
                    echo $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Hanzomon") {
                    echo '<div class="card" style=" background-color: #8F76D6;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">半蔵門線 / Hanzomon</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Hibiya") {
                    echo '<div class="card" style=" background-color: #B5B5AC;">';
                    echo '<div  class="card-body">';
                    echo '<h4 class="railway-title-text">日比谷線 / Hibiya</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Chiyoda") {
                    echo '<div class="card" style=" background-color: #00BB85;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">千代田線 / Chiyoda</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Ginza") {
                    echo '<div class="card" style=" background-color: #FF9500;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">銀座線 / Ginza</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Tozai") {
                    echo '<div class="card" style=" background-color: #009BBF;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">東西線 / Tozai</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Namboku") {
                    echo '<div class="card" style=" background-color: #00AC9B;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">南北線 / Namboku</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                } elseif ($railway === "Fukutoshin") {
                    echo '<div class="card" style=" background-color: #9C5E31;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">副都心線 / Fukutoshin</h4>';
                    echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="card" style=" background-color: #C1A470;">';
                    echo '<div class="card-body">';
                    echo '<h4 class="railway-title-text">有楽町線 / Yurakucho</h4>';
                    echo '<p class="railway-main-text">'. $trainInformationText .'</p>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
        </div>
        <div class="flex-wrap col-md-6">
            <h1 class="main-title">異常<br></h1>
            <?php
            if ($this->trainInfoStatusList === null) {
                echo '<h2 class="main-title"><br>現在、異常はありません。</h2>';
            } else {
                foreach ($this->trainInfoStatusList  as $item) {
                    $id = $item["id"];
                    $date = $item["date"];
                    $valid = $item["valid"];
                    $operator = $item["operator"];
                    $railway = $item["railway"];
                    $timeOfOrigin = $item["timeOfOrigin"];
                    $trainInformationStatus = $item["trainInformationStatus"];
                    $trainInformationText = $item["trainInformationText"];

                    echo '<div class="p-3 ">';

                    if ($railway === "Marunouchi") {
                        echo '<div class="card" style=" background-color: #F62E36;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">丸ノ内線 / Marunouchi</h4>';
                        echo '<p class="railway-main-text">';
                        echo $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Hanzomon") {
                        echo '<div class="card" style=" background-color: #8F76D6;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">半蔵門線 / Hanzomon</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Hibiya") {
                        echo '<div class="card" style=" background-color: #B5B5AC;">';
                        echo '<div  class="card-body">';
                        echo '<h4 class="railway-title-text">日比谷線 / Hibiya</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Chiyoda") {
                        echo '<div class="card" style=" background-color: #00BB85;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">千代田線 / Chiyoda</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Ginza") {
                        echo '<div class="card" style=" background-color: #FF9500;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">銀座線 / Ginza</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Tozai") {
                        echo '<div class="card" style=" background-color: #009BBF;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">東西線 / Tozai</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Namboku") {
                        echo '<div class="card" style=" background-color: #00AC9B;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">南北線 / Namboku</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } elseif ($railway === "Fukutoshin") {
                        echo '<div class="card" style=" background-color: #9C5E31;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">副都心線 / Fukutoshin</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div class="card" style=" background-color: #C1A470;">';
                        echo '<div class="card-body">';
                        echo '<h4 class="railway-title-text">有楽町線 / Yurakucho</h4>';
                        echo '<p class="railway-main-text">' . $trainInformationText . '</p>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>