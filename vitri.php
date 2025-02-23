<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
spl_autoload_register(function ($class) {
  include_once "classes/" . $class . ".php";
});
$job = new job();
if (isset($_GET['jobid']) && $_GET['jobid'] != NULL) {
  $id = $_GET['jobid'];
}
$get_job = $job->get_job($id);
if ($get_job) {
  while ($get_title = $get_job->fetch_assoc()) {
    $title = $get_title['tuyendung_name'];
  }
}
include 'inc/header.php';
include 'inc/sale.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
  $insertContact = $cs->insert_contact_job($_POST);
}
?>
<div class="container">
  <div class="cart_background">
    <div class="row">
      <?php
      $get_job = $job->get_job($id);
      if ($get_job) {
        while ($result = $get_job->fetch_assoc()) {
      ?>
          <div class="col-12">
            <div class="mota_tuyendung">
              <div class="ten_baiviet text-center"><?php echo $result['tuyendung_name']; ?></div>
              <div class="clear20"></div>
              <div class="info_tintuc text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:12px;">
                  <path
                    d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z" />
                </svg>
                <span class="ngaytao">
                  <?php echo $result['tuyendung_date']; ?>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width:15px;">
                    <path
                      d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                  </svg>
                  <?php echo $result['tuyendung_luotxem']; ?>
                </span>
              </div>
              <div class="clear20"></div>
              <div class="mota"></div>
            </div>
            <div class="content_text noidungtd">
              <?php
              echo $result['tuyendung_noidung'];
              ?>
            </div>
          </div>
      <?php }
      } ?>
    </div>
  </div>
  <div class="clear40"></div>
  <div class="row">
    <div class="col-xl-6">
      <div class="register-wrap">
        <div class="register-form" id="dang-ky-ngay">
          <h3>Gửi Thông Tin Ứng tuyển</h3>
          <?php
          if (isset($insertContact)) {
            echo $insertContact;
          } else {
            echo "<div class='clear20'></div>";
          }
          ?>
          <form action="" method="post">
            <div class="form-group">
              <input type="text" name="fullname" class="form-control" placeholder="Họ và tên: " required>
            </div>
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="Điện thoại:" required>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email:" required>
            </div>
            <div class="form-group">
              <textarea id="txtmessage" name="content" class="form-control" placeholder="Nội dung: vị trí ứng tuyển, số năm kinh nghiệm, sơ nét về kinh nghiệm làm việc" required></textarea>
            </div>
            <div class="btn-register-wrap">
              <input type="submit" class="btn-regsiter-now" id="dangky" title="Gửi Thông Tin Hổ Trợ"
                value="Gửi Thông Tin" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="information-salanest">
        <a href="./" style="display:inline-block; text-align:center;">
          <img src="img/salanest2.png" alt="hình anh logo salanest" width="50%">
        </a>
        <p><strong>Địa chỉ:</strong> 16/5 Nguyễn Văn Bứa, Xuân Thới Sơn, Hóc Môn, Thành Phố Hồ Chí Minh.</p>
        <p><strong>Email:</strong> tuyendung@tienthinhphatgroup.com</p>
        <p>077.655.2604</p>
      </div>
      <div class="clear40"></div>
    </div>
  </div>
  <h2 class="cactinkhac">Tin liên quan :</h2>
  <ul>
    <li>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-return-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
      </svg>
      <a href="gioithieu.html" title="Giới Thiệu Công Ty SX TM XNK  NGK TIẾN THINH PHÁT  ">
        Giới Thiệu Công Ty SX TM XNK NGK TIẾN THINH PHÁT
        <span>(29/6/2022)</span>
      </a>
    </li>
    <li>
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-arrow-return-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd"
          d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5z" />
      </svg>
      <a href="gioithieu.html" title="CHÍNH SÁCH CHO ĐẠI LÝ BÁN HÀNG">
        CHÍNH SÁCH MUA HÀNG & THANH TOÁN
        <span>(26/07/2022)</span>
      </a>
    </li>
  </ul>
</div>
<?php include 'inc/footer.php'; ?>