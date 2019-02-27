<?php
class Migration_create_table_theme extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }
    // CREATE TABLE `theme` (
    //   `id_theme` int(5) NOT NULL,
    //   `url` varchar(255) NOT NULL
    // ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    public function up(){
        $this->dbforge->add_field(
            [
                'id_theme' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'auto_increment' => TRUE
                ],
                'url' => [
                    'type' => 'varchar',
                    'constraint' => 255
                ]
            ]
        );
        $this->dbforge->add_key('id_theme', TRUE);
        $this->dbforge->create_table('theme', TRUE);
    }

    public function down(){
        $this->dbforge->drop_table('theme');
    }
}
