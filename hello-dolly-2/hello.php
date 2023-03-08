<?php
/**
 * @package Hello_Dolly_2
 * @version 1.6
 */

/*
Plugin Name: Hello Dolly 2.0
Description: The supercharged hello dolly plugin.
Author: Matt Mullenweg and Adil
Version: 1.0
*/

class WPHelloDolly {
	public function __construct() {
		add_action( 'admin_notices', array( $this, 'hello_dolly' ) );
		add_action( 'init', array( $this, 'onInit' ) );
		add_action( 'admin_head', array( $this, 'dolly_css' ) );
	}

	public function onInit() {
//		register_block_type( __DIR__ );
		register_block_type( __DIR__, array(
			'render_callback' => array( $this, 'hello_dolly_2_render_callback' )
		) );
	}

	public function hello_dolly_2_render_callback( $block_attributes, $content ) {
		ob_start();
		?>
        <p style="
                padding: 15px;
                text-align: center;
                color: <?php echo $block_attributes['text_color'] ?>;
                background-color: <?php echo $block_attributes['bg_color'] ?>;
                ">
			<?php echo $this->hello_dolly_get_lyric(); ?>
        </p>

		<?php

		return ob_get_clean();
	}

	public function hello_dolly_get_lyric() {
		/** These are the lyrics to Hello Dolly */
		$lyrics = "Hello, Dolly
		Well, hello, Dolly
		It's so nice to have you back where you belong
		You're lookin' swell, Dolly
		I can tell, Dolly
		You're still glowin', you're still crowin'
		You're still goin' strong
		We feel the room swayin'
		While the band's playin'
		One of your old favourite songs from way back when
		So, take her wrap, fellas
		Find her an empty lap, fellas
		Dolly'll never go away again
		Hello, Dolly
		Well, hello, Dolly
		It's so nice to have you back where you belong
		You're lookin' swell, Dolly
		I can tell, Dolly
		You're still glowin', you're still crowin'
		You're still goin' strong
		We feel the room swayin'
		While the band's playin'
		One of your old favourite songs from way back when
		Golly, gee, fellas
		Find her a vacant knee, fellas
		Dolly'll never go away
		Dolly'll never go away
		Dolly'll never go away again";

		// Here we split it into lines
		$lyrics = explode( "\n", $lyrics );

		// And then randomly choose a line
		return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
	}

	// This just echoes the chosen line, we'll position it later
	public function hello_dolly() {
		$chosen = $this->hello_dolly_get_lyric();
		echo "<p id='dolly'>$chosen</p>";
	}

	// We need some CSS to position the paragraph
	public function dolly_css() {
		// This makes sure that the positioning is also good for right-to-left languages
		$x = is_rtl() ? 'left' : 'right';

		echo "
		<style type='text/css'>
		#dolly {
			float: $x;
			padding-$x: 15px;
			padding-top: 5px;
			margin: 0;
			font-size: 11px;
		}
		</style>
		";
	}
}


$wp_hello_dolly = new WPHelloDolly();

?>