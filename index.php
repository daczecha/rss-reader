<?php 
    include('core/init.inc.php');
?>
<?php 
   function rmspace($buffer){ 
        return preg_replace('~>\s*\n\s*<~', '><', $buffer); 
   };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>RSS Reader</title>
</head>
<body>
    <main>
        <?php
            foreach(fetch_news() as $article){
            ?>
                <h3>
                    <a href="<?php echo $article['link'];?>">
                        <?php echo $article['title']; ?>
                    </a>
                </h3>
                <p>
                    <?php echo $article['description']; ?>
                </p>
            <?php
            }
        ?>
    </main>
</body>
</html>