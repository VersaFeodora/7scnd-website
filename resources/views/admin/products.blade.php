<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product List</title>
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
    <x-topbar />

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
            <form action="{{ route('indexAdmin') }}">
                <div class="input-group">
                    <input value="{{ request('search') }}" type="search" id="search" class="form-control" name="search" placeholder="Search by Name">
                    <div class="">
                        <button type="submit" class="btn">
                            <span class="bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <a href="/addproduct"><button class="p-2 btn btn-primary text-light text-weight-bolder">Add Product</button></a>
                <button class="btn border dropdown-toggle" type="button" id="sort" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Sort by
                </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sort">
                        <a class="dropdown-item" href="#">Latest</a>
                        <a class="dropdown-item" href="#">Name</a>
                    </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pic</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Details</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $count=1 @endphp
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$count++}}</td>
                                <td><img src="{{asset($product->product_img)}}" class="m-3 w-50 h-50 mx-auto d-block" alt="{{$product->product_img}}"></td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->product_brand}}, {{$product->product_color}}, {{$product->product_size}}</td>
                                <td>Rp{{$product->product_price}}</td>
                                <td>
                                    @if ($product->product_qty == 0)
                                        <p class="text-danger">Sold Out</p>
                                    @else
                                        <p class="text-success">Qty: {{$product->product_qty}}</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group d-flex align-items-center justify-content-between m-2">
                                        <a href="/soldout/{{($product->id)}}" class="col-6 btn btn-info text-light p-2">
                                            <i class="fas fa-solid fa-star"></i>
                                            <p>Change to Sold Out</p>
                                        </a>
                                    </div>
                                    <div class="btn-group d-flex align-items-center justify-content-between m-2">
                                        <a href="/editproduct/{{($product->id)}}" class="col-6 btn btn-warning text-light p-2">
                                            <i class="fas fa-solid fa-file"></i>
                                            <p>Edit</p>
                                        </a>
                                    </div>
                                    <div class="btn-group d-flex align-items-center justify-content-between m-2">
                                        <a href="/delete/{{($product->id)}}" class="col-6 btn btn-danger text-light p-2">
                                            <i class="fas fa-solid fa-trash"></i>
                                            <p>Delete</p>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <x-footbar />

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