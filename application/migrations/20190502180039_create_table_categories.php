<?php
class Migration_create_table_categories extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `categories` (
            `id_category` int(11) NOT NULL AUTO_INCREMENT,
            `category_name` varchar(255) NOT NULL,
            PRIMARY KEY (`id_category`)
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `categories`
        ";
        $this->db->query($sql);
    }
}
