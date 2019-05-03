<?php
class Migration_create_trigger_before_content_update extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

  public function up() {
        $sql = "
        create or REPLACE TRIGGER before_content_update
        before update on content 
        for each ROW
        BEGIN
            INSERT INTO history_content SET `id_content`= old.id_content,`id_content_category`=old.id_content_category,`description`=old.description,`date`=old.date,`subject`=old.subject,`file`=old.file,`user_id`=old.user_id;
        end
         ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TRIGGER IF EXISTS before_content_update;
        ";
        $this->db->query($sql);
    }
}

