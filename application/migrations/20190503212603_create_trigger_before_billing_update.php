<?php
class Migration_create_trigger_before_billing_update extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE or REPLACE TRIGGER before_billing_update
        before update on billing
        for each ROW
        BEGIN
        INSERT INTO `history_billing`SET `id_billing`=old.id_billing,`user_id`=old.user_id,`id_package`=old.id_package,`duration_first`=old.duration_first,`duration_last`=old.duration_last,`email`=old.email,`name`=old.name,`status`=old.status;
        end
         ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP TRIGGER IF EXISTS before_billing_update;
        ";
        $this->db->query($sql);
    }
}

