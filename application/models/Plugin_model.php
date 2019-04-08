<?php  
class Plugin_model extends CI_Model{
    private $table ="plugins";
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
        return $this->db->get($this->table);
    }

    public function details($id){
        return $this->db->get_where($this->table,$id);	
    }

    public function update($data,$where){
        $this->db->where($where);
        $this->db->update($this->table,$data);
    }

    public function detailed_plugin($id = NULL){
        $sql = "
        SELECT
            p.`id` AS id,
            p.`title` AS title,
            p.`description` AS description,
            p.`rating` AS rating,
            c.`name` AS name,
            ct.`category_name` AS category_name,
            c.`email` AS email
        FROM `plugins` p
        JOIN `creators` c ON c.`id` = p.`id_creator`
        JOIN `categories` ct ON ct.`id` = p.`id_category`
        ";
        if ($id === NULL)
            return $this->db->query($sql);

        return $this->db->query($sql." WHERE p.`id` = ?", array($id));
        
    }
}
