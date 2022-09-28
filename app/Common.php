<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;
use Illuminate\Support\Facades\Schema;
use Mockery\Exception;
use DB;
use Auth;

class Common
{
    public static function sanitizeMobileNo($mobile)
    {
        // First Remove all Except Numeric and Convert Unicode to Eng Number
        $mobile = self::convertToEng($mobile);

        // Check if 88 in first - if found Remove 88
        $leading2Dig = substr($mobile, 0, 2);
        if ($leading2Dig == '88') $mobile = substr($mobile, 2);

        return $mobile;

    }

    public static function convertToEng($number)
    {
        if (!$number)
            return null;
        //$number = mb_convert_encoding($number, "HTML-ENTITIES", "UTF-8");
        $number = str_replace('০', '0', $number);
        $number = str_replace('১', '1', $number);
        $number = str_replace('২', '2', $number);
        $number = str_replace('৩', '3', $number);
        $number = str_replace('৪', '4', $number);
        $number = str_replace('৫', '5', $number);
        $number = str_replace('৬', '6', $number);
        $number = str_replace('৭', '7', $number);
        $number = str_replace('৮', '8', $number);
        $number = str_replace('৯', '9', $number);
        // Remove all Except Numbers
        $number = filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        // $number  = preg_replace("/[^0-9]/","",$number);
        return $number;
    }

    /**
     * trims text to a space then adds ellipses if desired
     * @param string $input text to trim
     * @param int $length in characters to trim to
     * @param bool $ellipses if ellipses (...) are to be added
     * @param bool $strip_html if html tags are to be stripped
     * @return string
     */

    public static function convertNumsToEngNumsString($string)
    {
        if (!$string)
            return null;
        //$number = mb_convert_encoding($number, "HTML-ENTITIES", "UTF-8");
        $string = str_replace('০', '0', $string);
        $string = str_replace('১', '1', $string);
        $string = str_replace('২', '2', $string);
        $string = str_replace('৩', '3', $string);
        $string = str_replace('৪', '4', $string);
        $string = str_replace('৫', '5', $string);
        $string = str_replace('৬', '6', $string);
        $string = str_replace('৭', '7', $string);
        $string = str_replace('৮', '8', $string);
        $string = str_replace('৯', '9', $string);

        return $string;
    }

    public static function randomString($length)
    {
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $length; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }

    public static function getDays($day)
    {
        $days = [
            'Sun' => 'রবিবার',
            'Mon' => 'সোমবার',
            'Tues' => 'মঙ্গলবার',
            'Tue' => 'মঙ্গলবার',
            'Wednes' => 'বুধবার',
            'Wed' => 'বুধবার',
            'Thurs' => 'বৃহস্পতিবার',
            'Thu' => 'বৃহস্পতিবার',
            'Fri' => 'শুক্রবার',
            'Satur' => 'শনিবার',
            'Sat' => 'শনিবার',
        ];
        return $days[$day];
    }

    public static function getMonth($month)
    {
        /*
        $months = [
            'January' => 'জানুয়ারি',
            'February' => 'ফেব্রুয়ারী',
            'March' => 'মার্চ',
            'April' => 'এপ্রিল',
            'May' => 'মে',
            'June' => 'জুন',
            'July' => 'জুলাই',
            'August' => 'অগাস্ট',
            'September' => 'সেপ্টেম্বর',
            'October' => 'অক্টোবর',
            'November' => 'নভেম্বর',
            'December' => 'ডিসেম্বর',
        ];*/
        $months = [
            'January' => 'জানুয়ারি',
            'February' => 'ফেব্রুয়ারী',
            'March' => 'মার্চ',
            'April' => 'এপ্রিল',
            'May' => 'মে',
            'June' => 'জুন',
            'July' => 'জুলাই',
            'August' => 'অগাস্ট',
            'September' => 'সেপ্টেম্বর',
            'October' => 'অক্টোবর',
            'November' => 'নভেম্বর',
            'December' => 'ডিসেম্বর',
        ];
        return $months[$month];
    }

    public static function base64_to_jpeg($base64_string, $output_file)
    {
        $ifp = fopen($output_file, "wb");
        $data = explode(',', $base64_string);
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);
        return $output_file;
    }

    public static function callAPI($url, $data)
    {
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) return $err;
            return $response;
        } catch (Exception $ex) {
            return $result = json_encode(array("errorCode" => "0", "errorMessage" => "Exception caught in CallService::syncCDR"));
        }
    }

    /*
     * Parameters
     * $url - String - URL value from env file
     * $data - Array - Array containing Parameters
     * Return - $response/$err -
     */

    public static function services()
    {
        return [
            'digital_centre' => 'ডিজিটাল সেন্টার',
            'dfs' => 'ডিজিটাল ফাইনাসিয়াল সার্ভিস',
            'ek_shop' => 'এক শপ',
            'mmc' => 'মাল্টিমিডিয়া ক্লাসরুম',
            'teachers_portal' => 'শিক্ষক বাতায়ন',
            'muktopaath' => 'মুক্ত পাঠ',
            'kishore_konnect' => 'কিশোর কানেক্ট',
            'land' => 'ভূমি',
            'nothi' => 'নথি',
            'national_portal' => 'জাতীয় বাতায়ন',
            '333' => '৩৩৩',
            'sps' => 'এস পি এস',
            'sif' => 'সার্ভিস ইনোভেশন ও চ্যালেঞ্জ ফান্ড',
            'argi' => 'কৃষি বাতায়ন',
            '3331' => 'কৃষক বন্ধু কল সেবা (৩৩৩১)'
        ];
    }

    public static function serviceName($service)
    {
        $data = [
            'digital_centre' => 'ডিজিটাল সেন্টার',
            'dfs' => 'ডিজিটাল ফাইনাসিয়াল সার্ভিস',
            'ek_shop' => 'এক শপ',
            'mmc' => 'মাল্টিমিডিয়া ক্লাসরুম',
            'teachers_portal' => 'শিক্ষক বাতায়ন',
            'muktopaath' => 'মুক্ত পাঠ',
            'kishore_konnect' => 'কিশোর কানেক্ট',
            'land' => 'ভূমি',
            'nothi' => 'নথি',
            'national_portal' => 'জাতীয় বাতায়ন',
            '333' => '৩৩৩',
            'sps' => 'এস পি এস',
            'sif' => 'সার্ভিস ইনোভেশন ও চ্যালেঞ্জ ফান্ড',
            'argi' => 'কৃষি বাতায়ন',
            '3331' => 'কৃষক বন্ধু কল সেবা (৩৩৩১)',
            'drr' => 'drr'
        ];
        return (isset($data[$service])) ? $data[$service] : "";
    }

    public static function serviceProviderInfo($service)
    {
        $data = [
            'nothi' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'নথি', 'ব্যবহার', 'কোটি', '1'],
            'mutation' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ই-মিঊটেশন', 'অফিস', 'হাজার', '2'],
            'khatian' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'খতিয়ান', 'খতিয়ান', 'কোটি', '3'],
            'porcha' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ই-পর্চা', 'পর্চা', 'কোটি', '4'],
            'national_portal' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'পোর্টাল', 'সক্রিয় অফিস', 'হাজার', '1'],
            'digital_centre' => ['উদ্যোক্তা', 'ডিজিটাল সেন্টার', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ইউডিসি', 'আয় ২০ হাজার+', 'শত', '2'],
            'agent-banking' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'এজেন্ট ব্যাংকিং', 'সেবা প্রদান', 'কোটি', '3'],
            'ek-pay' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'একপে', 'সেবা প্রদান', 'কোটি', '4'],
            'mobile-banking' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'মোবাইল ব্যাংকিং', 'সেবা প্রদান', 'কোটি', '1'],
            'mobile-banking' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'মোবাইল ব্যাংকিং', 'সেবা প্রদান', 'কোটি', '2'],
            'mmc' => ['স্কুল', 'মাল্টিমিডিয়া ক্লাস রুম', 'মাল্টিমিডিয়া ক্লাস রুম এর সংখ্যা', 'মাল্টিমিডিয়া রুম', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'এম এম সি', 'ক্লাশ রুম', 'হাজার', '3'],
            'teachers_portal' => ['শিক্ষক', 'কনটেন্ট', 'প্রতিদিনের ভিসিট', 'মাল্টিমিডিয়া রুম', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'শিক্ষক বাতায়ন', 'নিবন্ধিত', 'লক্ষ', '4'],
            'kishore_konnect' => ['কিশোর', 'কনটেন্ট', 'প্রতিদিনের ভিসিট', 'শ্রেণী', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'কানেক্ট', 'নিবন্ধিত', 'লক্ষ', '1'],
            'sif' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ইনোভেশন ফান্ড', 'প্রকল্প', ' টি', '2'],
            'argi' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'কৃষি বাতায়ন', 'সক্রিয় কর্মকর্তা', ' জন', '2'],
            'muktopaath' => ['কোর্স', 'ব্যাভারকারী', 'প্রতিদিনের ভিসিট', 'কোর্সের ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'মুক্ত পাঠ', 'নিবন্ধিত', 'লক্ষ', '1'],
            'ek_shop' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এক শপ এর মাধ্যমে অর্ডার গ্রহণ', 'পণ্য বিক্রয়', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'একশপ', 'অর্ডার', 'লক্ষ', '1'],
            '333' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', '৩৩৩', 'কল', ' টি', '2'],
            '3331' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'কৃষি কল সেবা', 'কল', ' টি', '2'],
            'drr' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'ব্যবহারকারী', 'কোর্ট ফি']
        ];
        return isset($data[$service]) ? $data[$service] : "";
    }

    public static function servicesInfo()
    {
        $data = [
            'nothi' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'নথি', 'ব্যবহার', 'কোটি', '5'],
            'mutation' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ই-মিঊটেশন', 'অফিস', 'হাজার', '6'],
            'khatian' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'খতিয়ান', 'খতিয়ান', 'কোটি', '7'],
            'porcha' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ই-পর্চা', 'পর্চা', 'কোটি', '8'],
            'national_portal' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'পোর্টাল', 'সক্রিয় অফিস', 'হাজার', '9'],
            'digital_centre' => ['উদ্যোক্তা', 'ডিজিটাল সেন্টার', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', '', 'ইউডিসি', 'আয় ২০ হাজার+', 'শত', '10'],
            'agent-banking' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'এজেন্ট ব্যাংকিং', 'সেবা প্রদান', 'কোটি', '11'],
            'ek-pay' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'একপে', 'সেবা প্রদান', 'কোটি', '12'],
            'mobile-banking' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'মোবাইল ব্যাংকিং', 'সেবা প্রদান', 'কোটি', '5'],
            'mobile-banking' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এজেন্ট ব্যাংকিং সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'মোবাইল ব্যাংকিং', 'সেবা প্রদান', 'কোটি', '6'],
            'mmc' => ['স্কুল', 'মাল্টিমিডিয়া ক্লাস রুম', 'মাল্টিমিডিয়া ক্লাস রুম এর সংখ্যা', 'মাল্টিমিডিয়া রুম', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'এম এম সি', 'ক্লাশ রুম', 'হাজার', '7'],
            'teachers_portal' => ['শিক্ষক', 'কনটেন্ট', 'প্রতিদিনের ভিসিট', 'মাল্টিমিডিয়া রুম', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'শিক্ষক বাতায়ন', 'নিবন্ধিত', 'লক্ষ', '7'],
            'kishore_konnect' => ['কিশোর', 'কনটেন্ট', 'প্রতিদিনের ভিসিট', 'শ্রেণী', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'কানেক্ট', 'নিবন্ধিত', 'লক্ষ', '8'],
            'sif' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'ইনোভেশন ফান্ড', 'প্রকল্প', ' টি', '9'],
            'argi' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'কৃষি বাতায়ন', 'সক্রিয় কর্মকর্তা', ' জন', '10'],
            'muktopaath' => ['কোর্স', 'ব্যাভারকারী', 'প্রতিদিনের ভিসিট', 'কোর্সের ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'মুক্ত পাঠ', 'নিবন্ধিত', 'লক্ষ', '11'],
            'ek_shop' => ['এজেন্ট', 'ডিজিটাল সেন্টার', 'এক শপ এর মাধ্যমে অর্ডার গ্রহণ', 'পণ্য বিক্রয়', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'একশপ', 'অর্ডার', 'লক্ষ', '12'],
            '333' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', '৩৩৩', 'কল', ' টি', '5'],
            '3331' => ['অফিস', 'সেবা', 'সেবা প্রদান', 'সেবার ধরণ', 'সেবার ধরণ', 'নিবন্ধিত উদ্যোক্তা ও সক্রিয় উদ্যোক্তা ', 'কৃষি কল সেবা', 'কল', ' টি', '6'],
        ];
        return $data;
    }

    public static function serviceList($service)
    {
        $lists = [
            'digital_centre' => 'কৃষি ও ফসলি ঋণের আবেদন,নামজারি,ডিজিটাল রেকর্ড রুম,খাদ্যশস্য ও খাদ্য সামগ্রী ব্যবসার লাইসেন্স প্রাপ্তির জন্য আবেদন,সাধারণ ভবিষ্য তহবিল হতে অগ্রিম উত্তোলনের আবেদন ফরম,তথ্য কমিশনে অভিযোগ দায়ের ফরম,হজ প্রাক্-নিবন্ধন ও নিবন্ধন পদ্বতি,অন্যান্য',
            'sample_udc' => 'বোয়ালদাড়,খট্টামাধবপাড়া,আলীহাট,লতিফপুর,তরফপুর,বাসতৈল,আজগানা,আন্দুলবাড়ীয়া,ধোবাউড়া,গোঁরাই,গামারীতলা,গোয়াতলা,ঘোষগাঁও,জালিয়াপালং,পালংখালী,রত্নাপালং,রাজাপালং,চলিশিয়া,হলদিয়াপালং,ইসলামপুর,ইসলামাবাদ,ঈদগাঁও,খুরুশকুল,চৌফলদন্ডী,জালালাবাদ,ঝিলংজা,পিএমখালী,পোকখালী,চলিশিয়া,উত্তরধুরুং,পায়রা,কৈয়ারবিল,দক্ষিণধুরুং,বড়ঘোপ,লেমশীখালী,প্রেমবাগ,কাকারা,কৈয়ারবিল,বাঘুটিয়া,কোনাখালী,খুটাখালী,শুভপাড়া,চিরিংগা,ঢেমুশিয়া,শ্রীধরপুর,দুলাহাজরা,পশ্চিমবড়ভেওলা,সিদ্দিপাশা',
            'dfs' => 'বয়স্ক ভাতা, বিধবা ভাতা, প্রতিবন্ধী ভাতা, বিদ্যুৎ বিল, গ্যাস বিল, পানির বিল, পৌরকর',
            'sample_udc' => 'বোয়ালদাড়,খট্টামাধবপাড়া,আলীহাট,লতিফপুর,তরফপুর,বাসতৈল,আজগানা,আন্দুলবাড়ীয়া,ধোবাউড়া,গোঁরাই,গামারীতলা,গোয়াতলা,ঘোষগাঁও,জালিয়াপালং,পালংখালী,রত্নাপালং,রাজাপালং,চলিশিয়া,হলদিয়াপালং,ইসলামপুর,ইসলামাবাদ,ঈদগাঁও,খুরুশকুল,চৌফলদন্ডী,জালালাবাদ,ঝিলংজা,পিএমখালী,পোকখালী,চলিশিয়া,উত্তরধুরুং,পায়রা,কৈয়ারবিল,দক্ষিণধুরুং,বড়ঘোপ,লেমশীখালী,প্রেমবাগ,কাকারা,কৈয়ারবিল,বাঘুটিয়া,কোনাখালী,খুটাখালী,শুভপাড়া,চিরিংগা,ঢেমুশিয়া,শ্রীধরপুর,দুলাহাজরা,পশ্চিমবড়ভেওলা,সিদ্দিপাশা',
            'ek_shop' => 'পন্য -১,পন্য -২,পন্য -৩,পন্য -৪,পন্য -৫,পন্য -৬,পন্য -৭',
            'mmc' => 'প্রাথমিক,মাধ্যমিক',
            'teachers_portal' => 'প্রথম শ্রেণির জন্য কনটেন্ট,দ্বিতীয় শ্রেণির জন্য কনটেন্ট,তৃতীয় শ্রেণির জন্য কনটেন্ট,চতুর্থ শ্রেণির জন্য কনটেন্ট,পঞ্চম শ্রেণির জন্য কনটেন্ট,ষষ্ঠ শ্রেণির জন্য কনটেন্ট,সপ্তম শ্রেণির জন্য কনটেন্ট,অষ্টম শ্রেণির জন্য কনটেন্ট,নবম শ্রেণির জন্য কনটেন্ট,দশম শ্রেণির জন্য কনটেন্ট',
            'muktopaath' => 'কোর্স ধরণ ১,কোর্স ধরণ ২,কোর্স ধরণ ৩, কোর্স ধরণ ৪, কোর্স ধরণ ৫, কোর্স ধরণ ৬, কোর্স ধরণ ৭',
            'kishore_konnect' => 'গল্প, কমিক্স, বিজ্ঞান চর্চা, ছড়া, ভূগোল, ইতিহাস, ঘুরেবেড়ান',
            'land' => 'ই-মিউটেশন, আর এস খতিয়ান, পর্চা',
            'nothi' => 'নথি,পত্রজারি, নোট, সেবা -১,সেবা -২,সেবা -৩,সেবা -৪',
            'national_portal' => 'অফিস-১,অফিস-২,অফিস-৩,অফিস-৪,অফিস-৫,অফিস-৬,অফিস-৭ ',
            '333' => 'সেবা-১,সেবা-২,সেবা-৩,সেবা-৪,সেবা-৫',
            'sps' => 'সেবা সহযিকরন,ডিজিটাল সেবায় রুপান্তর',
            'sif' => 'সার্ভিস ইনোভেশন ফান্ড, চ্যালেঞ্জ ফান্ড, উদ্ভাবকের খোঁজে, ইনোভেথন',
            'argi' => 'লেখা,প্রশ্নোত্তর,ভিডিও,ছবি,ফসল,বালাই,উপকরন,ডিলার,উপজেলা তথ্য',
            '3331' => 'মোট কল, সেবা প্রদান',
            'drr' => 'মোট সেবার আবেদন, মোট সেবা প্রদান,নিবন্ধিত অফিস,সক্রিয় অফিস, মোট ব্যবহারকারী, মোট কোর্ট ফি '
        ];
        if (isset($lists[$service])) {
            $data = $lists[$service];
            return explode(',', $data);
        } else {
            return true;
        }
    }

    public static function indicatorList($service)
    {
        $lists = [
            'digital_centre' => ' নিবন্ধিত উদ্যোক্তা, সক্রিয় উদ্যোক্তা, প্রতি মাসে আয় ২০০০০+,প্রতি মাসে আয় ১৫০০০-২০০০০,প্রতি মাসে আয় ১০০০০-১৫০০০,প্রতি মাসে আয় ৫০০০-১০০০০',
            'dfs' => ' নিবন্ধিত এজেন্ট, সক্রিয় এজেন্ট, প্রতি মাসে আয় ২০০০০+,প্রতি মাসে আয় ১৫০০০-২০০০০,প্রতি মাসে আয় ১০০০০-১৫০০০,প্রতি মাসে আয় ৫০০০-১০০০০',
            'ek_shop' => 'প্রতি মাসে আয় ২০০০০+,প্রতি মাসে আয় ১৫০০০-২০০০০,প্রতি মাসে আয় ১০০০০-১৫০০০,প্রতি মাসে আয় ৫০০০-১০০০০',
            'mmc' => 'ক্লাসে মাল্টিমিডিয়া ব্যবহারে সক্ষম শিক্ষক, ক্লাসে মাল্টিমিডিয়া ব্যবহারে সক্ষম প্রাথমিক বিদ্যালয় শিক্ষক, ক্লাসে মাল্টিমিডিয়া ব্যবহারে সক্ষম মাধ্যমিক বিদ্যালয় শিক্ষক',
            'teachers_portal' => 'নিবন্ধিত শিক্ষকের সংখ্যা, একটিভ শিক্ষকের সংখ্যা,কন্টেন্ট প্রকাশ করেন এমন শিক্ষকের সংখ্যা,শহরের শিক্ষকের সংখ্যা,গ্রামের শিক্ষকের সংখ্যা,আলোচনায় অনশগ্রহনকারী শিক্ষক',
            'muktopaath' => 'কোর্স, এনরোল',
            'kishore_konnect' => 'কিশোর, এনরোল',
            'land' => 'অফিস, সক্রিয় অফিস, সর্বমোট সেবা, সর্বমোট ই সেবা',
            'nothi' => 'নিবন্ধিত অফিস,সক্রিয় অফিস,সর্বমোট ফাইল গ্রহন, সর্বমোট ফাইল নিস্পত্তি',
            'national_portal' => 'সর্বমোট অফিস, সক্রিয় অফিস',
            '333' => 'সেবা-১,সেবা-২,সেবা-৩,সেবা-৪,সেবা-৫',
            'sps' => 'সেবা সহযিকরন,ডিজিটাল সেবায় রুপান্তর',
            'sif' => 'আইডিয়া জমা,নতুন ব্যবহারকারী,পাইলট চলমান,স্কেল আপ',
            'argi' => 'লেখা,প্রশ্নোত্তর,ভিডিও,ছবি,ফসল,বালাই,উপকরন,ডিলার,উপজেলা তথ্য',
            '3331' => 'মোট কল, সেবা প্রদান',
            'drr' => 'মোট সেবার আবেদন, মোট সেবা প্রদান,নিবন্ধিত অফিস,সক্রিয় অফিস, মোট ইউজার, মোট কোর্ট ফি '
        ];
        if (isset($lists[$service])) {
            $data = $lists[$service];
            return explode(',', $data);
        } else {
            return true;
        }
    }

    public static function serviceIndicatorList($service)
    {
        $lists = [
            'digital_centre' => 'সরকারি সেবা,বেসরকারি সেবা,অনলাইন সেবা,ম্যানুয়াল সেবা,অনলাইনে সরকারি সেবা,অনলাইনে বেসরকারি সেবা',
            'digital_centre_note' => 'সডিজিটাল সেন্টার হতে সর্বমোট সেবা প্রদান, ডিজিটাল সেন্টার হতে সর্বমোট সরকারি সেবা প্রদান,ডিজিটাল সেন্টার হতে সর্বমোট বেসরকারি সেবা প্রদান, ডিজিটাল সেন্টার হতে অনলাইনের মাধ্যমে সর্বমোট সেবা প্রদান, ডিজিটাল সেন্টার হতে ম্যানুয়াল মাধ্যমে সর্বমোট সেবা প্রদান, ডিজিটাল সেন্টার হতে অনলাইনের মাধ্যমে সর্বমোট সেবা প্রদান, ডিজিটাল সেন্টার হতে অনলাইনের মাধ্যমে সর্বমোট বেসরকারি সেবা প্রদান',
            'sample_udc' => 'বোয়ালদাড়,খট্টামাধবপাড়া,আলীহাট,লতিফপুর,তরফপুর,বাসতৈল,আজগানা,আন্দুলবাড়ীয়া,ধোবাউড়া,গোঁরাই,গামারীতলা,গোয়াতলা,ঘোষগাঁও,জালিয়াপালং,পালংখালী,রত্নাপালং,রাজাপালং,চলিশিয়া,হলদিয়াপালং,ইসলামপুর,ইসলামাবাদ,ঈদগাঁও,খুরুশকুল,চৌফলদন্ডী,জালালাবাদ,ঝিলংজা,পিএমখালী,পোকখালী,চলিশিয়া,উত্তরধুরুং,পায়রা,কৈয়ারবিল,দক্ষিণধুরুং,বড়ঘোপ,লেমশীখালী,প্রেমবাগ,কাকারা,কৈয়ারবিল,বাঘুটিয়া,কোনাখালী,খুটাখালী,শুভপাড়া,চিরিংগা,ঢেমুশিয়া,শ্রীধরপুর,দুলাহাজরা,পশ্চিমবড়ভেওলা,সিদ্দিপাশা',
            'dfs' => 'এজেন্ট ব্যাংকিং এর মাধ্যামে ব্যাংকিং সেবা প্রদান, নতুন আকাউন্ট তৈরী,সর্বমোট লেনদেনর সংখ্যা ,সর্বমোট সংযুক্ত ব্যাংক,সর্বমোট সুবিধাবঞ্চিত কে সেবা প্রদান,সামাজিক নিরাপত্তা বেষ্টনীর সুবিধাভোগী,এন আই ডি ভিত্তিক লেনদেন,অনলাইনের মাধ্যমে সরকারি অর্থ প্রাপ্তি',
            'dfs_note' => 'এজেন্ট ব্যাংকিং এর মাধ্যামে ব্যাংকিং সেবা প্রদান, নতুন আকাউন্ট তৈরী,সর্বমোট লেনদেনর সংখ্যা (ব্যাংকিং - রেমিটেন্স - ইউটিলিটি ইত্যাদি,সর্বমোট সংযুক্ত ব্যাংক,সর্বমোট সুবিধাবঞ্চিত কে সেবা প্রদান,সামাজিক নিরাপত্তা বেষ্টনীর সুবিধাভোগী,এন আই ডি ভিত্তিক লেনদেন,অনলাইনের মাধ্যমে সরকারি অর্থ প্রাপ্তি',
            'sample_udc' => 'বোয়ালদাড়,খট্টামাধবপাড়া,আলীহাট,লতিফপুর,তরফপুর,বাসতৈল,আজগানা,আন্দুলবাড়ীয়া,ধোবাউড়া,গোঁরাই,গামারীতলা,গোয়াতলা,ঘোষগাঁও,জালিয়াপালং,পালংখালী,রত্নাপালং,রাজাপালং,চলিশিয়া,হলদিয়াপালং,ইসলামপুর,ইসলামাবাদ,ঈদগাঁও,খুরুশকুল,চৌফলদন্ডী,জালালাবাদ,ঝিলংজা,পিএমখালী,পোকখালী,চলিশিয়া,উত্তরধুরুং,পায়রা,কৈয়ারবিল,দক্ষিণধুরুং,বড়ঘোপ,লেমশীখালী,প্রেমবাগ,কাকারা,কৈয়ারবিল,বাঘুটিয়া,কোনাখালী,খুটাখালী,শুভপাড়া,চিরিংগা,ঢেমুশিয়া,শ্রীধরপুর,দুলাহাজরা,পশ্চিমবড়ভেওলা,সিদ্দিপাশা',
            'ek_shop' => '৭২ ঘন্টার মধ্যে বিতরণ করা পন্যের সংখ্যা,অর্ডার গ্রহণ,বাতিলকৃত অর্ডার,অর্ডার গ্রহণ করে পন্য বিতরন,গ্রাম হতে গৃহীত অর্ডার,শহর হতে গৃহীত অর্ডার,অর্ডার বিতরণ করা,গ্রামে বিতরণ করা অর্ডার,শহরে  বিতরণ করা অর্ডার,সহযোগী প্রতিষ্ঠান',
            'ek_shop_note' => '৭২ ঘন্টার মধ্যে বিতরণ করা পন্যের সংখ্যা,অর্ডার গ্রহণ,বাতিলকৃত অর্ডার,অর্ডার গ্রহণ করে পন্য বিতরন,গ্রাম হতে গৃহীত অর্ডার,শহর হতে গৃহীত অর্ডার,অর্ডার বিতরণ করা,গ্রামে বিতরণ করা অর্ডার,শহরে  বিতরণ করা অর্ডার,সহযোগী প্রতিষ্ঠান',
            'mmc' => 'সক্রিয় মাল্টিমিডিয়া ক্লাসরুম সমৃদ্ধ শিক্ষা প্রতিষ্ঠান,মাল্টিমিডিয়া ক্লাসরুমের সংখ্যা, মাল্টিমিডিয়া ক্লাসরুম সমৃদ্ধ  প্রাথমিক বিদ্যালয়, মাল্টিমিডিয়া ক্লাসরুম সমৃদ্ধ  মাধ্যমিক বিদ্যালয়, প্রতিদিন  দুই এর অধিক ক্লাস মাল্টিমিডিয়া ক্লাসরুম ব্যবহার করে নেয় এমন স্কুল এর সংখ্যা, ক্লাসে মাল্টিমিডিয়া ব্যবহারে সক্ষম শিক্ষক',
            'mmc_note' => 'মাসে কমপক্ষে দুটি ক্লাস মাল্টিমিডিয়া ক্লাসরুম ব্যবহার করে নেয়া হয়,মাল্টিমিডিয়া ক্লাসরুমের সংখ্যা, মাল্টিমিডিয়া ক্লাসরুম সমৃদ্ধ  প্রাথমিক বিদ্যালয়, মাল্টিমিডিয়া ক্লাসরুম সমৃদ্ধ  মাধ্যমিক বিদ্যালয়, প্রতিদিন  দুই এর অধিক ক্লাস মাল্টিমিডিয়া ক্লাসরুম ব্যবহার করে নেয় এমন স্কুল এর সংখ্যা, ক্লাসে মাল্টিমিডিয়া ব্যবহারে সক্ষম শিক্ষক',
            'teachers_portal' => 'প্রতিদিনের ভিসিট, নিবন্ধিত শিক্ষকের সংখ্যা, কন্টেন্ট প্রকাশ করেন এমন শিক্ষকের সংখ্যা, শহরের শিক্ষকের সংখ্যা, গ্রামের শিক্ষকের সংখ্যা, শহরের স্কুলের সংখ্যা,গ্রামের স্কুলের সংখ্যা,প্রাথমিক স্কুলের সংখ্যা,মাধ্যমিক স্কুলের সংখ্যা,উচ্চমাধ্যমিক স্কুলের সংখ্যা,আলোচনায় অনশগ্রহনকারী শিক্ষক',
            'teachers_portal_note' => 'প্রতিদিনের ভিসিট, নিবন্ধিত শিক্ষকের সংখ্যা, কন্টেন্ট প্রকাশ করেন এমন শিক্ষকের সংখ্যা, শহরের শিক্ষকের সংখ্যা, গ্রামের শিক্ষকের সংখ্যা, শহরের স্কুলের সংখ্যা,গ্রামের স্কুলের সংখ্যা,প্রাথমিক স্কুলের সংখ্যা,মাধ্যমিক স্কুলের সংখ্যা,উচ্চমাধ্যমিক স্কুলের সংখ্যা,আলোচনায় অনশগ্রহনকারী শিক্ষক',
            'muktopaath' => 'সর্বমোট ভিসিট,সর্বমোট নিবন্ধিত ব্যাবহারকারী,কমপক্ষে একটি কোর্সে যুক্ত ব্যাবহারকারী,কমপক্ষে একটি কোর্সে সম্পন্নকারী ব্যাবহারকারী',
            'muktopaath_note' => 'সর্বমোট ভিসিট,সর্বমোট নিবন্ধিত ব্যাবহারকারী,কমপক্ষে একটি কোর্সে যুক্ত ব্যাবহারকারী,কমপক্ষে একটি কোর্সে সম্পন্নকারী ব্যাবহারকারী',
            'kishore_konnect' => 'সর্ব  মোট হিট, প্রতিদিনের গড় হিট,নিবন্ধিত ব্যবহারকারী,সক্রিয় ব্যবহারকারী,শহরের ছাত্র,গ্রামের ছাত্র,প্রাথমিক পর্যায়ের ছাত্র,মাধ্যমিক পর্যায়ের ছাত্র',
            'kishore_konnect_note' => 'কসর্ব  মোট হিট, প্রতিদিনের গড় হিট,নিবন্ধিত ব্যবহারকারী,সক্রিয় ব্যবহারকারী,শহরের ছাত্র,গ্রামের ছাত্র,প্রাথমিক পর্যায়ের ছাত্র,মাধ্যমিক পর্যায়ের ছাত্র',
            'land' => 'অনলাইনের মাধ্যমে সর্বমোট ই-মিউটেশন সেবা প্রদান, সর্বমোট মিউটেশন সেবা প্রদান,অনলাইনের মাধ্যমে সর্বমোট আর এস খতিয়ান সেবা প্রদান,অনলাইনের মাধ্যমে সর্বমোট পর্চা প্রদান',
            'land_note' => 'অনলাইনের মাধ্যমে সর্বমোট ই-মিউটেশন সেবা প্রদান, সর্বমোট মিউটেশন সেবা প্রদান,অনলাইনের মাধ্যমে সর্বমোট আর এস খতিয়ান সেবা প্রদান,অনলাইনের মাধ্যমে সর্বমোট পর্চা প্রদান,',
            'nothi' => 'নথির সর্বমোট ব্যবহার,নথির প্রতিদিনের গড় ব্যবহার,সর্বমোট ব্যবহারকারী,সর্বমোট সক্রিয় ব্যবহারকারী,নথি ব্যবহার করে সেবা প্রদান,সক্রিয় অফিস,সর্বমোট ফাইল গ্রহন,  সর্বমোট ফাইল নিস্পত্তি,  সর্বমোট ফাইল নিস্পন্নের সময়',
            'nothi_note' => 'নথির সর্বমোট ব্যবহার,নথির প্রতিদিনের গড় ব্যবহার,সর্বমোট ব্যবহারকারী,সর্বমোট সক্রিয় ব্যবহারকারী,নথি ব্যবহার করে সেবা প্রদান,সক্রিয় অফিস,সর্বমোট ফাইল গ্রহন,  সর্বমোট ফাইল নিস্পত্তি,  সর্বমোট ফাইল নিস্পন্নের সময়',
            'national_portal' => 'সর্বমোট ভিসিট, প্রতিদিনের গড় ভিসিট, সক্রিয় অফিস ( নিয়মিত অফিস তথ্য আপডেট করেন), পোর্টাল ব্যবহার করে  সেবা প্রদান ,সেবার সংখ্যা',
            'national_portal_note' => 'সর্বমোট ভিসিট, প্রতিদিনের গড় ভিসিট, সক্রিয় অফিস ( নিয়মিত অফিস তথ্য আপডেট করেন), পোর্টাল ব্যবহার করে  সেবা প্রদান ,সেবার সংখ্যা',
            '333' => 'সেবা-১,সেবা-২,সেবা-৩,সেবা-৪,সেবা-৫',
            '333_note' => 'সেবা-১,সেবা-২,সেবা-৩,সেবা-৪,সেবা-৫',
            'sps' => 'সেবা সহযিকরন,ডিজিটাল সেবায় রুপান্তর',
            'sps_note' => 'সেবা সহযিকরন,ডিজিটাল সেবায় রুপান্তর',
            'sif' => 'সর্ব মোট প্রকল্পের সংখ্যা, চলমান প্রকল্প, সম্পন্ন প্রকল্প, স্কেলআপ, বরাদ্দকৃত কৃত টাকা,ছাড় কৃত টাকা, প্রকল্পের মাধ্যমে উপকারভোগী, স্কেলআপ প্রকল্পের মাধ্যমে উপকারভোগী, চ্যালেঞ্জ ফান্ডের গৃহীত প্রকল্প, চ্যালেঞ্জ ফান্ডের গৃহীত স্কেলআপ প্রকল্প',
            'sif_note' => 'সর্ব মোট প্রকল্পের সংখ্যা, চলমান প্রকল্প, সম্পন্ন প্রকল্প, স্কেলআপ, বরাদ্দকৃত কৃত টাকা,ছাড় কৃত টাকা, প্রকল্পের মাধ্যমে উপকারভোগী, স্কেলআপ প্রকল্পের মাধ্যমে উপকারভোগী, চ্যালেঞ্জ ফান্ডের গৃহীত প্রকল্প, চ্যালেঞ্জ ফান্ডের গৃহীত স্কেলআপ প্রকল্প',
            'argi' => 'সর্ব মোট ভিসিট, প্রতিদিনের গড় ভিসিট,সর্ব মোট কৃষক,  সক্রিয় উপজেলা, সক্রিয় জেলা, সক্রিয় অঞ্চল, সক্রিয় কর্মকর্তা',
            'argi_note' => 'সর্ব মোট ভিসিট, প্রতিদিনের গড় ভিসিট,সর্ব মোট কৃষক,  সক্রিয় উপজেলা, সক্রিয় জেলা, সক্রিয় অঞ্চল, সক্রিয় কর্মকর্তা',
            '3331' => 'মোট কল, সেবা প্রদান',
            '3331_note' => 'মোট কল, সেবা প্রদান',
            'drr' => 'মোট সেবার আবেদন,মোট সেবা প্রদান  , মোট অফিস , মোট সক্রিয় অফিস , মোট সক্রিয় ব্যবহারকারী, মোট কোর্ট ফী',
            'drr_note' => 'মোট সেবার আবেদন,মোট সেবা প্রদান , মোট অফিস , মোট সক্রিয় অফিস , মোট সক্রিয় ব্যবহারকারী, মোট কোর্ট ফী',
        ];
        if (isset($lists[$service])) {
            $data = $lists[$service];
            return explode(',', $data);
        } else {
            return true;
        }
    }

    public static function teams()
    {
        return [
            'cluster-1' => 'ডিজিটাল সার্ভিস এবং পাবলিক সেক্টর ইনোভেশন',
            'cluster-2' => 'সোশ্যাল ইনোভেশন এবং হিউম্যান ডেভেলপমেন্ট',
            'cluster-3' => 'ডাটা ইনোভেশন',
            'cluster-4' => 'অপারেশন',
            'cluster-5' => 'ক্রস কাটিং/ সংমিশ্রিত',
        ];
    }

    public static function getColor()
    {
        return ['#0099C6', '#990099', '#109618', '#FF9900', '#DC3912', '#3366CC', '#DD4477', '#CCDDEB', '#EFF5D6', '#0099C6', '#990099', '#109618', '#FF9900', '#DC3912', '#3366CC', '#DD4477', '#CCDDEB', '#EFF5D6', '#0099C6', '#990099', '#109618', '#FF9900', '#DC3912', '#3366CC', '#DD4477'];
    }


    public static function clusterName($cluster)
    {
        $data = [
            'cluster-1' => 'ডিজিটাল সার্ভিস এবং পাবলিক সেক্টর ইনোভেশন',
            'cluster-2' => 'সোশ্যাল ইনোভেশন এবং হিউম্যান ডেভেলপমেন্ট',
            'cluster-3' => 'ডাটা ইনোভেশন',
            'cluster-4' => 'অপারেশন',
            'cluster-5' => 'ক্রস কাটিং/ সংমিশ্রিত',
        ];
        return $data[$cluster];
    }

    public static function randonNumbers($total, $max, $min)
    {
        $data = [];
        for ($i = 0; $i <= $total; $i++)
            $data[] = rand($min, $max);
        return implode(",", $data);
    }

    public static function randonIncreasingNumbers($total, $max, $min)
    {
        $data = [];
        $R = ($max - $min) / $total;
        for ($i = 0; $i <= $total; $i++)
            $data[] = $min = $min + $R;
        return implode(",", $data);
    }

    public static function randSingleNum($max, $min)
    {
        $data = rand($min, $max);
        return self::bdtFormat($data);
    }

    public static function bdtFormat($n, $d = 0)
    {
        if (!isset($n) || $n == "") return '';
        $n = number_format($n, $d, '.', '');
        $n = strrev($n);

        if ($d) $d++;
        $d += 3;

        if (strlen($n) > $d)
            $n = substr($n, 0, $d) . ','
                . implode(',', str_split(substr($n, $d), 2));
        $data = strrev($n);
        return self::convertToUnicode($data);
    }

    public static function convertToUnicode($number)
    {
        if (isset($number)) {
            $number = str_replace('0', '০', $number);
            $number = str_replace('1', '১', $number);
            $number = str_replace('2', '২', $number);
            $number = str_replace('3', '৩', $number);
            $number = str_replace('4', '৪', $number);
            $number = str_replace('5', '৫', $number);
            $number = str_replace('6', '৬', $number);
            $number = str_replace('7', '৭', $number);
            $number = str_replace('8', '৮', $number);
            $number = str_replace('9', '৯', $number);
            $number = str_replace('.', '.', $number);
            return $number;
        } else {
            return '০';
        }
    }

    public static function getCalanderDate($number, $unit)
    {
        /*
        $sql = "SELECT
                  DATE_FORMAT(
                    calendar.datefield,
                    'new Date(%Y, %m, %d)'
                  ) AS datefield
                FROM
                calendar
                WHERE  calendar.`datefield` BETWEEN DATE_SUB(NOW(), INTERVAL $number $unit) AND NOW()
                GROUP BY calendar.`datefield`
                ORDER BY calendar.`datefield` ASC ";
        */

        $sql = "SELECT
                  datefield,
                  DATE_FORMAT(calendar.datefield, '%y') AS date_year,
                  DATE_FORMAT(calendar.datefield, '%M') AS date_month,
                  DATE_FORMAT(
                    calendar.datefield,
                    'new Date(%Y, %m, %d)'
                  ) AS datefield
                FROM
                  calendar
                WHERE calendar.`datefield` BETWEEN DATE_SUB(NOW(), INTERVAL $number $unit)
                  AND NOW()
                GROUP BY MONTH(datefield), YEAR(datefield)
                ORDER BY datefield DESC";
        return DB::select(DB::raw($sql));
    }

    public static function get_geo_type($value_by_key = false)
    {
        if ($value_by_key) {
            $data['Division'] = 1;
            $data['District'] = 2;
            $data['Upazila'] = 3;
            $data['Union'] = 4;
        } else {
            $data[1] = 'Division';
            $data[2] = 'District';
            $data[3] = 'Upazila';
            $data[4] = 'Union';
        }
        return $data;
    }

    public static function get_project_wise_date_interval($project_id = null)
    {
        if (empty($project_id)) {
            $data[1] = '১ মাস';
            $data[3] = '৩ মাস';
            $data[6] = '৬ মাস';
            $data[12] = '১২ মাস';
            return $data;
        } else {
            return true;
        }
    }

    public static function get_compare_data($date, $indicator_lists, $project_details)
    {
        $month = date('m', strtotime($date));
        $year = date('Y', strtotime($date));

        $data = array();
        foreach ($indicator_lists as $indicator_list) {
            $current_month_data = 0;
            //getting mongo data
            $last_operation_date = mongoFormattedDate($date);

            if($indicator_list->data_process == "MAN"){
                $last_manual_operation_date = ManualData::where('indicator_id', $indicator_list->id)
                    ->where('is_authorized', 1)->max('date');
                if($last_manual_operation_date){
                    $last_operation_date = mongoFormattedDate($last_manual_operation_date);
                }
            }

            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$indicator_list->id)
                ->where('date', $last_operation_date)
                ->first();

            if (isset($mongo_data['summary'])) {
                $current_month_data = $mongo_data['summary'];
            }

            if (!isset($current_month_data)) {
                $current_month_data = 0;
            }
            if (!isset($previous_month_data)) {
                $previous_month_data = 0;
            }
            if ($previous_month_data > $current_month_data) {
                $data[$indicator_list->id]['progress'] = 0;
            } else {
                $data[$indicator_list->id]['progress'] = 1;
            }

            $d = $previous_month_data - $current_month_data;
            if ($previous_month_data == 0) {
                $data[$indicator_list->id]['percentage'] = 0;
            } else {
                $data[$indicator_list->id]['percentage'] = abs(ceil($percent = $d / ($previous_month_data * 100)));
            }

            $data[$indicator_list->id]['value'] = $current_month_data;
            $data[$indicator_list->id]['target_value'] = IndicatorTarget::where('indicator_id', $indicator_list->id)
                ->where('month', $month)
                ->where('year', $year)
                ->value('target_data');
        }
        return $data;
    }

    public static function get_district_wise_data($project_id, $geo_type = null, $geo_id = null, $indicator_id = null, $date)
    {
        //echo $geo_type; die;
        if ($date == "") {
            $date = date("Y-m", strtotime("-1 month"));
        }
        $geo = "district_id";
        if ($geo_type == 3) {
            $geo = "upazila_id";
            $area = Area::select('bbscode')->where('bbscode', $geo_id)->first();
            $geo_id = (int)$area->bbscode;
        } elseif ($geo_type == 4) {
            $geo = "union_id";
        }
        $project_details = Project::where('id', $project_id)->first();
        $indecator_lists = Indicator::where('project_id', $project_id)->where('id', $indicator_id)->where('status', 1)->get();

        $data = array();
        if (!Schema::hasColumn($project_details->reference_table_name, 'district_id')) {
            return true;
        }

        //mongo

        if ($geo_type == 3) {
            foreach ($indecator_lists as $indecator_list) {
                $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$indecator_list->id)->first();
                foreach ($mongo_data['data']['district'] as $district_id => $district_data) {
                    if ($district_id != $geo_id) {
                        continue;
                    }

                    foreach ($district_data['upazila'] as $upazila_id => $upazila_summery) {
                        foreach ($upazila_summery['summary'] as $sum) {
                            //echo "<pre>"; print_r($sum);
                            $temp_date = date('Y-m', strtotime(mongo_date_to_regular_date($sum['date'])));
                            //echo $temp_date."<>".$date."<br>";
                            if (strtotime($temp_date) == strtotime($date)) {
                                $parent_id = get_geo_id($geo_id, 'D');
                                $bbs_id = get_geo_id($upazila_id, 'UP', $parent_id);
                                $data[$bbs_id][$indecator_list->id] = $sum['data'];
                            }
                        }

                    }
                    if (get_geo_id($district_id, 'D') == $geo_id) {
                        break;
                    }
                }
            }
        }

        return $data;
    }

    public static function get_data($indecator_id = null, $month = null, $month_interval = null)
    {

        $indecator_details = Indicator::where('id', $indecator_id)->first();
        if ($indecator_details->project_id == 5) {
            $indecator_name_eng = $indecator_details->used_column;
        } else {
            $indecator_name_eng = strtolower(str_replace(' ', '_', $indecator_details->name));
        }
        $indecator_name_bng = $indecator_details->bangla_name;

        $url = url('/');
        if ($url == 'http://114.130.80.160') {
            $url = 'http://114.130.80.160/api/graph-api/' . $indecator_id;
        } else {
            $url = 'http://localhost/a2i_dashboard/api/graph-api/' . $indecator_id;
        }

        //calling api
        $client = new \GuzzleHttp\Client();
        $body = $client->get($url)->getBody();
        $response = json_decode($body);
        //dd($response);
        $api_data = array();

        foreach ($response as $key => $val) {
            if ($key == 'date_data') {
                $api_data['date_data'] = explode(',', $val);
            } else {
                $api_data[$indecator_name_eng] = explode(',', $val);
            }
        }

        //dd($api_data);

        $data[0][0] = 'মাস';
        $data[0][1] = $indecator_name_bng;

        /*
        foreach($response as $key=>$row)
        {

        }
        */
        foreach ($api_data['date_data'] as $key => $row) {
            $data[$key + 1][0] = english_to_bangla(date('F ,Y', strtotime($row)));
        }
        foreach ($api_data[$indecator_name_eng] as $key => $row) {
            $data[$key + 1][1] = (float)$row;
        }
        return $data;
    }

    public static function get_data_compare($indecator_id = null, $compare_indecator_id, $month = null, $month_interval = null)
    {

        $indecator_details = Indicator::where('id', $indecator_id)->first();
        $indecator_details_compare = Indicator::where('id', $compare_indecator_id)->first();
        $indecator_name_eng = strtolower(str_replace(' ', '_', $indecator_details->name));
        $indecator_name_eng_compare = strtolower(str_replace(' ', '_', $indecator_details_compare->name));
        $indecator_name_bng = $indecator_details->bangla_name;
        $indecator_name_bng_compare = $indecator_details_compare->bangla_name;

        $url = url('/');
        if ($url == 'http://114.130.80.160') {
            $url = 'http://114.130.80.160/api/graph-api/' . $indecator_id;
            $url_compare = 'http://114.130.80.160/api/graph-api/' . $compare_indecator_id;
        } else {
            $url = 'http://localhost/a2i_dashboard/api/graph-api/' . $indecator_id;
            $url_compare = 'http://localhost/a2i_dashboard/api/graph-api/' . $compare_indecator_id;
        }

        //calling api
        $client = new \GuzzleHttp\Client();
        $body = $client->get($url)->getBody();
        $response = json_decode($body);
        //dd($response);

        //calling api
        $client = new \GuzzleHttp\Client();
        $body = $client->get($url_compare)->getBody();
        $response_compare = json_decode($body);


        $api_data = array();
        $api_data_compare = array();

        foreach ($response as $key => $val) {
            if ($key == 'date_data') {
                $api_data['date_data'] = explode(',', $val);
            } else {
                $api_data[$indecator_name_eng] = explode(',', $val);
            }
        }

        foreach ($response_compare as $key => $val) {
            if ($key == 'date_data') {
                $api_data_compare['date_data'] = explode(',', $val);
            } else {
                $api_data_compare[$indecator_name_eng] = explode(',', $val);
            }
        }

        //dd($api_data);

        $data[0][0] = 'মাস';
        $data[0][1] = $indecator_name_bng;
        $data[0][2] = $indecator_name_bng_compare;


        foreach ($api_data['date_data'] as $key => $row) {
            $data[$key + 1][0] = english_to_bangla(date('F ,Y', strtotime($row)));
        }
        foreach ($api_data[$indecator_name_eng] as $key => $row) {
            $data[$key + 1][1] = (float)$row;
        }
        foreach ($api_data_compare[$indecator_name_eng] as $key => $row) {
            $data[$key + 1][2] = (float)$row;
        }

        return $data;
    }

    public static function get_service_data($indecator_id, $month = null, $month_interval = null)
    {
        $indecator_details = Service::where('id', $indecator_id)->first();
        if (empty($indecator_details)) {
            return false;
        }

        //$indecator_name_eng=strtolower(str_replace(' ', '_', $indecator_details->name));
        $indecator_name_eng = $indecator_details->name;
        //$indecator_name_bng=$indecator_name_eng;

        $url = url('/');
        if ($url == 'http://114.130.80.160') {
            $url = 'http://114.130.80.160/api/service-graph-api/' . $indecator_id;
        } else {
            $url = 'http://localhost/a2i_dashboard/api/service-graph-api/' . $indecator_id;
        }

        //calling api
        $client = new \GuzzleHttp\Client();
        $body = $client->get($url)->getBody();
        $response = json_decode($body);
        //dd($response);
        $api_data = array();

        foreach ($response as $key => $val) {
            if ($key == 'date_data') {
                $api_data['date_data'] = explode(',', $val);
            } else {
                $api_data[$indecator_name_eng] = explode(',', $val);
            }
        }

        //dd($api_data);

        $data[0][0] = 'মাস';
        $data[0][1] = $indecator_name_eng;

        /*
        foreach($response as $key=>$row)
        {

        }
        */
        foreach ($api_data['date_data'] as $key => $row) {
            $data[$key + 1][0] = english_to_bangla(date('F ,Y', strtotime($row)));
        }
        foreach ($api_data[$indecator_name_eng] as $key => $row) {
            $data[$key + 1][1] = (float)$row;
        }

        return $data;
    }

    public static function get_service_data_compare($indecator_id = null, $compare_indecator_id, $month = null, $month_interval = null)
    {

        $indecator_details = Indicator::where('id', $indecator_id)->first();
        $indecator_details_compare = Indicator::where('id', $compare_indecator_id)->first();
        $indecator_name_eng = strtolower(str_replace(' ', '_', $indecator_details->name));
        $indecator_name_eng_compare = strtolower(str_replace(' ', '_', $indecator_details_compare->name));
        $indecator_name_bng = $indecator_details->bangla_name;
        $indecator_name_bng_compare = $indecator_details_compare->bangla_name;

        $url = url('/');
        if ($url == 'http://114.130.80.160') {
            $url = 'http://114.130.80.160/api/graph-api/' . $indecator_id;
            $url_compare = 'http://114.130.80.160/api/graph-api/' . $compare_indecator_id;
        } else {
            $url = 'http://localhost/a2i_dashboard/api/graph-api/' . $indecator_id;
            $url_compare = 'http://localhost/a2i_dashboard/api/graph-api/' . $compare_indecator_id;
        }

        //calling api
        $client = new \GuzzleHttp\Client();
        $body = $client->get($url)->getBody();
        $response = json_decode($body);
        //dd($response);

        //calling api
        $client = new \GuzzleHttp\Client();
        $body = $client->get($url_compare)->getBody();
        $response_compare = json_decode($body);


        $api_data = array();
        $api_data_compare = array();

        foreach ($response as $key => $val) {
            if ($key == 'date_data') {
                $api_data['date_data'] = explode(',', $val);
            } else {
                $api_data[$indecator_name_eng] = explode(',', $val);
            }
        }

        foreach ($response_compare as $key => $val) {
            if ($key == 'date_data') {
                $api_data_compare['date_data'] = explode(',', $val);
            } else {
                $api_data_compare[$indecator_name_eng] = explode(',', $val);
            }
        }

        //dd($api_data);

        $data[0][0] = 'মাস';
        $data[0][1] = $indecator_name_bng;
        $data[0][2] = $indecator_name_bng_compare;


        foreach ($api_data['date_data'] as $key => $row) {
            $data[$key + 1][0] = english_to_bangla(date('F ,Y', strtotime($row)));
        }
        foreach ($api_data[$indecator_name_eng] as $key => $row) {
            $data[$key + 1][1] = (float)$row;
        }
        foreach ($api_data_compare[$indecator_name_eng] as $key => $row) {
            $data[$key + 1][2] = (float)$row;
        }

        return $data;
    }

    public static function get_transactional_data($project_id, $type)
    {
        $sql = "";
        if ($project_id == -1) {
            $sql = " SELECT sectors.bangla_name as sector_name,sectors.id as  sector_id,task_metas.key as key_val,SUM(task_metas.value) AS amount FROM task_metas
        JOIN tasks ON tasks.id=task_metas.task_id
        JOIN sectors ON sectors.id=tasks.sector_id
        WHERE  task_metas.key='$type'
        GROUP BY sectors.id,task_metas.key ";
        } else {
            $sql = " SELECT sectors.bangla_name as sector_name,sectors.id as  sector_id,task_metas.key as key_val,SUM(task_metas.value) AS amount FROM task_metas
        JOIN tasks ON tasks.id=task_metas.task_id
        JOIN sectors ON sectors.id=tasks.sector_id
        WHERE tasks.project_id=$project_id and task_metas.key='$type'
        GROUP BY sectors.id,task_metas.key ";
        }

        //echo $sql; die;
        $results = DB::select($sql);

        $data = array();
        foreach ($results as $result) {
            $data[$result->sector_name][$result->key_val] = $result->amount;
        }

        return $data;
    }

    public static function get_transactional_sum($project_id = null)
    {
        $sql = "";
        if ($project_id == "") {
            $sql = "SELECT task_metas.key AS key_val,SUM(task_metas.value) AS amount
                FROM task_metas
                JOIN tasks ON task_metas.`task_id`=tasks.id
                GROUP BY task_metas.key";
        } else {
            $sql = "SELECT task_metas.key AS key_val,SUM(task_metas.value) AS amount
            FROM task_metas
            JOIN tasks ON task_metas.`task_id`=tasks.id
            where tasks.project_id=$project_id
            GROUP BY task_metas.key";
        }

        $results = DB::select($sql);
        $data = array();
        $calculated_data = array();
        foreach ($results as $result) {
            $data[$result->key_val]['amount'] = $result->amount;
            $calculated_data[$result->key_val] = $result->amount;
        }
        foreach ($calculated_data as $key => $row) {
            if ($key == 'Apply') {
                $data[$key]['percent'] = 9;
            } elseif ($key == 'Approve') {
                $d = $calculated_data['Approve'] / $calculated_data['Apply'];
                $data[$key]['percent'] = ceil($d * 100);
            } elseif ($key == 'Real') {
                $d = $calculated_data['Real'] / $calculated_data['Approve'];
                $data[$key]['percent'] = ceil($d * 100);
            }
        }

        return $data;
    }

    public static function load_tansactional_graph_data($project_id = null)
    {
        $key_array = array('Apply', 'Approve', 'Real');
        $data = array();
        foreach ($key_array as $key) {

            if ($project_id != "") {

                //$sql="Select * from task_metas where "
                $sql = "SELECT GROUP_CONCAT(task_metas.value) as value FROM task_metas
                JOIN tasks ON task_metas.`task_id`=tasks.id
                WHERE tasks.`project_id`=$project_id AND task_metas.`key`='$key' ";
            } else {
                $sql = "SELECT GROUP_CONCAT(task_metas.value) as value FROM task_metas
                JOIN tasks ON task_metas.`task_id`=tasks.id
                WHERE task_metas.`key`='$key' ";
            }

            $results = DB::select($sql);
            foreach ($results as $result) {
                $data[$key] = $result->value;
            }

        }

        return $data;
    }

    public static function get_menu_item_for_project()
    {
        $menu = array();
        $data = Project::whereNotNull('slug')->where('status', 1)->get();
        foreach ($data as $r) {
            $menu[$r->slug] = $r->bangla_name;
        }

        return $menu;

        /*return [
            'digital_centre' => 'ডিজিটাল সেন্টার',
            'dfs' => 'ডিজিটাল ফাইনাসিয়াল সার্ভিস',
            'ek_shop' => 'এক শপ',
            'mmc' => 'মাল্টিমিডিয়া ক্লাসরুম',
            'teachers_portal' => 'শিক্ষক বাতায়ন',
            'muktopaath' => 'মুক্ত পাঠ',
            'kishore_konnect' => 'কিশোর কানেক্ট',
            'land' => 'ভূমি',
            'nothi' => 'নথি',
            'national_portal' => 'জাতীয় বাতায়ন',
            '333' => '৩৩৩',
            'sps' => 'এস পি এস',
            'sif' => 'সার্ভিস ইনোভেশন ও চ্যালেঞ্জ ফান্ড',
            'argi' => 'কৃষি বাতায়ন',
            '3331' => 'কৃষক বন্ধু কল সেবা (৩৩৩১)'
        ];*/
    }

    public static function is_geo_enable_project($project_id, $geo_type = null)
    {
        return true;
    }

    /*
     * This function return service wise value*/
    public static function get_service_list_with_monthly_value($project_id)
    {
        $data = array();
        $mysql_data = array();
        $service_mysql_data = Service::where('project_id', $project_id)->get();
        foreach ($service_mysql_data as $val) {
            $mysql_data[$val->id] = $val->name;
        }

        $project_details = Project::where('id', $project_id)->first();
        $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('service_id', '>', 0)->get();
        foreach ($mongo_data as $summery) {
            $service_id = $summery['service_id'];
            $data[$service_id]['count'] = 0;
            $data[$service_id]['transaction'] = 0;
            $data[$service_id]['service_id'] = $service_id;
            if ($summery['data']['summary']) {
                foreach ($summery['data']['summary'] as $service_data) {
                    if (isset($service_data['count'])) {
                        $data[$service_id]['count'] = $data[$service_id]['count'] + $service_data['count'];
                        $data[$service_id]['transaction'] = $data[$service_id]['transaction'] + $service_data['sum'];
                    }

                }
            }
            if ($data[$service_id]['count'] == 0) {
                unset($data[$service_id]);
            } else {
                $data[$service_id]['name'] = $mysql_data[$service_id];
            }
        }
        //echo "<pre>"; print_r($data);
        $price = array_column($data, 'transaction');

        array_multisort($price, SORT_DESC, $data);
        //echo "<pre>"; print_r($data); die;

        return $data;

    }


    public static function get_service_list($project_id, $date)
    {
        $data = array();
        $mysql_data = [];
        $service_mysql_data = Service::where('project_id', $project_id)->get(['id', 'name']);
        $lastOperationdate = mongoFormattedDate($date);
        if ($service_mysql_data->isEmpty()) {
            return [];
        }
        foreach ($service_mysql_data as $val) {
            $mysql_data[$val['id']] = $val['name'];
        }

        $project_details = Project::where('id', $project_id)->first();
        $indicator_ids = Indicator::where('project_id', $project_id)
            ->where('service_id', '!=', 0)
            ->get(['id', 'service_id'])
            ->toArray();
        $ind_arr = [];
        foreach ($indicator_ids as $key => $ind_id) {
            $ind_arr[$ind_id['id']] = $ind_id['service_id'];
        }
        $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
            ->whereIn('indicator_id', array_keys($ind_arr))
            ->where('date', $lastOperationdate)
            ->get();

        foreach ($mongo_data as $summery) {
            $indicator_id = $summery['indicator_id'];
            $service_id = $ind_arr[$indicator_id];
            $data[$indicator_id]['data'] = 0;
//            $data[$indicator_id]['transaction'] = 0;
            $data[$indicator_id]['service_id'] = $service_id;
            $data[$indicator_id]['indicator_id'] = $indicator_id;
            if ($summery['summary']) {
                $data[$indicator_id]['data'] = $summery['summary'];
            }
            if ($data[$indicator_id]['data'] == 0) {
                unset($data[$indicator_id]);
            } else {
                $data[$indicator_id]['name'] = $mysql_data[$service_id];
            }
        }
        //echo "<pre>"; print_r($data);
        $price = array_column($data, 'data');

        array_multisort($price, SORT_DESC, $data);
        //echo "<pre>"; print_r($data); die;
        return $data;

    }

    public static function service_graph_data($indicator_list_str)
    {
        $indicator_lists = explode(',', $indicator_list_str);
        $data = [];
        foreach ($indicator_lists as $indicator_list) {
            $indicator = Indicator::where('id', $indicator_list)->first();
            $project_details = Project::where('id', $indicator->project_id)->first();
            $date = mongoFormattedDate(lastOperationDate($project_details->id));
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$indicator_list)
                ->where('date', $date)
                ->first();
            $dt = date('Y-m-d', strtotime(mongo_date_to_regular_date($mongo_data['date'])));
            $data['data'][$dt][$indicator_list] = $mongo_data['summary'];
            $data['service'][$indicator_list] = $indicator->bangla_name;
        }
        ksort($data['data']);
        return $data;
    }


//    public static function service_graph_data($indicator_list_str)
//    {
//        $indicator_lists = explode(',', $indicator_list_str);
//        $data = array();
//        foreach ($indicator_lists as $indicator_list) {
//            $indicator = Service::where('id', $indicator_list)->first();
//            $project_details = Project::where('id', $indicator->project_id)->first();
//            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('service_id', (int)$indicator_list)->first();
//            foreach ($mongo_data['data']['summary'] as $summary) {
//                $dt = date('Y-m', strtotime(mongo_date_to_regular_date($summary['date'])));
//                $data['data'][$dt][$indicator_list] = $summary['sum'];
//                $data['service'][$indicator_list] = $indicator->name;
//            }
//        }
//        //  rw($data);
//        return $data;
//    }

    public static function get_dashboard_data($user_id)
    {
        $final_data = array();
        $user_data = \App\UserSession::where('user_id', $user_id)->where('page', 'dashboard')->first();
        $user_preference = array();
        if (!empty($user_data)) {
            $user_preference = explode(',', $user_data->value);
        }

        $owner = Common::get_own_project();

        $data = [];
        $query = Project::whereNotNull('home_page_indicators')->where('status', 1);
        if (Auth::user()->role != 1 && Auth::user()->role != 5) {
            $query->whereIn('id', $owner);
        }
        $project_lists = $query->get();

        foreach ($project_lists as $project_list) {
            if ($project_list->home_page_indicators == "null") {
                continue;
            }
            $data[$project_list->id]['name'] = $project_list->bangla_name;
            $data[$project_list->id]['id'] = $project_list->id;
            $data[$project_list->id]['slug'] = $project_list->slug;
            $data[$project_list->id]['last_value'] = "";
            $data[$project_list->id]['logo'] = $project_list->logo;
            $data[$project_list->id]['indicators'] = [];
            $home_page_indicators = json_decode($project_list->home_page_indicators);
            if ($home_page_indicators) {
                foreach ($home_page_indicators as $home_page_indicator) {
                    $indicator_details = Indicator::where('id', $home_page_indicator)->first();
                    if (!empty($indicator_details)) {
                        $data[$project_list->id]['indicators'][] = $indicator_details;
                    }
                    $date = mongoFormattedDate(lastOperationDate($project_list->id));
                    //getting mongo data
                    $mongo_data = MongoModel::setCollection($project_list->reference_table_name)
                        ->where('indicator_id', (int)$indicator_details->id)
                        ->where('date', $date)
                        ->first();

                    $last_operation_date = lastOperationDate($project_list->id);
                    $last_value = 0;
                    if (isset($mongo_data['summary'])) {
                        $last_operation_date = $mongo_data['date'];
                        if ($mongo_data['summary'] != 0) {
                            $last_value = $mongo_data['summary'];
                        }
                    }
                    $data[$project_list->id]['indicator_last_value']['date'] = english_to_bangla(date('F, Y', strtotime(mongo_date_to_regular_date($last_operation_date)))) . " পর্যন্ত";
                    $data[$project_list->id]['indicator_last_value']['data'] = english_to_bangla(number_conversion($last_value));
                }
            }
        }

        foreach ($user_preference as $r) {
            if ($r != 0 && $r != "")
                $final_data[] = isset($data[$r]) ? $data[$r] : 0;
            unset($data[$r]);
        }
        foreach ($data as $r) {
            $final_data[] = $r;
        }

        return $final_data;
    }

    public static function get_dashboard_chart_data($project_id)
    {
        $project_details = Project::where('id', $project_id)->first();
        $home_page_indicators = json_decode($project_details->home_page_indicators);
        $indicator_id = $home_page_indicators[0];
        $indicator_details = collect();
        if ($home_page_indicators) {
            $indicator_details = Indicator::find($indicator_id);
        }

        $data = array();
        $monthly_date_range = [];

        $default_year_to_show_graph = get_settings('default_year_to_show_graph');
        $today = date('Y-m');
        $start_date = date('01-m-Y', strtotime('-' . $default_year_to_show_graph . ' months', strtotime($today)));
        $end_date = date('d-m-Y');

        $from_date_in_dateTime = new DateTime($start_date);
        $to_date_in_dateTime = new DateTime($end_date);

        if($end_date == date('Y-m-t', strtotime($end_date))){
            $period = count(CarbonPeriod::create($from_date_in_dateTime, $to_date_in_dateTime)->month()) + 1;
        }else{
            $period = $to_date_in_dateTime->diff($from_date_in_dateTime)->m +
                ($to_date_in_dateTime->diff($from_date_in_dateTime)->y * 12);
        }

        $current_date = Carbon::parse($end_date);

        for ($i = 0; $i < $period; $i++) {
            $monthly_date_range[$current_date->format('Y-m')]['year'] = $current_date->format('Y');
            $monthly_date_range[$current_date->format('Y-m')]['month'] = $current_date->format('m');
            $current_date->subMonths(1)->format('Y-m');
        }

        $last_operation_dates = max_operation_dates($monthly_date_range, $project_id);

        $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
            ->where('indicator_id', (int)$indicator_id)
            ->whereIn('date', $last_operation_dates)
            ->get();

        if ($mongo_data) {
            $c = 0;
            foreach ($mongo_data as $summary_data) {
                $data[$c]['date'] = isset($summary_data['date']) ? date('Y-M', strtotime(mongo_date_to_regular_date($summary_data['date']))) : 0;
                $data[$c]['data'] = isset($summary_data['summary']) ? $summary_data['summary'] : 0;
                $data[$c]['target_data'] = isset($summary_data['target_data']) ? $summary_data['target_data'] : 0;
                $data[$c]['bangla_name'] = $indicator_details->bangla_name ? $indicator_details->bangla_name : 0;
                $data[$c]['unit'] = $indicator_details->unit ? $indicator_details->unit : 0;
                $c++;
            }
        }

        return $data;
    }

    public static function get_graph_point($indicator_id, $from_date = null, $to_date = null, $geo_name = '', $division_bbs_code = '', $district_bbs_code = '', $upazila_bbs_code = '', $type = '', $specFlag = false)
    {
        $data = [];
        $indicator_details = Indicator::where('id', $indicator_id)->first();
        $project_details = Project::where('id', $indicator_details->project_id)->first();

//        $months = collect($period)->map(function (Carbon $date) {
//            return  $date->month;
//        })->toArray();

        $last_operation_dates = [];
        $monthly_date_range = [];

        if ($type != "daily" && $type != "likeWise") {
            $from_date_in_dateTime = new DateTime($from_date);
            $to_date_in_dateTime = new DateTime($to_date);

            if($to_date == date('Y-m-t', strtotime($to_date))){
                $period = count(CarbonPeriod::create($from_date, $to_date)->month());
            }else{
                $period = $to_date_in_dateTime->diff($from_date_in_dateTime)->m +
                    ($to_date_in_dateTime->diff($from_date_in_dateTime)->y * 12);
            }

            $current_date = Carbon::parse($to_date);

            for ($i = 0; $i < $period; $i++) {
                $monthly_date_range[$current_date->format('Y-m')]['year'] = $current_date->format('Y');
                $monthly_date_range[$current_date->format('Y-m')]['month'] = $current_date->format('m');
                $current_date->subMonths(1)->format('Y-m');
            }

            $last_operation_dates = max_operation_dates($monthly_date_range, $project_details->id);
            $date_format = 'F-Y';
        } else {
            $period = CarbonPeriod::create($from_date, $to_date);
            foreach ($period as $key => $dates) {
                $last_operation_dates[$key] = mongoFormattedDate($dates);
            }
            $date_format = 'd-F-Y';
        }

        $data['project_name'] = $project_details->bangla_name;
        $data['indicator_name'] = $indicator_details->bangla_name;
        $data['indicator_id'] = $indicator_details->id;
        $data['indicator_short_name'] = $indicator_details->short_form ? $indicator_details->short_form : $indicator_details->bangla_name;
        $data['default_chart'] = $indicator_details->default_chart ? $indicator_details->default_chart : 3;
        $data['chart'] = $indicator_details->chart ? json_decode($indicator_details->chart, 1) : "";
        $data['unit'] = $indicator_details->unit;
        $data['chart_list'] = Chart::all()->pluck('chart_name', 'id')->toArray();

        $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
            ->where('indicator_id', (int)$indicator_id)
            ->whereIn('date', $last_operation_dates)
            ->orderBy('date', 'ASC')
            ->get();

        $data['point_data'] = [];
        $data['details_data'] = [];

        $summary_monthly = 0;
        if($mongo_data){
            foreach ($mongo_data as $key => $summary_data) {

                if($summary_data){

                    if($specFlag == 'true'){
                        $summary = $summary_data->summary_daily;

                        if ($type != "daily" && $type != "likeWise") {
                            $summary = 0;
                            if($key == 0){
                                $last_date_of_from_date = Operations::whereMonth('date', date('m', strtotime($from_date)))
                                    ->whereYear('date', date('Y', strtotime($from_date)))
                                    ->where('project_id', $project_details->id)
                                    ->where('to_mongo', 1)
                                    ->where('to_mysql', 1)
                                    ->max('date');

                                $previous_month_data = MongoModel::setCollection($project_details->reference_table_name)
                                    ->where('indicator_id', (int)$indicator_id)
                                    ->where('date', mongoFormattedDate($last_date_of_from_date))
                                    ->first();
                                if($previous_month_data){
                                    $summary = $summary_data->summary - $previous_month_data->summary;
                                }
                            }else{
                                $summary = $summary_data->summary - $summary_monthly;
                            }
                            $summary_monthly = $summary_data->summary;
                        }
                    }else{
                        $summary = $summary_data->summary;
                    }

                    if ($geo_name) {
                        $summary = Common::getGeoDataIndex($geo_name, $division_bbs_code, $district_bbs_code, $upazila_bbs_code, $summary_data);
                    }

                    $date = mongo_date_to_regular_date($summary_data->date);

                    $year = date('Y', strtotime(mongo_date_to_regular_date($summary_data->date)));
                    $month = date('m', strtotime(mongo_date_to_regular_date($summary_data->date)));
                    $target_data = IndicatorTarget::where('indicator_id', $indicator_id)->where('year', $year)->where('month', $month)->value('target_data');

                    $data['point_data'][$date]['mongo_date'] = $summary_data->date;
                    $data['point_data'][$date]['date'] = date($date_format, strtotime(mongo_date_to_regular_date($summary_data->date)));
                    $data['point_data'][$date]['data'] = $summary;
                    $data['point_data'][$date]['target_data'] = $target_data;

                    $data['details_data'][$date]['mongo_date'] = $summary_data->date;
                    $data['details_data'][$date]['date'] = english_to_bangla(date($date_format, strtotime(mongo_date_to_regular_date($summary_data->date))));
                    $data['details_data'][$date]['data'] = english_to_bangla(bdtFormat($summary));
                    $data['details_data'][$date]['target_data'] = english_to_bangla(bdtFormat($target_data));
                }
            }
        }

        if (!empty($data['point_data']) && !empty($data['details_data'])) {
//            ksort($data['point_data']);
//            ksort($data['details_data']);

            $new_sorted_data = [];
            $c = 0;
            foreach ($data['point_data'] as $r) {
                $new_sorted_data[$c] = $r;
                $c++;
            }
            $data['point_data'] = $new_sorted_data;

            $new_sorted_data = [];
            $c = 0;
            foreach ($data['details_data'] as $r) {
                $new_sorted_data[$c] = $r;
                $c++;
            }
            $data['details_data'] = $new_sorted_data;
            //progress
            if ($from_date != "" and $to_date != "") {
                $c--;
                $current_value = $data['point_data'][$c]['data'];
                $current_date = $data['point_data'][$c]['date'];
                //find the old value

                $dt = date('d-m-Y', strtotime(mongo_date_to_regular_date($current_date)));
                $compare_date = date('01-m-Y', strtotime($current_date));
                $old_value = 0;
                if (strtotime($dt) == strtotime($compare_date)) {
                    $old_value = $current_value;
                }

                $data['progress']['title'] = english_to_bangla(date('d F, Y', strtotime($from_date))) . " হতে  " . english_to_bangla(date('d F, Y', strtotime($to_date)));

                if ($from_date == 'daily') {
                    $data['progress']['title'] = english_to_bangla(date('d F, Y', strtotime($to_date))) . " পর্যন্ত";
                }

                $percent = get_percentage($current_value, $old_value);
                $data['progress']['parcent'] = english_to_bangla(number_format(abs($percent), 2));
                $data['progress']['pve'] = ($percent >= 0) ? 1 : 0;
                $data['progress']['nve'] = ($percent < 0) ? 1 : 0;
                $data['progress']['suffix'] = ($percent < 0) ? " % হ্রাস " : " % বৃদ্ধি ";
            } else {
                $c--;
                $current_value = $data['point_data'][$c]['data'];
                $current_month = english_to_bangla(date('F, Y', strtotime($data['point_data'][$c]['date'])));
                if ($c != 0) {
                    $c--;
                    $old_value = $data['point_data'][$c]['data'];
                    $old_month = english_to_bangla(date('F, Y', strtotime($data['point_data'][$c]['date'])));
                } else {
                    $old_value = $current_value;
                    $old_month = english_to_bangla(date('F, Y', strtotime($data['point_data'][$c]['date'])));
                }

                $data['progress']['title'] = $old_month . " হতে " . $current_month;

                $percent = get_percentage($current_value, $old_value);
                $data['progress']['parcent'] = english_to_bangla(number_format(abs($percent), 2));
                $data['progress']['pve'] = ($percent >= 0) ? 1 : 0;
                $data['progress']['nve'] = ($percent < 0) ? 1 : 0;
                $data['progress']['suffix'] = ($percent < 0) ? " % হ্রাস " : " % বৃদ্ধি ";
            }
        }

        return $data;
    }

    public static function getGeoDataIndex($geo_name, $division_bbs_code, $district_bbs_code, $upazila_bbs_code, $mongo_data)
    {
        $summary_data = 0;
        if ($geo_name === 'division') {

            if (isset($mongo_data[$geo_name][$division_bbs_code]['summary'])) {
                $summary_data = $mongo_data[$geo_name][$division_bbs_code]['summary'];
            }

        } elseif ($geo_name === 'district') {

            if (isset($mongo_data['division'][$division_bbs_code][$geo_name][$district_bbs_code]['summary'])) {
                $summary_data = $mongo_data['division'][$division_bbs_code][$geo_name][$district_bbs_code]['summary'];
            }

        } elseif ($geo_name === 'upazila') {

            if (isset($mongo_data['division'][$division_bbs_code]['district'][$district_bbs_code][$geo_name][$upazila_bbs_code]['summary'])) {
                $summary_data = $mongo_data['division'][$division_bbs_code]['district'][$district_bbs_code][$geo_name][$upazila_bbs_code]['summary'];
            }

        }
        return $summary_data;
    }

    public static function getGeoDataUserDetailsIndex($geo_name, $division_bbs_code, $district_bbs_code, $upazila_bbs_code, $mongo_data, $geo_type)
    {
        $user_details = [];
        if ($geo_name == 'division') {
            if ($geo_type == 1) {
                $user_details = $mongo_data['division'][$division_bbs_code]['user_details'];
            } else {
                $i = 0;
                foreach ($mongo_data['division'] as $division_key => $division_summary) {
                    if ($division_key == $division_bbs_code) {
                        foreach ($division_summary['district'] as $district_summary) {
                            foreach ($district_summary['upazila'] as $upazila_summary) {
                                $user_details[$i] = $upazila_summary['user_details'];
                                $i++;
                            }
                        }
                    }
                }
            }
        } elseif ($geo_name == 'district') {
            if ($geo_type == 2) {
                $user_details = $mongo_data['division'][$division_bbs_code]['user_details'][$geo_name][$district_bbs_code]['user_details'];
            } else {
                $i = 0;
                foreach ($mongo_data['division'] as $division_key => $division_summary) {
                    foreach ($division_summary['district'] as $district_key => $district_summary) {
                        if ($district_key == $district_bbs_code) {
                            foreach ($district_summary['upazila'] as $upazila_summary) {
                                $user_details[$i] = $upazila_summary['user_details'];
                                $i++;
                            }
                        }
                    }
                }
            }

        } elseif ($geo_name == 'upazila') {

            if (isset($mongo_data['division'][$division_bbs_code]['district'][$district_bbs_code][$geo_name][$upazila_bbs_code]['user_details'])) {
                $user_details[0] = $mongo_data['division'][$division_bbs_code]['district'][$district_bbs_code][$geo_name][$upazila_bbs_code]['user_details'];
            }

        }
        return $user_details;
    }

//for at glance report
//    public static function get_project_data_report($project_details = array(), $from_date = null, $to_date = null, $indicators = array())
//    {
//        $start_date = date('Y-m');
//        $data = array();
//        if (empty($indicators)) {
//            $indicator_lists = Indicator::where('project_id', $project_details->id)->where('status', 1)->get();
//            foreach ($indicator_lists as $indicator_list) {
//                $indicators[$indicator_list->id] = $indicator_list->name;
//            }
//        }
//        foreach ($indicators as $indicator_id => $indicator_name) {
//            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)->where('indicator_id', (int)$indicator_id)->first();
//            if (!empty($mongo_data['data']['summary'])) {
//                foreach ($mongo_data['data']['summary'] as $summary) {
//                    $dt = date('Y-m', strtotime(mongo_date_to_regular_date($summary['date'])));
//                    if ($from_date != "" && $to_date != "") {
//                        if (strtotime($from_date) >= strtotime($dt) && strtotime($from_date) <= strtotime($dt)) {
//                            continue;
//                        }
//                    } elseif ($from_date != "") {
//                        if (strtotime($from_date) >= strtotime($dt)) {
//                            continue;
//                        }
//
//                    } elseif ($to_date != "") {
//                        if (strtotime($from_date) <= strtotime($dt)) {
//                            continue;
//                        }
//                    }
//                    //check the first date
//                    if (strtotime($start_date) > strtotime($dt)) {
//                        $start_date = $dt;
//                    }
//                    $data[$indicator_id][$dt]['data'] = english_to_bangla(bdtFormat($summary['data']));
//                    $data[$indicator_id][$dt]['target_data'] = english_to_bangla(bdtFormat($summary['target_data']));
//                    $data[$indicator_id][$dt]['name'] = $indicator_name;
//                }
//            }
//        }
//        $data['start_date'] = $start_date;
//        return $data;
//    }

    public static function get_project_data_report($project_details = array(), $from_date = null, $to_date = null, $indicators = array())
    {
        $data = array();
        if (empty($indicators)) {
            $indicator_lists = Indicator::where('project_id', $project_details->id)->where('status', 1)->get();
            foreach ($indicator_lists as $indicator_list) {
                $indicators[$indicator_list->id] = $indicator_list->name;
            }
        }

        $monthly_date_range = [];
        $current_date = Carbon::now();

        for ($i = 0; $i < 12; $i++) {
            $monthly_date_range[$current_date->format('Y-m')]['year'] = $current_date->format('Y');
            $monthly_date_range[$current_date->format('Y-m')]['month'] = $current_date->format('m');
            $current_date->subMonths(1)->format('Y-m');
        }

        $last_operation_dates = max_operation_dates($monthly_date_range, $project_details->id);

        foreach ($indicators as $indicator_id => $indicator_name) {
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$indicator_id)
                ->whereIn('date', $last_operation_dates)
                ->get();

            foreach ($mongo_data as $summary) {
                $year = date('Y', strtotime(mongo_date_to_regular_date($summary->date)));
                $month = date('m', strtotime(mongo_date_to_regular_date($summary->date)));
                $target_data = IndicatorTarget::where('indicator_id', $indicator_id)->where('year', $year)->where('month', $month)->value('target_data');
                $dt = date('Y-m', strtotime(mongo_date_to_regular_date($summary['date'])));
                $data[$indicator_id][$dt]['data'] = english_to_bangla(bdtFormat($summary->summary));
                $data[$indicator_id][$dt]['target_data'] = english_to_bangla(bdtFormat($target_data));
                $data[$indicator_id][$dt]['name'] = $indicator_name;
            }
        }
        $data['monthly_date_range'] = $monthly_date_range;
        $data['start_date'] = date('Y-m', strtotime($to_date));;
        return $data;
    }

    public static function get_project_list_from_project_owner()
    {
        return true;
        $project_owner_list = array();
        $user = Auth::user();
        $user = User::where('id', $user->id)->first();
        if ($user->project_owner != "") {
            $project_owner_list = json_decode($user->project_owner); //die('op');
        } else {
            $user->project_owner;
            die('op2');
        }
        rw($project_owner_list);
        die;
        return $project_owner_list;
    }

    public static function get_last_date_of_dat($project_id, $last_date)
    {
        $data = array();
        $indicator_date = array();
        $av = 0;
        $indicator_count = 0;
        $project_details = Project::where('id', $project_id)->first();
        $indicators = Indicator::where('status', 1)->where('project_id', $project_id)->get();
        $last_operation_date = mongoFormattedDate(lastOperationDate($project_id));
        foreach ($indicators as $indicator) {
            $temp_date = "";
            $indicator_count++;
            $mongo_data = MongoModel::setCollection($project_details->reference_table_name)
                ->where('indicator_id', (int)$indicator->id)
                ->where('date', $last_operation_date)
                ->first();
            if (!empty($mongo_data)) {
                if ($mongo_data['summary'] > 0) {
                    $dt = date('Y-m-d', strtotime(mongo_date_to_regular_date($mongo_data['date'])));
                    if ($temp_date == "") {
                        $temp_date = $dt;
                    }
                    if (strtotime($temp_date) < strtotime($dt)) {
                        $temp_date = $dt;
                    }
                    $indicator_date[$indicator->id][$dt] = $dt;
                }
            }

            //global check
            if ($last_date == "") {
                $last_date = $temp_date;
            } else if (strtotime($temp_date) > strtotime($last_date)) {
                $last_date = $temp_date;
            }
            //echo $last_date."<>".$temp_date."<>".$indicator->id."<br>";
        }
        //check last date data available
        foreach ($indicators as $r) {
            if (isset($indicator_date[$r->id][$last_date])) {
                $av++;
            }
        }
        $data['total_indicator'] = $indicator_count;
        $data['available'] = $av;
        $data['not_available'] = $indicator_count - $av;
        $data['last_date'] = $last_date;

        return $data;
    }

    public static function get_menu_item_for_category()
    {
        $sorting = get_settings('team_sorting');
        $sorting = substr($sorting, 0, -1);
        $sorting_array = explode(',', $sorting);

        $menu = array();

        $owner = Common::get_own_project();
        $project_lists = Project::whereIn('id', $owner)->where('status', 1)->get(['project_category_id']);
        if (Auth::user()->role == 1 || Auth::user()->role == 5) {
            $project_lists = Project::where('status', 1)->get(['project_category_id']);
        }
//        if (Auth::user()->role == 3) {
//            $project_lists = Project::where('project_category_id',Auth::user()->team)
//                ->orWhereIn('id', $owner)
//                ->where('status', 1)
//                ->get(['project_category_id']);
//        }

        $p = [];
        foreach ($project_lists as $project_list) {
            $p[$project_list->project_category_id] = $project_list->project_category_id;
        }
        $data = ProjectCategory::whereIn('id', $p)->where('status', 1)->get();
        foreach ($data as $r) {
            $menu[$r->id]['name'] = $r->name;

            $datas = Project::whereIn('id', $owner)->where('project_category_id', $r->id)->get()->toArray();

            if (Auth::user()->role == 1 || Auth::user()->role == 5) {
                $datas = Project::where('project_category_id', $r->id)->get()->toArray();
            }
//            if (Auth::user()->role == 3) {
//                $teams = Project::where('project_category_id', Auth::user()->team)->get()->toArray();
//                $datas = array_merge($datas,$teams);
//            }
            foreach ($datas as $d) {
//                if ($d['status'] == 1 && $d['project_category_id'] == $r->id) {
                if ($d['status'] == 1) {
                    $menu[$r->id]['submenu'][$d['id']]['name'] = $d['name'];
                    $menu[$r->id]['submenu'][$d['id']]['bangla_name'] = $d['bangla_name'];
                    $menu[$r->id]['submenu'][$d['id']]['slug'] = $d['slug'];
                }
            }
        }

        $new_menu = [];
        foreach ($sorting_array as $r) {
            if (isset($menu[$r])) {
                $new_menu[] = $menu[$r];
            }
        }


        return $new_menu;
    }

    public static function get_task_list($project_id)
    {
        $task_list = Task::where('project_id', $project_id)->orderBy('id', 'desc')->get();
        return $task_list;
    }

//send sorted list for different page
    public function get_sorted_indicator_lists($project_id)
    {
        $project = Project::find($project_id);
        $indicator_sorting = $project->indicator_sorting;
        if ($indicator_sorting == "") {
            $indicator_sorting = "0,";
        }
        $indicator_sorting = substr($indicator_sorting, 0, -1);
        $q = " SELECT * FROM indicators WHERE project_id=$project_id and STATUS=1 and id in ($indicator_sorting) ORDER BY FIELD(id," . $indicator_sorting . ") ";
        $q2 = " SELECT * FROM indicators WHERE project_id=$project_id and STATUS=1 and id not in ($indicator_sorting) ";
        $lists = DB::SELECT(DB::raw($q));
        $q2 = DB::SELECT(DB::raw($q2));
        foreach ($q2 as $r) {
            $lists[] = $r;
        }
        return $lists;
    }

//created by sohan
    public static function get_transactional_sum_for_api($project_id = null, $from_date, $to_date)
    {
        $sql = "";
        if ($project_id == "") {
            $sql = "SELECT task_metas.key AS key_val,SUM(task_metas.value) AS amount
                FROM task_metas
                JOIN tasks ON task_metas.`task_id`=tasks.id
                WHERE   tasks.date between 'from_date' AND  'to_date'
                GROUP BY task_metas.key";
        } else {
            $sql = "SELECT task_metas.key AS key_val,SUM(task_metas.value) AS amount
            FROM task_metas
            JOIN tasks ON task_metas.`task_id`=tasks.id
            where tasks.project_id=$project_id
            AND  tasks.date between 'from_date' AND  'to_date'
            GROUP BY task_metas.key";
        }

        $results = DB::select($sql);
        $data = array();
        $calculated_data = array();
        foreach ($results as $result) {
            $data[$result->key_val]['amount'] = $result->amount;
            $calculated_data[$result->key_val] = $result->amount;
        }
        foreach ($calculated_data as $key => $row) {
            if ($key == 'Apply') {
                $data[$key]['percent'] = 9;
            } elseif ($key == 'Approve') {
                $d = $calculated_data['Approve'] / $calculated_data['Apply'];
                $data[$key]['percent'] = ceil($d * 100);
            } elseif ($key == 'Real') {
                $d = $calculated_data['Real'] / $calculated_data['Approve'];
                $data[$key]['percent'] = ceil($d * 100);
            }
        }

        return $data;
    }

    public static function getSanitizedColumn($project_id, $ref_name)
    {
        $all_columns = Schema::getColumnListing($ref_name);
        $derived_column = ['id', 'created_at', 'details_id', 'project_id', 'provided_date', 'status', 'created_by', 'updated_by', 'deleted_by', 'updated_at', 'parent_id', 'division_id', 'district_id', 'upazila_id', 'union_id', 'title', 'sub_title'];
        $previously_selected_column = Indicator::where('used_column', '!=', null)->where('status', '1')->where('project_id', $project_id)
            ->groupBy('used_column')->get(['used_column'])->toArray();
        foreach ($previously_selected_column as $pre_col) {
            array_push($derived_column, $pre_col['used_column']);
        }
        $sanitized_arr = [];
        foreach ($all_columns as $all_column) {
            if (!in_array($all_column, $derived_column)) {
                array_push($sanitized_arr, $all_column);
            }
        }
        return $sanitized_arr;
    }

    public static function load_tansactional_graph_data_for_api($project_id = null, $from_date, $to_date)
    {
        $key_array = array('Apply', 'Approve', 'Real');
        $data = array();
        foreach ($key_array as $key) {

            if ($project_id != "") {

                //$sql="Select * from task_metas where "
                $sql = "SELECT GROUP_CONCAT(task_metas.value) as value FROM task_metas
                JOIN tasks ON task_metas.`task_id`=tasks.id
                WHERE tasks.`project_id`=$project_id AND task_metas.`key`='$key'
                AND  tasks.date between 'from_date' AND  'to_date'";
            } else {
                $sql = "SELECT GROUP_CONCAT(task_metas.value) as value FROM task_metas
                JOIN tasks ON task_metas.`task_id`=tasks.id
                WHERE task_metas.`key`='$key'
                AND tasks.date between 'from_date' AND  'to_date'";
            }

            $results = DB::select($sql);
            foreach ($results as $result) {
                $data[$key] = $result->value;
            }

        }

        return $data;
    }

    public static function querterly_month_range($financial_start_year_month)
    {
        $querter_month_range = [];
        $start_date['q1'] = Carbon::createFromFormat('F, Y', $financial_start_year_month)->format('F, Y');
        $end_date['q1'] = Carbon::createFromFormat('F, Y', $start_date['q1'])->addMonths(2)->format('F, Y');

        $querter_month_range['start_date']['q1'] = Carbon::createFromFormat('F, Y', $start_date['q1'])->firstOfMonth()->format('Y-m-d');
        $querter_month_range['end_date']['q1'] = Carbon::createFromFormat('F, Y', $end_date['q1'])->lastOfMonth()->format('Y-m-d');

        $start_date['q2'] = Carbon::createFromFormat('F, Y', $end_date['q1'])->addMonths(1)->format('F, Y');
        $end_date['q2'] = Carbon::createFromFormat('F, Y', $start_date['q2'])->addMonths(2)->format('F, Y');

        $querter_month_range['start_date']['q2'] = Carbon::createFromFormat('F, Y', $start_date['q2'])->firstOfMonth()->format('Y-m-d');
        $querter_month_range['end_date']['q2'] = Carbon::createFromFormat('F, Y', $end_date['q2'])->lastOfMonth()->format('Y-m-d');

        $start_date['q3'] = Carbon::createFromFormat('F, Y', $end_date['q2'])->addMonths(1)->format('F, Y');
        $end_date['q3'] = Carbon::createFromFormat('F, Y', $start_date['q3'])->addMonths(2)->format('F, Y');

        $querter_month_range['start_date']['q3'] = Carbon::createFromFormat('F, Y', $start_date['q3'])->firstOfMonth()->format('Y-m-d');
        $querter_month_range['end_date']['q3'] = Carbon::createFromFormat('F, Y', $end_date['q3'])->lastOfMonth()->format('Y-m-d');

        $start_date['q4'] = Carbon::createFromFormat('F, Y', $end_date['q3'])->addMonths(1)->format('F, Y');
        $end_date['q4'] = Carbon::createFromFormat('F, Y', $start_date['q4'])->addMonths(2)->format('F, Y');

        $querter_month_range['start_date']['q4'] = Carbon::createFromFormat('F, Y', $start_date['q4'])->firstOfMonth()->format('Y-m-d');
        $querter_month_range['end_date']['q4'] = Carbon::createFromFormat('F, Y', $end_date['q4'])->lastOfMonth()->format('Y-m-d');
        $data = [];
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $data['quarter_month_range'] = $querter_month_range;
        return $data;
    }

    public static function runnning_querter($querter_month_range)
    {
        $running_month_year = Carbon::now()->format('Y-m-d');
        switch (true) {
            case ((strtotime($running_month_year)) >= (strtotime($querter_month_range['start_date']['q1'])) && (strtotime($running_month_year)) <= (strtotime($querter_month_range['end_date']['q1']))):
                $running = 1;
                break;
            case ((strtotime($running_month_year)) >= (strtotime($querter_month_range['start_date']['q2'])) && (strtotime($running_month_year)) <= (strtotime($querter_month_range['end_date']['q2']))):
                $running = 2;
                break;
            case ((strtotime($running_month_year)) >= (strtotime($querter_month_range['start_date']['q3'])) && (strtotime($running_month_year)) <= (strtotime($querter_month_range['end_date']['q3']))):
                $running = 3;
                break;
            case ((strtotime($running_month_year)) >= (strtotime($querter_month_range['start_date']['q4'])) && (strtotime($running_month_year)) <= (strtotime($querter_month_range['end_date']['q4']))):
                $running = 4;
                break;
        }

        return $running;

    }

    public static function get_dates_for_filter($id = '')
    {
        $date_array = [];
        $date_array['all'] = Carbon::now()->subYear(10)->firstOfMonth()->format("Y-m-d");
        $current_date = lastOperationDate($id);

        $date_array['all'] = date("Y-m-d", strtotime("-10 years", strtotime($current_date)));
        $date_array['daily'] = date("Y-m-d", strtotime("-12 months", strtotime($current_date)));
        $date_array['current_date'] = $current_date;
        $date_array['3month'] = date("Y-m-d", strtotime("-3 months", strtotime($current_date)));
        $date_array['6month'] = date("Y-m-d", strtotime("-6 months", strtotime($current_date)));
        $date_array['9month'] = date("Y-m-d", strtotime("-9 months", strtotime($current_date)));
        $date_array['12month'] = date("Y-m-d", strtotime("-12 months", strtotime($current_date)));

        return $date_array;
    }

    public static function get_own_project(){
        $owner = str_replace(['[', ']', '"'], '', Auth::user()->project_owner);
        $owner = explode(',', $owner);
        return $owner;
    }

    public static function get_permitted_projects($permission_type){
        $permitted_projects = UserRoleMapping::where('user_id', Auth::user()->id)->where($permission_type, 1)->pluck('project_id')->toArray();

        if(empty($permitted_projects)){
            if(Auth::user()->role != 1 && Auth::user()->role != 5){
                $permitted_projects = [0];
            }
        }
        return $permitted_projects;
    }

}
