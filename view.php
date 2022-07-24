<?php
require_once("connect.php");

$id = Filter($_GET["id"]);


$hitupdate = $databaseconnection->prepare("UPDATE articles SET viewcount=viewcount+1 WHERE id = ?");
$hitupdate->execute([$id]);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Hit Counter</title>
</head>

<body>
    <table width="1000" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr height="30">
            <td align="left">Görüntüleme ve Hit Uygulaması</td>
            <td align="right"><a href="index.php" style="text-decoration: none; color:black;">Anasayfa</a></td>
        </tr>


        <?php
        $query = $databaseconnection->prepare("SELECT * FROM articles WHERE id = ?");
        $query->execute([$id]);
        $recordcount = $query->rowCount();
        $records      = $query->fetch(PDO::FETCH_ASSOC);

        if ($recordcount > 0) {
        ?>
            <tr height="30">
                <td align="center"><?php echo $records["title"]; ?></td>
            </tr>
            <tr height="30">
                <td align="left"><?php echo $records["content"]; ?></td>
            </tr>
            <tr height="30">
                <td align="center">Bu makale <?php echo $records["viewcount"]; ?> defa görüntülendi. </td>
            </tr>
        <?php
        } else {
            header("Location:index.php");
        }

        ?>



    </table>
</body>

</html>