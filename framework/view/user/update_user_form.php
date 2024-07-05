              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">ข้อมูลพื้นฐาน</h5>
                    <div class="card-body">
                    <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="สมชาย"
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="floatingInput">ชื่อ</label>
                        <div id="floatingInputHelp" class="form-text">
                          
                        </div>
                      </div>
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="สบายดี"
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="floatingInput">สกุล</label>
                        <div id="floatingInputHelp" class="form-text">
                          
                        </div>
                      </div>
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="floatingInput"
                          placeholder="somchai@gmail.com"
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="floatingInput">อีเมล</label>
                        <div id="floatingInputHelp" class="form-text">
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">ภาพประจำตัว</h5>
                    <div class="card-body">
                    <div class="mb-3">
                      <?php
                      if(!empty($userdata['picture'])){
                        ?>
                        <img
                          src="<?php print site_url('./writable/images/profile/'.$userdata['picture'],true); ?>"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <?php
                      }
                      ?>
                    
                        <label for="formFile" class="form-label">เลือกไฟล์รูปภาพประจำตัว</label>
                        <input class="form-control" type="file" id="formFile" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>