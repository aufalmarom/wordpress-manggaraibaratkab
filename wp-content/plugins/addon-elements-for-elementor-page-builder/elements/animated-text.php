<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_AnimatedText extends Widget_Base {
	
	public function get_name() {
		return 'wts-AnimatedText';
	}
	
	public function get_title() {
		return __( 'EAE - Animated Text', 'elementor' );
	}
	
	public function get_icon() {
		return 'eicon-animation-text wts-eae-pe';
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
					'text-align',
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
							'default' => '',
							'selectors' => [
									'{{WRAPPER}} .eae-at-animation' => 'text-align: {{VALUE}};',
							]
					]
			);

			$this->add_control(
				'pre-text',
				[
					'label' => __( 'Pre Text', 'elementor' ),
					'type' => Controls_Manager::TEXTAREA,
					'placeholder' => __( 'Enter text', 'elementor' ),
					'default' => __( 'I Love', 'elementor' ),
				]
			);
			
			
			$this->add_control(
				'animation-text-list',
				[
					'label' => __( 'Animated Text List', 'elementor' ),
					'type' => Controls_Manager::REPEATER,
					'default' => [
						[
							'text' => __( 'Football', 'elementor' ),
						],
						[
							'text' => __( 'Cricket', 'elementor' ),
						],
						[
							'text' => __( 'Basketball', 'elementor' ),
						],
					],
					'fields' => [
						[
							'name' => 'text',
							'label' => __( 'Text', 'elementor' ),
							'type' => Controls_Manager::TEXT,
							'label_block' => true,
							'placeholder' => __( 'Text to animate', 'elementor' ),
							'default' => __( '', 'elementor' ),
						],
					],
					'title_field' => '{{{ text }}}'
				]
			);

			$this->add_control(
				'post-text',
				[
					'label' => __( 'Post Text', 'elementor' ),
					'type' => Controls_Manager::TEXTAREA,
					'placeholder' => __( 'Enter text', 'elementor' ),
					'default' => __( 'Very Much', 'elementor' ),
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_pre_text_style',
				[
					'label' => __( 'Pre Text', 'elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			
			
			$this->add_control(
				'pre_text_color',
				[
					'label' => __( 'Pre Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .eae-at-pre-text' => 'color: {{VALUE}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'pre_text_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .eae-at-pre-text',
				]
			);

			
			$this->end_controls_section();

			
			 $this->start_controls_section(
				'section_animation_text_style',
				[
					'label' => __( 'Animated Text', 'elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);


			$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
							'name' => 'animation_color_typography',
							'scheme' => Scheme_Typography::TYPOGRAPHY_1,
							'selector' => '{{WRAPPER}} .eae-at-animation-text, {{WRAPPER}} .eae-at-animation-text i',
					]
			);
			
			
			$this->add_control(
				'animation_color',
				[
					'label' => __( 'Animation Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_4,
					],
					'selectors' => [
						'{{WRAPPER}} .eae-at-animation-text' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'animated_text_border',
					'label' => __( 'Box Border', 'elementor' ),
					'selector' => '{{WRAPPER}} .eae-at-animation-text-wrapper .eae-at-animation-text.is-visible',
				]
			);



			$this->add_control(
				'box_border_radius',
				[
					'label' => __( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-at-animation-text-wrapper .eae-at-animation-text.is-visible' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
			);

			$this->add_control(
				'box_padding',
				[
					'label' => __( 'Padding', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-at-animation-text-wrapper .eae-at-animation-text.is-visible' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'box_margin',
				[
					'label' => __( 'Margin', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-at-animation-text-wrapper .eae-at-animation-text.is-visible' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	

			
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'animation_section_bg',
					'label' => __( 'Section Background', 'elementor' ),
					'types' => [ 'classic','gradient'  ],
					'selector' => '{{WRAPPER}} .eae-at-animation-text-wrapper .eae-at-animation-text.is-visible',
				]
			);


			
			$this->end_controls_section();

			$this->start_controls_section(
				'section_cursor_style',
				[
					'label' => __( 'Cursor Control', 'elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);


			$this->add_control(
				'cursor_color',
				[
					'label' => __( 'Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'default' => '#54595f',
					'selectors' => [
						'{{WRAPPER}} .eae-at-animation-text-wrapper::after' => 'background-color: {{VALUE}};',
					],
				]
			);

			$this->add_responsive_control(
				'cursor_width',
				[
					'label' => __( 'Width', 'elementor' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'default' => [
						'size' => 1,
						'unit' => 'px',
					],
					'range' => [
						'px' => [
							'min' => 1,
							'max' => 5,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .eae-at-animation.type .eae-at-animation-text-wrapper::after' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->end_controls_section();

			$this->start_controls_section(
				'section_post_text_style',
				[
					'label' => __( 'Post Text', 'elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);


			$this->add_control(
				'post_text_color',
				[
					'label' => __( 'Post Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .eae-at-post-text' => 'color: {{VALUE}};',
					],
				]
			);

			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'post_text_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .eae-at-post-text',
				]
			);

			$this->end_controls_section();
	}
	
	protected function render(){
		$settings = $this->get_settings();

		$this->add_render_attribute('eae-at-animated-text-wrapper','class','eae-at-animation-text-wrapper');

		$this->add_render_attribute('eae-at-animated-text-wrapper','class','waiting');

		$this->add_render_attribute('eae-at-animated-text','class','eae-at-animation-text');

		$this->add_render_attribute('eae-at-pre-txt','class','eae-at-pre-text');

        $this->add_render_attribute('eae-at-animated','class','eae-at-animation');

		$this->add_render_attribute('eae-at-animated','class','type');

		$this->add_render_attribute('eae-at-animated','class','letters');

		$this->add_render_attribute('eae-at-post-txt','class','eae-at-post-text');

		?>
			<div id="eae-at-<?php echo $this->get_id(); ?>" class="eae-animtext-wrapper">
				<div <?php echo $this->get_render_attribute_string( 'eae-at-animated' ); ?>>
					<span <?php echo $this->get_render_attribute_string( 'eae-at-pre-txt' ); ?>><?php echo $settings['pre-text']; ?></span>
						<?php if(count($settings['animation-text-list'])){
						?>
							<span <?php echo $this->get_render_attribute_string( 'eae-at-animated-text-wrapper' ); ?>>
								<?php
									foreach($settings['animation-text-list'] as $animation_text){
								?>

									<span <?php echo $this->get_render_attribute_string( 'eae-at-animated-text' ); ?>><?php echo $animation_text['text']; ?></span>

								<?php
									 }
								?>
							</span>
						<?php
						}?>
					<span <?php echo $this->get_render_attribute_string( 'eae-at-post-txt' ); ?>><?php echo $settings['post-text']; ?></span>
				</div>
			</div>
			<script>
				console.log('before-trigger');
				jQuery(document).trigger('elementor/render/animation-text','#eae-at-<?php echo $this->get_id(); ?>');

				jQuery(document).ready(function(){
					jQuery(document).trigger('elementor/render/animation-text','#eae-at-<?php echo $this->get_id(); ?>');
				});
			</script>
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

Plugin::instance()->widgets_manager->register_widget_type( new Widget_AnimatedText() );
?>