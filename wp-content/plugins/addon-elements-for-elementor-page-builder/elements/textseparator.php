<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_TextSeparator extends Widget_Base {

	public function get_name() {
		return 'wts-textseparator';
	}

	public function get_title() {
		return __( 'EAE - Text Separator', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-divider wts-eae-pe';
	}


    public function get_categories() {
		return [ 'wts-eae' ];
	}




	protected function _register_controls() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Title', 'elementor' )
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
                ],
                'label_block' => true,
				'placeholder' => __( 'Enter text', 'elementor' ),
				'default' => __( 'This is text separator', 'elementor' )
			]
		);

		$this->add_control(
			'html_tag',
			[
				'label' => __( 'HTML Tag', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => __( 'H1', 'elementor' ),
					'h2' => __( 'H2', 'elementor' ),
					'h3' => __( 'H3', 'elementor' ),
					'h4' => __( 'H4', 'elementor' ),
					'h5' => __( 'H5', 'elementor' ),
					'h6' => __( 'H6', 'elementor' ),
					'div' => __( 'div', 'elementor' ),
					'span' => __( 'span', 'elementor' ),
					'p' => __( 'p', 'elementor' ),
				],
				'default' => 'h2',
			]
		);

        $this->add_responsive_control(
			'align',
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
				'default' => 'center'
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);


		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICON,
				'label_block' => true,
				'default' => 'fa fa-star'
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'elementor' ),
					'stacked' => __( 'Stacked', 'elementor' ),
					'framed' => __( 'Framed', 'elementor' ),
				],
				'default' => 'default',
				'prefix_class' => 'eae-icon-view-',
			]
		);

		$this->add_control(
			'shape',
			[
				'label' => __( 'Shape', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'circle' => __( 'Circle', 'elementor' ),
					'square' => __( 'Square', 'elementor' ),
				],
				'default' => 'circle',
				'condition' => [
					'view!' => 'default',
				],
				'prefix_class' => 'eae-icon-shape-',
			]
		);

		$this->add_control(
		    'icon_position',
		    [
		        'label' => __('Icon Position','wts_eae'),
		        'type'  => Controls_Manager::SELECT,
		        'options' => [
					'before' => __( 'Before Text', 'elementor' ),
					'after' => __( 'After Text', 'elementor' )
                ],
                'default' => 'before',
            ]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_divider',
			[
				'label' => __( 'Divider', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Style', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'solid' => __( 'Solid', 'elementor' ),
					'double' => __( 'Double', 'elementor' ),
					'dotted' => __( 'Dotted', 'elementor' ),
					'dashed' => __( 'Dashed', 'elementor' ),
				],
				'default' => 'solid',
				'selectors' => [
					'{{WRAPPER}} .wts-eae-textseparator .eae-sep-holder .eae-sep-lines' => 'border-top-style: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'weight',
			[
				'label' => __( 'Weight', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 10,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wts-eae-textseparator .eae-sep-holder .eae-sep-lines' => 'border-top-width: {{SIZE}}{{UNIT}};',
				],
			]
		);




        $this->end_controls_section();

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .eae-separator-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name' => 'typography',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .eae-separator-title',
			]
		);

        $this->end_controls_section();
		$this->start_controls_section(
			'section_divider_style',
			[
				'label' => __( 'Divider', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __( 'Divider Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .eae-sep-lines' => 'border-top-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'divider_width',
			[
				'label' => __( 'Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'default' => [
					'size' => 100,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wts-eae-textseparator' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'divider_align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'default' => '',
				'selectors' => [
				     '{{WRAPPER}} .wts-eae-textseparator' => 'float: {{VALUE}};',
                ]
			]
		);

        $this->end_controls_section();
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => __( 'Icon', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_primary_color',
			[
				'label' => __( 'Primary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .eae-separator-icon-inner i' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_secondary_color',
			[
				'label' => __( 'Secondary Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
				    'type' => Scheme_Color::get_type(),
				    'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}.eae-icon-view-stacked .eae-separator-icon-inner' => 'background-color: {{VALUE}};',
					'{{WRAPPER}}.eae-icon-view-framed .eae-separator-icon-inner, {{WRAPPER}}.eae-icon-view-default .eae-separator-icon-inner' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'size',
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
					'{{WRAPPER}} .eae-separator-icon-inner i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_padding',
			[
				'label' => __( 'Icon Padding', 'elementor' ),
				'type' => Controls_Manager::SLIDER,

				'selectors' => [
					'{{WRAPPER}} .eae-separator-icon-inner' => 'padding: {{SIZE}}{{UNIT}};',
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
					'view!' => 'default',
				],
			]
		);

		$this->add_control(
			'rotate',
			[
				'label' => __( 'Icon Rotate', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0,
					'unit' => 'deg',
				],

				'selectors' => [
					'{{WRAPPER}} .eae-separator-icon-inner i' => 'transform: rotate({{SIZE}}{{UNIT}});',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .eae-separator-icon-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view' => 'framed',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .eae-separator-icon-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'view!' => 'default',
				],
			]
		);
	}

	protected function render( ) {
        $settings = $this->get_settings_for_display();

	    $this->add_render_attribute('separator_wrapper','class','wts-eae-textseparator');
	    $this->add_render_attribute('separator_wrapper','class','sep-align-'.$settings['align']);
	    if(!empty($settings['icon'])){
	        $this->add_render_attribute('separator_wrapper','class','icon-yes');
	        $this->add_render_attribute('separator_wrapper','class','icon-'.$settings['icon_position']);
	    }

	    if(!empty($settings['title'])){
	        $this->add_render_attribute('separator_wrapper','class','title-yes');
	    }

		$this->add_render_attribute( 'title', 'class', 'eae-separator-title' );

		$this->add_inline_editing_attributes( 'title' );

		$separator_html = '<div '.$this->get_render_attribute_string('separator_wrapper').'>

            <div class="eae-sep-holder sep-left">
                <div class="eae-sep-lines"></div>
            </div>';




        if(!empty($settings['icon']) && $settings['icon_position'] == 'before'){
            $separator_html .= '<div class="eae-separator-icon-wrapper"><div class="eae-separator-icon-inner">
                                    <i class="'.$settings['icon'].'"></i>
                               </div></div>';
        }

        if($settings['title'] != ''){
            $separator_html .= sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['html_tag'], $this->get_render_attribute_string( 'title' ), $settings['title'] );
        }

        if(!empty($settings['icon']) && $settings['icon_position'] == 'after'){
            $separator_html .= '<div class="eae-separator-icon-wrapper"><div class="eae-separator-icon-inner">
                                    <i class="'.$settings['icon'].'"></i>
                               </div></div>';
        }


        $separator_html .=  '<div class="eae-sep-holder sep-right">
                <div class="eae-sep-lines"></div>
            </div>
        </div>';






		echo $separator_html;
	}

	protected function _content_template() {
		?>
		<#

        icon_class = settings.icon != ''? 'icon-yes':'';
        title_class = settings.title != ''? 'title-yes':'';
		var separator_html = '<div class="wts-eae-textseparator sep-align-' + settings.align + ' icon-' + settings.icon_position + ' ' + icon_class + ' ' + title_class +'"><div class="eae-sep-holder sep-left"><div class="eae-sep-lines"></div></div>';

        if(settings.icon != '' && settings.icon_position == 'before'){
            separator_html += '<div class="eae-separator-icon-wrapper"><div class="eae-separator-icon-inner"><i class="'+ settings.icon +'"></i></div></div>'
        }

        if(settings.title != ''){
            separator_html += '<' + settings.html_tag  + ' class="eae-separator-title elementor-inline-editing" data-elementor-setting-key="title">' + settings.title + '</' + settings.html_tag + '>';
         }


        if(settings.icon != '' && settings.icon_position == 'after'){
            separator_html += '<div class="eae-separator-icon-wrapper"><div class="eae-separator-icon-inner"><i class="'+ settings.icon +'"></i></div></div>'
        }

        separator_html += '<div class="eae-sep-holder sep-right"><div class="eae-sep-lines"></div></div></div>';

		print( separator_html );
		#>
		<?php
	}
}


Plugin::instance()->widgets_manager->register_widget_type( new Widget_TextSeparator() );
