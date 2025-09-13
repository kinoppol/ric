    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" action="<?php print site_url('misc/ask_for_advice'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">สร้างนัดหมายขอรับคำปรึกษา</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <input name="date_book" type="date" class="form-control" id="date_book" placeholder="ระบุวันที่"
                        aria-describedby="floatingInputHelp" value="<?php print date('Y-m-d'); ?>" required/>
                    <label for="floatingInput">วัน</label>
                    <div id="floatingInputHelp" class="form-text">

                    </div>
                </div>
                <div class="form-floating">
                    <input name="time_book" type="time" class="form-control" id="time_book" placeholder="ระบุเวลา"
                        aria-describedby="floatingInputHelp"  value="<?php print date('H:i'); ?>" required/>
                    <label for="floatingInput">เวลา</label>
                    <div id="floatingInputHelp" class="form-text">

                    </div>

                </div>
                
                <div class="form-floating">
                    <select name="advisor" type="time" class="form-control" id="advisor" placeholder="เลือกที่ปรึกษา"
                        aria-describedby="floatingInputHelp" required>
                            <option value=''>-โปรดเลือกอาจารย์ที่ต้องการปรึกษา-</option>
                        <?php
                            print gen_option($teachers);
                        ?>
                    </select>
                    <label for="floatingInput">อาจารย์ที่ปรึกษา</label>
                    <div id="floatingInputHelp" class="form-text">

                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    ยกเลิก
                </button>
                <button type="submit" class="btn btn-primary">บันทึก</button>

            </div>
    </div>
    </form>
</div>