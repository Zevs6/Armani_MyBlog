<?php

    /**
     * @param 验证码生成
     * @author  zhang 作者 
     * @version 2019.9.30 1.0 版本号
     * @return gif 
     **/

     //初始化
    ob_clean();  //清除缓存
     header("Content-type:image/gif"); //提示用户保存一个生成的gif文件
     $border=0;  //0没有边框，1有边框
     $how=5; //设置验证码位数
     $w=$how*15;  //画布宽度
     $h=25;  //画布高度
     $alpha="abcdefghijklmnopqrstuvwxyz";  //设置验证码字符集
     $number="0123456789";
     $randcode=""; //存储验证码变量
     srand((double) microtime()*10000); //产生随机种子
     $im=  imagecreate($w, $h);  //创建画布
     
     
     //绘制画布框架
     $color1=  imagecolorallocate($im, 255, 255, 255); //创建填充色
     imagefill($im, 0, 0, $color1); //填充背景色
     if($border)
     {
         $color2=  imagecolorallocate($im, 0, 0,0);  //边框颜色
         imagerectangle($im,0,0,$w-1,$h-1, $color2);//绘制边框
     }
     
     //随机产生验证码
     for($i=0;$i<$how;$i++)
     {
         $alpha_or_number=  mt_rand(0, 1);
         $str=$alpha_or_number?$alpha:$number;  //获取产生验证码字符的字符串
         $code=  substr($str,  mt_rand(0,  strlen($str)-1),1);   //从字符串获取随机字符
         $color3=  imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255),mt_rand(0, 255));
         $j=!$i?6:$j+15;  //确定字符写入位置
         imagechar($im,  mt_rand(3,5),$j,3, $code, $color3);  //绘制字符
         $randcode.=$code;  //存储变量
     }
     
     //设置背景干扰元素
    for ($$i = 0; $i < 200; $i++) {
    $pointcolor = imagecolorallocate($im, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imagesetpixel($im, mt_rand(1, 99), mt_rand(1, 29), $pointcolor);
    }
     
     //增加干扰线
    for($i=0; $i<strlen($code); $i++){
        $color = imagecolorallocate($im, mt_rand(100,200), mt_rand(100,200), mt_rand(100,200));
        imageline($im, mt_rand(0,100), mt_rand(0,30),  mt_rand(0,100), mt_rand(0,30), $color);
    }
     
     //结束部分
     imagegif($im); //输出图像
     imagedestroy($im);  //消除画布对象
     
    
    
 
        





?>