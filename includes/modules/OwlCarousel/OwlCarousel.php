<?php

class OWL_OwlCarousel extends ET_Builder_Module {

	public $slug       = 'owl_carousel';
	public $vb_support = 'on';
    public $child_slug = 'owl_carousel_child';

	protected $module_credits = array(
		'module_uri' => 'Surge.global',
		'author'     => 'Amoda Deshanjana',
		'author_uri' => 'Amoda@surge.global',
	);

	public function init() {
		$this->name = esc_html__( 'Owl-Carousel', 'owl-owl_slider' );
        add_action( 'et_builder_frontend_before_render', array( $this, 'add_default_child_item' ) );
	}

    function add_default_child_item() {
        if ( 'et_pb_custommodule' !== get_post_type() ) {
          // Check if the current post type is the custom module.
          return;
        }
    
        // Get the current module instance.
        $instance = ET_Builder_Element::get_instance( get_the_ID() );
    
        // Check if there are any child items.
        if ( empty( $instance->fields['child_items'] ) ) {
          // Add your default child item data here.
          $default_child_item = array(
            'title' => 'Default Child Item',
            'content' => 'This is the default content of the child item.',
          );
    
          // Add the default child item to the child_items field.
          $instance->fields['child_items'][] = $default_child_item;
    
          // Save the updated instance.
          $instance->save();
        }
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
        $fields["slider_item_count"] = [
            'label' => esc_html__('No of Items to Display','et_builder'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 1,
                    'max' => 10,
                ),
            'unitless' => true,
            'default' => 1,
            'fixed_unit' => '',
            'validate_unit' => true,

        ];
        $fields["slider_item_center"] = [
            'label' => esc_html__('Center Items','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'off',
        ];
        $fields["slider_item_space"] = [
            'label' => esc_html__('Space Between Items','owl-owl_slider'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 0,
                ),
            'default' => '0px',
            'fixed_unit' => 'px',
            'validate_unit' => true,
        ];
        $fields["slider_item_navigation"] = [
            'label' => esc_html__('Navigation Buttons','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'on',
        ];
        $fields["slider_item_dots"] = [
            'label' => esc_html__('Position Dots','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'on',
        ];
        $fields["slider_item_loop"] = [
            'label' => esc_html__('Slider Loop','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'on',
        ];
        $fields["slider_item_lazyload"] = [
            'label' => esc_html__('Lazy Loading','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'off',
        ];
        $fields["slider_item_mouse_drag"] = [
            'label' => esc_html__('Mouse Draggable','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'on',
        ];
        $fields["slider_item_touch_drag"] = [
            'label' => esc_html__('Touch Draggable','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'on',
        ];
        $fields["slider_item_auto_width"] = [
            'label' => esc_html__('Item Width Auto','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'off',
        ];
        $fields["slider_item_rewind"] = [
            'label' => esc_html__('Rewind Slider','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'on',
        ];
        $fields["slider_item_dots_each"] = [
            'label' => esc_html__('Dot for Each Item','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'off',
        ];
        $fields["slider_item_autoplay"] = [
            'label' => esc_html__('Autoplay','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'off',
        ];
        $fields["slider_item_autoplay_timeout"] = [
            'label' => esc_html__('Autoplay Timeout (miliseconds)','et_builder'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 100,
                ),
            'unitless' => true,
            'default' => 5000,
            'fixed_unit' => '',
            'validate_unit' => false,
        ];
        $fields["slider_item_autoplay_speed"] = [
            'label' => esc_html__('Autoplay Speed','et_builder'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                ),
            'unitless' => true,
            'default' => 0,
            'fixed_unit' => '',
            'validate_unit' => false,
        ];
        $fields["slider_item_autoplay_hover_pause"] = [
            'label' => esc_html__('Pause Autoplay on Hover','owl-owl_slider'),
            'type' => 'yes_no_button',
            'option_category' => 'basic_option',
            'options' => array(
                'on' => esc_html__('Yes','owl-owl_slider'),
                'off' => esc_html__('No','owl-owl_slider'),
            ),
            'default' => 'off',
        ];
        $fields["slider_item_nav_speed"] = [
            'label' => esc_html__('Navigation Speed','et_builder'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                ),
            'unitless' => true,
            'default' => 0,
            'fixed_unit' => '',
            'validate_unit' => false,
        ];
        $fields["slider_item_dot_speed"] = [
            'label' => esc_html__('Dots Speed','et_builder'),
            'type' => 'range',
            'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 1,
                ),
            'unitless' => true,
            'default' => 0,
            'fixed_unit' => '',
            'validate_unit' => false,
        ];
        return $fields;
	}

	public function check_yes_no($option_slug,$default){
        $val = isset($this->props[$option_slug])?$this->props[$option_slug]:$default;
        if($val == 'on' || $val == 'true'){
            return 'true';
        }else{
            return 'false';
        }
    }	

	public function render( $attrs, $content = null, $render_slug ) {

		// return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
		ob_start();
		// $plugin_dir_path = plugin_dir_path(__FILE__);
		$plugin_dir_path      = plugin_dir_url( __DIR__ );
		$plugin_root_dir_path = dirname($plugin_dir_path,2);
        $slider_margin        = isset($this->props['slider_item_space'])?$this->props['slider_item_space']:0;
        $slider_autoplayDelay = isset($this->props['slider_item_autoplay_timeout'])?$this->props['slider_item_autoplay_timeout']:5000;
        $slider_autoplaySpeed = isset($this->props['slider_item_autoplay_speed'])?$this->props['slider_item_autoplay_speed']:'false';
        $slider_navSpeed      = isset($this->props['slider_item_nav_speed'])?$this->props['slider_item_nav_speed']:'false';
        $slider_dotSpeed      = isset($this->props['slider_item_dot_speed'])?$this->props['slider_item_dot_speed']:'false';
        $slider_margin        = filter_var($slider_margin, FILTER_SANITIZE_NUMBER_INT);
        $slider_center        = $this->check_yes_no('slider_item_center','true');
        $slider_navigation    = $this->check_yes_no('slider_item_navigation','true');
        $slider_dot           = $this->check_yes_no('slider_item_dots','true');
        $slider_loop          = $this->check_yes_no('slider_item_loop','true');
        $slider_lazyLoad      = $this->check_yes_no('slider_item_lazyload','false');
        $slider_mouseDrag     = $this->check_yes_no('slider_item_mouse_drag','true');
        $slider_touchDrag     = $this->check_yes_no('slider_item_touch_drag','true');
        $slider_autoWidth     = $this->check_yes_no('slider_item_auto_width','false');
        $slider_rewind        = $this->check_yes_no('slider_item_rewind','true');
        $slider_dotEach       = $this->check_yes_no('slider_item_dots_each','false');
        $slider_autoplay      = $this->check_yes_no('slider_item_autoplay','false');
        $slider_HoverPause    = $this->check_yes_no('slider_item_autoplay_hover_pause','false');
        $child_module_content = $this->props['content'];
        $child_module_content = $slider_lazyLoad === 'true' ? str_replace("owl-lazy-not","owl-lazy",$child_module_content):$child_module_content;




        ?>

        <?php var_dump($slider_lazyLoad); ?>
        <div class="divi-custom-slider owl-carousel owl-theme">                       
            <?php echo $child_module_content; ?>
        </div>
        <?php //var_dump($child_module_content);?>
        <script>

        $( document ).ready(function() {
            console.log( "ready!" );
            


            $('.divi-custom-slider.owl-carousel').owlCarousel({

            margin:<?php echo $slider_margin;?>,
            nav:<?php echo $slider_navigation;?>,
            dots:<?php echo $slider_dot;?>,
            loop:<?php echo $slider_loop;?>,
            lazyLoad:<?php echo $slider_lazyLoad;?>,
            center:<?php echo $slider_center;?>,
            mouseDrag:<?php echo $slider_mouseDrag;?>,
            touchDrag:<?php echo $slider_touchDrag;?>,
            autoWidth:<?php echo $slider_autoWidth;?>,
            rewind:<?php echo $slider_rewind;?>,
            dotsEach:<?php echo $slider_dotEach;?>,
            autoplay:<?php echo $slider_autoplay;?>,
            autoplayTimeout:<?php echo $slider_autoplayDelay;?>,
            autoplaySpeed:<?php echo $slider_autoplaySpeed;?>,
            navSpeed:<?php echo $slider_navSpeed;?>,
            dotsSpeed:<?php echo $slider_dotSpeed;?>,
            autoplayHoverPause:<?php echo $slider_HoverPause;?>,
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
                items:<?php echo $this->props['slider_item_count']; ?>,
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

new OWL_OwlCarousel;
