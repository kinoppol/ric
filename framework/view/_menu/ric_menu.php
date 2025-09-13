<?php

$menu['แพลฟอร์มการเรียนการสอน']=array(
    'datacenter'=>array(
        'label'=>'ศูนย์ข้อมูล',
        'bullet'=>'tf-icons bx bx-data',
        'url'=>site_url('datacenter'),
    ),
    'courses_teaching'=>array(
        'label'=>'ชั้นเรียน',
        'bullet'=>'tf-icons bx bx-book',
        'url'=>site_url('courses_teaching'),
        'item'=>array(
                'my_courses'=>array(
                'label'=>'ชั้นเรียนของฉัน',
                'url'=>site_url('courses_teaching/my_courses'),
            ),
                'courses_browser'=>array(
                'label'=>'ชั้นเรียนต้นแบบ',
                'url'=>site_url('courses_teaching/courses_browser'),
            ),
                'courses_archived'=>array(
                'label'=>'ชั้นเรียนที่เก็บ',
                'url'=>site_url('courses_teaching/courses_archived'),
        ),
        ),
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