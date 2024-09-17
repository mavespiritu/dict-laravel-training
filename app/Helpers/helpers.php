<?php 
use Carbon\Carbon;

function format_fullname($fname, $mname, $lname, $suffix, $is_reversed, $is_capital){

    $fullname = $is_reversed == 1 ? "$lname $suffix, $fname $mname" : "$fname $mname $lname $suffix";

    $fullname = $is_capital == 1 ? strtoupper($fullname) : $fullname;

    return $fullname;
}

function compare_dates($date1, $date2){
    $msg = $date1 == $date2 ? "Date: $date1" : "Period covered from $date1 to $date2";

    return $msg;
}

function format_report_date($date, $num){
    
    $carbonDate = Carbon::parse($date);

    switch ($num) {
        case 1:
            return $carbonDate->format('l, F d, Y');
        
        case 2:
            return $carbonDate->format('d F Y') . ' - ' . $carbonDate->format('l');
        
        case 3:
            return 'Today is ' . $carbonDate->format('l, F d, Y');
        
        default:
            return '0000-00-00';
    }
}

?>