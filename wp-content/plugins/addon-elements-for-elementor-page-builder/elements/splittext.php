<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_SplitText extends Widget_Base {
	public function get_name() {
		return 'wts-splittext';
	}
	
	public function get_title() {
		return __( 'EAE - Split Text', 'elementor' );
	}
	
	public function get_icon() {
		return 'eicon-dual-button wts-eae-pe';
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
									'{{WRAPPER}} .eae-st-transform-text' => 'text-align: {{VALUE}};',
							]
					]
			);
			
			$this->add_control(
				'split_mode',
				[
					'label' => __( 'Split Mode', 'elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'text' => __( 'Letter', 'elementor' ),
						'word' => __( 'Word', 'elementor' )
					],
					'default' => 'word',
				]
			);
			
			$this->add_control(
				'split_count',
				[
					'label' => __( 'Split Count', 'elementor' ),
					'type' => Controls_Manager::TEXT,
					'default' => '2',
					'placeholder' => __( 'Count', 'elementor' ),
				]
			);
			
			$this->add_control(
				'title_size',
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
					'default' => 'h3',
				]
			);
		
			$this->add_control(
				'text',
				[
					'label' => __( 'Text', 'elementor' ),
					'type' => Controls_Manager::TEXTAREA,
					'placeholder' => __( 'Enter text', 'elementor' ),
					'default' => __( 'I Love Elementor', 'elementor' ),
				]
			);
			

			

			$this->end_controls_section();

			$this->start_controls_section(
				'section_split_text_style',
				[
					'label' => __( 'Part 1', 'elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			
			
			$this->add_control(
				'split_text_color',
				[
					'label' => __( 'Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_1,
					],
					'selectors' => [
						'{{WRAPPER}} .eae-st-split-text' => 'color: {{VALUE}};',
					],
				]
			);
			
	
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'split_text_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .eae-st-split-text',
				]
			);
			
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'split_text_border',
					'label' => __( 'Box Border', 'elementor' ),
					'selector' => '{{WRAPPER}} .eae-st-split-text',
				]
			);



			$this->add_control(
				'split_text_box_border_radius',
				[
					'label' => __( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-st-split-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
			);

			$this->add_control(
				'split_text_box_padding',
				[
					'label' => __( 'Padding', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-st-split-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'split_text_box_margin',
				[
					'label' => __( 'Margin', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-st-split-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'split_text_section_bg',
					'label' => __( 'Text Background', 'elementor' ),
					'types' => [ 'none','classic','gradient' ],
					'selector' => '{{WRAPPER}} .eae-st-split-text',
				]
			);

			
			$this->end_controls_section();
			
			$this->start_controls_section(
				'section_rest_text_style',
				[
					'label' => __( 'Part 2', 'elementor' ),
					'tab' => Controls_Manager::TAB_STYLE,
				]
			);
			
			$this->add_control(
				'rest_text_color',
				[
					'label' => __( 'Text Color', 'elementor' ),
					'type' => Controls_Manager::COLOR,
					'scheme' => [
						'type' => Scheme_Color::get_type(),
						'value' => Scheme_Color::COLOR_2,
					],
					'selectors' => [
						'{{WRAPPER}} .eae-st-rest-text' => 'color: {{VALUE}};',
					],
				]
			);
	
			$this->add_group_control(
				Group_Control_Typography::get_type(),
				[
					'name' => 'rest_text_typography',
					'scheme' => Scheme_Typography::TYPOGRAPHY_1,
					'selector' => '{{WRAPPER}} .eae-st-rest-text',
				]
			);
			$this->add_group_control(
				Group_Control_Border::get_type(),
				[
					'name' => 'rest_text_border',
					'label' => __( 'Box Border', 'elementor' ),
					'selector' => '{{WRAPPER}} .eae-st-rest-text',
				]
			);



			$this->add_control(
				'rest_text_box_border_radius',
				[
					'label' => __( 'Border Radius', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-st-rest-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
				]
			);

			$this->add_control(
				'rest_text_box_padding',
				[
					'label' => __( 'Padding', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-st-rest-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'rest_text_box_margin',
				[
					'label' => __( 'Margin', 'elementor' ),
					'type' => Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .eae-st-rest-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->add_group_control(
				Group_Control_Background::get_type(),
				[
					'name' => 'rest_text_section_bg',
					'label' => __( 'Text Background', 'elementor' ),
					'types' => [ 'none','classic','gradient' ],
					'selector' => '{{WRAPPER}} .eae-st-rest-text',
				]
			);
			
			$this->end_controls_section();

	}
	protected function render(){
		$settings = $this->get_settings();

		$this->add_render_attribute('eae-st-transform-text-wrapper','class','eae-st-transform-text-wrapper');

		$this->add_render_attribute('eae-st-transform-text-wrapper','class','waiting');

		$this->add_render_attribute('eae-st-transform-text','class','eae-st-transform-text');
		
		$this->add_render_attribute('eae-st-split-text','class','eae-st-split-text');
		
		$this->add_render_attribute('eae-st-split-full-text','class','eae-st-split-text eae-st-full-text');

		$this->add_render_attribute('eae-st-rest-text','class','eae-st-rest-text');
		
		?>
			<div id="eae-at-<?php echo $this->get_id(); ?>" class="eae-st-transform-text-wrapper">
				<div <?php echo $this->get_render_attribute_string( 'eae-st-transform-text' ); ?>>
					<?php if($settings['split_mode'] == 'text'){ ?> 
						<?php echo sprintf('<%1$s class="eae-st-transform-text-title">%2$s</%1$s>', $settings['title_size'], "<div ".$this->get_render_attribute_string( 'eae-st-split-text' ).">".substr($settings['text'], 0, $settings['split_count'])."</div><div ".$this->get_render_attribute_string( 'eae-st-rest-text' ).">".substr($settings['text'], $settings['split_count'], strlen($settings['text']) - $settings['split_count'])."</div>"); ?>
					<?php } else { ?>
					<?php							
						$arr = explode(" ", $settings['text']);
						if(count($arr) <= $settings['split_count']){
							$split_text = "<div " . $this->get_render_attribute_string( 'eae-st-split-full-text' ) . ">".$settings['text']."</div>";
							echo sprintf('<%1$s class="eae-st-transform-text-title">%2$s</%1$s>', $settings['title_size'], $split_text) ;
						}else{
							$split_text = "<div " . $this->get_render_attribute_string( 'eae-st-split-text' ) . ">" . implode(" ", array_slice($arr, 0, $settings['split_count'])) . "&nbsp;</div>";
							$rest_text = "<div " . $this->get_render_attribute_string( 'eae-st-rest-text' ) . ">" . implode(" ", array_slice($arr, $settings['split_count'], count($arr))) . "</div>";
							echo sprintf('<%1$s class="eae-st-transform-text-title">%2$s</%1$s>', $settings['title_size'], $split_text.$rest_text);
						}
					?>
					<?php } ?>
				</div>
			</div>
        <?php
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new Widget_SplitText() );
?>