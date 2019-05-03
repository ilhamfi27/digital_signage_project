<?php
class Migration_create_function_tgl extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE FUNCTION `tgl` (`tgl` VARCHAR(191)) RETURNS VARCHAR(191) DETERMINISTIC
        BEGIN
            RETURN(date_format(tgl, '%d %M %Y'));
        END
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP FUNCTION IF EXISTS tgl;
        ";
        $this->db->query($sql);
    }
}
