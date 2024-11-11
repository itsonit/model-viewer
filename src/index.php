<?php
$playerconfig = [
    'flakon' => [
        'zoomMin' => 0.8,
        'zooMax' => 3,
        'angleMax' => 60,
        'files' => [
            'data/Flakon_09.10.24.ply'
        ]
    ]
];

//retrieve parameters from htaccess mod_rewrite
$asset = strtolower($_REQUEST['asset']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>3D Gaussian Splatting</title>
    <base href="https://www.xpo.space/3DGS_new/" />
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script>
        window.playerconfig = {
            zoomMin: <?php echo $playerconfig[$asset]['zoomMin']; ?>,
            zooMax: <?php echo $playerconfig[$asset]['zooMax']; ?>,
            angleMax: <?php echo $playerconfig[$asset]['angleMax']; ?>,
            files: [<?php
                foreach ($playerconfig[$asset]['files'] as $file) {
                    echo "'$file',";
                }
                ?>]
        };
    </script>
</head>

<body>
    <a id='ar-link' rel='ar' download='asset.usdz'><img /></a>
    <div id='app'></div>
    <script src="index.js"></script>
</body>
</html>
