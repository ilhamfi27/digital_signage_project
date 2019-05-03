<?php
class Comment extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("comment_model", "comment_m");
        $this->load->model("plugin_model", "plugin_m");
    }

    public function insert(){
        $content_comment    = $this->input->post('content_comment');
        $id_plugin          = $this->input->post('id_plugin');
        $user_id            = $this->input->post('user_id');

        $plugin             = $this->plugin_m->detailed_plugin($id_plugin)->row();

        $comment_data = [
            'content_comment' => $content_comment,
            'id_plugin' => $id_plugin,
            'user_id' => $user_id,
            'date_time' => $this->local_timestamp()
        ];

        $redirect_url = "";
        if ($plugin->type == "add_on") {
            $redirect_url = "add_ons_new/details/";
        } else if ($plugin->type == "theme"){
            $redirect_url = "theme/details/";
        }
        if ($this->comment_m->insert($comment_data) > 0) {
            redirect($redirect_url . $id_plugin);
        } else {
            redirect($redirect_url . $id_plugin);
        }
        
    }
}
