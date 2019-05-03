<?php
class Migration_create_table_themes extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `themes` (
            `id_plugin` int(11) NOT NULL,
            `file_size` int(11) NOT NULL,
            KEY `id_plugin` (`id_plugin`),
            CONSTRAINT `themes_ibfk_1` FOREIGN KEY (`id_plugin`) REFERENCES `plugins` (`id_plugin`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `themes`
        ";
        $this->db->query($sql);
    }
}
