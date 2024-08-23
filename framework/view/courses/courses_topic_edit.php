<div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <form class="modal-content" action="<?php print site_url('courses_teaching/update_courses'); ?>" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">ข้อมูลบทเรียน</h5>

            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <input name="topic_name" type="text" class="form-control" id="courses_name"
                        placeholder="ระบุชื่อบทเรียน" aria-describedby="floatingInputHelp"
                        value="<?php print $courses_topic['name']; ?>" required />
                    <label for="floatingInput">ชื่อบทเรียน</label>
                    <div id="floatingInputHelp" class="form-text">

                    </div>
                </div>
                <div class="form-floating">
                    <input name="class_name" type="text" class="form-control" id="class_name" placeholder="https://forms.gle/..."
                        aria-describedby="floatingInputHelp" value="<?php print $courses_topic['pretest']; ?>" />
                    <label for="floatingInput">ลิงก์แบบทดสอบก่อนเรียน</label>
                    <div id="floatingInputHelp" class="form-text">
                    </div>
                </div>

                <div class="form-floating">
                    <input name="class_name" type="text" class="form-control" id="class_name" placeholder="https://drive.google.com/drive/folders/..."
                        aria-describedby="floatingInputHelp" value="<?php print $courses_topic['media']; ?>" />
                    <label for="floatingInput">ลิงก์สื่อการเรียนการสอน</label>
                    <div id="floatingInputHelp" class="form-text">
                    </div>
                </div>



                <div class="form-floating">
                    <input name="class_name" type="text" class="form-control" id="class_name" placeholder="https://forms.gle/..."
                        aria-describedby="floatingInputHelp" value="<?php print $courses_topic['posttest']; ?>" />
                    <label for="floatingInput">ลิงก์แบบทดสอบหลังเรียน</label>
                    <div id="floatingInputHelp" class="form-text">
                    </div>
                </div>

            </div>
    </div>

    <div class="modal-footer">
        <input type="hidden" name="courses_id" value="<?php print $courses['id']; ?>">
        <button type="submit" class="btn btn-primary">บันทึก</button>

    </div>
</div>
</form>
</div>
</div>