<?php
/*=====================
Location: functions.php - Change CPT icon
=======================*/
function add_menu_icons_styles(){
?>
<style>
	#adminmenu .menu-icon-portfolio div.wp-menu-image:before {
	  content: '\f145';
	}
</style>
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );


?>