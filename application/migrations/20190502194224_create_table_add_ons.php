<?php
class Migration_create_table_add_ons extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `add_ons` (
            `id_plugin` int(11) NOT NULL,
            `price` int(11) NOT NULL,
            KEY `id_plugin` (`id_plugin`),
            CONSTRAINT `add_ons_ibfk_1` FOREIGN KEY (`id_plugin`) REFERENCES `plugins` (`id_plugin`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `add_ons`
        ";
        $this->db->query($sql);
    }
}
