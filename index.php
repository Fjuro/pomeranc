<?php
session_start();
include "includes/constants.php";
include "includes/header.php";
?>

<title><?php echo SITE_NAME; ?></title>
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
                    <a class="nav-link active" aria-current="page" href="/">Domů</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">O projektu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Album</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-box position-absolute top-50 start-50 translate-middle border rounded" style="min-width: 450px;">
<div class="p-3 text-center">
    <h2><?php echo SITE_NAME; ?></h2>
    <p>Alternativní open-source frontend pro Rajče</p>
    <form action="redirect.php" method="POST">
        <div class="input-group">
            <input type="url" name="url" id="url" class="form-control" autocomplete="off" placeholder="Adresa URL">
            <button type="submit" class="btn btn-warning"><i class="fa-solid fa-magnifying-glass"></i> Potvrdit</button>
        </div>
    </form>
    <div class="pt-3">
        <h5>Příklady</h5>
        <a class="btn btn-secondary" href="/album.php?url=https://ukazka.rajce.idnes.cz/Vyber_fotek_z_Rajcete/">Album</a>
        <a class="btn btn-secondary" href="/profile.php?url=https://ukazka.rajce.idnes.cz">Profil</a>
    </div>
</div>

<?php
include "includes/footer.php";
?>