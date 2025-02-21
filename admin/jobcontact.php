<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/customer.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$fm = new Format();
	$cs = new customer();
	$show_contact_job = $cs -> show_contact_job();
	if(isset($_GET['postid'])){
		$id = $_GET['postid'];
		$delpost = $ps->del_post($id);
	}
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Hỗ trợ khách hàng</h2>
    <div class="block">
      <?php // if(isset($delpost)){echo $delpost ;} ?>
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Id</th>
            <th>Tên ứng viên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Nội dung</th>
            <th>Chỉnh/Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php 
					if($show_contact_job) {
						$i=0;
						while($resule = $show_contact_job -> fetch_assoc()){
							$i++;
				?>
          <tr class="odd gradeX" style="text-align: center;">
            <td><?php echo $i ?> </td>
            <td><?php echo $resule['fullname'] ?></td>
            <td><?php echo $resule['phone'] ?></td>
            <td><?php echo $resule['email'] ?></td>
            <td><?php
            echo $resule['content'];
            ?></td>
            <td><a href="#">Chỉnh Sửa</a> || <a
                href="#"
                onclick="return confirm('Bạn có muốn xoá không?')">Xóa</a></td>
          </tr>
          <?php } } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- <script type="text/javascript">
$(document).ready(function() {
  setupLeftMenu();
  $('.datatable').dataTable();
  setSidebarHeight();
}); -->
</script>
<?php include 'inc/footer.php';?>