<?php
class Migration_alter_table_user_add_column_user_level extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }
    public function up(){
        $this->dbforge->add_column('users',[
            'level' => [
                'type' => 'varchar',
                'constraint' => 12,
                'default' => 'user',
                'null' => FALSE
            ]
        ]);
    }

    public function down(){
        $this->dbforge->drop_column('users', 'level');
    }
}
