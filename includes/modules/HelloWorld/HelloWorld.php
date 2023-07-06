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
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new OWL_HelloWorld;
