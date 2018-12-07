<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_PriceTable extends Widget_Base {

	public function get_name() {
		return 'wts-pricetable';
	}

	public function get_title() {
		return __( 'EAE - Price Table', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-price-table wts-eae-pe';
	}

    public function get_categories() {
		return [ 'wts-eae' ];
	}


	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Plan Heading', 'elementor' )
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Heading', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter plan name', 'elementor' ),
				'default' => __( 'Plan 1', 'elementor' ),
			]
		);

        $this->add_control(
            'heading_tag',
            [
                'label' => __( 'Heading HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' )
                ],
                'default' => 'h2',
            ]
        );


        $this->add_control(
			'sub-heading',
			[
				'label' => __( 'Sub Heading', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter plan name', 'elementor' ),
				'default' => __( 'Plan 1', 'elementor' ),
			]
		);

        $this->add_control(
            'sub_heading_tag',
            [
                'label' => __( 'Sub Heading HTML Tag', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => __( 'H1', 'elementor' ),
                    'h2' => __( 'H2', 'elementor' ),
                    'h3' => __( 'H3', 'elementor' ),
                    'h4' => __( 'H4', 'elementor' ),
                    'h5' => __( 'H5', 'elementor' ),
                    'h6' => __( 'H6', 'elementor' ),
                    'p' => __( 'P', 'elementor' )
                ],
                'default' => 'h3',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_price_box',
            [
                'label' => __( 'Price Box', 'elementor' )
            ]
        );


        $this->add_control(
            'price-box-text',
            [
                'label' => __( 'Price Box Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( '$100', 'elementor' ),
                'default' => __( '$100', 'elementor' ),
            ]
        );


        $this->add_control(
            'price-box-subtext',
            [
                'label' => __( 'Price Box Sub Text', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'per month', 'elementor' ),
                'default' => __( 'per month', 'elementor' ),
            ]
        );

        $this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
				    'none' => __( 'None', 'elementor' ),
					'circle' => __( 'Circle', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'prefix_class' => 'eae-pt-price-box-shape-',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'section_features',
            [
                'label' => __( 'Features', 'elementor' )
            ]
        );

        $this->add_control(
            'feature-list',
            [
                'label' => __( 'Plan Features', 'elementor' ),
                'type' => Controls_Manager::REPEATER,
                'default' => [
                    [
                        'text' => __( 'List Item #1', 'elementor' ),
                        'available' => 'yes'
                    ],
                    [
                        'text' => __( 'List Item #2', 'elementor' ),
                        'available' => 'yes'
                    ],
                    [
                        'text' => __( 'List Item #3', 'elementor' ),
                        'available' => 'yes'
                    ],
                ],
                'fields' => [
                    [
                        'name' => 'text',
                        'label' => __( 'Text', 'elementor' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block' => true,
                        'placeholder' => __( 'Plan Features', 'elementor' ),
                        'default' => __( 'Feature 1', 'elementor' ),
                    ],
                    [
                        'name' => 'available',
                        'label' => __( 'Included', 'elementor' ),
                        'type' => Controls_Manager::SWITCHER,
                        'label_block' => true,
                        'default' => 'yes'
                    ]
                ],
                'title_field' => '{{{ text }}}'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_action_button',
            [
                'label' => __( 'Action Button', 'elementor' )
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
                'placeholder' => __( 'http://your-link.com', 'elementor' ),
                'separator' => 'before',
            ]
        );

        $this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-shopping-cart',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'icon!' => '',
				]
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .eae-pt-action-button .eae-pt-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eae-pt-action-button .eae-pt-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);





        $this->end_controls_section();


        $this->start_controls_section(
            'section-box-style',
            [
                'label' => __( 'Box Style', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'box-color',
            [
                'label' => __( 'Box Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#93C64F',
                'selectors' => [
                    '{{WRAPPER}} .wts-price-box-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __( 'Box Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .wts-price-box-wrapper',
			]
		);


        $this->add_control(
            'box-border-radius',
            [
                'label' => __( 'Border Radius', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .wts-price-box-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wts-price-box-wrapper > div:first-child' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} 0 0;',
                    '{{WRAPPER}} .wts-price-box-wrapper > div:last-child' => 'border-radius: 0 0  {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

       $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'selector' => '{{WRAPPER}} .wts-price-box-wrapper',
			]
		);



       $this->end_controls_section();

       $this->start_controls_section(
            'section-plan-heading-style',
            [
                'label' => __( 'Plan Heading', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
       );

        $this->add_control(
			'plan_heading_color',
			[
				'label' => __( 'Heading Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-pt-heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'plan_heading_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eae-pt-heading',
			]
		);

		$this->add_control(
			'plan_sub_heading_color',
			[
				'label' => __( 'Sub Heading Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-pt-sub-heading' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'plan_sub_heading_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eae-pt-sub-heading',
			]
		);


       $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'heading_section_bg',
				'label' => __( 'Section Background', 'elementor' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .heading-wrapper',
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
            'section-price-box',
            [
                'label' => __( 'Price Box', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'pb_content_settings',
			[
				'label' => __( 'Content Settings', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'price_text_color',
			[
				'label' => __( 'Price Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .plan-price-shape-inner .price-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plan-price-shape-inner .price-text',
			]
		);


		$this->add_control(
			'price_sub_text_color',
			[
				'label' => __( 'Sub Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .plan-price-shape-inner .price-subtext' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_sub_text_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .plan-price-shape-inner .price-subtext',
			]
		);

        $this->add_control(
			'pb_box_settings',
			[
				'label' => __( 'Box Settings', 'elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'price_box_border',
				'label' => __( 'Price Box Border', 'elementor' ),
				'selector' => '{{WRAPPER}} .plan-price-shape',
			]
		);

		$this->add_control(
			'price_box_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .plan-price-shape' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'price_box_padding',
			[
				'label' => __( 'Price Box Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .plan-price-shape-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


       $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'price_box_section_bg',
				'label' => __( 'Section Background', 'elementor' ),
				'types' => [ 'classic' ,'gradient'],
				'selector' => '{{WRAPPER}} .plan-price-block',
			]
		);


        $this->end_controls_section();

        $this->start_controls_section(
            'section-features-style',
            [
                'label' => __( 'Feature List', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'features_text_color',
			[
				'label' => __( 'Features Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'default' => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-pt-feature-list li' => 'color: {{VALUE}};',
				],
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'features_typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eae-pt-feature-list li',
			]
		);


       $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'feature_section_bg',
				'label' => __( 'Section Background', 'elementor' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .plan-features-wrapper',
			]
		);

        $this->add_responsive_control(
            'feature_align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon' => 'fa fa-align-right',
                    ]
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .plan-features-wrapper .eae-pt-feature-list' => 'text-align: {{VALUE}};',
                ]
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'section-action-button',
            [
                'label' => __( 'Action Button', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button-section-bg',
            [
                'label' => __( 'Section Background', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => Scheme_Color::get_type(),
                    'value' => Scheme_Color::COLOR_1,
                ],
                'default' => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .eae-pt-button-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
       );

        $this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eae-pt-action-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .eae-pt-action-button',
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
					'{{WRAPPER}} .eae-pt-action-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'action_section_bg',
				'label' => __( 'Section Background', 'elementor' ),
				'types' => [ 'classic','gradient' ],
				'selector' => '{{WRAPPER}} .eae-pt-button-wrapper',
				'default' => [
				    'background' => 'classic',
				    'color'      => '#555'
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'elementor' ),
				'placeholder' => '1px',
				'default' => '1px',
				'selector' => '{{WRAPPER}} .eae-pt-action-button',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eae-pt-action-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eae-pt-action-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_hover',
			[
				'label' => __( 'Button Hover', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eae-pt-action-button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eae-pt-action-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .eae-pt-action-button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();





	}

	protected function render( ) {
        $settings = $this->get_settings();

        $this->add_render_attribute('heading','class','eae-pt-heading');
        $this->add_render_attribute('sub_heading','class','eae-pt-sub-heading');
        $this->add_render_attribute('button','class','eae-pt-action-button');
        $this->add_render_attribute( 'icon-align', 'class', 'eae-pt-align-icon-' . $settings['icon_align'] );

        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}
		}


        ?>
        <div class="wts-price-box-wrapper">
        <?php
        if(!empty($settings['heading']) || !empty($settings['heading'])) {
            ?>
            <div class="heading-wrapper">
                <?php if(!empty($settings['heading'])){
                    ?>
                    <<?php echo $settings['heading_tag']; ?> <?php echo $this->get_render_attribute_string('heading'); ?>>
                        <?php echo $settings['heading']; ?>
                    </<?php echo $settings['heading_tag'] ?>>
                    <?php
                } ?>

                <?php if(!empty($settings['sub-heading'])){
                    ?>
                    <<?php echo $settings['sub_heading_tag']; ?> <?php echo $this->get_render_attribute_string('sub_heading'); ?>>
                        <?php echo $settings['sub-heading']; ?>
                    </<?php echo $settings['sub_heading_tag'] ?>>
                    <?php
                } ?>
            </div>
            <?php
        }

        if(!empty($settings['price-box-text']) || !empty($settings['price-box-subtext'])){
            ?>
            <div class="plan-price-block">
                <div class="plan-price-shape">
                    <div class="plan-price-shape-inner">
                    <?php if(!empty($settings['price-box-text'])){ ?>
                            <span class="price-text"><?php echo $settings['price-box-text']; ?></span>
                    <?php } ?>

                    <?php if(!empty($settings['price-box-subtext'])){ ?>
                            <span class="price-subtext"><?php echo $settings['price-box-subtext']; ?></span>
                    <?php } ?>
                    </div>
                 </div>
            </div>

            <?php
        }

        if(count($settings['feature-list'])){
            ?>
            <div class="plan-features-wrapper">
                <ul class="eae-pt-feature-list">
                    <?php
                        foreach($settings['feature-list'] as $feature){
                            ?>
                                <li class="<?php echo ($feature['available'] == 'yes')? '':'strike-feature'; ?>"><?php echo $feature['text']; ?></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <?php
        }

        if(!empty($settings['action_text'])){
            ?>
            <div class="eae-pt-button-wrapper">
                <a <?php echo $this->get_render_attribute_string( 'button' ); ?>>
                    <span <?php echo $this->get_render_attribute_string( 'content-wrapper' ); ?>>
                        <?php if ( ! empty( $settings['icon'] ) ) : ?>
                            <span <?php echo $this->get_render_attribute_string( 'icon-align' ); ?>>
                                <i class="<?php echo esc_attr( $settings['icon'] ); ?>"></i>
                            </span>
                        <?php endif; ?>
                        <span class="elementor-button-text"><?php echo $settings['action_text']; ?></span>
                    </span>
                </a>
             </div>
            <?php
        }
        ?>
        </div> <!-- close .wts-price-box-wrapper -->
        <?php
	}

	protected function content_template() {
		?>
		<#

        box_html = '';

		print( separator_html );
		#>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_PriceTable() );