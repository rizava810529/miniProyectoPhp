<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
        <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
    rel="stylesheet"
    />
    <link  href="checkInView.css" rel="stylesheet"/>
</head>
<body>

<div style="width: 800px; height: 150px;  " class="m-5">
    <div class="container mt-5" >
        <div class="row justify-content-center">
            <div class="col-md-6 gap-5">
                <div class="card ">

                    <div class="card-body">
                        <form method="post" action="login.php">
                            
                            <div class="d-flex align-items-center">

                               <div class="d-flex  align-items-start"> <img src="/asset/logo.png" alt="" style="width: 20px; height: 15px; "></div>
                                <div class="d-flex justify-content-center align-items-center"><p>devchallenges</p></div> 

                            </div>                       
                            <div class="texto1">
                                <p>join thousands of learners from</p>
                                <p>around the world.</p>
                            </div>
                            <div class="texto2">
                                <p>Master web development by making real-life </p>
                                <p> projects. There are multiple paths for you to </p>
                                <p>choose</p>
                            </div>
                           
                            <div class="form-group m-3 inputDiv ">
                                <img src="../../asset/email.png" alt="" style="width: 20px; height: 20px; ">
                                <input type="text" id="usuario" name="usuario" class="form-control texto4" placeholder="Email" required>
                            </div>
                            <div class="form-group m-3 inputDiv">                            
                                <img src="../../asset/candado.png" alt="" style="width: 20px; height: 20px; ">                                
                                <input type="password" id="contrasena" name="contrasena" placeholder="Password" class="form-control texto4" required>
                            </div>
                            <div class="text-center m-3">
                                <button type="submit" class="btn btn-primary btn-block texto4">star coding now</button>
                            </div>
                            <div class=" d-flex justify-content-center align-items-center texto4">
                                <p>or continue with these social profile</p>                            
                            </div>
                            
                            <div class="col-auto">
                                    <img src="/asset/redes.png" alt="" style="width: 100%; height: 15%; ">
                                </div>
                            
                            <div class=" d-flex justify-content-center align-items-center texto4">
                                <p>Adready a member? <a href="#">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>

</body>
</html>
