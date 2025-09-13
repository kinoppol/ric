
<div class="card mb-4">
<div class="card-body">
    <div class="row">
         <?php
    foreach($courses as $c){
 ?>
<div class="col-md-6 col-xl-4">
        <div class="card bg-<?php print !empty($c['cover_color'])?$c['cover_color']:'primary'; ?> text-white mb-3">
            <div class="card-body">
                <a href="<?php print site_url('media/list/c/'.toBase($c['id'])); ?>">
                    <h5 class="card-title text-white"><div class="mb-3">
                    <?php print $c['name']; ?></h5>
                </a>
                <p class="card-text"><img src="<?php
                              print show_avatar($c['owner']['picture']);
                              ?>" alt
                        class="w-px-40 h-auto rounded-circle" /><?php print $c['owner']['name'].' '.$c['owner']['surname']; ?></p>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
    </div>
    </div>
    </div>