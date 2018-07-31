<?php
/**
 * @desc   PhpStorm.
 * @author thooh
 * @date   2018/7/25
 */

/**
 * 遍历文件
 *
 * @param string $path
 * @return array
 */
function traverse($path = '.')
{
    $result = array();
    if(!is_dir($path)){
        return $result;
    }
    $handle = opendir($path);
    if($handle){
        while(($fl = readdir($handle)) !== false){
            $temp = $path.DIRECTORY_SEPARATOR.$fl;
            if($fl == '.' || $fl == '..'){
                continue;
            }
            if(is_dir($temp)){
                $result[$temp] = traverse($temp);
            }else{
                $result[] = $temp;
            }
        }
    }
    closedir($handle);
    return $result;
}


function createImage($str, $file = null)
{
    if(!isset($path)){
        $file = public_path('images/') .$str.'.jpg';
    }

    $width = 100;
    $height = 68;
    $im = imagecreate($width, $height);
    $white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
    imagecolortransparent($im, $white);

    $black = imagecolorallocate($im, 0x00, 0x00, 0x00);
    //imagefilledrectangle($im, 50, 50, 150, 150, $black);
    //imagestring($im, 5, 5, 30, $str, $black);

    $fontSize  = 14; //18号字体
    $fontWidth = imagefontwidth($fontSize);//获取文字宽度
    $textWidth = $fontWidth * mb_strlen($str);
    $x         = ceil(($width - $textWidth) / 2); //计算文字的水平位置
    $y         = $height/2;

    imagettftext($im, $fontSize, 0, $x, $y, $black, public_path('blog/fonts/') .'微软雅黑.ttf', $str);
    header("Content-type:image/jpeg;charset=utf-8");
    imagepng($im, $file);
    imagedestroy($im);
}