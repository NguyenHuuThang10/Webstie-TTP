<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/job.php';?>
<?php
	$job = new job();
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
		$insertJob = $job ->insert_job($_POST,$_FILES);
	}
?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Thêm bài tuyển dụng </h2>
    <div class="block">
      <?php if(isset($insertJob)){echo $insertJob ;} ?>
      <form action="jobadd.php" method="post" enctype="multipart/form-data">
        <table class="form">
          <tr>
            <td>
              <label>Vị trí</label>
            </td>
            <td>
              <input type="text" placeholder="Vị trí" class="medium" name="tuyendung_name" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Địa điểm</label>
            </td>
            <td>
              <input type="text" placeholder="Địa điểm" class="medium" name="tuyendung_location" />
            </td>
          </tr>


          <tr>
            <td style="vertical-align: top; padding-top: 9px;">
              <label>Nội dung</label>
            </td>
            <td>
              <textarea class="ckeditor" name="tuyendung_noidung"></textarea>
            </td>
          </tr>
          <tr>
            <td>
              <label>Ngày viết bài</label>
            </td>
            <td>
              <input type="date" placeholder="Ngày viết bài" class="medium" name="tuyendung_date" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Lượt xem</label>
            </td>
            <td>
              <input type="text" placeholder="Lượt xem" class="medium" name="tuyendung_luotxem" />
            </td>
          </tr>

          <tr>
            <td>
              <label>URL</label>
            </td>
            <td>
              <input type="text" placeholder="bai-viet-hay-nhat" class="medium" name="url" />
            </td>
          </tr>

          <tr>
            <td>
              <label>Tải ảnh lên</label>
            </td>
            <td>
              <input type="file" name="img" />
            </td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input type="submit" name="submit" Value="Thêm bài" />
            </td>
          </tr>
        </table>
      </form>
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