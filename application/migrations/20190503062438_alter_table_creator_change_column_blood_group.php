<?php
class Migration_alter_table_creator_change_column_blood_group extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        ALTER TABLE `creators`
            CHANGE `blood_group` `blood_type` VARCHAR(255) NOT NULL
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        ALTER TABLE `creators`
            CHANGE `blood_type` `blood_group` VARCHAR(255) NOT NULL
        ";
        $this->db->query($sql);
    }
}
