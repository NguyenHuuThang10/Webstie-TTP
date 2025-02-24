<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/database.php');
    include_once ($filepath. '/../helpers/format.php');
?>
<?php
    class job {
        private $db;
        private $fm;
        public function __construct() {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function get_job($id){
            $query = "SELECT * FROM tbl_tuyendung WHERE tuyendung_id='$id' ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_all_job(){
            $query = "SELECT * FROM tbl_tuyendung ";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_job(){
            $so_tuyendung_trang = 5 ;
            if(!isset($_GET['trang'])) {
                $trang = 1;
            }else{
                $trang = $_GET['trang'];
            }
            $so_trang = ($trang-1)*$so_tuyendung_trang ;
            $query = "SELECT * FROM tbl_tuyendung ORDER BY tuyendung_id DESC LIMIT $so_trang,$so_tuyendung_trang" ;
            $result = $this->db->select($query);
            return $result;
        }

        public function show_job_admin(){
            $query = "SELECT * FROM tbl_tuyendung ORDER BY tuyendung_id DESC" ;
            $result = $this->db->select($query);
            return $result;
        }

        public function show_job_new(){
            $query = "SELECT * FROM tbl_tuyendung ORDER BY tuyendung_id DESC LIMIT 4 " ;
            $result = $this->db->select($query);
            return $result;
        }

        public function del_job($id) {
            $query = "DELETE FROM tbl_tuyendung WHERE tuyendung_id='$id' " ;
            $result = $this->db->delete($query);
            if($result){
                $alert= "<span class='success'>Đã xoá bài tuyển dụng</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'>lỗi</span>";
                return $alert;
            }
        }

        public function getjobbyId($id){
            $query = "SELECT * FROM tbl_tuyendung WHERE tuyendung_id='$id' " ;
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_job($data,$files){
            $tuyendung_name = mysqli_real_escape_string($this->db->link, $data['tuyendung_name']);
            $tuyendung_location = mysqli_real_escape_string($this->db->link,$data['tuyendung_location']);
            $tuyendung_noidung = mysqli_real_escape_string($this->db->link,$data['tuyendung_noidung']);
            $tuyendung_date = mysqli_real_escape_string($this->db->link,$data['tuyendung_date']);
            $url = mysqli_real_escape_string($this->db->link,$data['url']);
            $tuyendung_luotxem = mysqli_real_escape_string($this->db->link,$data['tuyendung_luotxem']);
            $permited = array('jpg','jpeg','png','gif');
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_temp = $_FILES['img']['tmp_name'];
                $div = explode('.',$file_name );
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                $uploaded_image = "../img/".$unique_image;
            if($tuyendung_name == "" || $tuyendung_location == "" || $tuyendung_noidung == "" || $tuyendung_date == "" || $tuyendung_luotxem == "" || $file_name == "" ) {
                $alert = "<span class='notok'>không được để trống</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "INSERT INTO tbl_tuyendung(tuyendung_name,tuyendung_location,tuyendung_noidung,tuyendung_date,tuyendung_luotxem,tuyendung_img,tbl_url) VALUES('$tuyendung_name','$tuyendung_location','$tuyendung_noidung','$tuyendung_date','$tuyendung_luotxem','$unique_image','$url')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Thất bại</span>";
                    return $alert;
                }
            }
            if(empty($tuyendung_name)) {
                $alert = "<span class='notok'>Thêm tên bài tuyển dụng</span>";
                return $alert;
            }else{
                $query = "INSERT INTO tbl_tuyendung(tuyendung_name) VALUES('$tuyendung_name')";
                $result = $this->db->insert($query);
                if($result){
                    $alert= "<span class='success'>Them thanh cong</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>That bai</span>";
                    return $alert;

                }
            }
        }

        public function update_job($data,$files,$id) {
            $tuyendung_name = mysqli_real_escape_string($this->db->link, $data['tuyendung_name']);
            $tuyendung_location = mysqli_real_escape_string($this->db->link,$data['tuyendung_location']);
            $tuyendung_noidung = mysqli_real_escape_string($this->db->link,$data['tuyendung_noidung']);
            $tuyendung_date = mysqli_real_escape_string($this->db->link,$data['tuyendung_date']);
            $tuyendung_luotxem = mysqli_real_escape_string($this->db->link,$data['tuyendung_luotxem']);
            $permited = array('jpg','jpeg','png','gif');
                $file_name = $_FILES['img']['name'];
                $file_size = $_FILES['img']['size'];
                $file_temp = $_FILES['img']['tmp_name'];

                $div = explode('.',$file_name );
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                $uploaded_image = "../img/".$unique_image;

            if($tuyendung_name == "" || $tuyendung_location == "" || $tuyendung_noidung == "" || $tuyendung_date == "" || $tuyendung_luotxem == "") {
                $alert = "<span class='notok'>không được để trống</span>";
                return $alert;
            }
            if(!empty($file_name)){
                // Nếu người dùng chọn ảnh
                if($file_size > 1048576) {
                    $alert= "<span class='notok'>Bạn không thể upload file quá 2MB!</span>";
                    return $alert;
                }elseif(in_array($file_ext,$permited)===false){
                    $alert= "<span class='notok'>Bạn chỉ có thể upload file cho phép:-".implode(',', $permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);
                // unlink($unique_image);
                $query = "UPDATE tbl_tuyendung SET 
                tuyendung_img = '$unique_image' ,
                tuyendung_name = '$tuyendung_name' ,
                tuyendung_location = '$tuyendung_location' ,
                tuyendung_noidung = '$tuyendung_noidung' ,
                tuyendung_date = '$tuyendung_date' ,
                tuyendung_luotxem = '$tuyendung_luotxem'
                WHERE tuyendung_id='$id' ";
            }else{
                // Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_tuyendung SET 
                tuyendung_location = '$tuyendung_location' ,
                tuyendung_name = '$tuyendung_name' ,
                tuyendung_noidung = '$tuyendung_noidung' ,
                tuyendung_date = '$tuyendung_date' ,
                tuyendung_luotxem = '$tuyendung_luotxem'
                WHERE tuyendung_id='$id' ";
            }

            $result = $this->db->update($query);
            if($result){
                $alert= "<span class='success'>Sửa thành công</span>";
                return $alert;
            }else{
                $alert= "<span class='notok'>That bai</span>";
                return $alert;
            }
            
            if(empty($tuyendung_name)) {
                $alert = "<span class='notok'>Mời bạn sửa tên đầy đủ</span>";
                return $alert;
            }else{
                $query = "UPDATE tbl_tuyendung SET tuyendung_name = '$tuyendung_name' WHERE tuyendung_id='$id' ";
                $result = $this->db->update($query);
                if($result){
                    $alert= "<span class='success'>Đã cập nhật</span>";
                    return $alert;
                }else{
                    $alert= "<span class='notok'>Cập nhật thất bại</span>";
                    return $alert;
                }
            }
        }
    }