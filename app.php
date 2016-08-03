<?php

/*--------------------------------*\
*             Autoload
/*--------------------------------*/


/*--------------------------------*\
*             Bootstrap
/*--------------------------------*/

require_once 'Connect/Connect.php';
require_once 'Monster/Monster.php';
require_once 'Monster/Kermit.php';
require_once 'Monster/Fozzie.php';
require_once 'Theater/Theater.php';



/*--------------------------------*\
*             Controller
/*--------------------------------*/

$database = [
    'dns' => 'mysql:host=localhost;dbname=db_theater',
    'username' => 'root',
    'password' => 'claymore'
];

$connect = new Connect($database);

$pdo = $connect->getPDO();

$stmt = $pdo->query("SELECT * FROM muppets");

$theater = new Theater();
$i = 0;
$total =0;
echo "</br>";
while ($data = $stmt->fetch()){
    try {
        $theater->add(new Monster($data));
    }
    catch (Exception $e){
        $i++;
    }
    $total++;
}



$content = printf("<br> Il y a %s monstres en tout
        <br>Il reste %s places en tout, %s dans le balcon et %s dans le parterre. 
        <br> %s monstres sont dans le balcon et %s dans le parterre. 
        <br> %s sont en attente.",
        $total, $theater->getPlace(),10 - $theater->getBalcony(), 15 - $theater->getParterre(), $theater->getBalcony(), $theater->getParterre(), $i);
/*--------------------------------*\
*             Views
/*--------------------------------*/
$title = "Monster";


$render = <<<EOT
<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>$title</title>
</head>
<body>
<section>
    $content
</section>
</body>
</html>
EOT;


