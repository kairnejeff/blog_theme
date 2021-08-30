
<footer id="footer">
<?php

require_once(dirname(__FILE__) . '/../../../../config/config.inc.php');
require_once(dirname(__FILE__) . '/../../../../init.php');
$controllerPrestashop = new WordpressController();
$controllerPrestashop->displayMyfooter();
?>
</footer>

<script>
var $ = jQuery.noConflict();
</script>
<script type="text/javascript" src="<?php echo get_site_url(); ?>/../themes/karinejeff/assets/js/customs.js" ></script>
<?php
wp_footer();
?>
 </main>
</body>