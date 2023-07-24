<?php

class OWL_OwlCarouselChild extends ET_Builder_Module {

	public $slug       = 'owl_carousel_child';
	public $vb_support = 'on';
    public $type       = 'child';
    public $child_title_var = 'label';

	protected $module_credits = array(
		'module_uri' => 'Surge.global',
		'author'     => 'Amoda Deshanjana',
		'author_uri' => 'Amoda@surge.global',
	);

	public function init() {
		$this->name = esc_html__( 'Owl-Carousel-Child', 'owl-owl_slider' );
	}

	public function get_fields() {
		// return array(
		// 	'content' => array(
		// 		'label'           => esc_html__( 'Content', 'owl-owl_slider' ),
		// 		'type'            => 'tiny_mce',
		// 		'option_category' => 'basic_option',
		// 		'description'     => esc_html__( 'Content entered here will appear inside the module.', 'owl-owl_slider' ),
		// 		'toggle_slug'     => 'main_content',
		// 	),
		// );

        $fields = [];
        $fields["label"] = [
            'label' => esc_html__( 'Label', 'owl-owl_slider' ),
            'type'  => 'text',
            'default' => 'New Slider Item ',
        ];
        $fields["single_content"] = [
            'label' => esc_html__( 'Content', 'owl-owl_slider' ),
            'type'  => 'tiny_mce',
            'description'     => esc_html__( 'Content entered here will appear inside the module.', 'owl-owl_slider' ),
        ];
        $fields["slider_image"] = [
            'label' => esc_html__('Image Item','owl-owl_slider'),
            'type' => 'upload',
            'option_category' => 'basic_option',
            'upload_button_text' => esc_attr__('Upload an Image','owl-owl_slider'),
            'choose_text' => esc_attr__('Choose an Image','owl-owl_slider'),
            'update_text' => esc_attr__('Update Image','owl-owl_slider'),
            'data_type' => 'image',
            'hide_metadata' => true,
        ];
        
        
        
        
        $fields["slider_image_fit"] = [
            'label' => esc_html__('Image Fit Option','owl-owl_slider'),
            'type' => 'select',
            'options' => array(
                'fill' => esc_html__('Fill','owl-owl_slider'),
                'contain' => esc_html__('Contain','owl-owl_slider'),
                'cover' => esc_html__('Cover','owl-owl_slider'),
                'scale-down' => esc_html__('Scale Down','owl-owl_slider'),
                'none' => esc_html__('None','owl-owl_slider'),
            ),
            'default' => 'none',
        ];
        $fields["single_width"] = [
            'label' => esc_html__('Image Width','owl-owl_slider'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 0,
                ),
            'default' => 'auto',
            'fixed_unit' => '',
            'validate_unit' => true,
        ];

        return $fields;
	}

	
	

	public function render( $attrs, $content = null, $render_slug ) {
		// return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
		// ob_start();
		// echo("Hello there!"); //would normally get printed to the screen/output to browser
		// $output = ob_get_contents();
		// ob_end_clean();
		// return $output;
        $plugin_dir_path = plugin_dir_url( __DIR__ );
		$plugin_root_dir_path = dirname($plugin_dir_path,2);
        $dummy_image = "data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20300%20300'%3E%3C/svg%3E";
        
        $image_url = $this->props['slider_image'] ?? $plugin_root_dir_path.'/img/no-photo-available.png';
        $image_url = $image_url==='' ? $plugin_root_dir_path.'/img/no-photo-available.png' : $image_url;
        $sliderImageFit = isset($this->props['slider_image_fit']) ? $this->props['slider_image_fit'] : 'none';
        $slider_item_lazyload = isset($attrs['slider_item_lazyload']) ? $attrs['slider_item_lazyload'] : 'false123';
        $slider_item_url = isset($attrs['link_option_url']) ? $attrs['link_option_url'] : '';
        $slider_item_url_target = isset($attrs['link_option_url_new_window']) ? $attrs['link_option_url_new_window'] : 'off';
        $slider_item_url_target = $slider_item_url_target==='on'?'_blank':'_self';
		ob_start();
        
		// $plugin_dir_path = plugin_dir_path(__FILE__);
		
?>
<!-- HTML code here -->
<!-- <?php var_dump($this->props); ?>           -->
    <div class="single-item item">
        <a href="<?php echo $slider_item_url; ?>" target="<?php echo $slider_item_url_target; ?>">
            <img class="single-img owl-lazy-not <?php echo $sliderImageFit; ?>" src="<?php echo $image_url; ?>" data-src="<?php echo $image_url; ?>">
            <div class="single-info">
                <div class="single-content">
                    <?php echo $this->props['single_content']; ?>
                </div>
                <div class="single-extra"></div>
            </div>
        </a>
    </div>

<?php
// echo $slider_item_lazyload;
// var_dump($attrs);
$html = ob_get_clean();

return $html;
	}
}

new OWL_OwlCarouselChild;
