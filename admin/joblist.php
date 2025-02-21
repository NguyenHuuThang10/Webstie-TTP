<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/job.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$fm = new Format();
	$job = new job();
	$show_job = $job -> show_job_admin();
	if(isset($_GET['jobid'])){
		$id = $_GET['jobid'];
		$deljob = $job->del_job($id); 
	}
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Liệt kê bài tuyển dụng</h2>
    <div class="block">
      <?php if(isset($deljob)){echo $deljob ;} ?>
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Id</th>
            <th>Vị trí</th>
            <th>Địa điểm</th>
            <th>Nội dung</th>
            <th>Lượt xem</th>
            <th>Hình ảnh</th>
            <th>Chỉnh/Xóa</th>
          </tr>
        </thead>
        <tbody style="text-align: center;">
          <?php 
					if($show_job) {
						$i=0;
						while($resule = $show_job -> fetch_assoc()){
							$i++;
				?>
          <tr class="odd gradeX">
            <td><?php echo $i ?> </td>
            <td><?php echo $resule['tuyendung_name'] ?></td>
            <td><?php echo $resule['tuyendung_location'] ?></td>
            <td><?php
            $htmlspecialchars = $fm -> textShorten($resule['tuyendung_noidung'],100) ;
            echo htmlspecialchars($htmlspecialchars);
            ?></td>
            <td><?php echo $resule['tuyendung_luotxem'] ?></td>
            <td><img src="../img/<?php echo $resule['tuyendung_img'] ?>" alt="" width='100' height='100'></td>
            <td><a href="jobedit.php?jobid=<?php echo $resule['tuyendung_id'] ?>">Chỉnh Sửa</a> || <a
                href="?jobid=<?php echo $resule['tuyendung_id'] ?>"
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