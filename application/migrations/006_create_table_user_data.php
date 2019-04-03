<?php
class Migration_create_table_user_data extends CI_Migration {
    public function __construct() {
		parent::__construct();
        $this->load->dbforge();
    }

    public function up(){
        $this->dbforge->add_field(
            [
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => TRUE,
                    'null' => FALSE
                ],
                'first_name' => [
                    'type' => 'varchar',
                    'constraint' => 30,
                ],
                'last_name' => [
                    'type' => 'varchar',
                    'constraint' => 30,
                ],
                'birth_date' => [
                    'type' => 'date',
                ],
                'gender' => [
                    'type' => 'char',
                    'constraint' => 1,
                ],
                'avatar' => [
                    'type' => 'varchar',
                    'constraint' => 255,
                ]
            ]
        );
        $this->dbforge->add_key('user_id', FALSE);
        $this->dbforge->create_table('user_data', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('user_data');
    }
}
