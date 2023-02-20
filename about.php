<?php
session_start();
include "includes/constants.php";
include "includes/header.php";
?>

<title><?php echo "O projektu • " . SITE_NAME; ?></title>
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
          <a class="nav-link active" href="#">O projektu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Album</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="pt-4">
    <div class="container main-box border rounded pt-5">
        <h2 class="text-center">O projektu Pomeranč</h2>
        <h3>O této instanci</h3>
        <p>Verze: <b><?php echo VERSION; ?></b></p>
        <p>Provozuje: <b><?php echo OWNER_NAME ?></b></p>
        <p>Kontakt: <b><?php echo OWNER_CONTACT ?></b></p>
        <h3>Proč Pomeranč vznikl?</h3>
        <p>
            Projekt byl inspirován ostatními alternativními frontendy, jako je <a href="https://github.com/pablouser1/ProxiTok">ProxiTok</a>,
            <a href="https://github.com/zedeus/nitter">Nitter</a> a <a href="https://libredirect.github.io/">spousta dalších</a>. Jedná se 
            nejspíš o první takový projekt na českém internetu. Vznikl kvůli nepřehlednosti původního webu, který je navíc plný reklam.
        </p>
        <h3>Poděkování</h3>
        <ul>
            <li><a href="https://getbootstrap.com">Bootstrap</a></li>
            <li><a href="https://www.lightgalleryjs.com/">lightGallery</a></li>
            <li><a href="https://twemoji.twitter.com">Twemoji</a></li>
            <li><a href="https://fontawesome.com">FontAwesome</a></li>
        </ul>
    </div>
</div>

<?php
include "includes/footer.php";
?>