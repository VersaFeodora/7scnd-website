<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product Add</title>
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
@if ($errors->any())
                      <div class="alert alert-danger">
                        <div class="alert-title"><h4>Whoops!</h4></div>
                          There are some problems with your input.
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div> 
                    @endif

                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                      <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
    <!-- Topbar Start -->
    <div class="container-fluid bg-secondary">
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-9 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold text-light">7.scnd</h1>
                </a>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-star text-light"></i>
                    <span class="text-light">Products</span>
                </a>
                <a href="" class="btn border">
                    <i class="fas fa-user text-light"></i>
                    <span class="text-light">Account</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <form class="row px-xl-5" method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-lg-5 pb-5 d-flex flex-column align-items-center border">
                <img id="imagePreview" src="#" alt="Your image" style="max-width: 100%; height: auto; display: none;">
                <div>
                <label class="align-self-center mt-3" for="exampleFormControlFile1">Input photo</label>
                <input type="file" class="form-control-file align-self-center mt-2" id="image" name="image" onchange="loadFile(event)">
                </div>
            </div>
            <div class="col-lg-7 pb-5">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value = "{{ old('product_name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Quantity" value = "{{ old('product_qty') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputType" class="col-sm-2 col-form-label">Type:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBrand" class="col-sm-2 col-form-label">Brand:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_brand" name="product_brand" placeholder="Brand" value = "{{ old('brand') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPrice" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Rp" value = "{{ old('price') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDesc" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                    <textarea value="{{ old('description') }}" type="text" name="product_desc" class="form-control" id="product_desc" placeholder="Description" row="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSize" class="col-sm-2 col-form-label">Size:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Size" value = "{{ old('size') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputColor" class="col-sm-2 col-form-label">Color:</label>
                <div class="col-sm-10">
                    <select name="product_color" class="form-control" id="product_color">
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Green">Green</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLink" class="col-sm-2 col-form-label">Link:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_url" name="product_url" placeholder="Link Shopee">
                </div>
            </div>
            <div class="d-flex pt-2">
                <button class="btn btn-primary btn-block border-0 py-3 text-light font-weight-bolder" type="submit">Add</button>
            </div>
        </form>
    </div>
    <!-- Shop Detail End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-light mt-5">
        <div class="mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-light">
                    &copy; <a class="text-light font-weight-semi-bold" href="#">7.scnd</a>. All Rights Reserved. Designed
                    by Politeknik Negeri Malang
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


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