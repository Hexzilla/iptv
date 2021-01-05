<?php
require_once 'db.php';

$channels_query = $pdo->prepare("SELECT * FROM channels");
$channels_query->execute();
$channels = $channels_query->fetchAll(PDO::FETCH_ASSOC);

header("Access-Control-Allow-Origin: *");//this allows coors
header('Content-Type: text/plain');
echo ("#EXTM3U \r\n");

foreach($channels as $list){
    $categorys = $pdo->prepare("SELECT * FROM categorys where category_id=:category_id");
    $categorys->execute(['category_id' => $list["category"]]);
    $category = $categorys->fetchAll(PDO::FETCH_ASSOC);

    foreach($category as $catlist){
        $category_name=$catlist["category_name"];
    }
    
    echo ('#EXTINF:-1 group-title="' . $category_name . '" tvg logo="' . $list['image'].'",' . $list['title'] . "\r\n");
    echo ($list['play'] . "\r\n");
}
?>
