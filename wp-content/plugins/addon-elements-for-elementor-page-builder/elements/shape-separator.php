<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_ShapeSeparator extends Widget_Base {

	public function get_name() {
		return 'wts-shape-separator';
	}

	public function get_title() {
		return __( 'EAE - Shape Separator', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-divider-shape wts-eae-pe';
	}

	public function get_categories() {
		return [ 'wts-eae' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
            'section_shape',
            [
                'label' => __( 'Shape', 'elementor' )
            ]
        );

		$this->add_control(
				'separator_shape',
				[
						'label' => __( 'Shape', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
								'triangle-upper-left' => __( 'Triangle Upper Left', 'elementor' ),
								'triangle-upper-right' => __( 'Triangle Upper Right', 'elementor' ),
								'triangle-bottom-left' => __( 'Triangle Bottom Left', 'elementor' ),
								'triangle-bottom-right' => __( 'Triangle Bottom Right', 'elementor' ),
						],
						'default' => 'triangle-upper-right',

				]
		);

		$this->add_control(
				'shape_color',
				[
						'label' => __( 'Shape Color', 'elementor' ),
						'type' => Controls_Manager::COLOR,
						'scheme' => [
								'type' => Scheme_Color::get_type(),
								'value' => Scheme_Color::COLOR_1,
						],
						'selectors' => [
								'{{WRAPPER}} svg' => 'fill:{{VALUE}}',
						],
				]
		);

		$this->add_control(
				'shape_height',
				[
						'type' => Controls_Manager::NUMBER,
						'label' => __( 'Shape Height (in px)', 'elementor' ),
						'placeholder' => __( '75', 'elementor' ),
						'default' => __( '75', 'elementor' ),
				]
		);

		$this->end_controls_section();
	}

	protected function render( ) {
        $settings = $this->get_settings();
		include	 ELEMENTOR_ADDON_PATH.'elements/shape-separator/'.$settings['separator_shape'].'.php';
	}


}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_ShapeSeparator() );