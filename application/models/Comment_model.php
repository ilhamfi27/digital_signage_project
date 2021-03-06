<?php
class Comment_model extends CI_Model {
    private $table = "comments";
    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        $sql = "CALL pro_insert_comment(?,?,?)";
        $this->db->query($sql, [
            $data['content_comment'],
            $data['id_plugin'],
            $data['user_id']
        ]);
        return $this->db->affected_rows();
    }

    public function object_comments($id) {
        $sql = "
        SELECT 
            `content_comment`,
            c.`id_plugin`,
            c.`user_id`,
            DATE_FORMAT(`date_time`, \"%M %d %Y %H:%m:%s\") AS date_time,
            username,
            func_get_user_fullname(c.user_id) AS full_name,
            `avatar` AS user_avatar
        FROM `comments` c
        JOIN `users` u ON u.`user_id` = c.`user_id`
        LEFT JOIN `user_data` ud ON ud.`user_id` = u.`user_id`
        WHERE c.`id_plugin` = ".$id."
        ORDER BY 4 DESC
        ";
        return $this->db->query($sql);
    }
}
