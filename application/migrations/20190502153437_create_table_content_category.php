<?php
class Migration_create_table_content_category extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }

    public function up(){
        $this->dbforge->add_field(
            [
                'id_content_category' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE,
                    'null' => FALSE
                ],
                'category' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ]
            ]
        );
        $this->dbforge->add_key('id_content_category', FALSE);
        $this->dbforge->create_table('content_category', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('content_category');
    }
}
