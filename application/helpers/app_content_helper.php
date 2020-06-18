<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if(!function_exists('encode')){
        function encode($value){
            $CI =& get_instance();
            $CI->load->library('encryption');

            $string = $CI->encryption->encrypt($value);
            $string = str_replace(array('=', '+', '/'), array('-', '_', '~'), $string);
            return $string;
        }
    }
    
    if(!function_exists('decode')){
        function decode($value){
            $CI=&get_instance();
            $CI->load->library('encryption');

            $value  = str_replace(array('-', '_', '~'), array('=', '+', '/'),  $value);
            $string = $CI->encryption->decrypt($value);
            return $string;
        }
    }
    
    if(!function_exists('dateExcelSystemtoSql')){
        function dateExcelSystemtoSql($param){  // INPUT : 31-12-10
            $explode    = explode('-', $param);
            $tanggal    = (isset($explode[0]) ? $explode[0] : '00');
            $bulan      = (isset($explode[1]) ? $explode[1] : '00');
            $tahun      = '20'.(isset($explode[2]) ? $explode[2] : '00');

            return $tahun.'-'.$bulan.'-'.$tanggal; // OUTPUT: 2010-12-31
        }
    }

    if(!function_exists('dateExceltoSql')){
        function dateExceltoSql($param){ 
            $year  = substr($param,6,4);
            $date  = substr($param,3,2);
            $month = substr($param,0,2);

            return $year.'-'.$month.'-'.$date; // OUTPUT: 2010-12-31
        }
    }

    if(!function_exists('dateSql')){
        function dateSql($param){ 
            $year   = substr($param,6,4);
            $month  = substr($param,3,2);
            $date   = substr($param,0,2);

            return $year.'-'.$month.'-'.$date; // OUTPUT: 2010-12-31
        }
    }

    if(!function_exists('dateSlash')){
        function dateSlash($param){ 
            $date = substr($param,8,2);
            $month = substr($param,5,2);
            $year = substr($param,0,4);

            return $date.'/'.$month.'/'.$year; // OUTPUT: 31/12/2010
        }
    }

    if(!function_exists('dateStrip')){
        function dateStrip($param){ 
            $date   = substr($param,8,2);
            $month  = substr($param,5,2);
            $year   = substr($param,0,4);

            return $date.'-'.$month.'-'.$year; // OUTPUT: 31-12-2010
        }
    }

    if(!function_exists('stringMonthInd')){
        function stringMonthInd($param){ 
            $date   = substr($param,8,2);
            $month  = getMonthIndonesia(substr($param,5,2));
            $year   = substr($param,0,4);

            return $date.' '.$month.' '.$year; // OUTPUT: 31 Desember 2010
        }
    }

    if(!function_exists('stringDayMonthInd')){
        function stringDayMonthInd($param){ 
            $param  = substr($param,0,10);
            $hari   = getDayIndonesia($param);
            $tgl    = substr($param,8,2);
            $bln    = getMonthIndonesia(substr($param,5,2));
            $thn    = substr($param,0,4);

            return $hari.', '.$tgl.' '.$bln.' '.$thn; // OUTPUT: Senin, 09 Maret 2014
        }
    }

    if ( ! function_exists('getDayIndonesia')){
        function getDayIndonesia($param){ 
            /* Senin sampai Minggu */
            $hari_array = array(
                "1" => "Senin",
                "2" => "Selasa",
                "3" => "Rabu",
                "4" => "Kamis",
                "5" => "Jumat",
                "6" => "Sabtu",
                "7" => "Minggu"
            );

            $tgl_array  = explode('-', $param);
            $hari_n     = date("N",mktime(0, 0, 0, $tgl_array[1], $tgl_array[2], $tgl_array[0]));
            return $hari_array[$hari_n];
        }
    }


    if(!function_exists('getMonthIndonesia')){
        function getMonthIndonesia($param){ 
            /* Januari sampai Desember */
            switch ($param){
                case 1: 
                    return "Januari";
                break;

                case 2:
                    return "Febuari";
                break;

                case 3:
                    return "Maret";
                break;

                case 4:
                    return "April";
                break;

                case 5:
                    return "Mei";
                break;

                case 6:
                    return "Juni";
                break;

                case 7:
                    return "Juli";
                break;

                case 8:
                    return "Agustus";
                break;

                case 9:
                    return "September";
                break;

                case 10:
                    return "Oktober";
                break;

                case 11:
                    return "November";
                break;

                case 12:
                    return "Desember";
                break;
            }
        }
    }