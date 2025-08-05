<html lang="en">
    <?php require_once "views/layouts/header.php"; ?>
    <body>
        <div class="container d-flex flex-column my-2 p-3 border-orange" style="height: calc(100vh - 1.5rem);">
            <header class="d-flex align-content-center p-3 text-white">
                <h1 class="fs-5">TheLastGarageKid</h1>
            </header>
            <div class="row p-3 flex-grow-1">
                <div class="col-3 p-3 d-none d-lg-block md-hidden">
                    <?php require_once "views/layouts/menu.php"; ?>
                </div>
                <div class="col-12 col-lg-9 p-3">
                    <?php require_once "views/pages/projects.php"; ?>
                </div>
            </div>
        <?php require_once "views/layouts/footer.php"; ?>
        </div> 
    </body>
</html>         