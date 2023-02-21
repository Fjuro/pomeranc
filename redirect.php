<?php
$url = $_POST['url'];

if(isset($url))
{
    if(str_contains(parse_url($url, PHP_URL_HOST), 'rajce.idnes.cz') && parse_url($url, PHP_URL_HOST) != 'rajce.idnes.cz')
    {
        if(parse_url($url, PHP_URL_PATH) === '/')
        {
            header("location: /profile.php?url=$url&page=0");
        }
        else
        {
            if(parse_url($url, PHP_URL_PATH) == '')
            {
                header("location: /profile.php?url=$url&page=0");
            }
            else
            {
                header("location: /album.php?url=$url");
            }
        }
    }
    else
    {
        include "includes/header.php";
        echo '
        <div class="alert alert-danger position-absolute top-50 start-50 translate-middle text-center" role="alert">
            Byla zadána nesprávná adresa URL!<br>
            <div class="pt-3">
                <a href="../" class="btn btn-danger">Domovská stránka</a>
            </div>
        </div>
    ';
    }
}
else
{
    header("location: /");
}
?>