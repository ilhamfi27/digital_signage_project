<?php
class Migration_create_table_content extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `content` (
            `id_content` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `id_content_category` int(11) NOT NULL,
            `description` varchar(255) NOT NULL,
            `date` date NOT NULL,
            `subject` varchar(255) NOT NULL,
            `file` varchar(255) NOT NULL,
            `user_id` int(11) DEFAULT NULL,
            KEY `id_content_category` (`id_content_category`),
            KEY `user_id` (`user_id`),
            CONSTRAINT `content_ibfk_1` FOREIGN KEY (`id_content_category`) REFERENCES `content_category` (`id_content_category`) ON UPDATE CASCADE,
            CONSTRAINT `content_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `content`
        ";
        $this->db->query($sql);
    }
}
