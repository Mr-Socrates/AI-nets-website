    <!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="js/jquery.min.js"></script>
    <link href="js/toastr.min.css" rel="stylesheet"/>
    <?php include 'head.php'; ?>
    <script>
    firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
    // User is signed in.
    var displayName = user.displayName;
    var email = user.email;
    var emailVerified = user.emailVerified;
    var photoURL = user.photoURL;
    var isAnonymous = user.isAnonymous;
    var uid = user.uid;
    var providerData = user.providerData;

    $(".admin").prepend(displayName);

    </script>
</head>
<body>
<?php
include 'header.php';
if(isset($_GET['email'])){
    $email = $_GET['email'];
}
?>

    <div class="row col-12 text-center align-items-center h-100">
        <script src="js/toastr.min.js">
            function toasterOptions() {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
            };
            toasterOptions();
            toastr.success("On success, log in to user administration.");

        </script>
        <!--<span class="alert alert-success" role="alert" style="margin:auto;">On success, log in to user administration.</span> -->
    </div>

    <div class="admin">
        <!--  <?php var_dump($email)?> -->


    <div class="myAccount col-4">

        <label>Email Address</label>
        <input class="form-control" id="email" type="email" required="required" data-validation-required-message=""
        <?php echo  'value='.$email;?>
        >
        <p class="help-block text-danger"></p>

        <label>My User Name (Optional)</label>
        <input class="form-control" id="name" type="name" placeholder="...my User name:store to FBase..Maybe not" required="required" data-validation-required-message="">
        <p class="help-block text-danger"></p>

        <label>My Password</label>
        <input class="form-control" id="pass" type="password" placeholder=" hidden *****..." required="required" data-validation-required-message="">
        <p class="help-block text-danger"></p>
    </div>
    </div>

<!--    <section class="portfolio" id="portfolio">-->
<!--        <div class="container">-->
<!--            <h2 class="text-center text-uppercase text-secondary mb-0">Fav list</h2>-->
<!--            <hr class="star-dark mb-5">-->
<!--            <div class="row">-->
<!--                <div class="col-md-6 col-lg-4">-->
<!--                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-1">-->
<!--                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">-->
<!--                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">-->
<!--                                <i class="fas fa-search-plus fa-3x"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <img class="img-fluid" src="img/portfolio/cabin.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-6 col-lg-4">-->
<!--                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-2">-->
<!--                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">-->
<!--                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">-->
<!--                                <i class="fas fa-search-plus fa-3x"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <img class="img-fluid" src="img/portfolio/cake.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-6 col-lg-4">-->
<!--                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-3">-->
<!--                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">-->
<!--                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">-->
<!--                                <i class="fas fa-search-plus fa-3x"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <img class="img-fluid" src="img/portfolio/circus.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-6 col-lg-4">-->
<!--                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-4">-->
<!--                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">-->
<!--                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">-->
<!--                                <i class="fas fa-search-plus fa-3x"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <img class="img-fluid" src="img/portfolio/game.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-6 col-lg-4">-->
<!--                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-5">-->
<!--                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">-->
<!--                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">-->
<!--                                <i class="fas fa-search-plus fa-3x"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <img class="img-fluid" src="img/portfolio/safe.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-md-6 col-lg-4">-->
<!--                    <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-6">-->
<!--                        <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">-->
<!--                            <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">-->
<!--                                <i class="fas fa-search-plus fa-3x"></i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <img class="img-fluid" src="img/portfolio/submarine.png" alt="">-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

<?php include 'footer.php'; ?>

</body>
</html>