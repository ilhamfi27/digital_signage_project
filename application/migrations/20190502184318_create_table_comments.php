<?php
class Migration_create_table_comments extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE TABLE `comments` (
            `id_comment` int(11) NOT NULL AUTO_INCREMENT,
            `content_comment` text NOT NULL,
            `id_plugin` int(11) NOT NULL,
            `user_id` int(11) NOT NULL,
            `date_time` datetime NOT NULL,
            PRIMARY KEY (`id_comment`),
            KEY `object_id` (`id_plugin`),
            KEY `user_id` (`user_id`),
            CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_plugin`) REFERENCES `plugins` (`id_plugin`) ON DELETE CASCADE ON UPDATE CASCADE,
            CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
        )
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TABLE `comments`
        ";
        $this->db->query($sql);
    }
}
