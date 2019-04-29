<?php
class Migration_create_table_content extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up(){
        $this->dbforge->add_field(
            [
                'id_content' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE,
                    'null' => FALSE
                ],
                'id_content_category' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ],
                'description' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ],
                'date' => [
                    'type' => 'date',
                    
                ],
                'subject' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ],
                'file' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                ]
            ]
        );
        $this->dbforge->add_key('id_content', FALSE);
        $this->dbforge->create_table('content', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('content');
    }
}
