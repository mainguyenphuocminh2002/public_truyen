<?php

/**
 * Change Id Form Encode
 */

namespace App\Helper;

use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;

class Common
{

    // public const SUBFIRSTSTR = Common::uuid();
    // public const SUBSECONDSTR = Common::uuid();
    private $pathToAttribute;
    private $id;
    // public static $baseUrl;
    public function __construct()
    {
        # code...
    }

    public static function changeIdToEncode($id)
    {
        $id = $id . '/' . rand(0, 10000);
        // encode
        $id = base64_encode($id);
        // tạo mảng lấy dữ liệu add thêm vào để tăng bảo mật
        $id = base64_encode(rand(0, 100000) . Common::uuid() . '/') . $id . Common::uuid() . '/' . rand(0, 10000);
        return base64_encode($id);
    }

    public static function changeIdToDecode($id)
    {
        # code...
        $id = base64_decode($id);
        $id = base64_decode($id);
        $id = explode('/', $id);
        $common = new Common();
        $common->id = $id[1];
        return $common;
    }

    static function checkSession($session)
    {
        if ($session && !empty($session)) {
            return true;
        }
        return redirect()->back()->with('type', 'danger')->with('message', 'Test');
    }

    public function getId()
    {
        return $this->id;
    }

    static function uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    static function getRuleName($rule)
    {
        $rule = explode('\\', $rule);
        $last = count($rule) - 1;
        return $rule[$last];
    }

    static function setAttribute($attribute, $ruleName)
    {
        $common = new Common();
        $common->pathToAttribute = 'validation.custom.' . $attribute . '.' . $ruleName;
        return $common;
    }

    public function getPathAttribute()
    {
        return $this->pathToAttribute;
    }

    static function getAttribute($pathToAttribute, $defaultRule)
    {
        if ($pathToAttribute) {
            return trans($pathToAttribute);
        }
        return trans('validation' . $defaultRule);
    }

    static function getMessage($pathToAttribute, $defaultRule = null)
    {
        $common = new Common();
        if (trans($pathToAttribute) !== $pathToAttribute) {
            return $common->getAttribute($pathToAttribute, $defaultRule);
        } else {
            $defaultRule = 'validation.' . $defaultRule;
            return trans($defaultRule);
        }
    }

    static function htmlDecode($content)
    {
        // dd(html_entity_decode($content));
        return htmlspecialchars_decode($content);
        // ($content);
        // dd(htmlspecialchars_decode($content));
    }

    public static function vnToStr($str)
    {
        if (!$str)
            return false;

        $str = str_replace(array(',', '<', '>', '&', '{', '}', "[", "]", '*', '?', '/', '+', '@', '%', '"'), array(' '), $str);
        $str = str_replace(array("'"), array(' '), $str);
        while (strpos($str, "  ") > 0) {
            $str = str_replace("  ", " ", $str);
        }
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd' => 'đ',
            'D' => 'Đ',
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i' => 'í|ì|ỉ|ĩ|ị',
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        foreach ($unicode as $khongdau => $codau) {
            $str = preg_replace("/($codau)/i", $khongdau, $str);
        }
        $str = strtolower($str);
        $str = trim($str);
        $str = preg_replace('/[^a-zA-Z0-9\ ]/', '', $str);
        $str = str_replace(" ", "-", $str);
        return $str;
    }


    public static function makeView($views,$detail = true)
    {
        if ($views) {
                
                $subVND = [3 => 'K', 6 => 'M'];
                if(!$detail){
                    return $views = number_format($views, 0, '.', ',');
                }
                $views = number_format($views, 0, ',', '.');
                $views = explode('0', $views);
                $viewsLength = count($views);
                if (isset($subVND[$viewsLength])) {
                    $sub = $subVND[$viewsLength];
                    $halfViewLength = ($viewsLength / 2) - 1;
                    unset($views[$halfViewLength]);
                    $views = implode('', $views) . $sub;
                    return $views;
                }
        }
        # code...
    }

    public static function makeToken()
    {
        $arr = range('A', 'Z');
        shuffle($arr);
        $token = array_slice($arr, 0, 5);
        return implode('', $token);
        # code...
    }

    static function checkLogin()
    {
        if (Auth::check()) {
        } else {
            return redirect()->route('clients.home');
        }
    }

    public static function handleFile($file,$avatar = false)
    {
        # code...
        $user = auth()->user();
        $ext  = $file->getClientOriginalExtension();
        $name = $file->getClientOriginalName();
        $name = explode('.', $name);
        $name[0] = $name[0] . '_' . time();
        $name = implode('.', $name);
        $targetDir = 'imgProducts/' . $user->name . '/';
        if($avatar){
            $targetDir = 'imgProducts/' . $user->name . '/avatar' . '/';
        }
        $path = $targetDir . $name;
        $file->move($targetDir, $name);
        $file = new Filesystem;
        $file->cleanDirectory('storage/'.$user->name);
        if(is_dir('storage/'. $user->name)){
            rmdir('storage/'. $user->name);
        }
        return $path;
    }



}
