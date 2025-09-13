<?php

$menu['แพลฟอร์มการเรียนการสอน']=array(
    'datacenter'=>array(
        'label'=>'ศูนย์ข้อมูล',
        'bullet'=>'tf-icons bx bx-data',
        'url'=>site_url('datacenter'),
    ),
    'media'=>array(
        'label'=>'สื่อการสอน',
        'bullet'=>'tf-icons bx bx-image',
        'url'=>site_url('media'),
    ),
    'testingroom'=>array(
        'label'=>'ห้องทดสอบ',
        'bullet'=>'tf-icons bx bx-edit',
        'url'=>site_url('testingroom'),
    ),
    'misc'=>array(
        'label'=>'องค์ประกอบเสริม',
        'bullet'=>'tf-icons bx bx-extension',
        'url'=>site_url('misc'),
    ),
);

print gen_menu($menu);