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
    <x-topbar />

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <form class="row px-xl-5"  method="POST" action="{{ url("editproduct/".$product->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="container form-group col-lg-5 pb-5 flex d-flex border">
                <div class="row">
                    <img class="w-75 h-75 mb-3" src="{{asset($product->product_img)}}" alt="Image">
                    <div class="form-group col-lg-5 pb-5 flex d-flex border">
                        <label class=" align-self-center" for="exampleFormControlFile1">Change picture</label>
                        <input type="file" class="form-control-file align-self-center" id="image" name="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-7 pb-5">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input name="product_name" type="text" class="form-control" id="inputName" placeholder="Name" value="{{$product->product_name}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputQuantity" class="col-sm-2 col-form-label">Quantity:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_qty" name="product_qty" placeholder="Quantity" value = "{{$product->product_qty}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputType" class="col-sm-2 col-form-label">Type:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="inputType" name="category_id">
                        @foreach ($categories as $category)
                            @if ($product->category_id == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputBrand" class="col-sm-2 col-form-label">Brand:</label>
                <div class="col-sm-10">
                    <input type="text" name="product_brand" class="form-control" id="inputBrand" placeholder="Brand" value="{{$product->product_brand}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPrice" class="col-sm-2 col-form-label">Price:</label>
                <div class="col-sm-10">
                    <input type="text" name="product_price" class="form-control" id="inputPrice" placeholder="Rp" value="{{$product->product_price}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDesc" class="col-sm-2 col-form-label">Description:</label>
                <div class="col-sm-10">
                    <textarea name="product_desc" type="text" class="form-control" id="inpuDesc" placeholder="Description" row="5" value="{{$product->product_desc}}"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputSize" class="col-sm-2 col-form-label">Size:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_size" name="product_size" placeholder="Size" value = "{{ $product->product_size }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputColor" class="col-sm-2 col-form-label">Color:</label>
                <div class="col-sm-10">
                    <select name="product_color" class="form-control" id="product_color">
                        <option value="Black" {{($product->product_color == "Black" ? "selected":"")}}>Black</option>
                        <option value="White" {{($product->product_color == "White" ? "selected":"")}}>White</option>
                        <option value="Blue" {{($product->product_color == "Blue" ? "selected":"")}}>Blue</option>
                        <option value="Red" {{($product->product_color == "Red" ? "selected":"")}}>Red</option>
                        <option value="Yellow" {{($product->product_color == "Yellow" ? "selected":"")}}>Yellow</option>
                        <option value="Green" {{($product->product_color == "Green" ? "selected":"")}}>Green</option>
                        <option value="Others" {{($product->product_color == "Others" ? "selected":"")}}>Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputLink" class="col-sm-2 col-form-label">Link:</label>
                <div class="col-sm-10">
                    <input name="product_url" type="text" class="form-control" id="inputLink" placeholder="Link Shopee" value="{{$product->product_url}}">
                </div>
            </div>
            <div class="d-flex pt-2">
                <button type="submit" class="btn btn-primary btn-block border-0 py-3 text-light font-weight-bolder">Save</button>
            </div>
            <div class="d-flex pt-2">
                <button class="btn btn-danger btn-block border-0 py-3 text-light font-weight-bolder">Delete</button>
            </div>
        </form>
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