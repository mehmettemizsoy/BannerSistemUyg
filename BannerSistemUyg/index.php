<?php 

try{
    $db = new PDO("mysql:host=localhost;dbname=bannersistemuyg;charseet=UTF8","root","");
}catch(PDOException $hata){
    echo $hata-> getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BannerSistem</title>
</head>
<body>
<?php 

$ReklamSorgusu  = $db->prepare("SELECT * FROM bannerlar ORDER BY  gösterimsayısı ASC LIMIT 1");
$ReklamSorgusu->execute();
$ReklamSayisi = $ReklamSorgusu->rowCount();
$ReklamKaydi = $ReklamSorgusu->fetch(PDO::FETCH_ASSOC);




?>






<table width="1000" align="center" border="0" cellpadding="0" cellspacing="0">
<tr height="150">
    <td align="center"><img src="bannerfoto/<?php echo $ReklamKaydi ["bannerdosyası"]; ?>" border="0"> </td>
</tr>




</table>    






</body>
</html>
<?php 

$ReklamGuncelle  = $db->prepare("UPDATE bannerlar SET gösterimsayısı=gösterimsayısı+1 WHERE id = ?  LIMIT 1 ");
$ReklamGuncelle->execute([$ReklamKaydi["id"]]);


$db = null;

?>

