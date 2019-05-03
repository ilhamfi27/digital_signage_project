<?php
class Migration_create_table_content_category extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `content_category` (
            `id_content_category` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `category` varchar(255) NOT NULL
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `content_category`
        ";
        $this->db->query($sql);
    }
}
