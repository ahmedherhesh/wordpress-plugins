<?php
//create menu link

function herhesh_options_menu_link()
{
    add_options_page(
        'Facebook Footer Link options',
        'Facebook Footer Link',
        'manage_options',
        'herhesh_options',
        'herhesh_options_content'
    );
}
function herhesh_register_settings()
{
    register_setting('herhesh_settings_group', 'herhesh_settings');
}
add_action('admin_menu', 'herhesh_options_menu_link');
add_action('admin_init', 'herhesh_register_settings');

//content
function herhesh_options_content()
{
    global $herhesh_options;
?>
    <h1 style=' text-align:center;
                    color:#fff;
                    background-color:#2271b1;
                    padding:20px;
                    cursor:pointer;
                    margin-right:20px'>
        Facebook Footer Link Settings
    </h1>
    <form action="options.php" method="post">
        <?php settings_fields('herhesh_settings_group'); ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="herhesh_settings[enable]">Enable</label></th>
                    <td>
                        <input type="checkbox" name="herhesh_settings[enable]" id="herhesh_settings[enable]" value="1" <?php checked("1", $herhesh_options['enable']) ?>>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="herhesh_settings[facebook_uri]">Facebook Profile URI</label></th>
                    <td>
                        <input type="text" name="herhesh_settings[facebook_uri]" id="herhesh_settings[facebook_uri]" value="<?php echo $herhesh_options['facebook_uri']; ?>" <?php checked("1", $herhesh_options['facebook_uri']) ?>>
                        <p class="description">Enter Your Facebook Profile URI</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="herhesh_settings[facebook_link_color]">Facebook Profile Link Color</label></th>
                    <td>
                        <input type="text" name="herhesh_settings[facebook_link_color]" id="herhesh_settings[facebook_link_color]" value="<?php echo $herhesh_options['facebook_link_color']; ?>" <?php checked("1", $herhesh_options['facebook_uri']) ?>>
                        <p class="description">Enter Your Facebook Link Color</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="herhesh_settings[show_in_feed]">Show In Feed</label></th>
                    <td>
                        <input type="checkbox" name="herhesh_settings[show_in_feed]" id="herhesh_settings[show_in_feed]" value="1" <?php checked("1", $herhesh_options['show_in_feed']) ?>>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit" name="submit" id="submit" class="button button-primary">Save Changes</button>
    </form>
<?php
}
