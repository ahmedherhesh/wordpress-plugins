<?php
function herhesh_yvg_settings(){
    add_settings_section( 
        'yvg_settings_section',
        'Youtube Video Gallery Settings',
        'yvg_settings_section_callback',
        'reading' 
    );
    add_settings_field( 
        'yvg_setting_disable_fullscreen', 
        'Disable Fullscreen', 
        'yvg_disable_fullscreen_callback', 
        'reading', 
        'yvg_settings_section'
    );
    register_setting('reading','yvg_setting_disable_fullscreen');
}
add_action( 'admin_init', 'herhesh_yvg_settings');

function yvg_settings_section_callback(){
    echo "<p>Settings for Youtube Video Gallery</p>";
}
function yvg_disable_fullscreen_callback(){
    echo "<input type='checkbox' name='yvg_setting_disable_fullscreen' id='yvg_setting_disable_fullscreen' value='1' class='code' ". checked(1,get_option('yvg_setting_disable_fullscreen'),false) .">";
}