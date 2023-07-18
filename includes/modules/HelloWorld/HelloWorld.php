<?php

class OWL_HelloWorld extends ET_Builder_Module {

	public $slug       = 'owl_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'Surge.global',
		'author'     => 'Amoda Deshanjana',
		'author_uri' => 'Amoda@surge.global',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'owl-owl_slider' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'owl-owl_slider' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'owl-owl_slider' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	
	

	public function render( $attrs, $content = null, $render_slug ) {
		// return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
		// ob_start();
		// echo("Hello there!"); //would normally get printed to the screen/output to browser
		// $output = ob_get_contents();
		// ob_end_clean();
		// return $output;
		ob_start();
		// $plugin_dir_path = plugin_dir_path(__FILE__);
		$plugin_dir_path = plugin_dir_url( __DIR__ );
		$plugin_root_dir_path = dirname($plugin_dir_path,2);
?>

<!-- HTML code here -->

<div>
  <h1>Test !99i8 878787</h1>
  <p><?php echo $this->props['content']; ?></p>
  <?php echo $plugin_root_dir_path; ?>
</div>
<!-- More HTML code -->
<div class="music-player-slider owl-carousel">                       
    <div class="music-img-box item">
        <a href="https://open.spotify.com/track/5yxTv8Na3xU840LygHYkzD?si=c29d36ef956d4ef2" target="_blank">
            <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/Madness.jpg">
            <div class="music-info">
                <div class="song-info">
                    <p class="song-name">Madness</p>
                    <p class="artist-name">MIST</p>
                </div>
                    <!-- <img loading="lazy" width="36" height="36" decoding="async" class="play-icon" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/play-button.png" alt=""> -->
            </div>
        </a>
    </div>


    <div class="music-img-box item">
        <a href="https://open.spotify.com/track/3u5WXSEDMXmr9h8APMrLz7?si=3cc2a76b6f6a4564" target="_blank">
            <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/These-Days.jpg">
            <div class="music-info">
                <div class="song-info">
                    <p class="song-name">These Days</p>
                    <p class="artist-name">MIST</p>
                </div>
                    <!-- <img loading="lazy" width="36" height="36" decoding="async" class="play-icon" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/play-button.png" alt=""> -->
            </div>
        </a>
    </div>


    <div class="music-img-box item">
        <a href="https://open.spotify.com/track/2I9foKseoFQh07p6sD2voE?si=e6724096669a4295" target="_blank">
            <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/Many-Men.jpg">
            <div class="music-info">
                <div class="song-info">
                    <p class="song-name">Many Men</p>
                    <p class="artist-name">50 Cent</p>
                </div>
                    <!-- <img loading="lazy" width="36" height="36" decoding="async" class="play-icon" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/play-button.png" alt=""> -->
            </div>
        </a>
    </div>


    <div class="music-img-box item">
        <a href="https://open.spotify.com/track/0yYkEW0MmYiVgubiyH595v?si=d1488dc7d457419e" target="_blank">
            <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/TrapSpot.jpg">
            <div class="music-info">
                <div class="song-info">
                    <p class="song-name">TrapSpot</p>
                    <p class="artist-name">Fredo</p>
                </div>
                    <!-- <img loading="lazy" width="36" height="36" decoding="async" class="play-icon" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/play-button.png" alt=""> -->
            </div>
        </a>
    </div>


    <div class="music-img-box item">
        <a href="https://open.spotify.com/track/0ff3R5QzMVizvtukgsGvj2?si=8bc3ca0187b24cab" target="_blank">
            <img loading="lazy" width="300" height="300" decoding="async" class="music-img" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/Take-That-Risk.jpg">
            <div class="music-info">
                <div class="song-info">
                    <p class="song-name">Take That Risk</p>
                    <p class="artist-name">CB</p>
                </div>
                    <!-- <img loading="lazy" width="36" height="36" decoding="async" class="play-icon" src="https://amodaintdev.wpengine.com/wp-content/uploads/2023/05/play-button.png" alt=""> -->
            </div>
        </a>
    </div>

</div>


<script>
console.log("test log");

$( document ).ready(function() {
    console.log( "ready!" );

    $('.music-player-slider.owl-carousel').owlCarousel({

margin:15,
nav:true,
dots:true,
loop:true,
navText: [
	   "<img src='<?php echo $plugin_root_dir_path;?>/img/owl_slider_left.png'>",
	   "<img src='<?php echo $plugin_root_dir_path;?>/img/owl_slider_right.png'>",
	 ],
responsive:{
  0:{
	items:1,
	nav:false,
	stagePadding: 5,
  },
  600:{
	items:2,
	stagePadding: 10,
  },
  1000:{
	items:3.5,
	stagePadding: 0,
  }
}

});
});

</script>


<?php

$html = ob_get_clean();

return $html;
	}
}

new OWL_HelloWorld;
