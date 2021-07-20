<div>
    <h1>Institute Integration Settings</h1>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container row mt-sm-3">
                <div class="col-sm-9">
                    <form method="post" action="options.php">
                        
                        <?php
                            settings_fields('sc_system');

                            //output
                            do_settings_sections('sc_system');

                            //save settings button
                            submit_button('Save Settings');
                        ?>
                    </form>
                </div>
                <div class="col-sm-3 bg-secondary">
                    Hello
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">profile</div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">contact</div>
    </div>
</div>
<?php
    /**
    *Settings Template
    */

    function plugin_setting_init(){
        //setting setup section
        add_settings_section(
            'plugin_settings_section',
            'plugin_settings_page',
            '',
            'sc_system'
        );

        //register fields
        register_setting(
            'sc_system',
            'plugin_settings_input_field',
            array(
                'type'=>'string',
                'sanitize_callback'=>'sanitize_text_field',
                'default'=>''
            )
        );
        //Add setting field
        add_settings_field(
            'plugin_settings_input_field',
            __('Input Field', 'my-plugin'),
            'plugin_settings_input_field_callback',
            'sc_system',
            'plugin_settings_section'
        );
    }

    add_action('admin_init','plugin_setting_init' );
    
    
    function plugin_settings_input_field_callback(){
        $plugin_input_field = get_option('plugin_settings_input_field');
        ?>
        <input type="text" name="plugin_settings_input_field" value="<?php echo isset($plugin_input_field) ?  esc_attr($plugin_input_field) : ''; ?>"/>
    <?php
    }

