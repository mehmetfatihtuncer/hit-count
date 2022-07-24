<?php
require_once("connect.php");
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

        <tr height="30">
            <td colspan="2"></td>
        </tr>

        <tr height="30" bgcolor="#990000">
            <td align="left" style="color: white;">Makale Başlığı</td>
            <td align="right" style="color: white;">Gösterim sayısı</td>
        </tr>

        <?php
        $query = $databaseconnection->prepare("SELECT * FROM articles");
        $query->execute();
        $recordcount = $query->rowCount();
        $records     = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($recordcount > 0) {
            foreach ($records as $recordlines) {
        ?>
                <tr height="30" bgcolor="#990000">
                    <td align="left"><a href="view.php?id=<?php echo $recordlines["id"]; ?>"><?php echo $recordlines["title"]; ?></a></td>
                    <td align="right"><?php echo $recordlines["viewcount"]; ?></td>
                </tr>
        <?php
            }
        }
        ?>



    </table>
</body>

</html>