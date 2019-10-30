<?php	
function thaiDate($datetime) {
		list($date,$time) = split(' ',$datetime); // แยกวันที่ กับ เวลาออกจากกัน
		list($H,$i,$s) = split(':',$time); // แยกเวลา ออกเป็น ชั่วโมง นาที วินาที
		list($Y,$m,$d) = split('-',$date); // แยกวันเป็น ปี เดือน วัน
		$Y = $Y+543; // เปลี่ยน ค.ศ. เป็น พ.ศ.
		
		switch($m) {
		case "01": $m = "ม.ค."; break;
		case "02": $m = "ก.พ."; break;
		case "03": $m = "มี.ค."; break;
		case "04": $m = "เม.ย."; break;
		case "05": $m = "พ.ค."; break;
		case "06": $m = "มิ.ย."; break;
		case "07": $m = "ก.ค."; break;
		case "08": $m = "ส.ค."; break;
		case "09": $m = "ก.ย."; break;
		case "10": $m = "ต.ค."; break;
		case "11": $m = "พ.ย."; break;
		case "12": $m = "ธ.ค."; break;
		}
		return $d." ".$m." ".$Y." ".$time;
		}
?>
