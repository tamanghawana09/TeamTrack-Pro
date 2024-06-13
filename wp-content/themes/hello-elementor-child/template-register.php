<?php
/*
Template Name: Register
*/

if (!defined('ABSPATH')) {
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_submit'])) {
    global $wpdb, $table_prefix;
    $wp_emp = $table_prefix . 'emp';

    // Sanitize user inputs
    $fullname = sanitize_text_field($_POST['fullname']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Check if passwords match
    if ($password === $repassword) {
        $hash_password = wp_hash_password($password);
        $hash_repassword = wp_hash_password($repassword);

        // Prepare data
        $data = array(
            'full_name' => $fullname,
            'email' => $email,
            'password' => $hash_password,
            'repassword' => $hash_repassword,
        );

        // Insert data into database
        $inserted = $wpdb->insert($wp_emp, $data);

        if ($inserted) {
            $login_page_url = get_login_page_url();
            wp_redirect($login_page_url);
            exit();
        } else {
            echo "<div class='alert alert-danger'>An error occurred. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Passwords do not match!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h3 class="card-title text-center">Register</h3>
        <form action="<?php echo esc_url(get_permalink()); ?>" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="repassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="repassword" name="repassword" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="register_submit">Register</button>
        </form>
    </div>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
