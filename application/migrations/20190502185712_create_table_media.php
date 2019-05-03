<?php
class Migration_create_table_media extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `media` (
            `id_media` int(11) NOT NULL AUTO_INCREMENT,
            `file_name` varchar(255) NOT NULL,
            `url` varchar(255) NOT NULL,
            `type` varchar(30) NOT NULL,
            `media_for` int(11) NOT NULL,
            PRIMARY KEY (`id_media`),
            KEY `media_for` (`media_for`),
            CONSTRAINT `media_ibfk_1` FOREIGN KEY (`media_for`) REFERENCES `plugins` (`id_plugin`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `media`
        ";
        $this->db->query($sql);
    }
}
