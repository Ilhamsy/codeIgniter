<?php
    class Post_model extends CI_Model {
        public function tambahPost() {
            $data = array(
                'judul'=> $this->input->post('judul'),
                'sinopsis' => $this->input->post('sinopsis')
            );
            $this->db->insert('sinopsis_dongeng',$data);
        }
        public function getAllPost() {
            return $this->db
            ->select("id_sinopsis,judul,SUBSTRING(sinopsis,1,150) as sinopsis")
            ->get('sinopsis_dongeng')
            ->result_array();
        }
        public function getPosts($limit, $start, $keyword=null) {
            $keyword=$keyword;
            return $this->db
            ->select("id_sinopsis,judul,SUBSTRING(sinopsis,1,150) as sinopsis")
            ->like('judul', $keyword)
            ->order_by('id_sinopsis','asc')
            ->get('sinopsis_dongeng', $limit, $start)
            ->result_array();
            
        }
        public function countPosts($keyword=null) {
            return $this->db->like('judul', $keyword)->from('sinopsis_dongeng')->count_all_results();
        }
        public function getPostById($id) {
            return $this->db
            ->select("id_sinopsis,judul,sinopsis")
            ->where('id_sinopsis',$id)
            ->get('sinopsis_dongeng')
            ->result_array();
        }
        public function updatePost($id) {
            $data=array(
                'judul'=>$this->input->post('judul'),
                'sinopsis'=>$this->input->post('sinopsis')
            );

            $this->db->where('id_sinopsis', $id)->update('sinopsis_dongeng', $data);
        }
        public function hapusPost($id) {
            $this->db
            ->where('id_sinopsis',$id)
            ->delete('sinopsis_dongeng');
        }
        public function lihat($id) {
            return $this->db
            ->where('id_sinopsis',$id)
            ->get('sinopsis_dongeng')->result_array();
        }
    }