<?php

/**
 * ฟังชั่นการทำงานของระบบ
 * 
 */
// ตรวจสอบเพศ โดยเมื่อรับข้อมูลเข้ามา
// ถ้าข้อมูลเป็น m จะแสดงคำว่า "ชาย"
// ถ้าข้อมูลเป็น f จะแสดงคำว่า "หญิง"
// และถ้าไม่ได้ส่งอะไรมา ก็จะแสดงเป็น "-"
function get_gender($data) {
    $array = array(
        'm' => 'ชาย',
        'f' => 'หญิง'
    );

    if (empty($data))
        return '-';
    else
        return $array[$data];
}

// ตรวจสอบข้อมูลสถานะเอกสาร

function get_doc_sale_status($data) {
    $array = array(
        'wait' => 'รอตรวจ',
        'pass' => 'ผ่าน',
        'abort' => 'ไม่ผ่าน',
        'receive' => 'เรื่องถึงสำนักงานใหญ่'
    );

    if (empty($data))
        return '-';
    else
        return $array[$data];
}

// ตรวจสอบข้อมูลสถานะ

function get_order_stock_status($data) {
    $array = array(
        'wait' => 'รอ',
        'pass' => 'ส่งแล้ว',
        'receive' => 'รับแล้ว'
    );

    if (empty($data))
        return '-';
    else
        return $array[$data];
}

// การเปลี่ยนวันที่เป็นแบบไทย
// เมื่อรับข้อมูลมา จะแปลงเป็นวันที่แบบไทย
// ถ้า $thai_year เป็น true จะแสดงเป็น ปี พ.ศ.
function to_thai_date($data, $thai_year = false) {
    if ($thai_year) {
        $raw_date = explode('-', $data);
        // change to thai year
        $update_year = $raw_date[0] += 543;
        return $raw_date[2] . '/' . $raw_date[1] . '/' . $update_year;
    } else {
        $date = new DateTime($data);
        return $date->format('d/m/Y');
    }
}

// ตรวจสอบระดับผู้ใช้
// ถ้าข้อมูล ที่รับมาเป็น ค่าว่าง จะแสดงเป็น "-"
// ถ้าข้อมูลที่รับมาเป็น admin จะแสดงเป็น "ผู้ดูแลระบบ"
// ถ้าข้อมูลที่รับมาเป็น user จะแสดงเป็น "พนักงาน"

function get_level($data = null) {
    $array = array(
        'admin' => 'ผู้ดูแลระบบ',
        'user' => 'ผู้เรียน',
        'teacher' => 'อาจารย์ฝึกหัด',
        'manager' => 'ผู้จัดการ'
    );
    if (empty($data))
        return '-';
    else
        return $array[$data];
}

function get_level_car($data = null) {
    $array = array(
        'auto' => 'เกียร์ออโต้',
        'common' => 'เกียร์ธรรมดา',
        '0' => 'ยังไม่ระบุ'
    );
    if (empty($data))
        return '-';
    else
        return $array[$data];
}

function get_level_type_car($data = null) {
    $array = array(
        'กระบะ' => 'กระบะ',
        'เก๋ง' => 'เก๋ง',
        '0' => 'ยังไม่ระบุ'
    );
    if (empty($data))
        return '-';
    else
        return $array[$data];
}

// ฟังชั่นการทำงานของ dropdown ประเภทอะไหล่
// โดยดึงข้อมูลจาก ฐานข้อมูลเก็บลง dropdown
function product_type_options($selected = null) {
    $html = '<select name="product_type_id">';
    $html .= '<option>เลือก</option>';
    $rs = mysql_query('SELECT * FROM tbproduct_type ORDER BY product_type_name ASC');
    while ($val = mysql_fetch_assoc($rs)) {
        if ($selected == $val['id']) {
            $html .= '<option value="' . $val['id'] . '" selected="selected">' . $val['product_type_name'] . '</option>';
        } else {
            $html .= '<option value="' . $val['id'] . '">' . $val['product_type_name'] . '</option>';
        }
    }
    $html .= '</select>';

    return $html;
}

// ฟังชั่นการทำงานของ dropdown เพศ
// โดยดึงข้อมูลจาก ฐานข้อมูลเก็บลง dropdown
function gender_options($selected = null) {

    if ($selected == 'm') {
        $m_selected = 'selected="selected"';
    } else if ($selected == 'f') {
        $f_selected = 'selected="selected"';
    } else {
        $m_selected = '';
        $f_selected = '';
    }

    $html = '<select class="span1" name="gender">';
    $html .= '<option>เลือก</option>';
    $html .= '<option value="m" ' . @$m_selected . '>ชาย</option>';
    $html .= '<option value="f" ' . @$f_selected . '>หญิง</option>';
    $html .= '</select>';

    return $html;
}

// ฟังชั่นการทำงานของวันที่
// โดยจะดึงข้อมูลของ วัน เดือน ปี เป็น dropdown
function date_options($name, $selected = null) {
    $raw_date = explode('-', $selected);
    return day_options($name, $raw_date[2]) . month_options($name, $raw_date[1]) . year_options($name, $raw_date[0]);
}

// dropdown วัน
// โดยจะมีให้เลือก 1-31
function day_options($name, $selected = null) {
    $html .= '<select class="span1" name="' . $name . '[day]">';
    $html .= '<option>เลือก</option>';
    for ($i = 1; $i <= 31; $i++) {
        if ($selected == $i) {
            $html .= '<option value="' . $i . '" selected="selected">' . $i . '</option>';
        } else {
            $html .= '<option value="' . $i . '">' . $i . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

// dropdown เดือน
// มีให้เลือก 1-12
function month_options($name, $selected = null) {
    $html .= '<select class="span1" name="' . $name . '[month]">';
    $html .= '<option>เลือก</option>';
    for ($i = 1; $i <= 12; $i++) {
        if ($selected == $i) {
            $html .= '<option value="' . $i . '" selected="selected">' . $i . '</option>';
        } else {
            $html .= '<option value="' . $i . '">' . $i . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

// dropdown ปี
// จะแสดงปี โดยระบบตั้งไว้
// จะถอยหลังกลับไป 60 ปี และ ไปข้างหน้าอีก 10 ปี นับจากปัจจุบัน
function year_options($name, $selected = null, $back = 60, $front = 10) {
    $back = (date('Y') - $back);
    $front = (date('Y') + $front);
    $html .= '<select class="span2" name="' . $name . '[year]">';
    $html .= '<option>เลือก</option>';
    for ($i = $back; $i <= $front; $i++) {
        if ($selected == $i) {
            $html .= '<option value="' . $i . '" selected="selected">' . ($i + 543) . '</option>';
        } else {
            $html .= '<option value="' . $i . '">' . ($i + 543) . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

// ดึงข้อมูลจาก dropdown (สำหรับ date_options) มาเก็บลงฐานข้อมูล
function get_date_data($data) {
    return $data['year'] . '-' . $data['month'] . '-' . $data['day'];
}

// dropdown ระดับผู้ใช้งาน
function level_options($selected = null) {
    $array = array(
        'admin' => 'ผู้ดูแลระบบ',
        'user' => 'ผู้เรียน',
        'teacher' => 'อาจารย์ฝึกหัด',
        'manager' => 'ผู้จัดการ'
    );
    $html = '<select name="type">';
    $html .= '<option>เลือก</option>';
    foreach ($array as $key => $val) {
        if ($selected == $key) {
            $html .= '<option value="' . $key . '" selected="selected">' . $val . '</option>';
        } else {
            $html .= '<option value="' . $key . '">' . $val . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

// dropdown ประเภทรถ
function level_options_car($selected = null) {
    $array = array(
        'auto' => 'เกียร์ออโต้',
        'common' => 'เกียร์ธรรมดา',
        '0' => 'ยังไม่ระบุ'
    );
    $html = '<select name="type">';
    $html .= '<option>เลือก</option>';
    foreach ($array as $key => $val) {
        if ($selected == $key) {
            $html .= '<option value="' . $key . '" selected="selected">' . $val . '</option>';
        } else {
            $html .= '<option value="' . $key . '">' . $val . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

function level_options_type_car($selected = null) {
    $array = array(
        'กระบะ' => 'กระบะ',
        'เก๋ง' => 'เก๋ง',
        '0' => 'ยังไม่ระบุ'
    );
    $html = '<select name="type_car">';
    $html .= '<option>เลือก</option>';
    foreach ($array as $key => $val) {
        if ($selected == $key) {
            $html .= '<option value="' . $key . '" selected="selected">' . $val . '</option>';
        } else {
            $html .= '<option value="' . $key . '">' . $val . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

//  dropdown สินค้าที่ดึงจากฐานข้อมูล
function product_name_options($selected = null) {
    $html .= '<select name="product_id">';
    $html .= '<option>เลือก</option>';
    $rs = mysql_query('SELECT * FROM product ORDER BY name ASC');
    while ($val = mysql_fetch_assoc($rs)) {
        if ($selected == $val['id']) {
            $html .= '<option value="' . $val['id'] . '" selected="selected">' . $val['name'] . '</option>';
        } else {
            $html .= '<option value="' . $val['id'] . '">' . $val['name'] . '</option>';
        }
    }
    $html .= '</select>';

    return $html;
}
function course_options($selected = null) {
    $html  = '<select name="course_id">';
    $html .= '<option>เลือก</option>';
    $rs = mysql_query('SELECT * FROM tbcourse ORDER BY c_name ASC');
    while ($val = mysql_fetch_assoc($rs)) {
        if ($selected == $val['id']) {
            $html .= '<option value="' . $val['id'] . '" selected="selected">' . $val['c_name'] . '</option>';
        } else {
            $html .= '<option value="' . $val['id'] . '">' . $val['c_name'] . '</option>';
        }
    }
    $html .= '</select>';

    return $html;
}
function degree_options($selected = null) {
    $html = '<select name="degree">';
    $html .= '<option>เลือก</option>';
    $rs = mysql_query('SELECT * FROM tbdegree ORDER BY name ASC');
    while ($val = mysql_fetch_assoc($rs)) {
        if ($selected == $val['name']) {
            $html .= '<option value="' . $val['name'] . '" selected="selected">' . $val['name'] . '</option>';
        } else {
            $html .= '<option value="' . $val['name'] . '">' . $val['name'] . '</option>';
        }
    }
    $html .= '</select>';

    return $html;
}

function phase_options($selected = null) {
    $html = '<select name="r_time">';
    $html .= '<option>เลือก</option>';
    $rs = mysql_query('SELECT * FROM tbphase ORDER BY name ASC');
    while ($val = mysql_fetch_assoc($rs)) {
        if ($selected == $val['id']) {
            $html .= '<option value="' . $val['around'] . ' ' . $val['name'] . '" selected="selected">' . $val['around'] . ' ' . $val['name'] . '</option>';
        } else {
            $html .= '<option value="' . $val['around'] . ' ' . $val['name'] . '">' . $val['around'] . ' ' . $val['name'] . '</option>';
        }
    }
    $html .= '</select>';

    return $html;
}

function gear_options_car($selected = null) {
    $array = array(
        'auto' => 'เกียร์ออโต้',
        'common' => 'เกียร์ธรรมดา',
        '0' => 'ยังไม่ระบุ'
    );
    $html = '<select name="r_gear">';
    $html .= '<option>เลือก</option>';
    foreach ($array as $key => $val) {
        if ($selected == $key) {
            $html .= '<option value="' . $key . '" selected="selected">' . $val . '</option>';
        } else {
            $html .= '<option value="' . $key . '">' . $val . '</option>';
        }
    }
    $html .= '</select>';
    return $html;
}

function car_options($selected = null) {
    $html = '<select name="r_car">';
    $html .= '<option>เลือก</option>';
    $rs = mysql_query('SELECT * FROM tbcar ORDER BY id ASC');
    while ($val = mysql_fetch_array($rs)) {
        if ($selected == $val['id']) {
            $html .= '<option value="' . $val['name_car'] . ' ' . $val['name_code'] . '" selected="selected">' . $val['name_car'] . ' ' . $val['name_code'] . '</option>';
        } else {
            $html .= '<option value="' . $val['name_car'] . ' ' . $val['name_code'] . '">' . $val['name_car'] . ' ' . $val['name_code'] . '</option>';
        }
    }
    $html .= '</select>';

    return $html;
}

// function to_db_date($data){
// 	$raw_array = explode('/',$data);
// 	return $raw_array[2].'-'.$raw_array[1].'-'.$raw_array[0];
// }
// เปลี่ยนรูปแบบวันที่ของฐานข้อมูลเป็นรูปแบบวันที่ปกติ
function to_normal_date($data) {
    $raw_array = explode('-', $data);
    return $raw_array[2] . '/' . $raw_array[1] . '/' . ($raw_array[0] + 543);
}

function dateToMysql($txt) {
    $result = "";
    if ($txt != "") {
        $year = substr($txt, 6, 4);
        if ($year > 2500) {
            $year = $year - 543;
        }
        $month = substr($txt, 3, 2);
        $day = substr($txt, 0, 2);
        $result = $year . "-" . $month . "-" . $day;
    }
    return $result;
}
 function DateDiff($strDate1, $strDate2) {
        return (strtotime($strDate2) - strtotime($strDate1)) / ( 60 * 60 * 24  )+1;  // 1 day = 60*60*24
    }
 function fb_date($timestamp) {
        $difference = time() - $timestamp;
        $periods = array("วินาที", "นาที", "ชั่วโมง");
        $ending = "ที่แล้ว";
        if ($difference < 60) {
            @$j = 0;
            $periods[$j].=($difference != 1) ? "" : "";
            $difference = ($difference == 3 || $difference == 4) ? "a few " : $difference;
            $text = "$difference $periods[$j]$ending";
        } elseif ($difference < 3600) {
            $j = 1;
            $difference = round($difference / 60);
            $periods[$j].=($difference != 1) ? "" : "";
            $difference = ($difference == 3 || $difference == 4) ? "a few " : $difference;
            $text = "$difference $periods[$j]$ending";
        } elseif ($difference < 86400) {
            $j = 2;
            $difference = round($difference / 3600);
            $periods[$j].=($difference != 1) ? "" : "";
            $difference = ($difference != 1) ? $difference : "ประมาณ ";
            $text = "$difference $periods[$j]$ending";
        } elseif ($difference < 172800) {
            $difference = round($difference / 86400);
            $periods[$j].=($difference != 1) ? "" : "";
            $text = "Yesterday at " . date("g:ia", $timestamp);
        } else {
            if ($timestamp < strtotime(date("Y-01-01 00:00:00"))) {
                $text = date("l j, Y", $timestamp) . " at " . date("g:ia", $timestamp);
            } else {
                $text = date("l j", $timestamp) . " at " . date("g:ia", $timestamp);
            }
        }
        return $text;
    }
	function num_rows($table,$condition){
		$query=mysql_query("SELECT * FROM $table WHERE $condition") or die (mysql_error());
		$num_rows=mysql_num_rows($query);
		return $num_rows;
	}
	
	function insert($table,$Fields,$value){
		$query=mysql_query("INSERT INTO $table ($Fields) VALUES ($value)") or die (mysql_error());
		return $query;	
	}
	
	function select($table,$condition){
		$query=mysql_query("SELECT * FROM $table WHERE $condition") or die (mysql_error());
		return $query;	
	}
	
	function delete($table,$condition){
		$query=mysql_query("DELETE FROM $table WHERE $condition") or die (mysql_error());	
		return $query;
	}
	
	function update($table,$command,$condition){
		$query=mysql_query("UPDATE $table SET $command WHERE $condition") or die (mysql_error());
		return $query;	
	}
?>