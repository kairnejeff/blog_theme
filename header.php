
<?php
require_once(dirname(__FILE__) . '/../../../../config/config.inc.php');
require_once(dirname(__FILE__) . '/../../../../init.php');
require_once(dirname(__FILE__) . '/../../../../controllers/front/WordpressController.php');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/../themes/karinejeff/assets/css/theme.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/../themes/karinejeff/assets/css/custom.css" type="text/css" media="all">
</head>
<body id="index" class="lang-fr country-fr currency-eur layout-full-width page-index tax-display-enabled">
    <main>
      <header id="header">
    <?php
    wp_head();
    $controllerPrestashop = new WordpressController();
    $controllerPrestashop->displayMyheader();
    
    ?>
    </header>
