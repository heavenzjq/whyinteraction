<?php

/**
 * Based roughly on wp-login.php @revision 19414
 * http://core.trac.wordpress.org/browser/trunk/wp-login.php?rev=19414
 */

global $wp_version, $Password_Protected, $error, $is_iphone;

/**
 * WP Shake JS
 */
if ( ! function_exists( 'wp_shake_js' ) ) {
	function wp_shake_js() {
		global $is_iphone;
		if ( $is_iphone ) {
			return;
		}
		?>
		<script type="text/javascript">
		addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
		function s(id,pos){g(id).left=pos+'px';}
		function g(id){return document.getElementById(id).style;}
		function shake(id,a,d){c=a.shift();s(id,c);if(a.length>0){setTimeout(function(){shake(id,a,d);},d);}else{try{g(id).position='static';wp_attempt_focus();}catch(e){}}}
		addLoadEvent(function(){ var p=new Array(15,30,15,0,-15,-30,-15,0);p=p.concat(p.concat(p));var i=document.forms[0].id;g(i).position='relative';shake(i,p,20);});
		</script>
		<?php
	}
}

nocache_headers();
header( 'Content-Type: ' . get_bloginfo( 'html_type' ) . '; charset=' . get_bloginfo( 'charset' ) );

// Set a cookie now to see if they are supported by the browser.
setcookie( TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN );
if ( SITECOOKIEPATH != COOKIEPATH ) {
	setcookie( TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN );
}

// If cookies are disabled we can't log in even with a valid password.
if ( isset( $_POST['testcookie'] ) && empty( $_COOKIE[ TEST_COOKIE ] ) ) {
	$Password_Protected->errors->add( 'test_cookie', __( "<strong>ERROR</strong>: Cookies are blocked or not supported by your browser. You must <a href='http://www.google.com/cookies.html'>enable cookies</a> to use WordPress.", 'password-protected' ) );
}

// Shake it!
$shake_error_codes = array( 'empty_password', 'incorrect_password' );
if ( $Password_Protected->errors->get_error_code() && in_array( $Password_Protected->errors->get_error_code(), $shake_error_codes ) ) {
	add_action( 'password_protected_login_head', 'wp_shake_js', 12 );
}

// Obey privacy setting
add_action( 'password_protected_login_head', 'noindex' );

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php echo apply_filters( 'password_protected_wp_title', get_bloginfo( 'name' ) ); ?></title>

<?php

if ( version_compare( $wp_version, '3.9-dev', '>=' ) ) {
	wp_admin_css( 'login', true );
} else {
	wp_admin_css( 'wp-admin', true );
	wp_admin_css( 'colors-fresh', true );
}

?>

<style type="text/css" media="screen">
#login_error, .login .message, #loginform { margin-bottom: 20px; }
</style>

<?php

if ( $is_iphone ) {
	?>
	<meta name="viewport" content="width=320; initial-scale=0.9; maximum-scale=1.0; user-scalable=0;" />
	<style type="text/css" media="screen">
	.login form, .login .message, #login_error { margin-left: 0px; }
	.login #nav, .login #backtoblog { margin-left: 8px; }
	.login h1 a { width: auto; }
	#login { padding: 20px 0; }
	</style>
	<?php
}

do_action( 'login_enqueue_scripts' );
do_action( 'password_protected_login_head' );

?>

</head>
<body class="login login-password-protected login-action-password-protected-login wp-core-ui">

<div id="login">
	<!--<h1><a href="<?php echo esc_url( apply_filters( 'password_protected_login_headerurl', home_url( '/' ) ) ); ?>" title="<?php echo esc_attr( apply_filters( 'password_protected_login_headertitle', get_bloginfo( 'name' ) ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

	<?php do_action( 'password_protected_login_messages' ); ?>
	<?php do_action( 'password_protected_before_login_form' ); ?>--!>
	<div><svg id="site_lock" width="60px" height="60px" style="display:block; margin:auto;" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>lock</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="lock" fill="#A2A2A2">
            <path d="M32,62 L32,62 C48.5685425,62 62,48.5685425 62,32 C62,15.4314575 48.5685425,2 32,2 C15.4314575,2 2,15.4314575 2,32 C2,48.5685425 15.4314575,62 32,62 L32,62 Z M32,64 L32,64 C14.326888,64 0,49.673112 0,32 C0,14.326888 14.326888,0 32,0 C49.673112,0 64,14.326888 64,32 C64,49.673112 49.673112,64 32,64 L32,64 Z" id="Oval-1"></path>
            <path d="M41.761035,30.5011583 L39.6681887,30.5011583 L39.6681887,26.780695 C39.6681887,22.5335907 36.1856925,19 32,19 C27.8143075,19 24.3318113,22.5335907 24.3318113,26.780695 L24.3318113,30.5011583 L22.238965,30.5011583 C21.5190259,30.5011583 21,31.0277992 21,31.7583012 L21,42.8857143 C21,43.6162162 21.5190259,44.1428571 22.238965,44.1428571 L41.761035,44.1428571 C42.4809741,44.1428571 43,43.6162162 43,42.8857143 L43,31.7583012 C43,31.0277992 42.4809741,30.5011583 41.761035,30.5011583 L41.761035,30.5011583 Z M36.0015221,26.77339 L35.9847793,30.5011583 L27.9984779,30.5011583 L27.9984779,26.780695 C27.9984779,24.5888494 29.8398478,22.7204633 32,22.7204633 C34.1626636,22.7204633 36.0142466,24.5883398 36.0015221,26.77339 L36.0015221,26.77339 Z" id="Imported-Layers-82"></path>
        </g>
    </g>
</svg></div>
	<form name="loginform" id="loginform" action="<?php echo esc_url( $Password_Protected->login_url() ); ?>" method="post"  style="background:none; box-shadow:none; -webkit-box-shadow:none; margin-top:20px;">
		<p>
			<!--<label for="password_protected_pass"><?php _e( 'Password', 'password-protected' ) ?><br />--!>
			<input type="password" name="password_protected_pwd" id="password_protected_pass" class="input" value="" placeholder="Password" size="10" tabindex="10" autocomplete="off" style="font-size: 14px; padding: 10px; text-align: center; background: #ffffff; border:none;"/></label>
		</p>
		<!--
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90"<?php checked( ! empty( $_POST['rememberme'] ) ); ?> /> <?php esc_attr_e( 'Remember Me', 'password-protected' ); ?></label></p>
		-->
		<p class="submit">
			<input type="hidden" name="testcookie" value="1" />
			<input type="hidden" name="password-protected" value="login" />
			<input type="hidden" name="redirect_to" value="<?php echo esc_attr( $_REQUEST['redirect_to'] ); ?>" />
		</p>
	</form>

	<?php do_action( 'password_protected_after_login_form' ); ?>

</div>

<script type="text/javascript">
try{document.getElementById('password_protected_pass').focus();}catch(e){}
if(typeof wpOnload=='function')wpOnload();
</script>

<?php do_action( 'login_footer' ); ?>

<div class="clear"></div>

</body>
</html>