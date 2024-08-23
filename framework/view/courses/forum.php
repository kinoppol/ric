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
                        ><i class="bx bx-calendar-check me-1"></i> บทเรียน</a
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
                
                
                <div class="row">
                <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                           
                          </div>

                          <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="<?php print site_url('./images/logo_meet_2020q4_color_1x_web_48dp.png',true); ?>" alt="Meet" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Meet</h6>
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">คัดลอกลิงก์</a>
                                <a class="dropdown-item" href="javascript:void(0);">จัดการ</a>
                              </div>
                          </div>
                        </li>
                        
                         <div class="d-grid gap-12 col-lg-12 mx-auto">
                          <a href="#" class="btn btn-primary">เข้าร่วม</a>
                        </div>
                        </div>
                      </div>
                    </div>
                    
                <div class="col-lg-9 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body"> 
                        
                        
                        <div class="mb-3">                
                            <img src="./writable/images/profile/<?= $_SESSION['user']['picture'] ?>" alt class="w-px-40 h-auto rounded-circle" />
                            <?php print $_SESSION['user']['name']." ".$_SESSION['user']['surname'] ?>
                        </div>
                          <form>
                            <div class="input-group">
                                <input name="topic_subject" type="text" class="form-control" id="topic_subject" placeholder="บอกทุกคนในชั้นเรียนว่า.."
                                    aria-describedby="floatingInputHelp" aria-describedby="button-addon2" required/>
                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">ตกลง</button>
                      
                            </div>
                          </form>
                          </div>
                      </div>
                  </div>
                  </div>