<?php
class Migration_create_procedure_add_ons extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up() {
        $sql = "
        CREATE PROCEDURE `add_ons` (IN `id` INT)
        BEGIN
            SELECT 
            add_ons.price, 
            plugins.photo_icon, 
            plugins.description, 
            plugins.title, 
            plugins.rating, 
            tgl(plugins.uploaded_date) as date, 
            creators.name, 
            plugins.id_plugin, 
            plugins.id_creator
            FROM add_ons 
            JOIN plugins ON add_ons.id_plugin = plugins.id_plugin 
            JOIN creators on creators.id_creator = plugins.id_creator 
            WHERE plugins.id_plugin = id ;
        END
        ";
        $this->db->query($sql);
    }

    public function down() {
        $sql = "
        DROP PROCEDURE IF EXISTS add_ons;
        ";
        $this->db->query($sql);
    }
}
