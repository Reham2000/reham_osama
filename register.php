<?php 

$title = "Register";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = [];
    if(empty($_POST['first_name'])){
        $errors['first_name'] = "<div class='bg-danger my-2 rounded text-white text-center'>First Name is Requiered !</div>";
    }
    if(empty($_POST['last_name'])){
        $errors['last_name'] = "<div class='bg-danger my-2 rounded text-white text-center'>Last Name is Requiered !</div>";
    }
    if(empty($_POST['email'])){
        $errors['email'] = "<div class='bg-danger my-2 rounded text-white text-center'>Email is Requiered !</div>";
    }
    if(empty($_POST['phone'])){
        $errors['phone'] = "<div class='bg-danger my-2 rounded text-white text-center'>Phone is Requiered !</div>";
    }
    if(empty($_POST['password'])){
        $errors['password'] = "<div class='bg-danger my-2 rounded text-white text-center'>Password is Requiered !</div>";
    }
    if(empty($_POST['password_confirmation'])){
        $errors['password_confirmation'] = "<div class='bg-danger my-2 rounded text-white text-center'>Password Confiermation is Requiered !</div>";
    }
    if(empty($_POST['gender'])){
        $errors['gender'] = "<div class='bg-danger my-2 rounded text-white text-center'>Gender is Requiered !</div>";
    }
    if($_POST['password'] != $_POST['password_confirmation']){
        $errors['password_correct'] = "<div class='bg-danger my-2 rounded text-white text-center'>Password & Password Conformation Must Be The Same.</div>";
    }
    if(empty($errors)){
        $con = new Connection;
        $con -> query("SELECT * FROM users WHERE `email` = ". $_POST['email']);
        $result = $con -> affected_rows;
        print_r($result);
    }
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="#" method="post">
                                        <input type="text" name="first_name" placeholder="First Name" value="<?= $_POST['first_name'] ?>">
                                        <?= $errors['first_name'] ?? "" ?>
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?= $_POST['last_name'] ?>">
                                        <?= $errors['last_name'] ?? "" ?>
                                        <input type="email" name="email" placeholder="Email Address" value="<?= $_POST['email'] ?>">
                                        <?= $errors['email'] ?? "" ?>
                                        <input type="tel" name="phone" placeholder="Phone" value="<?= $_POST['phone'] ?>">
                                        <?= $errors['phone'] ?? "" ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $errors['password'] ?? "" ?>
                                        <input type="password" name="password_confirmation"
                                            placeholder="Password Confirmation">
                                        <?= $errors['password_confirmation'] ?? "" ?>
                                        <?= $errors['password_correct'] ?? "" ?>

                                        <select name="gender" class="form-control my-3" id="">
                                            <option value="m">Male</option>
                                            <option value="f">Female</option>
                                        </select>

                                        <div class="button-box">
                                            <button type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include "layouts/footer.php";
include "layouts/scripts.php";
?>