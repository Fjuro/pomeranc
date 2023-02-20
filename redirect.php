<?php
if(isset($_POST['url']))
{
    if($_POST['type'] === 'album')
    {
        $url = $_POST['url'];
        header("location: /album.php?url=$url");
    }
    else
    {
        $url = $_POST['url'];
        header("location: /profile.php?url=$url");
    }
}
?>