
<footer id="footer">
<?php

require_once(dirname(__FILE__) . '/../../../../config/config.inc.php');
require_once(dirname(__FILE__) . '/../../../../init.php');
$controllerPrestashop = new WordpressController();
$controllerPrestashop->displayMyfooter();
?>
</footer>

<?php
wp_footer();
?>
 </main>
</body>