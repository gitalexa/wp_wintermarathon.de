<?php
/*
namespace Elementor;

class My_Widget_1 extends Widget_Base {

    public function get_name() {
        return 'title-subtitle';
    }

    public function get_title() {
        return 'title & sub-title';
    }

    public function get_icon() {
        return 'fa fa-font';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_title',
            [
                'label' => __( 'Content', 'elementor' ),
            ]
        );



        $this->add_control(
            'pagination_type',
            [
                'label' => __( 'Pagination', 'elementor-pro' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => __( 'None', 'elementor-pro' ),
                    'numbers' => __( 'Numbers', 'elementor-pro' ),
                    'prev_next' => __( 'Previous/Next', 'elementor-pro' ),
                    'numbers_and_prev_next' => __( 'Numbers', 'elementor-pro' ) . ' + ' . __( 'Previous/Next', 'elementor-pro' ),
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title', 'elementor' ),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __( 'Sub-title', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => __( 'Enter your sub-title', 'elementor' ),
            ]
        );


        $this->add_control(
            'drawline',
            [
                'label' => __( 'Linie', 'elementor' ),
                'label_block' => true,
                'type' => Controls_Manager::SWITCHER,
                'placeholder' => __( 'Linie zeichnen', 'elementor' ),
            ]
        );






        $this->add_control(
            'link',
            [
                'label' => __( 'Link', 'elementor' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'elementor' ),
                'default' => [
                    'url' => '',
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $url = $settings['link']['url'];
  //      echo  "<a href='$url'><div class='title'>$settings[title]</div> <div class='subtitle'>$settings[subtitle]</div></a>";

        echo "<div class='info-comp'><p class='info-headline'>$settings[title]</p><div class='break'><p>$settings[subtitle]</p></div><div class='clear_spezi'></div></div>";


    }

    protected function _content_template() {

    }


}

*/