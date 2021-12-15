<?php 
    function fetch_news(){
        $data = file_get_contents('http://feeds.bbci.co.uk/news/rss.xml');
        $data = simplexml_load_string($data);

        $articles = array();

        foreach($data->channel->item as $item){
            $articles[] = array(
                'title'         => (string)$item->title,
                'description'   => (string)$item->description,
                'link'          => (string)$item->link,
                'date'          => (string)$item->date,
            );
        }

        return $articles;
    }
    

?>

