<?php
class Migration_create_table_history_add_ons extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `history_add_ons` (
            `id_history` int(11) NOT NULL,
            `id_plugin` int(11) NOT NULL,
            `id_category` int(11) DEFAULT NULL,
            `id_creator` int(11) DEFAULT NULL,
            `uploaded` varchar(255) DEFAULT NULL,
            `description` text,
            `title` varchar(255) DEFAULT NULL,
            `ratings` varchar(255) DEFAULT NULL,
            `date` date DEFAULT NULL,
            `price` int(11) DEFAULT NULL,
            `history_created_at` datetime NOT NULL
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `history_add_ons`
        ";
        $this->db->query($sql);
    }
}
