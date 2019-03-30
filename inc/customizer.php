<?php
/**
 * snwps Theme Customizer
 *
 * @package snwps
 */

    function snwps__customize_register($wp_customize){


        // Configuraciones personalizadas del tema
        // xxxxxxxxxxxxxxxxxxxxxxxx PANEL PRIMARY xxxxxxxxxxxxxxxxxxxxxxxx
        $wp_customize -> add_panel('company_panel', [
                'title'         => __('Empresa','snwps'),
                'priority'      => 1,
                'capability'    => 'edit_theme_options'
        ]);


        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SECTIONS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $wp_customize -> add_section('snwps_general',[            // Section =>> snwps General
            'title'         => __('General','snwps'),
            'description'   => 'Opciones Generales',
            'priority'      => 1,
            'panel'         => 'company_panel'
        ]);
        $wp_customize -> add_section('snwps_contact',[
            'title'         => __('Contacto','snwps'),
            'description'   => 'Contacto',
            'priority'      => 2,
            'panel'         => 'company_panel'
        ]);
        $wp_customize -> add_section('snwps_theme',[
            'title'         => __('Tema','snwps'),
            'description'   => 'Colores del sitio',
            'priority'      => 3,
            'panel'         => 'company_panel'
        ]);



        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // Contact Settings
        $wp_customize -> add_setting('snwps_facebook',['default' => 'http://facebook.com']);
        $wp_customize -> add_setting('snwps_twitter',['default' => 'http://twitter.com']);
        $wp_customize -> add_setting('snwps_youtube',['default' => 'http://youtube.com']);
        $wp_customize -> add_setting('snwps_email',['default' => '']);
        
        $wp_customize -> selective_refresh -> add_partial('snwps_facebook',['selector' => '.snwps-facebook']);
        $wp_customize -> selective_refresh -> add_partial('snwps_twitter',['selector' => '.snwps-twitter']);
        $wp_customize -> selective_refresh -> add_partial('snwps_youtube',['selector' => '.snwps-youtube']);
        $wp_customize -> selective_refresh -> add_partial('snwps_email',['selector' => '.snwps-email']);

        $wp_customize -> add_control(new WP_Customize_Control($wp_customize,'snwps_facebook',[
            'label'         => __('Facebook','snwps'),
            'section'       => 'snwps_contact',
            'settings'      => 'snwps_facebook',
            'type'          => 'text',
        ]));
        $wp_customize -> add_control(new WP_Customize_Control($wp_customize,'snwps_twitter',[
            'label'         => __('Twitter','snwps'),
            'section'       => 'snwps_contact',
            'settings'      => 'snwps_twitter',
            'type'          => 'text',
        ]));
        $wp_customize -> add_control(new WP_Customize_Control($wp_customize,'snwps_youtube',[
            'label'         => __('Youtube','snwps'),
            'section'       => 'snwps_contact',
            'settings'      => 'snwps_youtube',
            'type'          => 'text',
        ]));
        $wp_customize -> add_control(new WP_Customize_Control($wp_customize,'snwps_email',[
            'label'         => __('Email','snwps'),
            'section'       => 'snwps_contact',
            'settings'      => 'snwps_email',
            'type'          => 'text',
        ]));

        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // Thme Settings
        // $wp_customize -> add_setting('theme_first_color',['default' => '#2A79FF']);
        // $wp_customize -> add_setting('theme_accent_color',['default' => '#41C3FF']);

        // $wp_customize -> add_setting('theme_text_color',['default' => '#2B3645']);
        // $wp_customize -> add_setting('theme_text_color_alt',['default' => '#97999B']);

        // $wp_customize -> add_setting('theme_border_color',['default' => '#EBECEE']);
        // $wp_customize -> add_setting('theme_body_bg',['default' => '#FAFBFF']);
        // $wp_customize -> add_setting('theme_card_bg',['default' => '#FFF']);

        // class CustomTheme{
        //     function __construct($custon,$setting,$titleDescription)
        //     {
        //         $custon -> add_control(new WP_Customize_Color_Control($custon,$setting,[
        //             'label'         => __($titleDescription,'snwps'),
        //             'section'       => 'snwps_theme',
        //             'settings'      => $setting
        //         ]));
        //     }
        // }

        // new CustomTheme($wp_customize,'theme_first_color','Color primario');
        // new CustomTheme($wp_customize,'theme_accent_color','Color secundario');

        // new CustomTheme($wp_customize,'theme_text_color','Color del texto');
        // new CustomTheme($wp_customize,'theme_text_color_alt','Color del texto alternativo');

        // new CustomTheme($wp_customize,'theme_border_color','Color de los borders');
        // new CustomTheme($wp_customize,'theme_body_bg','Fondo del sitio web');
        // new CustomTheme($wp_customize,'theme_card_bg','Fondo de las tarjetas');


        // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // Avilitando xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        // Configuraciones existentes de wordpress
        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
        if ( isset( $wp_customize->selective_refresh ) ) {
            $wp_customize->selective_refresh->add_partial( 'blogname', array(
                'selector' => '.WP-Header-title',
                'render_callback' => 'snwps_customize_blogname'
            ));
            $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
                'selector' => '.WP-Header-description',
                'render_callback' => 'snwps_customize_blogdescription',
            ));
        }
    }
    add_action('customize_register','snwps__customize_register');


    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // Cambio de thme en tiempo real
    // xxxxxxxxxxxxxxxxxxxxxxxx FUNCTIONS COLOR CUSTOMIZE xxxxxxxxxxxxxxxxxxxxxxxx
    function change_colors_theme(){
        ?>
            <style>
                html body{
                    <?php if ( get_theme_mod('theme_first_color') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_first_color')?>; */
                    <?php endif; ?>
                    <?php if ( get_theme_mod('theme_accent_color') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_accent_color')?>; */
                    <?php endif; ?>

                    <?php if ( get_theme_mod('theme_text_color') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_text_color')?>; */
                    <?php endif; ?>
                    <?php if ( get_theme_mod('theme_text_color_alt') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_text_color_alt')?>; */
                    <?php endif; ?>

                    <?php if ( get_theme_mod('theme_border_color') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_border_color')?>; */
                    <?php endif; ?>
                    <?php if ( get_theme_mod('theme_body_bg') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_body_bg')?>; */
                    <?php endif; ?>
                    <?php if ( get_theme_mod('theme_card_bg') ) : ?>
                        /* --border-color: <?php echo get_theme_mod('theme_card_bg')?>; */
                    <?php endif; ?>
                }
            </style>
        <?php
    }
    add_action('wp_head','change_colors_theme');
