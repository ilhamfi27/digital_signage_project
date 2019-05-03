<?php
class Migration_create_function_func_get_user_fullname extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE OR REPLACE FUNCTION func_get_user_fullname(
            param_user_id INT(5)
        ) RETURNS VARCHAR(60) DETERMINISTIC
        BEGIN
            DECLARE v_full_name VARCHAR(60);
            SELECT
                CONCAT(`first_name`, \" \",`last_name`) INTO v_full_name
            FROM user_data
            WHERE user_id = param_user_id;
            IF v_full_name IS NULL THEN
                SELECT
                    username INTO @username
                FROM users
                WHERE user_id = param_user_id;
                RETURN @username;
            ELSE
                RETURN v_full_name;
            END IF;
        END
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP FUNCTION IF EXISTS func_get_user_fullname;
        ";
        $this->db->query($sql);
    }
}
