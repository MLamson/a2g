<?php
class Concepts_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_concepts($slug = FALSE)
				{
	        if ($slug === FALSE)
	        {
	                $query = $this->db->get('concepts');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('concepts', array('slug' => $slug));
	        return $query->row_array();
				}

				public function set_concepts()
				{
				    $this->load->helper('url');

				    $slug = url_title($this->input->post('title'), 'dash', TRUE);

				    $data = array(
				        'title' => $this->input->post('title'),
				        'slug' => $slug,
				        'text' => $this->input->post('text')
				    );

				    return $this->db->insert('concepts', $data);
				}

}