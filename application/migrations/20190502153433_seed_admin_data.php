<?php
class Migration_seed_admin_data extends CI_Migration {
    public function __construct() {
        parent::__construct();
        $this->load->dbforge();
    }
    public function up(){
        foreach ($this->seed_data_admin as $data) {
            $sql = "INSERT INTO `users` (
                `user_id`,
                `username`,
                `email`,
                `password`,
                `level`
            )
            VALUES
            (
                '". $data['user_id'] ."',
                '". $data['username'] ."',
                '". $data['email'] ."',
                '". $data['password'] ."',
                '". $data['level'] ."'
            );
            ";
            $this->db->query($sql);
        }
    }

    public function down(){
        $sql = "
        DELETE
            FROM
            `users`
            WHERE `user_id` = 1;
        ";
        $this->db->query($sql);
    }

    private $seed_data_admin = [
        [
            'user_id' => 1,
            'username' => 'admin',
            'password' => '21232f297a57a5a743894a0e4a801fc3',
            'email' => 'admin@labsi.telkomuniversity.ac.id',
            'level' => 'admin'
        ]
    ];
}
