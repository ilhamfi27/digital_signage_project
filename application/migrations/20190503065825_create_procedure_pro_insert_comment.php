<?php
class Migration_create_procedure_pro_insert_comment extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE OR REPLACE PROCEDURE pro_insert_comment(
            param_content_comment TEXT,
            param_id_plugin INT(5),
            param_user_id INT(5)
        )
        BEGIN
            INSERT INTO `comments` (
            `content_comment`,
            `id_plugin`,
            `user_id`,
            `date_time`
            )
            VALUES
            (
                param_content_comment,
                param_id_plugin,
                param_user_id,
                NOW()
            );
        END
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP PROCEDURE IF EXISTS pro_insert_comment;
        ";
        $this->db->query($sql);
    }
}
