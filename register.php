<?php 

include_once 'function.php';


if (isset($_POST["register"])) {
    
    if (registrasi($_POST) > 0 ) {
        header('location:login.php');
      
        
    } else {
        echo mysqli_error($conn);
    }  
}
   
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrasi</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <style>
            body {
            /* Ganti latar belakang dengan gambar atau warna yang diinginkan */
            background-image: url('images/bg.png');
            /* Atur ukuran latar belakang */
            background-size: cover;
            /* Atur posisi latar belakang */
            background-position: center;
            /* Menghilangkan tiling latar belakang */
            background-repeat: no-repeat;
        }
    </style>
    <script>
            function validateForm() {
                var email = document.getElementById("email").value;
                if (!email.endsWith("@gmail.com")) {
                    alert("Email harus berakhiran dengan @gmail.com");
                    return false;
                }
                return true;
            }

            
        </script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center font-weight-light my-4">REGISTRASI</h1></div>
                                    <div class="card-body">
                                    <div class="alert alert-primary alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Perhatian!</strong> Akun telah ditambahkan
  </div>
                                        <form action="" method="post">                                                                      
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4"  type="email" name="email" id="email" aria-describedby="emailHelp" placeholder="Masukkan email " />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Password">Password</label>
                                                        <input class="form-control py-4" type="password" name="password" id="Password" placeholder="Masukkan password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="password2">Confirm Password</label>
                                                        <input class="form-control py-4"  type="password" name="password2" id="password2" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="form-group mt-4 mb-0" type="submit" name="register"><a class="btn btn-primary btn-block" >Create Account</a></button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            </div>
        </div>
       
        </html>
        </body>
