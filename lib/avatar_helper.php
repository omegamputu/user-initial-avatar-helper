if(!function_exists('createDefaultAvatar')){
    function createDefaultAvatar($fontPath, $dest, $char){
        $path = $dest;
        $image = imagecreate(200,200);
        $red = rand(0,255);
        $green = rand(0,255);
        $blue = rand(0,255);
        imagecolorallocate($image,$red,$green,$blue);
        $textcolor = imagecolorallocate($image, 255,255,255);
        imagettftext($image, 100, 0, 50, 150, $textcolor, $fontPath, $char);
        imagepng($image, $path);
        imagedestroy($image);

        return $path;
    }
}

if (!function_exists('generateAvatar')){
    function generateAvatar($data = ['name']){
        $path = public_path('avatars/');
        $fontPath = public_path('fonts/Oliciy.ttf');
        $char = strtoupper($data[0]);
        $newAvatarName = rand(12,34353).time().'_avatar.png';
        $dest = $path.$newAvatarName;
        $createDefaultAvatar = createDefaultAvatar($fontPath, $dest, $char);
        $letterAvatar = $createDefaultAvatar == true ? $newAvatarName : '';

        return $letterAvatar;
    }
}