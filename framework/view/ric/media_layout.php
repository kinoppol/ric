<?php
helper('base');
$id=toBase($courses['id']);
?>

<div class="row">


  <div class="row">
    <div class="col-lg-3 col-md-12 col-12 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">

          </div>

          <li class="d-flex mb-4 pb-1">
            <div class="avatar flex-shrink-0 me-3">
              <img src="<?php print site_url('./images/logo_meet_2020q4_color_1x_web_48dp.png',true); ?>" alt="Meet"
                class="rounded" />
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h6 class="mb-0">Meet</h6>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                  <?php
                  if(!empty($meet_url)){
                  ?>
                    <a class="dropdown-item" href="javascript:copyMeetLink();">คัดลอกลิงก์</a>
                    <a class="dropdown-item" href="<?php print site_url('courses_teaching/delete_meet_link/c/'.$courses['id']); ?>" onClick="return confirm('ยืนยันยกเลิกการประชุม')">ยกเลิกลิงก์</a>
                  <?php
                  }else{
                    ?>
                    <a class="dropdown-item" href="<?php print site_url('courses_teaching/create_meet_link/c/'.$courses['id']); ?>">สร้างลิงก์</a>
                    <?php
                  }
                  ?>
                </div>
              </div>
          </li>

          <div class="d-grid gap-12 col-lg-12 mx-auto" style="text-align:center">
            <?php
              if(empty($meet_url)){
            ?>
            <script>
        function copyMeetLink() {

            alert("กรุณาสร้างลิงก์ก่อน");
        }
    </script>         
            <a href="<?php print site_url('courses_teaching/create_meet_link/c/'.$courses['id']); ?>" class="btn btn-primary">สร้างลิงก์</a>
            <?php
              }else{
                ?>       
                 <script>
        function copyMeetLink() {

            /* Copy text into clipboard */
            navigator.clipboard.writeText
                ("<?php print $meet_url; ?>");
        }
    </script>         
                <h5><a href="<?php print $meet_url; ?>" target="_blank"><?php 
                $meet_code=mb_substr($meet_url,mb_strlen("https://meet.google.com/lookup/"),mb_strlen($meet_url)-mb_strlen("https://meet.google.com/lookup/"));
                print $meet_code; ?></a></h5>
                <a href="<?php print $meet_url; ?>" target="_blank" class="btn btn-primary">เข้าร่วม</a>
                <?php
                  }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-9 col-md-12 col-12 mb-4">
      <?php print $topic; ?>
    </div>

  </div>

</div>