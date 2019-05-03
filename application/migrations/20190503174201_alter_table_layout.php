<?php
class Migration_alter_table_layout extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        ALTER TABLE `layout` 
            CHANGE `url` `image` VARCHAR(255) NOT NULL, 
            CHANGE `name` `position` VARCHAR(255) NOT NULL;
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        ALTER TABLE `layout` 
            CHANGE `image` `url` VARCHAR(255) NOT NULL, 
            CHANGE `position` `name` VARCHAR(255) NOT NULL;
        ";
        $this->db->query($sql);
    }
}
