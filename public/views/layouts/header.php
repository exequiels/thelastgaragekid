<html lang="en">
    <head>
        <title><?= isset($pageTitle) ? $pageTitle : 'The Last Garage Kid' ?></title>
        <!-- Basic Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- SEO -->
        <meta name="description" content="The Last Garage Kid is a digital indie space where creativity, code, experimental projects, and reflections come alive from the 'last garage'.">
        <meta name="keywords" content="The Last Garage Kid, creativity, code, indie projects, digital garage, experimental portfolio, Exequiel Sabatie">
        <meta name="author" content="Exequiel Sabatie">

        <!-- Canonical -->
        <link rel="canonical" href="https://thelastgaragekid.com/" />

        <!-- Open Graph / Social -->
        <meta property="og:title" content="The Last Garage Kid | Creativity & indie projects">
        <meta property="og:description" content="A digital corner where creativity and code meet. Experimental projects, indie ideas, and reflections from the last garage.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://thelastgaragekid.com/">
        <meta property="og:image" content="<?= $baseUrl ?>/assets/imgs/site/preview.png">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="The Last Garage Kid">
        <meta name="twitter:description" content="Creativity, code, and indie projects from the 'last garage'.">
        <meta name="twitter:image" content="<?= $baseUrl ?>/assets/imgs/site/preview.png">

        <!-- JSON-LD Structured Data -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "CreativeWork",
            "name": "The Last Garage Kid",
            "url": "https://thelastgaragekid.com/",
            "description": "The Last Garage Kid is a digital indie space where creativity, code, experimental projects, and reflections come alive from the 'last garage'.",
            "author": {
            "@type": "Person",
            "name": "Exequiel Sabatie",
            "url": "https://portfolio.sabatie.com.ar/"
            },
            "image": "https://thelastgaragekid.com/assets/imgs/site/preview.png",
            "inLanguage": "en"
        }
        </script>
        <link rel="icon" type="/image/png" href="<?= $baseUrl ?>/assets/imgs/site/logo.png" />
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link href="<?= $baseUrl ?>/assets/css/global.css" rel="stylesheet">
        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container d-flex flex-column p-1 p-md-3 border-orange bg-warning-subtle" style="min-height: calc(100vh - 1.5rem);">
            <header class="shadow-garage">
                <h1 class="fs-5 py-3 m-1 text-center text-white">TheLastGarageKid</h1>
            </header>
            <div class="row d-block d-lg-none">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item bg-warning-subtle shadow-garage">
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