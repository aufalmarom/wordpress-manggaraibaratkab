<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_FlipBox extends Widget_Base {

	public function get_name() {
		return 'wts-flipbox';
	}

	public function get_title() {
		return __( 'EAE - Flip Box', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-flip-box wts-eae-pe';
	}

	public function get_categories() {
		return [ 'wts-eae' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
            'section_front_box',
            [
                'label' => __( 'Front Box', 'elementor' )
            ]
        );

        $this->add_control(
            'front_icon',
            [
                'label' => __( 'Icon', 'elementor' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default' => 'fa fa-star',
            ]
        );

        $this->add_control(
            'front_icon_view',
            [
                'label' => __( 'View', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'elementor' ),
                    'stacked' => __( 'Stacked', 'elementor' ),
                    'framed' => __( 'Framed', 'elementor' ),
                ],
                'default' => 'default',

            ]
        );

        $this->add_control(
            'front_icon_shape',
            [
                'label' => __( 'Shape', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'circle' => __( 'Circle', 'elementor' ),
                    'square' => __( 'Square', 'elementor' ),
                ],
                'default' => 'circle',
                'condition' => [
                    'front_icon_view!' => 'default',
                ],

            ]
        );

        $this->add_control(
            'front_title',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
					'active' => true,
                ],
                'placeholder' => __( 'Enter text', 'elementor' ),
                'default' => __( 'Text Title', 'elementor' ),
            ]
        );

        $this->add_control(
            'front_title_html_tag',
            [
                'label' => __( 'HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' )
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'front-text',
            [
                'label' => __( 'Text', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
					'active' => true,
                ],
                'placeholder' => __( 'Enter text', 'elementor' ),
                'default' => __( 'Add some nice text here.', 'elementor' ),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_back_box',
            [
                'label' => __( 'Back Box', 'elementor' )
            ]
        );

        $this->add_control(
            'back_icon',
            [
                'label' => __( 'Icon', 'elementor' ),
                'type' => Controls_Manager::ICON,
                'label_block' => true,
                'default' => 'fa fa-star',
            ]
        );

        $this->add_control(
            'back_icon_view',
            [
                'label' => __( 'View', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'default' => __( 'Default', 'elementor' ),
                    'stacked' => __( 'Stacked', 'elementor' ),
                    'framed' => __( 'Framed', 'elementor' ),
                ],
                'default' => 'default',

            ]
        );

        $this->add_control(
            'back_icon_shape',
            [
                'label' => __( 'Shape', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'circle' => __( 'Circle', 'elementor' ),
                    'square' => __( 'Square', 'elementor' ),
                ],
                'default' => 'circle',
                'condition' => [
                    'back_icon_view!' => 'default',
                ],

            ]
        );

        $this->add_control(
            'back_title',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'dynamic' => [
					'active' => true,
                ],
                'placeholder' => __( 'Enter text', 'elementor' ),
                'default' => __( 'Text Title', 'elementor' ),
            ]
        );

        $this->add_control(
            'back_title_html_tag',
            [
                'label' => __( 'HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' )
                ],
                'default' => 'h3',
            ]
        );

        $this->add_control(
            'back_text',
            [
                'label' => __( 'Text', 'elementor' ),
                'type' => Controls_Manager::TEXTAREA,
                'dynamic' => [
					'active' => true,
                ],
                'placeholder' => __( 'Enter text', 'elementor' ),
                'default' => __( 'Add some nice text here.', 'elementor' ),
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'section-action-button',
            [
                'label' => __( 'Action Button', 'elementor' ),
            ]
        );

        $this->add_control(
            'action_text',
            [
                'label' => __( 'Button Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Buy', 'elementor' ),
                'default' => __( 'Buy Now', 'elementor' ),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => __( 'Link to', 'elementor' ),
                'type' => Controls_Manager::URL,
                'dynamic' => [
					'active' => true,
                ],
                'placeholder' => __( 'http://your-link.com', 'elementor' ),
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section-general-style',
            [
                'label' => __( 'General', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'animation_style',
            [
                'label' => __( 'Animation Style', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'horizontal' => __( 'Flip Horizontal', 'elementor' ),
                    'vertical' => __( 'Flip Vertical', 'elementor' ),
                    'fade'  =>__('Fade','elementor'),
                ],
                'default' => 'vertical',
                'prefix_class' => 'eae-fb-animate-'
            ]
        );


         $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'flip_box_border',
				'label' => __( 'Box Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .eae-flip-box-inner > div',
			]
		);



        $this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eae-flip-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'box_height',
			[
			    'type' => Controls_Manager::TEXT,
			    'label' => __( 'Box Height', 'elementor' ),
                'placeholder' => __( '250', 'elementor' ),
                'default' => __( '250', 'elementor' ),
                'selectors' => [
					'{{WRAPPER}} .eae-flip-box-inner' => 'height: {{VALUE}}px;',
					'{{WRAPPER}} .eae-flip-box-inner' => 'height: {{VALUE}}px;'
				],
            ]
		);

        $this->end_controls_section();

	    $this->start_controls_section(
			'section-front-box-style',
			[
				'label' => __( 'Front Box', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
			]
		);

         $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'front_box_background',
				'label' => __( 'Front Box Background', 'elementor' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .eae-flip-box-front',
			]
		);


        $this->add_control(
            'front_box_title_color',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .front-icon-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'front_title!' => ''
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_box_title_typography',
				'label' => __( 'Title Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .front-icon-title',
			]
		);

        $this->add_control(
            'front_box_text_color',
            [
                'label' => __( 'Description Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .eae-flip-box-front p' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_box_text_typography',
				'label' => __( 'Description Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .eae-flip-box-front p',
			]
		);


		/**
        *  Front Box icons styles
		**/
        $this->add_control(
            'front_box_icon_color',
            [
                'label' => __( 'Icon Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .eae-flip-box-front .icon-wrapper i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'front_icon!' => ''
                ],
            ]
        );

        $this->add_control(
            'front_box_icon_fill_color',
            [
                'label' => __( 'Icon Fill Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#92BE43',
                'selectors' => [
                    '{{WRAPPER}} .eae-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'front_icon_view' => 'stacked'
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'front_box_icon_border',
				'label' => __( 'Box Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .eae-flip-box-front .eae-fb-icon-view-framed, {{WRAPPER}} .eae-flip-box-front .eae-fb-icon-view-stacked',
				'label_block' => true,
				'condition' => [
                    'front_icon_view!' => 'default'
                ],
			]
		);

		$this->add_control(
			'front_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-front .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'front_icon_padding',
			[
				'label' => __( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-front .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
					],
				],
				'condition' => [
					'front_icon_view!' => 'default',
				],
			]
		);





        $this->end_controls_section();



        $this->start_controls_section(
            'section-back-box-style',
            [
                'label' => __( 'Back Box', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'back_box_background',
				'label' => __( 'Back Box Background', 'elementor' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .eae-flip-box-back',
			]
		);

        $this->add_control(
            'back_box_title_color',
            [
                'label' => __( 'Title', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .back-icon-title' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_box_title_typography',
				'label' => __( 'Title Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .back-icon-title',
			]
		);

        $this->add_control(
            'back_box_text_color',
            [
                'label' => __( 'Description Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .eae-flip-box-back p' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_box_text_typography',
				'label' => __( 'Description Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .eae-flip-box-back p',
			]
		);


		/**
        *  Back Box icons styles
		**/
        $this->add_control(
            'back_box_icon_color',
            [
                'label' => __( 'Icon Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} .eae-flip-box-back .icon-wrapper i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'back_icon!' => ''
                ],
            ]
        );

        $this->add_control(
            'back_box_icon_fill_color',
            [
                'label' => __( 'Icon Fill Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#92BE43',
                'selectors' => [
                    '{{WRAPPER}} .eae-flip-box-back .eae-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'front_icon_view' => 'stacked'
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_box_icon_border',
				'label' => __( 'Box Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .eae-flip-box-back .eae-fb-icon-view-framed, {{WRAPPER}} .eae-flip-box-back .eae-fb-icon-view-stacked',
				'label_block' => true,
				'condition' => [
                    'back_icon_view!' => 'default'
                ],
			]
		);

		$this->add_control(
			'back_icon_size',
			[
				'label' => __( 'Icon Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-back .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'back_icon_padding',
			[
				'label' => __( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-back .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
					],
				],
				'condition' => [
					'back_icon_view!' => 'default',
				],
			]
		);



        $this->end_controls_section();

        $this->start_controls_section(
            'section-action-button-style',
            [
                'label' => __( 'Action Button', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eae-fb-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .eae-fb-button',
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
				'default' => '#93C64F',
				'selectors' => [
					'{{WRAPPER}} .eae-fb-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .eae-fb-button',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eae-fb-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' => __( 'Text Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eae-fb-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


        $this->end_controls_section();





	}

	protected function render( ) {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('front-icon-wrapper','class','icon-wrapper');
        $this->add_render_attribute('front-icon-wrapper','class','eae-fb-icon-view-'.$settings['front_icon_view']);
        $this->add_render_attribute('front-icon-wrapper','class','eae-fb-icon-shape-'.$settings['front_icon_shape']);
        $this->add_render_attribute('front-icon-title','class','front-icon-title');
        $this->add_render_attribute('front-icon','class',$settings['front_icon']);


        $this->add_render_attribute('back-icon-wrapper','class','icon-wrapper');
        $this->add_render_attribute('back-icon-wrapper','class','eae-fb-icon-view-'.$settings['back_icon_view']);
        $this->add_render_attribute('back-icon-wrapper','class','eae-fb-icon-shape-'.$settings['back_icon_shape']);
        $this->add_render_attribute('back-icon-title','class','back-icon-title');
        $this->add_render_attribute('back-icon','class',$settings['back_icon']);

        $this->add_render_attribute( 'button', 'class', 'eae-fb-button' );
        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}
		}

       ?>
        <div class="eae-flip-box-wrapper">
            <div class="eae-flip-box-inner">

                <div class="eae-flip-box-front">
                    <div class="flipbox-content">
                        <?php if(!empty($settings['front_icon'])){ ?>
                            <div <?php echo $this->get_render_attribute_string( 'front-icon-wrapper' ); ?>>
                                <i <?php echo $this->get_render_attribute_string( 'front-icon' ); ?>></i>
                            </div>
                        <?php } ?>

                        <?php if(!empty($settings['front_title'])){ ?>
                            <<?php echo $settings['front_title_html_tag']; ?> <?php echo $this->get_render_attribute_string( 'front-icon-title' ); ?> >
                                <?php echo $settings['front_title']; ?>
                            </<?php echo $settings['front_title_html_tag']; ?>>
                        <?php } ?>

                        <?php if(!empty($settings['front-text'])){ ?>
                            <p>
                                <?php echo $settings['front-text']; ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>

                <div class="eae-flip-box-back">
                    <div class="flipbox-content">
                        <?php if(!empty($settings['back_icon'])){ ?>
                            <div <?php echo $this->get_render_attribute_string( 'back-icon-wrapper' ); ?>>
                                <i <?php echo $this->get_render_attribute_string( 'back-icon' ); ?>></i>
                            </div>
                        <?php } ?>

                        <?php if(!empty($settings['back_title'])){ ?>
                            <<?php echo $settings['back_title_html_tag']; ?> <?php echo $this->get_render_attribute_string( 'back-icon-title' ); ?> >
                                <?php echo $settings['back_title']; ?>
                            </<?php echo $settings['back_title_html_tag']; ?>>
                        <?php } ?>

                        <?php if(!empty($settings['back_text'])){ ?>
                            <p>
                                <?php echo $settings['back_text']; ?>
                            </p>
                        <?php } ?>

                        <?php if(!empty($settings['action_text'])){ ?>
                            <div class="eae-fb-button-wrapper">
                                <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                                      <span class="elementor-button-text"><?php echo $settings['action_text']; ?></span>
                                </a>
                            </div>
                        <?php  }  ?>
                    </div>
                </div>

            </div>
        </div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_FlipBox() );