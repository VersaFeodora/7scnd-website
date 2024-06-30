<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product Detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold text-light">7.scnd</h1>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <img class="w-75 h-100" src="{{asset($product->product_img)}}" alt="Image">
            </div>
            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$product->product_name}}</h3>
                <h3 class="font-weight-semi-bold mb-4">Rp{{$product->product_price}}</h3>
                <p class="mb-4">{{$product->product_desc}}</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Category: {{$product->category_name}}</p>
                </div>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Size: {{$product->product_size}}</p>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Color: {{$product->product_color}}</p>
                </div>
                <div class="d-flex pt-2">
                    <a href="https://{{$product->product_url}}" class="btn btn-primary btn-block border-0 py-3 text-light font-weight-bolder">Shopee Link</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <x-footer />

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>