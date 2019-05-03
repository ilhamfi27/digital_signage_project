<?php  
class Theme_model extends CI_Model{
    private $table ="themes";
    public function __construct(){
        parent::__construct();
    }
    
    public function insert($data){
        $this->db->insert($this->table,$data);
        return $this->db->affected_rows();
    }

    public function delete($where){
        $this->db->where($where);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function all(){
        return $this->db->get_where($this->table);	
    }

    public function details($id){
        return $this->db->get_where($this->table,['id_plugin' => $id]);	
    }

    public function update($data,$where){
        $this->db->where(['id_plugin' => $where]);
        $this->db->update($this->table,$data);
        return $this->db->affected_rows();
    }

    public function new_last_id(){
        return $this->db->insert_id();
    }

    public function specific_theme_data($id = NULL) {
        $sql = "
        SELECT
            p.`id_plugin`,
            `uploaded_date`,
            `updated_date`,
            `title`,
            `description`,
            `rating`,
            `photo_icon`,
            ct.`id_creator`,
            `name`,
            c.`id_category`,
            `category_name`
        FROM `themes` t
        JOIN `plugins` p ON p.`id_plugin` = t.`id_plugin`
        JOIN `categories` c ON c.`id_category` = p.`id_category`
        JOIN `creators` ct ON ct.`id_creator` = p.`id_creator`
        ";
        if ($id == NULL)
            return $this->db->query($sql);

        return $this->db->query($sql . " WHERE p.`id_plugin` = " . $id);
        
    }
}
