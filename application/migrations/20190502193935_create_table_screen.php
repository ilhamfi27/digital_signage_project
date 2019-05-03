<?php
class Migration_create_table_screen extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `screen` (
            `id_screen` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `location` varchar(255) NOT NULL,
            `timezone` datetime NOT NULL
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `screen`
        ";
        $this->db->query($sql);
    }   
}
