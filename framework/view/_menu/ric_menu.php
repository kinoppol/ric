<?php

$menu['แพลฟอร์มการเรียนการสอน']=array(
    'datacenter'=>array(
        'label'=>'ศูนย์ข้อมูล',
        'bullet'=>'tf-icons bx bx-data',
        'url'=>'#',
    ),
    'media'=>array(
        'label'=>'สื่อการสอน',
        'bullet'=>'tf-icons bx bx-image',
        'url'=>'#',
    ),
    'testingroom'=>array(
        'label'=>'ห้องทดสอบ',
        'bullet'=>'tf-icons bx bx-edit',
        'url'=>'#',
    ),
    'misc'=>array(
        'label'=>'องค์ประกอบเสริม',
        'bullet'=>'tf-icons bx bx-extension',
        'url'=>'#',
    ),
);

print gen_menu($menu);