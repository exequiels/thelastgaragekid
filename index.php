<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titulo</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</head>
<header class="text-light text-center py-4 d-flex justify-content-between align-items-center mb-3 mb-sm-4">      
    <span><h4 class="mb-0">Titulo Header</h4></span>
    <div></div><!-- Filler -->
</header>
<body>
    <div class="custom">
        <!-- Header -->
        <?//php require_once "views/layout/header.php"; ?>
        <!-- // Header -->
        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <!-- Seccion central -->
                <div class="col-lg-9 col-md-11 col-sm-11 col-10 mx-auto central-item">
                    <div class="row">
                        <?//php echo $seccionCentral; ?>
                    </div>
                </div>
                <!-- // Seccion central -->
            </div>
        </div>
        <!-- // Main Content -->
        <!-- Footer -->
        <footer class="text-light text-center p-3 mt-sm-4">
            <p>© 2025 reUsados. Derechos reservados.</p>
        </footer>
        <!-- // Footer -->        
    </div>
    <!-- JS -->
    <?//php require_once "views/layout/javascript.php"; ?>
    <!-- // JS -->
</body>
</html>