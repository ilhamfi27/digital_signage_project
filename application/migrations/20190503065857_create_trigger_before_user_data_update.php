<?php
class Migration_create_trigger_before_user_data_update extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE OR REPLACE TRIGGER before_user_data_update
        BEFORE UPDATE ON user_data
        FOR EACH ROW
        BEGIN
            SELECT 
                u.`user_id`,
                `username`,
                `email`,
                `first_name`,
                `last_name`,
                `birth_date`,
                `gender`,
                `avatar`
            INTO 
                @v_user_id,
                @v_username,
                @v_email,
                @v_first_name,
                @v_last_name,
                @v_birth_date,
                @v_gender,
                @v_avatar
            FROM user_data ud
            RIGHT JOIN users u ON u.`user_id` = ud.`user_id`
            WHERE u.user_id = OLD.user_id;
            INSERT INTO `digital_signage`.`user_history` (
                `user_id`,
                `first_name`,
                `last_name`,
                `birth_date`,
                `gender`,
                `avatar`,
                `username`,
                `email`
            )
            VALUES
            (
                @v_user_id,
                @v_first_name,
                @v_last_name,
                @v_birth_date,
                @v_gender,
                @v_avatar,
                @v_username,
                @v_email
            );
        END
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TRIGGER IF EXISTS before_user_data_update;
        ";
        $this->db->query($sql);
    }
}
