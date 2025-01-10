<?php
$playerconfig = [
    'flakon' => [
        'zoomMin' => 1.5,
        'zoomMax' => 3,
        'angleMax' => 0,
        'files' => [
            'data/Flakon_09.10.24.ply'
        ]
    ],
    'hund1' => [
        'zoomMin' => 1.8,
        'zoomMax' => 4,
        'angleMax' => 0,
        'files' => [
            'data/Hund1.ply'
        ]
    ],
'hund2' => [
        'zoomMin' => 1.8,
        'zoomMax' => 4,
        'angleMax' => 0,
        'files' => [
            'data/Hund2.ply'
        ]
    ],
'hund3' => [
        'zoomMin' => 1.8,
        'zoomMax' => 4,
        'angleMax' => 0,
        'files' => [
            'data/Hund3.ply'
        ]
    ],
'hund4' => [
        'zoomMin' => 1.8,
        'zoomMax' => 4,
        'angleMax' => 0,
        'files' => [
            'data/Hund4.ply'
        ]
    ],
'handleuchte' => [
        'zoomMin' => 1.8,
        'zoomMax' => 4,
        'angleMax' => 0,
        'files' => [
            'data/handleuchte_big.ply'
        ]
    ],
'pyrit' => [
        'zoomMin' => 1.8,
        'zoomMax' => 4,
        'angleMax' => 0,
        'files' => [
            'data/Pyrit_Skaliert.ply'
        ]
    ]
];

//retrieve parameters from htaccess mod_rewrite
$asset = strtolower($_REQUEST['asset']);

// Fallback, falls das Asset nicht existiert
if (!array_key_exists($asset, $playerconfig)) {
    $asset = 'hund1'; // Standardmodell setzen
}
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
            zoomMax: <?php echo $playerconfig[$asset]['zoomMax']; ?>,
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
