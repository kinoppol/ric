<?php

$menu['เมนูผู้ใช้']=array(
    'user'=>array(
        'label'=>'ตั้งค่าส่วนตัว',
        'bullet'=>'tf-icons bx bx-slider',
        'url'=>site_url('user'),
        'item'=>array(
            'update_user_form'=>array(
                'label'=>'แก้ไขข้อมูลส่วนตัว',
                'url'=>site_url('user/update_user_form'),
            ),
            'change_password_form'=>array(
                'label'=>'เปลี่ยนรหัสผ่าน',
                'url'=>site_url('user/change_password_form'),
            ),
        ),
    ),
    'manual'=>array(
        'label'=>'คู่มือการใช้งานระบบ',
        'bullet'=>'tf-icons bx bx-book',
        'url'=>'https://drive.google.com/drive/folders/1zRGllI0VZOFgTA6oNz6OLV81_as41nrG?usp=sharing
',
    ),
    'logout'=>array(
        'label'=>'ออกจากระบบ',
        'bullet'=>'tf-icons bx bx-exit',
        'url'=>'javascript:if(confirm(\'ยืนยันออกจากระบบ\'))window.location.href=\''.site_url('logout').'\'; ',
    ),
);
print gen_menu($menu);