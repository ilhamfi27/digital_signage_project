<?php
class Migration_create_procedure_p_view_admin extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE  PROCEDURE `p_view_admin` ()  BEGIN
        SELECT `id_billing`, `user_id`, `id_package`, tgl(duration_first) as duration_first, tgl(duration_last) as duration_last, `email`, `name`, `status`FROM billing;
        END";
        $this->db->query($sql);

    }

    public function down() {
        $sql = "
        DROP PROCEDURE IF EXISTS p_view_admin ;
        ";
     
        $this->db->query($sql);
      
    }
}

