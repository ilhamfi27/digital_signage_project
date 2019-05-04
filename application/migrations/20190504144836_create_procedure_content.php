<?php
class Migration_create_procedure_content extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql1 = "
        CREATE PROCEDURE `content` (IN `uid` INT)  BEGIN
         SELECT `id_content`, `id_content_category`, `description`, tgl(date) as `date`, `subject`, `file`, `user_id`, content_category.* FROM content JOIN content_category using(id_content_category) WHERE user_id = uid;
        END";
        $this->db->query($sql1);

        $sql2 ="
        CREATE PROCEDURE `content_join` ()  BEGIN
        SELECT `id_content`, content.id_content_category, `description`, tgl(date) as `date`, `subject`, `file`, `user_id`, content_category.* FROM content JOIN content_category on content_category.id_content_category = content.id_content_category;
        END";
        $this->db->query($sql2);
    }

    public function down() {
        $sql1 = "
        DROP PROCEDURE IF EXISTS content;
        ";
        $sql2="
        DROP PROCEDURE IF EXISTS content_join;
        ";
        $this->db->query($sql1);
        $this->db->query($sql2);
    }
}
