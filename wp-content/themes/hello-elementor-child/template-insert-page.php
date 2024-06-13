<?php
/**
 * Template Name: Insert page
 */

 if(!defined("ABSPATH")){
    exit();
 }


if ($_SERVER['REQUEST_METHOD']=='POST' &&  isset($_POST['insert']) ) {

    global $wpdb, $table_prefix;
    $wp_emp_details = $table_prefix. 'emp_details';

    // Sanitize and validate the input
    $name = sanitize_text_field($_POST['contact_name']);
    $position = sanitize_text_field($_POST['position']);
    $address = sanitize_text_field($_POST['address']);
    $email = sanitize_email($_POST['contact_email']);
    $contact_no = sanitize_text_field($_POST['contact_no']);

    if (!is_email($email)) {
        echo "Invalid email address.";
    } else {
        $data = array(
            'full_name' => $name,
            'position' => $position,
            'address' => $address,
            'email' => $email,
            'contact_no' => $contact_no
        );

        // Insert the data
        $wpdb->insert($wp_emp_details, $data);

        // Check for errors
        if ($wpdb->last_error) {
            echo "Error: " . $wpdb->last_error;
        } else {
            echo "<alert> Employee record successfully inserted</alert>";
            $dashboard_page_url = get_dashboard_page_url();
            wp_redirect($dashboard_page_url);
            exit();
        }
    }
}
?>

<style>
    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #33BBE0;
        font-family: sans-serif;
        margin: 0;
    }

    .container {
        max-width: 600px;
        width: 100%;
        padding: 20px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    form input[type="text"],
    form input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #0073aa;
        border: none;
        border-radius: 3px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    form input[type="submit"]:hover {
        background-color: #005177;
    }
</style>

<div class="container">
    <h2>Insert Employee Details</h2>
    <form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="contact_name" required>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="contact_email" required>

        <label for="contact_no">Contact Number:</label>
        <input type="text" id="contact_no" name="contact_no" required>
        <input type="submit" name="insert" value="Save">
    </form>
</div>
