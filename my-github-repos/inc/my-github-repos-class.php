<?php

class My_Github_Repos extends WP_Widget{
    public $fields;
    function __construct()
    {
        $this->fields = ['title','username','count'];
        parent::__construct('my_github_repos','My Github Repos',['description' => 'A Github repository widget']);
    }
    public function widget($args,$instance){
        echo $this->showRepos($instance);
    }
    public function form($instance){
        foreach($this->fields as $field){
            ${$field}   = $instance[$field];
            $field_id   = $this->get_field_id($field);
            $field_name = $this->get_field_name($field);
            echo "
                <label for='$field_id'>".ucfirst($field).":</label>
                <input type='text' class='widefat' id='$field_id' name='$field_name' value='".esc_html(${$field})."'>
            ";
        }

    }
    public function update($new_instance,$old_instance){
        $instance = [];
		foreach($this->fields as $field){
			 $instance[$field] =  !empty($new_instance[$field]) ? strip_tags($new_instance[$field]): '';
		}
		return $instance;
    }

    public function showRepos($instance){
        foreach($this->fields as $field){
            ${$field}   = $instance[$field];
        }
        $url = "https://api.github.com/users/$username/repos?sort=created&per_page=$count";
        $options = ['http' => ['user_agent'=> $_SERVER['HTTP_USER_AGENT']]];
        $context = stream_context_create($options);
        $response = file_get_contents($url,false,$context);
        $repos = json_decode($response);

        //Build Output
        $output = "<ul class='repos'>";
        foreach($repos as $repo){
            $output .= "
                <li>
                    <div class='repo-title'><a href='$repo->html_url' target='_blank'>$repo->name</a></div>
                    <div class='repo-dec'>$repo->description</div>
                </li>
            ";
        }
        $output .= "</ul>";
        return $output;
    }
}

function herhesh_mgr_register_widget(){
    register_widget('my_github_repos');
}
add_action('widgets_init','herhesh_mgr_register_widget');