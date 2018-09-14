<html>
<head>
    <?php require_once dirname(__FILE__) . '/head.php'; ?>
    c
</head>
<body>
<div class="container">
    <h1><br>Reminder<br></h1>
    <h1><br>3秒後にトップページへリダイレクトします。<br></h1>
            <?php
            header('Refresh: 3; URL=/index.php');
            ?>
</div>
</body>
</html>