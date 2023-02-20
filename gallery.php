<?php
session_start();
include "includes/constants.php";
include "includes/header.php";

if(isset($_GET['url']) && $_GET['url'] !='')
{
    if($_GET['type'] === 'album')
    {
        $rssUrl = $_GET['url'];
        $rss = simplexml_load_file($rssUrl . '?rss=media');
?>

<title><?php echo $rss->channel->title . " • " . SITE_NAME; ?></title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="<?php echo LOGO_PATH; ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top pe-2">
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

<!-- Gallery -->
<div id="lightgallery" class="container pt-5">
    <?php
    foreach ($rss->channel->item as $item) {
        $thumbUrl = $item->children('media', true)->thumbnail->attributes();
        $imgUrl = $item->children('media', true)->content->attributes();
        echo '<a href="' . $imgUrl['url'] . '" data-sub-html="' . $item->title . '"><img class="p-1 image" src="' . $thumbUrl['url'] . '"></img></a>';
    }
    ?>
</div>

<!-- lightGallery Settings -->
<script type="text/javascript">
    lightGallery(document.getElementById('lightgallery'), {
        plugins: [lgZoom, lgThumbnail],
        mode: 'lg-slide',
        thumbnail: true,
        animateThumb: true,
        zoomFromOrigin: true,
        rowHeight: 180,
        margins: 5
    });
</script>

<?php
    }
    else
    {
        $rssUrl = $_GET['url'];
        $rss = simplexml_load_file($rssUrl . '?rss=news');
?>

<title><?php echo $rss->channel->title . " • " . SITE_NAME; ?></title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="<?php echo LOGO_PATH; ?>" alt="Logo" width="30" height="24" class="d-inline-block align-text-top pe-2">
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

<!-- List -->
<div class="pt-5">
    <div class="container text-center main-box border rounded pt-3">
        <?php
        echo "<h1>" . $rss->channel->title . "</h1>";
        foreach ($rss->channel->item as $item) {
            echo '<h3>' . $item->title . '</h3><img src="' . $item->image->url . '"></img><br><br><br>';
        }
        ?>
    </div>
</div>

<?php
    }
}
else {
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

include "includes/footer.php";
?>