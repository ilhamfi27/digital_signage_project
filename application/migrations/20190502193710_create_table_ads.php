<?php
class Migration_create_table_ads extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `ads` (
            `id_ads` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `description` text NOT NULL,
            `status` varchar(255) NOT NULL,
            `subject` varchar(255) NOT NULL
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `ads`
        ";
        $this->db->query($sql);
    }
}
