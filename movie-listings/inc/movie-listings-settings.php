<?php
function herhesh_ml_settings()
{
    add_settings_section('herhesh_ml_setting_section', 'Movie Listings Settings', 'herhesh_ml_setting_callback', 'reading');

    add_settings_field('ml_setting_show_editor', 'Show Editor', 'ml_setting_show_editor_callback', 'reading', 'herhesh_ml_setting_section');
    register_setting('reading',  'ml_setting_show_editor');

    add_settings_field('ml_setting_show_media_buttons', 'Show Media Buttons', 'ml_setting_show_media_buttons_callback', 'reading', 'herhesh_ml_setting_section');
    register_setting('reading', 'ml_setting_show_media_buttons');
}
add_action('admin_init', 'herhesh_ml_settings');

function herhesh_ml_setting_callback()
{
    echo "<p>Settings for the Movied Listings Plugins</p>";
}
function ml_setting_show_editor_callback()
{
    echo "
        <input type='checkbox' name='ml_setting_show_editor' id='ml_setting_show_editor' class='code' value='1' " . checked(1, get_option('ml_setting_show_editor'), false) . " >
        Choose if details should be an editor
    ";
}
function ml_setting_show_media_buttons_callback()
{
    echo "
        <input type='checkbox' name='ml_setting_show_media_buttons' id='ml_setting_show_media_buttons' class='code' value='1' " . checked(1, get_option('ml_setting_show_media_buttons'), false) . " >
        Choose if you need show media buttons or not
    ";
}
