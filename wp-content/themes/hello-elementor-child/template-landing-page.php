<?php
/*
Template Name: Landing Page
*/

?>

<?php
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


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/landing-page-style.css' ?>" type="text/css" media="all" />
<script src="https://kit.fontawesome.com/be90481885.js" crossorigin="anonymous"></script>

<div class="nav-container">
    <div class="logo">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo.png'; ?>" alt="">
        <h2>TeamTrack Pro</h2>
    </div>

    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="<?php echo esc_url($about_permalink) ?>">About</a></li>
            <li><a href="<?php echo esc_url($dashboard_permalink) ?>">Dashboard</a></li>
            <li><a href="<?php echo esc_url($blog_permalink) ?>">Blogs</a></li>
            <li><a href="<?php echo esc_url($contact_permalink) ?>">Contact</a></li>
            <li><a href="<?php echo esc_url($login_permalink)?>">Login</a></li>
            <li><a href="<?php echo esc_url($register_permalink)?>">Register</a></li> 
        </ul>
    </nav>
</div>

<div class="hero-section">
    <div class="text">
        <h1>TeamTrack Pro: Streamline Your Workforce, Elevate Your Success.</h1>
        <p>Empower Your Business with TeamTrack Pro: Streamline processes, boost productivity, and unlock your team's full potential.</p>
    </div>
    <div class="button">
        <a href="" class="find">Find More !</a>
        <a href="" class="login">Login</a>
    </div>
</div>
<div class="hero-box"></div>
<div class="feature-section">
    <div class="heading">Our Features</div>
    <div class="text">
        <p>At TeamTrack Pro, we're dedicated to simplifying employee management for businesses of all sizes. Our comprehensive suite of features empowers you to streamline your processes and focus on what truly matters - growing your business. </p>
    </div>
    <div class="grid">
        <div class="item">
            <i class="fas fa-clock"></i>
            <p>Comprehensive Time Tracking</p>
        </div>
        <div class="item">
            <i class="fas fa-chart-line"></i>
            <p>Performance Time Analytics</p>
        </div>
        <div class="item">
            <i class="fas fa-comments"></i>
            <p>Integrated Communication Tools</p>
        </div>
    </div>
</div>

<div class="why-section">
    <div class="heading">Why And Who</div>
    <div class="text">
        <p>TeamTrack Pro: Simplify HR for Every Business. From startups to enterprises, our intuitive platform streamlines employee data management, time tracking, and performance evaluation. Say goodbye to paperwork and hello to effortless workforce management.</p>
    </div>
    <div class="content">
        <div class="left">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/image.png'; ?>" alt="bg-image">
        </div>
        <div class="right">
            <div class="item">
                <i class="fas fa-cogs"></i>
                <span>Efficiency for All Sizes:</span>
                <p>Streamline HR processes effortlessly, whether you're a startup, small business, or growing enterprise.</p>
            </div>
            <div class="item">
                <i class="fas fa-tachometer-alt"></i>
                <span>Precision in Management:</span>
                <p>Ensure accurate employee data management and performance tracking.</p>
            </div>
            <div class="item">
                <i class="fas fa-expand-arrows-alt"></i>
                <span>Scalable Solution: </span>
                <p>Grow seamlessly with our flexible platform tailored to your evolving needs.</p>
            </div>
        </div>
    </div>
</div>

<div class="choice-section">
    <div class="heading">The right choice is TeamTrack Pro</div>
    <p>
        Make the smart choice for your employee management needs by opting for TeamTrack Pro, the comprehensive solution designed to streamline and optimize your HR processes.
    </p>
    <button>Learn More !</button>
</div>
<div class="customer-section">
    <div class="heading">Customer Satisfaction with better</div>
    <div class="heading">Care and Support</div>
    <div class="text">
        <p>At TeamTrack Pro, your success is our priority. Our expert team is available 24/7 to assist with any questions or issues, ensuring a seamless experience from onboarding to ongoing support.</p>
    </div>
    <div class="grid">
        <div class="item">
            <span>380</span>
            <p>Tasks Completed</p>
        </div>
        <div class="item">
            <span>186</span>
            <p>Awards won</p>
        </div>
        <div class="item">
            <span>100%</span>
            <p>Satisfied Customer</p>
        </div>
    </div>
</div>
<div class="contact-section">
    <div class="content">
        <div class="text">
            <div class="title">Consulting</div>
            <p> Our intuitive system offers essential CRUD functionality, enabling you to efficiently manage your workforce with ease. </p>
            <div class="location">
                <i class="fas fa-compass"></i>
                <p>Mahalaxmi-10 imadol, gwarko</p>
            </div>
            <div class="mail">
                <i class="fas fa-envelope"></i>
                <p>hawanatamang@gmail.com</p>
            </div>
            <div class="contact">
                <i class="fas fa-phone"></i>
                <p>9808691807</p>
            </div>
        </div>
        <div class="links">
            <div class="title">Quick Links</div>
            <hr>
            <div class="grid">
                <div class="left">
                    <ul>
                        <li>Home</li>
                        <li>Team</li>
                        <li>Testimonial</li>
                        <li>Blog</li>
                    </ul>
                </div>
                <div class="right">
                    <ul>
                        <li>About us</li>
                        <li>Contact</li>
                        <li>Portfolio</li>
                        <li>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="subscribe">
            <div class="title">Subscribe</div>
            <hr>
            <div class="form">
                <span>Get latest updates offer</span>
                <div class="email">
                    <input type="email" placeholder="Email here">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>Copyright <i class="far fa-copyright"></i> 2024 ~ Hawana Tamang ~</footer>