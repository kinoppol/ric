<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">ข้อมูลพื้นฐาน</h5>
      <div class="card-body">
        <div class="alert alert-success" role="alert">บันทึกข้อมูลเรียบร้อยแล้ว!</div>
        <h5>รูปภาพประจำตัว</h5>
        <div class="mb-3">
          <?php
            if(!empty($userdata['picture'])) {
                ?>
          <img
            src="<?php print site_url('./writable/images/profile/'.$userdata['picture'], true); ?>"
            alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
          <?php
            } else {
                ?>
          <img
            src="<?php print site_url('./images/robot-modern-style-vector.jpg', true); ?>"
            alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
          <?php
            }
          ?>

          <label for="formFile" class="form-label">เลือกไฟล์รูปภาพประจำตัว</label>
          <input class="form-control" type="file" id="formFile" />
        </div>
        <div class="row">
          <div class="mb-3 col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="สมชาย"
                aria-describedby="floatingInputHelp"
                value="<?= $user['name'] ?>" />
              <label for="floatingInput">ชื่อ</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>
          <div class="mb-3 col-md-6">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="สบายดี"
                aria-describedby="floatingInputHelp"
                value="<?= $user['surname'] ?>" />
              <label for="floatingInput">สกุล</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>
        </div>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="somchai@gmail.com"
            aria-describedby="floatingInputHelp"
            value="<?= $user['email'] ?>" />
          <label for="floatingInput">อีเมล</label>
          <div id="floatingInputHelp" class="form-text">

          </div>
        </div>
        <div class="row">
          <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
          </div>
          <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
            <button class="btn btn-primary btn-lg" type="button">บันทึก</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>