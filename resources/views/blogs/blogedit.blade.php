<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Blog Edit</title>
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
        <form class="row px-xl-5" method="POST" action="{{ url("editblog/".$post->slug) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-lg-5 pb-5 d-flex flex-column align-items-center border">
            <div class="row">
                    <img id="imagePreview" class="w-75 h-75 mb-3" src="{{asset($post->img_url)}}" alt="Image">
                    <div class="form-group col-lg-5 pb-5 flex d-flex border">
                        <label class=" align-self-center" for="exampleFormControlFile1">Change picture</label>
                        <input type="file" class="form-control-file align-self-center" id="image" name="image" onchange="loadFile(event)">
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control fw-bold" id="title" name="title" placeholder="Title" value = "{{ $post->title }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputText" class="col-sm-2 col-form-label">Content:</label>
                <div class="col-sm-10">
                    <textarea rows="15" class="form-control" id="content" name="content" placeholder="Content">{{ $post->content }}</textarea>
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
    <script>
var loadFile = function(event) {
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
    imagePreview.style.display = 'block'; // Make sure the image is visible
    imagePreview.onload = function() {
        URL.revokeObjectURL(imagePreview.src) // Free memory
    }
};
</script>


</body>