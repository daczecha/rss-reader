<?php 
    include('articles.php');
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
    <header>
        <form action="index.php" method="post">
            <label for="feed">
                Enter RSS Feed URL
            </label>
            <input type="url" name="feed" placeholder="URL" default="http://feeds.bbci.co.uk/news/rss.xml">
            <button type="submit" name="submit">SUBMIT</button>
        </form>
    </header>
    
    <?php 
    $url = 'http://feeds.bbci.co.uk/news/rss.xml';
    if(!empty($_POST['feed'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $url = $_POST['feed'];
        }
    }
    ?>
    
    <main>
        <ul>
            <?php
            foreach(fetch_news($url) as $article){
            ?>
                <li class="article">
                    <h3>
                        <a href="<?php echo $article['link'];?>">
                            <?php echo $article['title']; ?>
                        </a>
                    </h3>
                    <p>
                        <?php echo $article['description']; ?>
                    </p>
                </li>
            <?php
            }
            ?>
        </ul>
    </main>
</body>
</html>