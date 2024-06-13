<?php
/**
 * Template Name: Dashboard
 */

 session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true) {
    header("Location: /hawana_new");
}


if (!defined('ABSPATH')) {
    exit();
}

if (isset($_POST['insert'])) {
    $insert_page_url = get_insert_page_url();
    wp_redirect($insert_page_url);
    exit();
}

if (isset($_POST['edit'])) {
    $edit_page_url = get_edit_page_url();
    wp_redirect($edit_page_url);
    exit();
}

if (isset($_POST['delete'])) {
    global $wpdb, $table_prefix;
    $wp_emp_details = $table_prefix . 'emp_details';
    $id = $_POST['id'];

    $delete_sql = "DELETE FROM `$wp_emp_details` WHERE ID = $id";
    $wpdb->query($delete_sql);
}

if (isset($_POST['logout'])) {
    session_start();
    session_destroy();
    wp_redirect(home_url('/')); // Redirect to the homepage after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeamTrack Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #33BBE0;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?php echo esc_url(get_permalink()); ?>">
                <button type="submit" class="btn btn-primary" name="insert">Add</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Full_Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact_No</th>
                        <th scope="col" colspan="2">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    global $wpdb, $table_prefix;
                    $wp_emp_details = $table_prefix . 'emp_details';

                    $select_sql = "SELECT * FROM `$wp_emp_details`";
                    $results = $wpdb->get_results($select_sql);

                    if ($results) {
                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>{$row->ID}</td>";
                            echo "<td>{$row->full_name}</td>";
                            echo "<td>{$row->position}</td>";
                            echo "<td>{$row->address}</td>";
                            echo "<td>{$row->email}</td>";
                            echo "<td>{$row->contact_no}</td>";

                            echo "<td>
                                    <form method='POST' action='" . esc_url(get_edit_page_url()) . "' style='display: inline;'>
                                        <input type='hidden' name='id' value='{$row->ID}'>
                                        <button type='submit' class='btn btn-info' name='edit'>Edit</button>
                                    </form>
                                </td>";
                            echo "<td>
                                    <form method='POST' action='' style='display: inline;'>
                                        <input type='hidden' name='id' value='{$row->ID}'>
                                        <button type='submit' class='btn btn-danger' name='delete'>Delete</button>
                                    </form>
                                </td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <form method="post" action="">
                <button type="submit" class="btn btn-danger" name="logout">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>
