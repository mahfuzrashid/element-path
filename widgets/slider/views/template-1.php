<?php
/**
 * Widget Render: Slider
 *
 * @package widgets/slider/views/template-1.php
 * @copyright rashid87
 */

use Elementor\Icons_Manager;

$unique_id = uniqid();
$style         = elmpath()->get_settings_atts( 'style' );
$sliders    = elmpath()->get_settings_atts( 'sliders' );
?>

 

    <section class="main-slider style3 ">
            <div class="slider-box">
                <!-- Banner Carousel -->
                <div class="banner-carousel owl-theme owl-carousel">
            
                <?php foreach ( $sliders as $item ) :
                $img_url = elmpath()->get_settings_atts( 'url', '', elmpath()->get_settings_atts( 'img_id', '', $item ) );
                ?>
                    
                    <div class="slide">
                     
                       <?php if ( ! empty( $img_url ) ) : ?>
                            <div class="image-layer" style="background-image:url(<?php echo esc_url( $img_url ); ?>)">
                            </div>
                         <?php endif; ?>
                       
                        
                        <div class="auto-container">
                            <div class="content text-center">
                                <div class="big-title">
                                    <h2>Hello World This Rashid</h2>
                                </div>
                                <div class="text">
                                    <p>slider Text From HTML codes</p>
                                </div>
                                <div class="btns-box">
                              
                                    <a class="btn-one" href="#">
                                        <span class="txt">Read More</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>










