<?php
namespace Elementor;

function eae_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'wts-eae',
        [
            'title'  => 'Elementor Addon Elements',
            'icon' => 'font'
        ],
        1
    );

    require_once ELEMENTOR_ADDON_PATH.'elements/particles.php';
}
add_action('elementor/init','Elementor\eae_elementor_init');



