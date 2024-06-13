<?php
/*
Template Name: Login
*/

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_submit'])){
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix. 'emp';

    //sanitize the user inputs
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $wp_emp WHERE email = %s", $email));

    if($user && wp_check_password($password, $user->password)){
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user->ID;
        $_SESSION['user_name'] = $user->full_name;
        echo "<script> alert('Successfully logged in');</script>";
        wp_redirect(home_url('/dashboard'));
        exit();
    }else{
        $error_message = "invalid email or password";
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #33BBE0;
        }
        .card {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-body">
        <h3 class="card-title text-center">Login</h3>
        <?php if (!empty($error_message)) : ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="<?php echo esc_url(get_permalink());?>" method="POST">
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" id="loginEmail" name="email" required>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="login_submit">Login</button>
        </form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
