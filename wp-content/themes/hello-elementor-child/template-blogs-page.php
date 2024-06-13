<?php
/*
Template Name: Blogs
*/

$blog_page = get_page_by_path('blogs');
$about_page = get_page_by_path('about');
$dashboard_page = get_page_by_path('dashboard');
$contact_page = get_page_by_path('contact');
$login_page = get_page_by_path('login');
$register_page = get_page_by_path('register');
$blog_permalink = get_permalink($blog_page->ID);
$about_permalink = get_permalink($about_page->ID);
$dashboard_permalink = get_permalink($dashboard_page->ID);
$contact_permalink = get_permalink($contact_page->ID);
$login_permalink = get_permalink($login_page->ID);
$register_permalink = get_permalink($register_page->ID);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    body {
        background-color: #33BBE0;
    }
    .nav-container {
        background-color: white;
    }
    .nav-link {
        color: #222 !important;
        font-size: 19.2px;
        font-weight: 400;
    }
    .nav-link:hover {
        color: #007bff !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light nav-container">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo.png'; ?>" alt="" height="70">
            <span class="ms-2" style="font-size:24px; font-weight:700;">TeamTrack Pro</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/hawana_new">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($about_permalink) ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($dashboard_permalink) ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($blog_permalink) ?>">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($contact_permalink) ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($login_permalink) ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($register_permalink) ?>">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <!-- Blog Posts -->
        <?php
        global $wpdb, $table_prefix;
        $wp_posts = $table_prefix . 'posts';

        $select_sql = "SELECT * FROM `$wp_posts` WHERE post_status = 'publish' AND post_type = 'post'";
        $results = $wpdb->get_results($select_sql);

        if ($results) {
            foreach ($results as $row) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo esc_html($row->post_title); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words($row->post_content, 30, '...'); ?></p>
                            <a href="<?php echo get_permalink($row->ID); ?>" class="btn btn-primary mt-auto">Read More</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Omg0B+6mUzMf6Jg3rRqqXw2bmclGHjo0OnLxW9QQ8D/U2j7PTrClvXf2p3aH2F+I" crossorigin="anonymous"></script>
