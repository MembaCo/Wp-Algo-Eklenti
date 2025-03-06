<?php
if (!defined('ABSPATH')) {
    exit;
}

$social = get_option('algo_maintenance_social', array(
    'facebook' => 'https://www.facebook.com/AlgoItSolutions',
    'twitter' => 'https://twitter.com/AlgoItSolutions',
    'google' => 'https://google.com/AlgoItSolutions',
    'instagram' => 'https://instegram.com/AlgoItSolutions'
));
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?> - <?php _e('Bakım Modu', 'algo-maintenance'); ?></title>
    <meta name="description" content="ALGO - IT Solutions Design and Development">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Memba Co.">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Lora:400,400i,700,700i|Open+Sans:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__) . 'assets/css/style.css'; ?>">
    <?php wp_head(); ?>
</head>

<body onload="start()" onresize="resize()" onorientationchange="resize()" class="algo-maintenance-body">
    <canvas id="starfield"></canvas>
    <span class="full-overlay on-canvas"></span>

    <div id="loading">
        <div class="loader">
            <div class="loader__row">
                <div class="loader__arrow up inner inner-6"></div>
                <div class="loader__arrow down inner inner-5"></div>
                <div class="loader__arrow up inner inner-4"></div>
            </div>
            <div class="loader__row">
                <div class="loader__arrow down inner inner-1"></div>
                <div class="loader__arrow up inner inner-2"></div>
                <div class="loader__arrow down inner inner-3"></div>
            </div>
        </div>
        <span>ALGO - IT Solutions Loading...</span>
    </div>

    <div id="fullpage">
        <div class="section active" id="section0">
            <div class="inside-section">
                <div class="inside-content">
                    <img src="<?php echo plugins_url('assets/img/logo.png', dirname(__FILE__)); ?>" class="brand-logo" alt="ALGO Logo" />

                    <h1 class="cd-headline zoom">
                        <span class="cd-words-wrapper">
                            <b class="is-visible">
                                MAINTENANCE <span class="highlight">MODE</span> ACTIVE<br/>
                            </b>
                            <b>
                                COMING SOON<br/>
                            </b>
                        </span>
                    </h1>

                    <div class="text">
                        <h2 class="home-h2"><?php echo wp_kses_post(get_option('algo_maintenance_message')); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="social-nav">
        <ul>
            <?php if (!empty($social['facebook'])) : ?>
                <li><a href="<?php echo esc_url($social['facebook']); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <?php endif; ?>
            
            <?php if (!empty($social['twitter'])) : ?>
                <li><a href="<?php echo esc_url($social['twitter']); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php endif; ?>
            
            <?php if (!empty($social['google'])) : ?>
                <li><a href="<?php echo esc_url($social['google']); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            <?php endif; ?>
            
            <?php if (!empty($social['instagram'])) : ?>
                <li><a href="<?php echo esc_url($social['instagram']); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="copyright">
        <p>
            <strong>ALGO - IT Solutions Design and Development</strong><br>
            <br>
            <a href="https://algoit.co.uk" target="_blank">ALGO IT Solutions</a> © 2021-<?php echo date('Y'); ?> | Technology for you.
        </p>
    </div>

    <?php wp_footer(); ?>
</body>
</html>