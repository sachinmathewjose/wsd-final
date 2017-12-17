<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TO-DO</title>
</head>
<body>
    <h1>All Accounts</h1>
    <p>Added this display just for verification. Can be removed later</p>
    <?php
        if ($data != NULL) {
            print utility\htmlTable::genarateTableFromMultiArray($data);
        }
    ?>
</body>
</html>