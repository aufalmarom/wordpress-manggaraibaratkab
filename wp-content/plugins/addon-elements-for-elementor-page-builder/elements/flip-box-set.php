<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_FlipBoxSet extends Widget_Base {

	public function get_name() {
		return 'wts-flipboxset';
	}

	public function get_title() {
		return __( 'EAE - Flip Box Set', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-flip-box wts-eae-pe';
	}

	public function get_categories() {
		return [ 'wts-eae' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_general',
			[
				'label' => __( 'General', 'elementor' )
			]
		);

		$this->add_responsive_control(
			'flip_box_count_row',
			[
				'label'             => __( 'Column', 'elementor' ),
				'type'              => Controls_Manager::NUMBER,
				'desktop_default'   => '3',
				'tablet_default'    => '2',
				'mobile_default'    => '1',
				'min'               => 1,
				'max'               => 6,
				'selectors'         => [
					'{{WRAPPER}} .eae-flip-box-wrapper' => 'width: calc(100%/{{ value }} - 1%) ',
				]
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'front_box_heading',
			[
				'label'     => __('Front Box', 'elementor'),
				'type'      => Controls_Manager::HEADING,
			]
		);

		$repeater -> start_controls_tabs( 'front_box' );

		$repeater -> start_controls_tab(
			'front_box_content',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);

		$repeater->add_control(
			'front_box_element',
			[
				'label'     => __( 'Box Element', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'none'      => [
                            'title' => __( 'None', 'elementor' ),
                            'icon'  => 'fa fa-ban',
					],
					'image'     => [
                            'title' => __( 'Image', 'elementor' ),
                            'icon'  => 'fa fa-picture-o',
					],
					'icon'      => [
                            'title' => __( 'Icon', 'elementor' ),
                            'icon'  => 'fa fa-star',

					],
				],
				'default'   => 'icon',
			]
		);

		$repeater->add_control('front_box_image',
			[
				'label'     => __( 'Choose Image', 'elementor' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'front_box_element' => 'image',
				],
				'show_label'=> true,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'front_image_size', // Actually its `image_size`
				'default'   => 'thumbnail',
				'condition' => [
					'front_box_element'     => 'image',
					'front_box_image[id]!'  => '',
				],
			]
		);
        $repeater->add_control(
            'front_image_width',
            [
                'label'     => __( 'Image Width', 'elementor' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'default'   => [
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .eae-flip-box-front img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'front_box_element'     => 'image',
                    'front_box_image[id]!'  => '',
                ],
            ]
        );

		$repeater->add_control(
			'front_icon',
			[
				'label'             => __( 'Icon', 'elementor' ),
				'type'              => Controls_Manager::ICON,
				'label_block'       => true,
				'default'           => 'fa fa-star',
				'condition'         => [
				'front_box_element' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'front_title',
			[
				'label'         => __( 'Title', 'elementor' ),
				'type'          => Controls_Manager::TEXT,
				'placeholder'   => __( 'Enter text', 'elementor' ),
				'default'       => __( 'Text Title', 'elementor' ),
			]
		);

		$repeater->add_control(
			'front_title_html_tag',
			[
				'label'     => __( 'HTML Tag', 'elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1' => __( 'H1', 'elementor' ),
					'h2' => __( 'H2', 'elementor' ),
					'h3' => __( 'H3', 'elementor' ),
					'h4' => __( 'H4', 'elementor' ),
					'h5' => __( 'H5', 'elementor' ),
					'h6' => __( 'H6', 'elementor' )
				],
				'default'   => 'h3',
			]
		);

		$repeater->add_control(
			'front_text',
			[
				'label'         => __( 'Text', 'elementor' ),
				'type'          => Controls_Manager::TEXTAREA,
				'placeholder'   => __( 'Enter text', 'elementor' ),
				'default'       => __( 'Add some nice text here.', 'elementor' ),
			]
		);
		$repeater -> end_controls_tab();

		$repeater -> start_controls_tab(
			'front_box_background_ind_head',
			[
				'label' => __( 'Style', 'elementor' ),
			]
		);

        $repeater->add_control(
            'style_indv',
            [
                'label'     => __( 'Overwrite Global Style', 'elementor' ),
                'type'      => Controls_Manager::SWITCHER,
                'options'   => [
                    'yes'       => __( 'Yes', 'elementor' ),
                    'no'        => __( 'No', 'elementor' ),
                ],
                'default'   => 'no',

            ]
        );

        $repeater->add_control(
            'front_icon_view',
            [
                'label'     => __( 'View', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'default'   => __( 'Default', 'elementor' ),
                    'stacked'   => __( 'Stacked', 'elementor' ),
                    'framed'    => __( 'Framed', 'elementor' ),
                ],
                'default'   => 'default',
                'condition' => [
                    'front_box_element' => 'icon',
                    'style_indv' => 'yes',
                ],

            ]
        );

        $repeater->add_control(
            'front_icon_shape',
            [
                'label'     => __( 'Shape', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'circle'    => __( 'Circle', 'elementor' ),
                    'square'    => __( 'Square', 'elementor' ),
                ],
                'default'   => 'circle',
                'condition' => [
                    'front_box_element' => 'icon',
                    'front_icon_view!'  => 'default',
                    'style_indv'        => 'yes',
                ],
            ]
        );


		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'front_box_background_ind',
				'types'     => [ 'classic', 'gradient'],
				'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front',
                'condition' => [
                    'style_indv' => 'yes',
                ],
			]
		);
		$repeater->add_control(
			'front_box_background_overlay_ind',
			[
				'label'     => __( 'Background Overlay', 'elementor-pro' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'separator' => 'before',
				'condition' => [
					'front_box_background_ind_image[id]!' => '',
                    'style_indv' => 'yes',
				],
			]
		);
        $repeater->add_control(
            'front_box_title_color_indv',
            [
                'label'     => __( 'Title', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'      => Scheme_Color::get_type(),
                    'value'     => Scheme_Color::COLOR_1,
                ],
                'default'   => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .front-icon-title ' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'front_box_title_typography_indv',
                'label'     => __( 'Title Typography', 'elementor' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .front-icon-title',
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'front_box_text_color_indv',
            [
                'label'     => __( 'Description Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'      => Scheme_Color::get_type(),
                    'value'     => Scheme_Color::COLOR_1,
                ],
                'default'   => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front p' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],

            ]
        );

        $repeater->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'front_box_text_typography_indv',
                'label'     => __( 'Description Typography', 'elementor' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front p',
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );


        /**
         *  Front Box icons styles
         **/
        $repeater->add_control(
            'front_box_icon_color_indv',
            [
                'label'     => __( 'Icon Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'      => Scheme_Color::get_type(),
                    'value'     => Scheme_Color::COLOR_1,
                ],
                'default'   => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front .icon-wrapper i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'front_box_icon_fill_color_indv',
            [
                'label'     => __( 'Icon Fill Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                    'type'      => Scheme_Color::get_type(),
                    'value'     => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'front_icon_view'   => 'stacked',
                    'style_indv'        => 'yes',
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'          => 'front_box_icon_border_indv',
                'label'         => __( 'Box Border', 'elementor' ),
                'placeholder'   => '1px',
                'default'       => '1px',
                'selector'      => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front .eae-fb-icon-view-framed, {{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front .eae-fb-icon-view-stacked',
                'label_block'   => true,
                'condition'     => [
                    'front_icon_view!'  => 'default',
                    'style_indv'        => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'front_icon_size_indv',
            [
                'label'     => __( 'Icon Size', 'elementor' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'front_icon_padding_indv',
            [
                'label'     => __( 'Icon Padding', 'elementor' ),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-front .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
                ],
                'default'   => [
                        'size' => 1.5,
                        'unit' => 'em',
                ],
                'range'     => [
                    'em' => [
                       'min' => 0,
                    ],
                ],
                'condition' => [
                    'front_icon_view!'  => 'default',
                    'style_indv'        => 'yes',
                ],
            ]
        );

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$repeater->add_control(
			'back_box_heading',
			[
				'label'     => __('Back Box', 'elementor'),
				'type'      => Controls_Manager::HEADING,
			]
		);

		$repeater->start_controls_tabs( 'back_box_a' );

		$repeater->start_controls_tab(
			'back_box_content',
			[
				'label' => __( 'Content', 'elementor' ),
			]
		);



		$repeater->add_control(
			'back_box_element',
			[
				'label'     => __( 'Box Element', 'elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'none' => [
						'title' => __( 'None', 'elementor' ),
						'icon'  => 'fa fa-ban',
					],
					'image'=> [
						'title' => __( 'Image', 'elementor' ),
						'icon'  => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => __( 'Icon', 'elementor' ),
						'icon'  => 'fa fa-star',

					],
				],
				'default'   => 'icon',
			]
		);

		$repeater->add_control('back_box_image',
			[
				'label'     => __( 'Choose Image', 'elementor' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'back_box_element' => 'image',
				],
				'show_label' => true,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'back_image_size', // Actually its `image_size`
				'default'   => 'thumbnail',
				'condition' => [
					'back_box_element'      => 'image',
					'back_box_image[id]!'   => '',
				],
			]
		);
        $repeater->add_control(
            'back_image_width',
            [
                'label'     => __( 'Image Width', 'elementor' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'default'   => [
                    'size'  => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .eae-flip-box-back img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'back_box_element'      => 'image',
                    'back_box_image[id]!'   => '',
                ],
            ]
        );

		$repeater->add_control(
			'back_icon',
			[
				'label'         => __( 'Icon', 'elementor' ),
				'type'          => Controls_Manager::ICON,
				'label_block'   => true,
				'default'       => 'fa fa-star',
				'condition'     => [
					'back_box_element' => 'icon',
				],
			]
		);


		$repeater->add_control(
			'back_title',
			[
				'label'         => __( 'Title', 'elementor' ),
				'type'          => Controls_Manager::TEXT,
				'placeholder'   => __( 'Enter text', 'elementor' ),
				'default'       => __( 'Text Title', 'elementor' ),
			]
		);

		$repeater->add_control(
			'back_title_html_tag',
			[
				'label'     => __( 'HTML Tag', 'elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'h1' => __( 'H1', 'elementor' ),
					'h2' => __( 'H2', 'elementor' ),
					'h3' => __( 'H3', 'elementor' ),
					'h4' => __( 'H4', 'elementor' ),
					'h5' => __( 'H5', 'elementor' ),
					'h6' => __( 'H6', 'elementor' )
				],
				'default'   => 'h3',
			]
		);

		$repeater->add_control(
			'back_text',
			[
				'label'         => __( 'Text', 'elementor' ),
				'type'          => Controls_Manager::TEXTAREA,
				'placeholder'   => __( 'Enter text', 'elementor' ),
				'default'       => __( 'Add some nice text here.', 'elementor' ),
			]
		);
		$repeater -> end_controls_tab();

		$repeater -> start_controls_tab(
			'back_box_background_head',
			[
				'label' => __( 'Style', 'elementor' ),
			]
		);

        $repeater->add_control(
            'back_icon_view',
            [
                'label'     => __( 'View', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'default'   => __( 'Default', 'elementor' ),
                    'stacked'   => __( 'Stacked', 'elementor' ),
                    'framed'    => __( 'Framed', 'elementor' ),
                ],
                'default'   => 'default',
                'condition' => [
                    'back_box_element' => 'icon',
                ],

            ]
        );

        $repeater->add_control(
            'back_icon_shape',
            [
                'label'     => __( 'Shape', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                        'circle' => __( 'Circle', 'elementor' ),
                        'square' => __( 'Square', 'elementor' ),
                ],
                'default'   => 'circle',
                'condition' => [
                    'back_box_element'  => 'icon',
                    'back_icon_view!'   => 'default',
                ],
            ]
        );

		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'back_box_background_ind',
				'types'     => [ 'classic', 'gradient' ],
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back',
                'condition' => [
                    'style_indv' => 'yes',
                ],
			]
		);

		$repeater->add_control(
			'back_box_background_overlay_ind',
			[
				'label'     => __( 'Background Overlay', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'separator' => 'before',
				'condition' => [
					'back_box_background_ind_image[id]!' => '',
                    'style_indv' => 'yes',

				],
			]
		);
        $repeater->add_control(
            'back_box_title_color_indv',
            [
                'label'     => __( 'Title', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .back-icon-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],

            ]
        );

        $repeater->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'back_box_title_typography_indv',
                'label'     => __( 'Title Typography', 'elementor' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .back-icon-title',
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'back_box_text_color_indv',
            [
                'label'     => __( 'Description Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back p' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],

            ]
        );

        $repeater->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'back_box_text_typography_indv',
                'label'     => __( 'Description Typography', 'elementor' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back p',
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );


        /**
         *  Back Box icons styles
         **/
        $repeater->add_control(
            'back_box_icon_color_indv',
            [
                'label'     => __( 'Icon Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                ],
                'default'   => '#FFF',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back .icon-wrapper i' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'back_icon!' => '',
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'back_box_icon_fill_color_indv',
            [
                'label'     => __( 'Icon Fill Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back .eae-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'front_icon_view'   => 'stacked',
                    'style_indv'        => 'yes',
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'          => 'back_box_icon_border_indv',
                'label'         => __( 'Box Border', 'elementor' ),
                'placeholder'   => '1px',
                'default'       => '1px',
                'selector'      => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back .eae-fb-icon-view-framed, {{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back .eae-fb-icon-view-stacked',
                'label_block'   => true,
                'condition'     => [
                    'back_icon_view!'   => 'default',
                    'style_indv'        => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'back_icon_size_indv',
            [
                'label'     => __( 'Icon Size', 'elementor' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px' => [
                        'min' => 6,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back .icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'back_icon_padding_indv',
            [
                'label'     => __( 'Icon Padding', 'elementor' ),
                'type'      => Controls_Manager::SLIDER,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-flip-box-back .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
                ],
                'default' => [
                    'size'  => 1.5,
                    'unit'  => 'em',
                ],
                'range'     => [
                    'em' => [
                        'min' => 0,
                    ],
                ],
                'condition' => [
                    'back_icon_view!'   => 'default',
                    'style_indv'        => 'yes',
                ],
            ]
        );

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

        $repeater->add_control(
            'action_button',
            [
                'label'     => __('Action Button', 'elementor'),
                'type'      => Controls_Manager::HEADING,
            ]
        );
		$repeater->start_controls_tabs( 'back_box_button_style' );

        $repeater->start_controls_tab(
            'action_button_content',
            [
                'label'     => __( 'Content', 'elementor' ),
            ]
        );


		$repeater->add_control(
			'action_text',
			[
				'label'         => __( 'Button Text', 'elementor' ),
				'type'          => Controls_Manager::TEXT,
				'placeholder'   => __( 'Buy', 'elementor' ),
				'default'       => __( 'Buy Now', 'elementor' ),
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'         => __( 'Link to', 'elementor' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'http://your-link.com', 'elementor' ),
				'separator'     => 'before',
			]
		);
        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            'action_button_Style_indv',
            [
                'label' => __( 'Style', 'elementor' ),
            ]
        );

        $repeater->add_control(
            'button_text_color_indv',
            [
                'label'     => __( 'Text Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-button' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'typography_indv',
                'label'     => __( 'Typography', 'elementor' ),
                'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
                'selector'  => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-button',
                'condition' => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'background_color_indv',
            [
                'label'     => __( 'Background Color', 'elementor' ),
                'type'      => Controls_Manager::COLOR,
                'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_4,
                ],
                'default'   => '#93C64F',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-button' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                'style_indv'=> 'yes',
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'          => 'border_indv',
                'label'         => __( 'Border', 'elementor' ),
                'placeholder'   => '1px',
                'default'       => '1px',
                'selector'      => '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-button',
                'condition'     => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'border_radius_indv',
            [
                'label'         => __( 'Border Radius', 'elementor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%' ],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->add_control(
            'text_padding_indv',
            [
                'label'         => __( 'Text Padding', 'elementor' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', 'em', '%' ],
                'selectors'     => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.overwrite-style-yes .eae-fb-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'     => [
                    'style_indv' => 'yes',
                ],
            ]
        );

        $repeater->end_controls_tab();

        $repeater->end_controls_tabs();

		$this->add_control(
			'eae_flip_box_set',
			[
				'label'         => __( 'Flip Box', 'elementor' ),
				'type'          => Controls_Manager::REPEATER,
				'show_label'	=> true,
				'fields'	    => array_values($repeater->get_controls()),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_general_style',
			[
				'label' => __( 'General', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'animation_style',
			[
				'label'     => __( 'Animation Style', 'elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'horizontal'    => __( 'Horizontal', 'elementor' ),
					'vertical'      => __( 'Vertical', 'elementor' ),
                    'flipcard flipcard-rotate-top-down'     => __( 'Cube - Top Down', 'elementor' ),
                    'flipcard flipcard-rotate-down-top'     => __( 'Cube - Down Top', 'elementor' ),
                    'flipcard flipcard-rotate-left-right'   => __( 'Cube - Left Right', 'elementor' ),
                    'flipcard flipcard-rotate-right-left'   => __( 'Cube - Right Left', 'elementor' ),
                    'fade'          =>__('Fade','elementor'),
                    ''              =>__('Rollover','elementor'),
                    'flip box'          =>__('Flip Box','elementor'),
                    'flip box fade'     =>__('Flip Box Fade','elementor'),
                    'flip box fade up'  =>__('Fade Up','elementor'),
                    'flip box fade hideback'        =>__('Fade Hideback','elementor'),
                    'flip box fade up hideback'     =>__('Fade Up Hideback','elementor'),
                    'nananana'      =>__('Nananana','elementor'),
					'zommin'        => __( 'Zoom In', 'elementor' ),
					'zoomout'       => __( 'Zoom Out', 'elementor' ),
				],
				'default'       => 'vertical',
				'prefix_class'  => 'eae-fb-animate-'
			]
		);


		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'flip_box_border',
				'label'     => __( 'Box Border', 'elementor' ),
				'selector'  => '{{WRAPPER}} .eae-flip-box-inner > div',
			]
		);



		$this->add_control(
			'box_border_radius',
			[
				'label'         => __( 'Border Radius', 'elementor' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%' ],
				'selectors'     => [
					'{{WRAPPER}} .eae-flip-box-front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eae-flip-box-back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'box_height',
			[
				'type'          => Controls_Manager::TEXT,
				'label'         => __( 'Box Height', 'elementor' ),
				'placeholder'   => __( '250', 'elementor' ),
				'default'       => __( '250', 'elementor' ),
				'selectors'     => [
					'{{WRAPPER}} .eae-flip-box-inner' => 'height: {{VALUE}}px;',
                    '{{WRAPPER}}.eae-fb-animate-flipcard .eae-flip-box-front' => 'transform-origin: center center calc(-{{VALUE}}px/2);-webkit-transform-origin:center center calc(-{{VALUE}}px/2);',
                    '{{WRAPPER}}.eae-fb-animate-flipcard .eae-flip-box-back' => 'transform-origin: center center calc(-{{VALUE }}px/2);-webkit-transform-origin:center center calc(-{{VALUE}}px/2);'
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
        $this->add_control(
            'front_icon_view_global',
            [
                'label'     => __( 'View', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'default'   => __( 'Default', 'elementor' ),
                    'stacked'   => __( 'Stacked', 'elementor' ),
                    'framed'    => __( 'Framed', 'elementor' ),
                ],
                'default'   => 'default',

            ]
        );

        $this->add_control(
            'front_icon_shape_global',
            [
                'label'     => __( 'Shape', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'circle' => __( 'Circle', 'elementor' ),
                    'square' => __( 'Square', 'elementor' ),
                ],
                'default'   => 'circle',
                'condition' => [
                    'front_icon_view_global!' => 'default',
                ],
            ]
        );

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'front_box_background',
				'label'     => __( 'Front Box Background', 'elementor' ),
				'types'     => [ 'classic','gradient' ],
				'selector'  => '{{WRAPPER}} .overwrite-style-no .eae-flip-box-front',
			]

		);


		$this->add_control(
			'front_box_title_color',
			[
				'label'     => __( 'Title', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .front-icon-title ' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'front_box_title_typography',
				'label'     => __( 'Title Typography', 'elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .front-icon-title',
			]
		);

		$this->add_control(
			'front_box_text_color',
			[
				'label'     => __( 'Description Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-front p' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'front_box_text_typography',
				'label'     => __( 'Description Typography', 'elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .eae-flip-box-front p',
			]
		);


		/**
		 *  Front Box icons styles
		 **/
		$this->add_control(
			'front_box_icon_color',
			[
				'label'     => __( 'Icon Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-front .icon-wrapper i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'front_box_icon_fill_color',
			[
				'label'     => __( 'Icon Fill Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'   => Scheme_Color::get_type(),
                        'value'  => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .eae-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'front_icon_view_global' => 'stacked'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'          => 'front_box_icon_border',
				'label'         => __( 'Box Border', 'elementor' ),
				'placeholder'   => '1px',
				'default'       => '1px',
				'selector'      => '{{WRAPPER}} .eae-flip-box-front .eae-fb-icon-view-framed, {{WRAPPER}} .eae-flip-box-front .eae-fb-icon-view-stacked',
				'label_block'   => true,
				'condition'     => [
					'front_icon_view_global!' => 'default'
				],
			]
		);

		$this->add_control(
			'front_icon_size',
			[
				'label'     => __( 'Icon Size', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
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
				'label'     => __( 'Icon Padding', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-front .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default'   => [
                        'size' => 1.5,
                        'unit' => 'em',
				],
				'range'     => [
					'em' => [
						'min' => 0,
					],
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'section-back-box-style',
			[
				'label' => __( 'Back Box', 'elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

        $this->add_control(
            'back_icon_view_global',
            [
                'label'     => __( 'View', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'default'   => __( 'Default', 'elementor' ),
                    'stacked'   => __( 'Stacked', 'elementor' ),
                    'framed'    => __( 'Framed', 'elementor' ),
                ],
                'default' => 'default',
            ]
        );

        $this->add_control(
            'back_icon_shape_global',
            [
                'label'     => __( 'Shape', 'elementor' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                        'circle' => __( 'Circle', 'elementor' ),
                        'square' => __( 'Square', 'elementor' ),
                ],
                'default'   => 'circle',

            ]
        );
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'      => 'back_box_background',
				'label'     => __( 'Back Box Background', 'elementor' ),
				'types'     => [ 'classic','gradient' ],
				'selector'  => '{{WRAPPER}} .eae-flip-box-back',
			]
		);

		$this->add_control(
			'back_box_title_color',
			[
				'label'     => __( 'Title', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .back-icon-title' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'back_box_title_typography',
				'label'     => __( 'Title Typography', 'elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .back-icon-title',
			]
		);

		$this->add_control(
			'back_box_text_color',
			[
				'label'     => __( 'Description Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-back p' => 'color: {{VALUE}};',
				],

			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'back_box_text_typography',
				'label'     => __( 'Description Typography', 'elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .eae-flip-box-back p',
			]
		);


		/**
		 *  Back Box icons styles
		 **/
		$this->add_control(
			'back_box_icon_color',
			[
				'label'     => __( 'Icon Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
				],
				'default'   => '#FFF',
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-back .icon-wrapper i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'back_box_icon_fill_color',
			[
				'label'     => __( 'Icon Fill Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-back .eae-fb-icon-view-stacked' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'back_icon_view_global' => 'stacked'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'          => 'back_box_icon_border',
				'label'         => __( 'Box Border', 'elementor' ),
				'placeholder'   => '1px',
				'default'       => '1px',
				'selector'      => '{{WRAPPER}} .eae-flip-box-back .eae-fb-icon-view-framed, {{WRAPPER}} .eae-flip-box-back .eae-fb-icon-view-stacked',
				'label_block'   => true,
				'condition'     => [
					'back_icon_view!' => 'default'
				],
			]
		);

		$this->add_control(
			'back_icon_size',
			[
				'label'     => __( 'Icon Size', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
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
				'label'     => __( 'Icon Padding', 'elementor' ),
				'type'      => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .eae-flip-box-back .icon-wrapper' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'default'   => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range'     => [
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
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => __( 'Text Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .eae-fb-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'typography',
				'label'     => __( 'Typography', 'elementor' ),
				'scheme'    => Scheme_Typography::TYPOGRAPHY_4,
				'selector'  => '{{WRAPPER}} .eae-fb-button',
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'     => __( 'Background Color', 'elementor' ),
				'type'      => Controls_Manager::COLOR,
				'scheme'    => [
                        'type'  => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_4,
				],
				'default'   => '#93C64F',
				'selectors' => [
					'{{WRAPPER}} .eae-fb-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'          => 'border',
				'label'         => __( 'Border', 'elementor' ),
				'placeholder'   => '1px',
				'default'       => '1px',
				'selector'      => '{{WRAPPER}} .eae-fb-button',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'         => __( 'Border Radius', 'elementor' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', '%' ],
				'selectors'     => [
					'{{WRAPPER}} .eae-fb-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label'         => __( 'Text Padding', 'elementor' ),
				'type'          => Controls_Manager::DIMENSIONS,
				'size_units'    => [ 'px', 'em', '%' ],
				'selectors'     => [
					'{{WRAPPER}} .eae-fb-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render( ) {
		$settings = $this->get_settings_for_display();

		if(count($settings['eae_flip_box_set'])){
			//echo "<pre>";print_r($settings);echo "</pre>";
			?>
			<div class="eae-flip-box">
			<?php
			foreach ($settings['eae_flip_box_set'] as $flipbox){
                //echo "<pre>";print_r($flipbox);echo "</pre>";
				if($flipbox['front_box_element'] == "icon") {
                    if($flipbox['style_indv'] == "yes") {
                        $this->add_render_attribute( $flipbox['_id'].'-front-icon-wrapper', 'class', 'icon-wrapper' );
                        $this->add_render_attribute( $flipbox['_id'].'-front-icon-wrapper', 'class', 'eae-fb-icon-view-' . $flipbox['front_icon_view'] );
                        $this->add_render_attribute( $flipbox['_id'].'-front-icon-wrapper', 'class', 'eae-fb-icon-shape-' . $flipbox['front_icon_shape'] );
                    }
					else
                    {
                        $this->add_render_attribute( $flipbox['_id'].'-front-icon-wrapper', 'class', 'icon-wrapper' );
                        $this->add_render_attribute( $flipbox['_id'].'-front-icon-wrapper', 'class', 'eae-fb-icon-view-' . $settings['front_icon_view_global'] );
                        $this->add_render_attribute( $flipbox['_id'].'-front-icon-wrapper', 'class', 'eae-fb-icon-shape-' . $settings['front_icon_shape_global'] );
                    }
					$this->add_render_attribute( $flipbox['_id'].'-front-icon-title', 'class', 'front-icon-title' );
					$this->add_render_attribute( $flipbox['_id'].'-front-icon', 'class', $flipbox['front_icon'] );
				}
				if($flipbox['back_box_element'] == "icon") {
                    if($flipbox['style_indv'] == "yes") {
                        $this->add_render_attribute($flipbox['_id'] . '-back-icon-wrapper', 'class', 'icon-wrapper');
                        $this->add_render_attribute($flipbox['_id'] . '-back-icon-wrapper', 'class', 'eae-fb-icon-view-' . $flipbox['back_icon_view']);
                        $this->add_render_attribute($flipbox['_id'] . '-back-icon-wrapper', 'class', 'eae-fb-icon-shape-' . $flipbox['back_icon_shape']);
                    }
                    else
                    {
                        $this->add_render_attribute( $flipbox['_id'].'-back-icon-wrapper', 'class', 'icon-wrapper' );
                        $this->add_render_attribute( $flipbox['_id'].'-back-icon-wrapper', 'class', 'eae-fb-icon-view-' . $settings['back_icon_view_global'] );
                        $this->add_render_attribute( $flipbox['_id'].'-back-icon-wrapper', 'class', 'eae-fb-icon-shape-' . $settings['back_icon_shape_global'] );
                    }
					$this->add_render_attribute( $flipbox['_id'].'-back-icon-title', 'class', 'back-icon-title' );
					$this->add_render_attribute( $flipbox['_id'].'-back-icon', 'class', $flipbox['back_icon'] );
				}
				$this->add_render_attribute( $flipbox['_id'].'-button', 'class', 'eae-fb-button' );
				if ( ! empty( $flipbox['link']['url'] ) ) {
					$this->add_render_attribute( $flipbox['_id'].'-button', 'href', $flipbox['link']['url'] );

					if ( ! empty( $flipbox['link']['is_external'] ) ) {
						$this->add_render_attribute( $flipbox['_id'].'-button', 'target', '_blank' );
					}
				}
			?>

				<div class="elementor-repeater-item-<?php echo $flipbox['_id']; ?>  overwrite-style-<?php echo $flipbox['style_indv']; ?> eae-flip-box-wrapper ">
					<div class="eae-flip-box-inner" >

						<div class="eae-flip-box-front">
							<div class="flipbox-content">
								<?php if($flipbox['front_box_element'] == "icon") {?>
								<?php if(!empty($flipbox['front_icon'])){ ?>
									<div <?php echo $this->get_render_attribute_string( $flipbox['_id'].'-front-icon-wrapper' ); ?>>
										<i <?php echo $this->get_render_attribute_string( $flipbox['_id'].'-front-icon' ); ?>></i>
									</div>
								<?php } } ?>
								<?php if($flipbox['front_box_element'] == "image"){
									if($flipbox['front_box_image']['url'] !="")
									{
                                        $pix = wp_get_attachment_image_src($flipbox['front_box_image']['id'],$flipbox['front_image_size_size']);
                                        echo "<img src='".$pix[0]."'>";

									}
								}?>

								<?php if(!empty($flipbox['front_title'])){ ?>
								<<?php echo $flipbox['front_title_html_tag']; ?> <?php  echo $this->get_render_attribute_string( $flipbox['_id'].'-front-icon-title' ); ?> >
								<?php echo $flipbox['front_title']; ?>
							</<?php echo $flipbox['front_title_html_tag']; ?>>
							<?php } ?>

							<?php if(!empty($flipbox['front_text'])){ ?>
								<p>
									<?php echo $flipbox['front_text']; ?>
								</p>
							<?php } ?>
						</div>
					</div>

					<div class="eae-flip-box-back">
						<div class="flipbox-content">
							<?php if($flipbox['back_box_element'] == "icon") {?>
								<?php if(!empty($flipbox['back_icon'])){ ?>
									<div <?php echo $this->get_render_attribute_string( $flipbox['_id'].'-back-icon-wrapper' ); ?>>
										<i <?php echo $this->get_render_attribute_string( $flipbox['_id'].'-back-icon' ); ?>></i>
									</div>
							<?php } }?>
							<?php if($flipbox['back_box_element'] == "image"){
								if($flipbox['back_box_image']['url'] !="")
								{
									//echo "<img src='".$flipbox['back_box_image']['url']."'>";
                                    $back_pix = wp_get_attachment_image_src($flipbox['back_box_image']['id'],$flipbox['back_image_size_size']);
                                    echo "<img src='".$back_pix[0]."'>";
                                }
							}?>
							<?php if(!empty($flipbox['back_title'])){ ?>
							<<?php echo $flipbox['back_title_html_tag']; ?> <?php echo $this->get_render_attribute_string( 'back-icon-title' ); ?> >
							<?php echo $flipbox['back_title']; ?>
						</<?php echo $flipbox['back_title_html_tag']; ?>>
						<?php } ?>

						<?php if(!empty($flipbox['back_text'])){ ?>
							<p>
								<?php echo $flipbox['back_text']; ?>
							</p>
						<?php } ?>

						<?php if(!empty($flipbox['action_text'])){ ?>
							<div class="eae-fb-button-wrapper">
								<a <?php echo $this->get_render_attribute_string( $flipbox['_id'].'-button' ); ?>>
									<span class="elementor-button-text"><?php echo $flipbox['action_text']; ?></span>
								</a>
							</div>
						<?php  }  ?>
					</div>
				</div>

				</div>
				</div>

			<?php
			}
			?>
	</div>
	<?php	}

	}

    protected function _content_template() {
	    ?>
        <div class="eae-flip-box">
        <#

        if(settings.eae_flip_box_set.length){
            settings.eae_flip_box_set.forEach(flipbox);

            function flipbox(item, index){
                if(item.front_box_element == "icon") {
                    if(item.style_indv == "yes") {
                        view.addRenderAttribute( item._id + '-front-icon-wrapper', 'class', 'icon-wrapper' );
                        view.addRenderAttribute( item._id + '-front-icon-wrapper', 'class', 'eae-fb-icon-view-' + item.front_icon_view );
                        view.addRenderAttribute( item._id + '-front-icon-wrapper', 'class', 'eae-fb-icon-shape-' + item.front_icon_shape );
                    }
                    else
                    {
                        view.addRenderAttribute( item._id + '-front-icon-wrapper', 'class', 'icon-wrapper' );
                        view.addRenderAttribute( item._id + '-front-icon-wrapper', 'class', 'eae-fb-icon-view-' + item.front_icon_view_global );
                        view.addRenderAttribute( item._id + '-front-icon-wrapper', 'class', 'eae-fb-icon-shape-' + item.front_icon_shape_global );
                    }
                    view.addRenderAttribute( item._id + '-front-icon-title', 'class', 'front-icon-title' );
                    view.addRenderAttribute( item._id + '-front-icon', 'class', item.front_icon );
                }
                if(item.back_box_element == "icon") {
                    if(item.style_indv == "yes") {
                        view.addRenderAttribute(item._id + '-back-icon-wrapper', 'class', 'icon-wrapper');
                        view.addRenderAttribute(item._id + '-back-icon-wrapper', 'class', 'eae-fb-icon-view-' + item.back_icon_view);
                        view.addRenderAttribute(item._id + '-back-icon-wrapper', 'class', 'eae-fb-icon-shape-' + item.back_icon_shape);
                    }
                    else
                    {
                        view.addRenderAttribute( item._id + '-back-icon-wrapper', 'class', 'icon-wrapper' );
                        view.addRenderAttribute( item._id + '-back-icon-wrapper', 'class', 'eae-fb-icon-view-' + item.back_icon_view_global );
                        view.addRenderAttribute( item._id + '-back-icon-wrapper', 'class', 'eae-fb-icon-shape-' + item.back_icon_shape_global );
                    }
                    view.addRenderAttribute( item._id + '-back-icon-title', 'class', 'back-icon-title' );
                    view.addRenderAttribute( item._id + '-back-icon', 'class', item.back_icon );
                }

                view.addRenderAttribute( item._id + '-button', 'class', 'eae-fb-button' );
                if ( item.link.url !== "" ) {
                    view.addRenderAttribute( item._id + '-button', 'href', item.link.url);

                    if ( item.link.is_external !== "" ) {
                        view.addRenderAttribute( item._id + '-button', 'target', '_blank' );
                    }
                }

             #>

    <div class="elementor-repeater-item-{{{ item._id }}}  overwrite-style-{{{ item.style_indv }}} eae-flip-box-wrapper ">
        <div class="eae-flip-box-inner" >

            <div class="eae-flip-box-front">
                <div class="flipbox-content">

                <#  if(item.front_box_element == "icon") {
                        if(item.front_icon !== ""){  #>
                            <div {{{ view.getRenderAttributeString( item._id + '-front-icon-wrapper' ) }}}>
                                <i {{{ view.getRenderAttributeString( item._id + '-front-icon' ) }}}></i>
                            </div>
                <# } } #>
                <# if(item.front_box_element == "image"){
                    if(item.front_box_image.url !="")
                    { #>
                        <img src='{{{ item.front_box_image.url }}}'>
                    <# }
                }#>

                <# if(item.front_title !== "" ){ #>
                <{{{  item.front_title_html_tag }}} {{{  view.getRenderAttributeString( item._id + '-front-icon-title' ) }}} >
                {{{ item.front_title }}}
            </{{{ item.front_title_html_tag }}}>
            <# } #>

            <# if(item.front_text !== ""){ #>
                <p>
                    {{{ item.front_text }}}
                </p>
            <# } #>


            </div>
        </div>

        <div class="eae-flip-box-back">
            <div class="flipbox-content">
                <# if(item.back_box_element == "icon") { #>
                    <# if(item.back_icon !== "" ){ #>
                        <div {{{ view.getRenderAttributeString( item._id + '-back-icon-wrapper' ) }}}>
                            <i {{{ view.getRenderAttributeString( item._id + '-back-icon' ) }}}></i>
                        </div>
                    <# } } #>
                <# if(item.back_box_element == "image"){
                    if(item.back_box_image.url !="")
                    { #>
                        <img src='{{{ item.back_box_image.url }}}'>
                   <# }
                } #>
                <# if(item.back_title !== "" ){ #>
                <{{{ item.back_title_html_tag }}} {{{ view.getRenderAttributeString( 'back-icon-title' ) }}} >
                {{{ item.back_title }}}
            </{{{ item.back_title_html_tag }}}>
            <# } #>

            <# if(item.back_text !== ""){ #>
                <p>
                    {{{ item.back_text }}}
                </p>
            <# } #>

            <# if(item.action_text !== ""){ #>
                <div class="eae-fb-button-wrapper">
                    <a {{{ view.getRenderAttributeString( item._id + '-button' ) }}}>
                        <span class="elementor-button-text">{{{ item.action_text }}}</span>
                    </a>
                </div>
            <#  } #>
        </div>
        </div>
    </div>
    </div>


    <# } } #>
        </div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_FlipBoxSet() );