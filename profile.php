<?php
session_start();
include "includes/constants.php";
include "includes/header.php";
include "includes/footer.php";

$rssUrl = $_GET['url'];
if(isset($rssUrl) && $rssUrl != '')
{
    if(str_contains(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), '&page='))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = "0";
    }
    $rss = simplexml_load_file($rssUrl . '?rss=news&page=' . $page);
}
else
{
    echo '
        <div class="alert alert-danger position-absolute top-50 start-50 translate-middle text-center" role="alert">
            Nebyla zadána žádná URL!<br>
            <div class="pt-3">
                <a href="../" class="btn btn-danger">Domovská stránka</a>
            </div>
        </div>
    ';
    die();
}
?>

<title><?php echo $rss->channel->title . " • " . SITE_NAME; ?></title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a href="/"><img src="<?php echo LOGO_PATH; ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top pe-2"></a>
        <a class="navbar-brand" href="/"><?php echo SITE_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigační lištu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Domů</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">O projektu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Album</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Main -->
<div class="pt-4 pb-5">
    <div class="container text-center main-box border rounded pt-3">

        <!-- Seznam alb -->
        <?php
        echo "<h2>" . $rss->channel->title . "</h2>";
        foreach ($rss->channel->item as $item) {
            echo '
                <div class="p-3">
                    <div class="container text-center main-box border rounded pt-4 pb-1" style="max-width: 500px">
                        <a href="../album.php?url=' . $item->link . '"><img class="rounded" height="200px" src="' . $item->image->url . '"></a>
                            <div class="pt-3">
                                <h5>' . $item->title . '</h5>
                                <p><a class="btn btn-warning" href="../album.php?url=' . $item->link . '">Zobrazit album</a></p>
                            </div>
                        </img>
                    </div>
                </div>
            ';
        }
        ?>
        <!-- / Seznam alb -->


        <!-- Navigace -->
        <div class="pt-3">
            <nav>
                <ul class="pagination justify-content-center">
                
                    <!-- První -->
                    <li class="page-item <?php if($page == 0){echo "disabled";} ?>"><a class="page-link" title="První stránka" href="
                        <?php
                        echo "/profile.php?url=" . $rssUrl . "&page=0";
                        ?>
                    "><i class="bi bi-chevron-double-left"></i></a></li>

                    <!-- Předchozí -->
                    <li class="page-item <?php if($page == 0){echo "disabled";} ?>"><a class="page-link" title="Předchozí stránka" href="
                        <?php
                        echo "/profile.php?url=" . $rssUrl . "&page=" . $page - 1;
                        ?>
                    "><i class="bi bi-chevron-left"></i></a></li>

                    <?php
                    if($page == 0)
                    {
                        echo '
                        <li class="page-item active"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 1 . '">2</a></li>
                        <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 2 . '">3</a></li>
                        <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 3 . '">4</a></li>
                        <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 4 . '">5</a></li>
                        ';
                    }
                    else
                    {
                        if($page == 1){
                            echo '
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page - 1 . '">1</a></li>
                            <li class="page-item active"><span class="page-link">2</span></li>
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 2 . '">3</a></li>
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 3 . '">4</a></li>
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 4 . '">5</a></li>
                            ';
                        }
                        else
                        {
                            echo '
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page - 2 . '">' . $page - 1 . '</a></li>
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page - 1 . '">' . $page . '</a></li>
                            <li class="page-item active"><span class="page-link">' . $page + 1 . '</span></li>
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 1 . '">' . $page + 2 . '</a></li>
                            <li class="page-item"><a class="page-link" href="/profile.php?url=' . $rssUrl . '&page=' . $page + 2 . '">' . $page + 3 . '</a></li>
                            ';
                        }
                    }
                    ?>

                    <!-- Další -->
                    <li class="page-item"><a class="page-link" title="Další stránka" href="
                        <?php
                        echo "/profile.php?url=" . $rssUrl . "&page=" . $page + 1;
                        ?>
                    "><i class="bi bi-chevron-right"></i></a></li>

                    <!-- Poslední - WIP (chybí funkce pro zjištění čísla poslední strany) -->
                    <li class="page-item disabled"><a class="page-link" title="Poslední stránka" href="
                        <?php
                        // echo "/profile.php?url=" . $rssUrl . "&page=" . $page + 1;
                        ?>
                    "><i class="bi bi-chevron-double-right"></i></a></li>

                </ul>
            </nav>
        </div>
        <!-- / Navigace -->

    </div>
</div>

<?php
include "includes/footer.php";
?>