<?php
namespace App\Handlers;

class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext=['png','gif','jpg','jpeg'];

    //3个参数 文件 文件夹
    public function save($file, $folder)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "uploads/images/$folder" . date('Ym/d',time());


        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $uploda_path = public_path() . '/' . $folder_name;


        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接文件名
        $filename = time() . '_' . str_random(10) . '.' . $extension;

        // 如果上传的不是图片将终止操作
        if ( ! in_array($extension,$this->allowed_ext))
        {
            return false;
        }

        // 将图片移动到我们的目标存储路径中
        $file->move($uploda_path,$filename);

        return[
         'path' => config('app_url'). "/$folder_name/$filename"
        ];

    }
}