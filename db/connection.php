<?php
//database connection
// สั่งเชื่อมต่อฐานข้อมูล
$link = mysql_connect('localhost', 'root', 'root');

//กำหนดค่า url_base 
$base_url = 'http://localhost/imotor/';
// เช็คการเชื่อมต่อฐานข้อมูล
if ($link) {
    // กรณีที่เชื่อมฐานข้อมูลได้	
    // เลือก database
    mysql_select_db("db_motor");
    // ตั้งให้เป็นแบบ utf8
    mysql_query("SET NAMES utf8");
} else {
    // กรณีที่เชื่อฐานข้อมูลไม่ผ่าน ก็จะแสดงข้อความขึ้นมา
    echo "connect fail !";
    die();
}

function sql_find_by_pk($table, $pk) {
    $pk_value = @$_GET[$pk];

    if (!empty($pk_value)) {
        $sql = "SELECT * FROM $table WHERE $pk = $pk_value";
        $rs = mysql_query($sql);

        if ($rs) {
            return mysql_fetch_array($rs);
        } else {
            echo mysql_error();
        }
    }
    return array();
}

//
// TODO: config variable
//
$arr_day = array("จันทร์", "อังคาร", "พุธ", "พฤหัส", "ศุกร์");

$sql = "";

function sql_insert($table_name, $pk, $arr = null) {
    global $sql;

    if (empty($arr)) {
        $arr = $_POST;
    }

    $field = "";
    $values = "";
    $i = 0;
    $pk_value = $arr[$pk];

    foreach ($arr as $key => $value) {
        if ($key != $pk) {
            $field .= $key;
            $values .= "'$value'";

            if ($i < count($arr) - 2) {
                $field .= ",";
                $values .= ",";
            }
            $i++;
        }
    }

    $sql = "INSERT INTO $table_name($field) VALUES($values)";
    return $sql;
}

function sql_update($table, $pk, $arr = null) {
    $fields = "";
    $i = 0;

    if (empty($arr)) {
        $arr = $_POST;
    }
    $pk_value = $_POST[$pk];

    foreach ($arr as $key => $value) {
        if ($key != $pk) {
            $fields .= "$key = '$value'";

            if ($i < count($arr) - 2) {
                $fields .= ",";
            }
            $i++;
        }
    }

    $sql = "
        UPDATE $table SET 
            $fields
        WHERE $pk = $pk_value";
    return $sql;
}

function sql_save($table, $pk = null, $arr = null) {
    global $sql;

    if ($_POST[$pk] == null) {
        if (empty($arr)) {
            $arr = $_POST;
        }
        return mysql_query(sql_insert($table, $pk));
    }
    if (empty($arr)) {
        $arr = $_POST;
    }

    return mysql_query(sql_update($table, $pk, $arr));
}

function sql_find_all($table) {
    return mysql_query("SELECT * FROM $table");
}

function sql_dropdown($name, $table, $value_text, $value_key, $default_value = null) {
    global $sql;
    global $conn;

    $sql = "SELECT * FROM $table";
    $rs = mysql_query($sql);

    $html = "<select name='$name' id='$name'>";
    while ($r = mysql_fetch_array($rs)) {
        $html .= "<option value='$r[$value_key]'";

        // default value
        if (!empty($default_value)) {
            if ($r[$value_key] == $default_value) {
                $html .= " selected";
            }
        }

        $html .= ">";
        $html .= $r[$value_text];
        $html .= "</option>";
    }
    $html .= "</select>";

    return $html;
}

function dropdown_from_array($name, $arr, $default_value = null) {
    $html = "<select name='$name' id='$name'>";
    foreach ($arr as $k => $v) {
        $html .= "<option value='$k'";

        if (!empty($default_value)) {
            if ($default_value == $k) {
                $html .= " selected";
            }
        }

        $html .= ">";
        $html .= $v;
        $html .= "</option>";
    }
    $html .= "</select>";

    return $html;
}

function dropdown_manual($name, $min, $max, $default_value = null) {
    $html = "<select name='$name' id='$name'>";

    for ($i = $min; $i <= $max; $i++) {
        $html .= "<option value='$i'";

        if (!empty($default_value)) {
            $html .= " selected";
        }

        $html .= ">";
        $html .= $i;
        $html .= "</option>";
    }
    $html .= "</select>";

    return $html;
}

function get_subject($level_id, $teacher_id, $hour, $day) {
    $sql = "
        SELECT 
            tb_table_lern.*, 
            tbcourse.id,tbcourse.c_name,
            tbuser.fname
           
        FROM tb_table_lern
        INNER JOIN tbcourse ON tbcourse.id = tb_table_lern.course_id
        INNER JOIN tbuser ON tbuser.id = tb_table_lern.user_id
        WHERE table_lern_hour = $hour
        AND table_lern_day = $day";
    if (!empty($course_id)) {
        $sql .= " AND tbcourse.course_id = $course_id";
    }
    if (!empty($user_id)) {
        $sql .= " AND tbuser.user_id = $user_id";
    }

    $rs = mysql_query($sql);

    if (!$rs) {
        return $sql;
    }
    if (mysql_num_rows($rs) > 0) {
        $r = mysql_fetch_array($rs);
        return "
            <center title='$r[c_name] \n อาจารย์ฝึกหัด $r[fname]'>
                <a class='btn btn-inverse' href='index.php?url=room_info.php&id=$r[id]'>$r[c_name]</a>
            </center>";
    }
    return "";
}

function form_header($text) {
    $html = "
        <div class='btn-info btn-large'>
            <i class='icon-tasks icon-white'></i>
            <strong>$text</strong>
        </div>
        <br />";
    return $html;
}

function form_button($id_value) {
    $html = "
        <div>
            <label></label>
            <a class=\"btn btn-success btn-large\" onclick=\"form1.submit()\">
                <i class=\"icon icon-check icon-white\"></i>
                บันทึก
            </a>
            <a class=\"btn btn-danger btn-large\" onclick=\"form1.reset()\">
                <i class=\"icon icon-trash icon-white\"></i>
                ยกเลิก
            </a>
        </div>
        <input type=\"hidden\" name=\"id\" value=\"$id_value\" />";
    return $html;
}

?>