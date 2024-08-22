<?php
helper('base');
$id=toBase($courses['id']);
?>
<ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><i class="bx bx-chalkboard me-1"></i> กระดานข่าว</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php print site_url('courses_teaching/work/c/'.$id); ?>"
                        ><i class="bx bx-calendar-check me-1"></i> งานในชั้นเรียน</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php print site_url('courses_teaching/person/c/'.$id); ?>"
                        ><i class="bx bx-group me-1"></i> ผู้คน</a
                      >
                    </li>
                  </ul>

              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary"><?php print $courses['name']; ?></h5>
                          <p class="mb-4">
                            <?php print $courses['section']; ?>
                          </p>

                          <a href="<?php print site_url('courses_teaching/edit/c/'.$id); ?>" class="btn btn-sm btn-outline-primary">แก้ไขชั้นเรียน</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="<?php 
                            if($courses['state']=='ACTIVE'){
                              print site_url('images/man-with-laptop-light.png',true); 
                            }else{
                              print site_url('images/Hypersomnia-300x300.png',true); 
                            }
                            
                            ?>"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>