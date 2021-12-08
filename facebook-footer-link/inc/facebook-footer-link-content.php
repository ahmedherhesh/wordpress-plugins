<?php
function herhesh_add_footer($content)
{
   global $herhesh_options;
   $footer_output = "<div class='footer_content'>
                        <hr>
                        <span class='dashicons dashicons-facebook'></span>
                        <a target=_blank style='color:$herhesh_options[facebook_link_color];' href='$herhesh_options[facebook_uri]'>Find me On Facebook</a>
                     </div>";
   if ($herhesh_options['enable']) {
      if ($herhesh_options['show_in_feed']) {
         return "$content $footer_output";
      } else {
         if (is_single()) {
            return "$content $footer_output";
         }
      }
   }
   return $content;
}
add_filter('the_content', 'herhesh_add_footer');
