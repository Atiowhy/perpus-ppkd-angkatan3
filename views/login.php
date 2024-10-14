<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <!-- login page -->
    <!-- <div class="container">
        <div class="login my-5 p-5  rounded-3">
            <div class="row rounded-3 d-flex justify-content-center align-items-center">
                <!-- left content -->
    <!-- <div class="col-md-4 shadow-lg d-flex justify-content-center align-items-center position-relative"
                    style="background-image: url('../img/perpustakaan.jpg'); background-size: cover; background-position: center; height: 530px;">
                    <span class="bg-primary opacity-50 position-absolute" style="width: 100%; height: 100%;"></span>
                    <div class="logo position-absolute d-flex flex-column justify-content-center align-items-center">
                        <img src="../img/poto.jfif" class=" rounded-circle" alt="logo">
                        <div class="text-logo d-flex flex-column justify-content-center align-items-center mt-2">
                            <p class="text-light fs-4">PPKD Jakarta Pusat</p>
                        </div>
                    </div>
                </div> -->
    <!-- end of left content -->

    <!-- right content -->
    <!-- <div class="col-md-6 d-flex shadow-lg py-5 justify-content-center align-items-center">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="title d-flex justify-content-center mb-2">
                                <h1 class="fst-italic text-primary">Login Page</h1>
                            </div>
                            <div class="login-form">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required name="email">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                            else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                                        <a href="#"
                                            class="text-decoration-none d-flex justify-content-end fst-italic text-muted">Forget
                                            Password?</a>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <div class="button  d-flex justify-content-center flex-column align-items-center">


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <p class="text-muted fs-sm fst-italic ">Don't have an
                                            account? <a href="register.php" class="text-decoration-none">Register
                                                Here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!-- end of right content -->
    <!-- </div>
        </div>
    </div> -->

    <div class="wrapper">
        <div class="container ">
            <div class="row">
                <div class="col-sm-4 mx-auto mt-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center">Selamat Datang di Perpus App</h3>
                                <p class="text-center">Salahkan masuk dengan akun anda</p>
                            </div>

                            <form action="../controller/actionLogin.php" method="post">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                                </div>
                                <div class="form-group">
                                    <div class="d-grid">
                                        <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>