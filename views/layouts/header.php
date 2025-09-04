<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>The Last Garage Kid</title>
        <link rel="icon" type="/image/png" href="<?= $baseUrl ?>/assets/imgs/site/logo.png" />
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link href="<?= $baseUrl ?>/assets/css/global.css" rel="stylesheet">
        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container d-flex flex-column p-1 p-md-3 border-orange bg-warning-subtle" style="min-height: calc(100vh - 1.5rem);">
            <header class="">
                <h1 class="fs-5 py-3 m-1 text-center text-white">TheLastGarageKid</h1>
            </header>
            <div class="row d-block d-lg-none">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item bg-warning-subtle">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            MENU
                            <i class="bi bi-card-list" style="font-size: 1.5rem;"></i>
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                               <?php require "menu.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-0 p-md-3 flex-grow-1">