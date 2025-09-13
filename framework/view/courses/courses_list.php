<?php
    helper('base');
    if($createLink){
?>
<ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" data-bs-toggle="modal" data-bs-target="#backDropModal"><i class="bx bx-plus me-1"></i> สร้างชั้นเรียนใหม่</a>
                    </li>
                  </ul>
                  <?php
    }
                  ?>
<div class="card mb-4">
<div class="card-body">
    <div class="row">
<?php if(count($courses)==0&&$createLink) { ?>
    <div class="col-md-6 col-xl-4">
        <div class="card shadow-none bg-transparent border border-secondary mb-3">
            <div class="card-body">
                <a href="#" data-bs-toggle="modal" data-bs-target="#backDropModal">
                    <h5 class="card-title"><i class="bx bx-plus mb-2"></i> สร้างชั้นเรียนใหม่</h5>
                </a>
                <p class="card-text">สร้างชั้นเรียนของคุณขึ้นใหม่</p>
            </div>
        </div>
    </div>
<?php }else{ 
    foreach($courses as $c){
        //print_r($c);
    ?>

    <div class="col-md-6 col-xl-4">
        <div class="card bg-<?php print !empty($c['cover_color'])?$c['cover_color']:'primary'; ?> text-white mb-3">
            <div class="card-body">
                <a href="<?php print site_url('courses_teaching/forum/c/'.toBase($c['id'])); ?>">
                    <h5 class="card-title text-white"><div class="mb-3">
                    <img src="<?php
                              print show_avatar($c['owner']['picture']);
                              ?>" alt
                        class="w-px-40 h-auto rounded-circle" /> <?php print $c['name']; ?></h5>
                </a>
                <p class="card-text"><?php print $c['section']; ?></p>
            </div>
        </div>
    </div>
<?php
    }
    }
?>
</div>
</div>
</div>

<!-- Modal -->
<?php
print $modal;
?> 
<!--/ Bootstrap modals -->