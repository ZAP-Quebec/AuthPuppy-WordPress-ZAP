<?php
/**
 * @package AuthPuppy ZAP
 * @subpackage Quoi faire à Québec
 */
/*
Plugin Name: Quoi faire à Québec
Plugin URI: http://zapquebec.org
Description: Entente de contenu avec Quoi faire à Québec
Version: 0.1.0
Author: Marc boivin
Author URI: http://sobremarc.com
License: GPLv2 or later
*/

add_action('zap_after_content', 'qfaqc_content');

function qfaqc_content(){
	?>
		<iframe class="qfaqc" src="http://www.quoifaireaquebec.com/feeds/todayZAP" width="100%" height="275">
			<p>Vore fureteur ne supporte pas les iframes.</p>
		</iframe>
	<?php
}
