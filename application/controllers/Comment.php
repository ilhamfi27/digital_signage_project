<?php
class Comment extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("comment_model", "comment_m");
    }

    public function insert(){
        $comment            = $this->input->post('comment');
        $object_id          = $this->input->post('object_id');
        $commented_object   = $this->input->post('commented_object');
        $user_id            = $this->input->post('user_id');
        /**
         *   `content`,
         *   `commented_object`,
         *   `object_id`,
         *   `user_id`,
         *   `date_time`
         */
        $comment_data = [
            'content' => $comment,
            'commented_object' => $commented_object,
            'object_id' => $object_id,
            'user_id' => $user_id,
            'date_time' => $this->local_timestamp()
        ];
        if ($this->comment_m->insert($comment_data) > 0) {
            redirect("theme/details/" . $object_id);
        } else {
            redirect("theme/details/" . $object_id);
        }
        
    }
}
