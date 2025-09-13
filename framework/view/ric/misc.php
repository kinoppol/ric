<div class="row mb-12 g-6">

<div class="col-md-6 col-lg-4">
      <div class="card text-center">
        <div class="card-header">บริการวิชาการและวิชาชีพ</div>
        <div class="card-body">
          <h5 class="card-title">โครงการอบรมสัมมนา Upskill Reskill</h5>
          <p class="card-text">
</p>
<a href="https://e-training.tpqi.go.th/courses/338/info" target="_blank" class="btn btn-primary">รับการอบรม</a>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-lg-4">
      <div class="card text-center">
        <div class="card-header">บทความ</div>
        <div class="card-body">
          <h5 class="card-title">สร้างแรงบันดาลใจ บุคคลตัวอย่าง</h5>
          <p class="card-text">
</p>
<a href="https://pnstoretailer.com/top-10-retail-ceos/" target="_blank" class="btn btn-success">อ่านเพิ่มเติม</a>
        </div>
      </div>
    </div>

    <?php
    //print_r($afa_data);
    if(empty($afa_data)){
    ?>
    <div class="col-md-6 col-lg-4">
      <div class="card text-center">
        <div class="card-header">บริการออนไลน์</div>
        <div class="card-body">
          <h5 class="card-title">ให้คำปรึกษาออนไลน์</h5>
          <p class="card-text">
</p>
<a href="#" data-bs-toggle="modal" data-bs-target="#backDropModal" class="btn btn-warning">นัดหมายรับคำปรึกษา</a>
        </div>
      </div>
    </div>
<?php
    }else{
?>
    <div class="col-md-6 col-lg-4">
      <div class="card text-center">
        <div class="card-header">กำหนดการรับคำปรึกษาออนไลน์</div>
        <div class="card-body">โปรดเข้า Google Meet ก่อนถึงเวลานัด 
          <h5 class="card-title"><?php print $afa_data['book_time']; ?></h5>
          <p class="card-text">
</p>
<a href="<?php print $afa_data['meet_link']; ?>" target="_blank" class="btn btn-success">เข้า Google Meet</a>
        </div>
      </div>
    </div>

<?php
    }
?>
</div>

<!-- Modal -->
<?php
print $modal;
?> 
<!--/ Bootstrap modals -->