<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/job.php';?>
<?php
	$job = new job();
  if(isset($_GET['jobid']) && $_GET['jobid']!=NULL){
        $id = $_GET['jobid'];
    }
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$updatejob = $job->update_job($_POST,$_FILES,$id);
	}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Sửa bài tuyển dụng</h2>
    <div class="block">
      <?php 
          if(isset($updatejob)){echo $updatejob ;}
      ?>
      <?php
          $get_job_by_id = $job->getjobbyId($id);
          if($get_job_by_id){
              while($result_job = $get_job_by_id->fetch_assoc()){

      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Vị trí</label>
            </td>
            <td>
              <input type="text" placeholder="Vị trí" class="medium" name="tuyendung_name"
                value="<?php echo $result_job['tuyendung_name'] ?>" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Địa điểm</label>
            </td>
            <td>
              <input type="text" placeholder="Địa điểm" class="medium" name="tuyendung_location"
                value="<?php echo $result_job['tuyendung_location'] ?>" />
            </td>
          </tr>


          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Nội dung</label>
            </td>
            <td>
              <textarea class="ckeditor" name="tuyendung_noidung">
              <?php echo $result_job['tuyendung_noidung'] ?>
              </textarea>
            </td>

          </tr>
          <tr>
            <td>
              <label>Ngày</label>
            </td>
            <td>
              <input type="date" placeholder="Ngày" class="medium" name="tuyendung_date"
                value="<?php echo $result_job['tuyendung_date'] ?>" />
            </td>
          </tr>

          <tr>
            <td>
              <label>URL</label>
            </td>
            <td>
              <input value="<?php echo $result_job['tbl_url'] ?>" type="text" placeholder="vi-du-gia-bao-duong-phen"
                class="medium" name="url" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Lượt xem</label>
            </td>
            <td>
              <input type="text" placeholder="Lượt xem" class="medium" name="tuyendung_luotxem"
                value="<?php echo $result_job['tuyendung_luotxem'] ?>" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Tải ảnh lên</label>
            </td>
            <td>
              <img src="../img/<?php echo $result_job['tuyendung_img'] ?>" alt="" width='150' height='120'><br>
              <input type="file" name="img" />
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input type="submit" name="submit" Value="Cập nhật" />
            </td>
          </tr>
        </table>
      </form>
    </div>
    <?php } } ?>
  </div>
</div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  setupTinyMCE();
  setDatePicker('date-picker');
  $('input[type="checkbox"]').fancybutton();
  $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>