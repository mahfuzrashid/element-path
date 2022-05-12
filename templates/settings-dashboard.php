<?php
/**
 * Dashboard Settings
 */

$posted_data   = array_map('sanitize_text_field', $_POST );
$nonce       = elmpath()->get_settings_atts( 'elmpath_nonce', '', $posted_data );

if ( wp_verify_nonce( $nonce, 'elmpath_nonce_action' ) ) {

	$elements_active = elmpath()->get_settings_atts( 'elmpath_elements_active', array(), $posted_data );

	if ( is_array( $elements_active ) ) {
		update_option( 'elmpath_elements_active', $elements_active );
	}
}

?>

<form action="<?php menu_page_url( 'elmpath-settings' ); ?>" class="page-wrapper" method="post" enctype="multipart/form-data">

    <div class="element-page">
        <div class="wrapper-box">

            <div class="sidebar">
                <div class="logo">
					<?php printf( '<img src="%sassets/images/logo.png" alt="%s">', ELMPATH_PLUGIN_URL, esc_html( 'Element Path Addons' ) ); ?>
                    <h4>Element Path <br> Addons</h4>
                </div>
                <ul class="nav nav-tabs tab-btn-style-one" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-one-area" data-toggle="tab" href="#tab-one" role="tab" aria-controls="tab-one" aria-selected="true">
                            <h4><span class="dashicons dashicons-screenoptions"></span> <?php esc_html_e( 'Dashboard', 'element-path' ); ?></h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-two-area" data-toggle="tab" href="#tab-two" role="tab" aria-controls="tab-two" aria-selected="false">
                            <h4><span class="dashicons dashicons-category"></span> <?php esc_html_e( 'Elements', 'element-path' ); ?></h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-three-area" data-toggle="tab" href="#tab-three" role="tab" aria-controls="tab-three" aria-selected="false">
                            <h4><span class="dashicons dashicons-category"></span> <?php esc_html_e( 'Extensions', 'element-path' ); ?></h4>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-four-area" data-toggle="tab" href="#tab-four" role="tab" aria-controls="tab-four" aria-selected="false">
                            <h4><span class="dashicons dashicons-admin-tools"></span> <?php esc_html_e( 'Tools', 'element-path' ); ?></h4>
                        </a>
                    </li>
                </ul>
                <div class="link-btn">
                    <a href="#"><span class="dashicons dashicons-welcome-learn-more"></span> <?php esc_html_e( 'Go Pro', 'element-path' ); ?></a>
                </div>
            </div>

            <div class="content-box">
                <!-- Tab panes -->
                <div class="tab-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1200ms">

                    <div class="tab-pane fadeInUp animated active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row">
                            <div class="col-lg-6 feature-block">
                                <div class="inner-box">
                                    <div class="icon"><span class="dashicons dashicons-media-document"></span></div>
                                    <h4><?php esc_html_e( 'Easy Documentation', 'element-path' ); ?></h4>
                                    <div class="text"><?php esc_html_e( 'Consectetur adipiscing elit, sed do eiusmod temp incididunt labore et dolore magna aliqua. ipsum suspendisse.', 'element-path' ); ?></div>
                                    <div class="link-btn"><a href="#" class="btn-style-one"><span> <?php esc_html_e( 'Easy', 'element-path' ); ?></span></a></div>
                                    <div class="shape"><?php printf( '<img src="%sassets/images/shape-1.png" alt="%s">', ELMPATH_PLUGIN_URL, esc_html( 'Documentation' ) ); ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6 feature-block">
                                <div class="inner-box">
                                    <div class="icon"><span class="dashicons dashicons-welcome-add-page"></span></div>
                                    <h4><?php esc_html_e( 'Request a Feature', 'element-path' ); ?></h4>
                                    <div class="text"><?php esc_html_e( 'Consectetur adipiscing elit, sed do eiusmod temp incididunt labore et dolore magna aliqua. ipsum suspendisse.', 'element-path' ); ?></div>
                                    <div class="link-btn"><a href="#" class="btn-style-one"><span> <?php esc_html_e( 'Read More', 'element-path' ); ?></span></a></div>
                                </div>
                            </div>
                            <div class="col-md-12 feature-block-two">
                                <div class="inner-box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-block">
                                                <h4>Get Top-class Support</h4>
                                                <div class="text">Consectetur adipiscing elit, sed do eiusmod <br> temp incididunt labore et dolore magna aliqua. ipsum suspendisse.</div>
                                                <div class="link-btn"><a href="#" class="btn-style-one"><span> Give A Review</span></a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="image"><?php printf( '<img src="%sassets/images/feature.png" alt="%s">', ELMPATH_PLUGIN_URL, esc_html( 'Support' ) ); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 feature-block">
                                <div class="inner-box">
                                    <div class="icon"><span class="icon-rating"></span></div>
                                    <h4>Subscribe Newsletter</h4>
                                    <div class="text">Consectetur adipiscing elit, sed do eiusmod <br> temp incididunt labore et dolore magna aliqua. ipsum suspendisse.</div>
                                    <div class="link-btn"><a href="#" class="btn-style-one"><span> Subscribe Now</span></a></div>
                                </div>
                            </div>
                            <div class="col-lg-6 feature-block">
                                <div class="inner-box">
                                    <div class="icon"><span class="icon-envelope"></span></div>
                                    <h4>Request a Feature</h4>
                                    <div class="text">Consectetur adipiscing elit, sed do eiusmod <br> temp incididunt labore et dolore magna aliqua. ipsum suspendisse.</div>
                                    <div class="link-btn"><a href="#" class="btn-style-one"><span> Read More</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fadeInUp animated" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="element-block">
                            <div class="element-title">
                                <div class="left-content">
                                    <div class="icon"><span class="dashicons dashicons-category"></span></div>
                                    <h4>Elements</h4>
                                </div>
                                <div class="right-content">
                                    <div class="element-control-btn">
                                        <button class="btn-style-one enable-btn" data-control="elements-self" type="button"><span>Enable All</span></button>
                                        <button class="btn-style-one disable-btn" data-control="elements-self" type="button"><span>Disable All</span></button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
								<?php foreach ( elmpath()->get_widgets_options( 'self' ) as $option_id => $label ) : ?>
                                    <div class="col-lg-4 col-md-6 single-element-column elements-self">
                                        <div class="single-element-content">
                                            <h4><?php echo esc_html( $label ); ?></h4>
                                            <div class="switch-button">
												<?php printf( '<input name="elmpath_elements_active[]" value="%1$s" id="%1$s" type="checkbox" %2$s/><label for="%1$s"></label>',
													$option_id, in_array( $option_id, elmpath()->get_option( 'elmpath_elements_active', array() ) ) ? 'checked' : ''
												); ?>
                                            </div>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <button class="btn-style-one" type="submit"><span>Save Changes</span></button>
                        </div>
                    </div>

                    <div class="tab-pane fadeInUp animated" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="element-block">
                            <div class="element-title">
                                <div class="left-content">
                                    <div class="icon"><span class="icon-extention"></span></div>
                                    <h4>Extensions</h4>
                                </div>
                                <div class="right-content">
                                    <div class="element-control-btn">
                                        <button class="btn-style-one enable-btn" data-control="elements-external" type="button"><span>Enable All</span></button>
                                        <button class="btn-style-one disable-btn" data-control="elements-external" type="button"><span>Disable All</span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
								<?php foreach ( elmpath()->get_widgets_options( 'external' ) as $option_id => $label ) : ?>
                                    <div class="col-lg-4 col-md-6 single-element-column elements-external">
                                        <div class="single-element-content">
                                            <h4><?php echo esc_html( $label ); ?></h4>
                                            <div class="switch-button">
												<?php printf( '<input name="elmpath_elements_active[]" value="%1$s" id="%1$s" type="checkbox" %2$s/><label for="%1$s"></label>',
													$option_id, in_array( $option_id, elmpath()->get_option( 'elmpath_elements_active', array() ) ) ? 'checked' : ''
												); ?>
                                            </div>
                                        </div>
                                    </div>
								<?php endforeach; ?>
                            </div>
                            <button class="btn-style-one" type="submit"><span>Save Changes</span></button>
                        </div>
                    </div>

                    <div class="tab-pane fadeInUp animated" id="tab-four" role="tabpanel" aria-labelledby="tab-four">
                        <div class="element-title">
                            <div class="left-content">
                                <div class="icon"><span class="icon-tools"></span></div>
                                <h4>Tools</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 feature-block">
                                <div class="inner-box">
                                    <div class="icon"><span class="icon-tools-2"></span></div>
                                    <h4>Regenerate All</h4>
                                    <div class="text">Consectetur adipiscing elit, sed do eiusmod <br> temp incididunt labore et dolore magna aliqua. ipsum suspendisse.</div>
                                    <div class="link-btn"><a href="#" class="btn-style-one"><span> Read More</span></a></div>
                                    <div class="shape"><?php printf( '<img src="%sassets/images/shape-1.png" alt="%s">', ELMPATH_PLUGIN_URL, esc_html( 'Documentation' ) ); ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6 feature-block">
                                <div class="inner-box">
                                    <div class="icon"><span class="icon-tools-3"></span></div>
                                    <h4>Request a Feature</h4>
                                    <div class="text">Consectetur adipiscing elit, sed do eiusmod <br> temp incididunt labore et dolore magna aliqua. ipsum suspendisse.</div>
                                    <div class="link-btn"><a href="#" class="btn-style-one"><span> Read More</span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<?php wp_nonce_field( 'elmpath_nonce_action', 'elmpath_nonce' ); ?>
</form>
