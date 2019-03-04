<!-- 006_alter_table_users_change_column_password.php -->
<?php
class Migration_alter_table_users_change_column_password extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    } 
    public function up(){
        $fields = array(
            'password' => array(
                    'name' => 'password',
                    'type' => 'varchar',
                    'constraint' => 255
                ),
            );
        $this->dbforge->modify_column('users', $fields);
    }

    public function down(){
        $fields = array(
            'password' => array(
                    'name' => 'password',
                    'type' => 'varchar',
                    'constraint' => 255
                ),
            );
        $this->dbforge->modify_column('users', $fields);
    }
}
