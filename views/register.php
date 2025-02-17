<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- register page -->
    <div class="container">
        <div class="login my-5 p-5  rounded-3">
            <div class="row rounded-3 d-flex justify-content-center align-items-center">
                <!-- left content -->
                <div class="col-md-4 shadow-lg d-flex justify-content-center align-items-center position-relative"
                    style="background-image: url('../img/perpustakaan.jpg'); background-size: cover; background-position: center; height: 530px;">
                    <span class="bg-primary opacity-50 position-absolute" style="width: 100%; height: 100%;"></span>
                    <div class="logo position-absolute d-flex flex-column justify-content-center align-items-center">
                        <img src="../img/poto.jfif" class=" rounded-circle" alt="logo">
                        <div class="text-logo d-flex flex-column justify-content-center align-items-center mt-2">
                            <p class="text-light fs-4">PPKD Jakarta Pusat</p>
                        </div>
                    </div>
                </div>
                <!-- end of left content -->

                <!-- right content -->
                <div class="col-md-6 d-flex shadow-lg py-5 justify-content-center align-items-center">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="title d-flex justify-content-center mb-2">
                                <h1 class="fst-italic text-primary">Register Page</h1>
                            </div>
                            <div class="login-form">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="username" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" required>
                                    </div>
                                    <div class="button  d-flex justify-content-center flex-column align-items-center">
                                        <button type="submit" class="btn btn-primary">Register</button>
                                        <p class="text-muted fs-sm fst-italic ">Already have an
                                            account? <a href="login.php" class="text-decoration-none">Login Here</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of right content -->
            </div>
        </div>
    </div>



    <script src="../bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>