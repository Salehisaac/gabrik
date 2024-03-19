<?php

namespace App\Http\Services\Image;

use Illuminate\Support\Facades\Config;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

use Nette\Utils\Random;



class ImageService extends ImageToolsService
{

    public function save($image , $directory)
    {
        //set image
        $this->setImage($image);
        //execute provider
        $this->provider();

        $imagePath = 'admin-assets/'. $directory .'/images';

        if (!is_dir($imagePath))
        {
            mkdir($imagePath , 0777 , true);
        }


        $imageName = $this->getImageName() .Random::generate() . now() . '.' . $this->getImageFormat();
        $realPath = $imagePath .'/'.$imageName;
        $image->move($imagePath , $imageName);
        return $realPath;
    }


    public function fitAndSave($image)
    {
         $saved_image = Image::make($image)
            ->fit(300, 300)
            ->save(public_path('images/image.jpg'));

         return $saved_image;
    }

    public function createIndexAndSave($image)
    {
            //get data from config
           $imageSizes = Config::get('image.index-images-sizes');

            //set image
            $this->setImage($image);

            //set directory
            $this->getImageDirectory() ?? $this->setImageDirectory(date("Y") . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
            $this->setImageDirectory($this->getImageDirectory() . DIRECTORY_SEPARATOR . time());

            //set name
            $this->getImageName() ?? $this->setImageName(time());
            $imageName = $this->getImageName();

            $indexArray = [];
            foreach($imageSizes as $sizeAlias => $imageSize)
            {

                //create and set this size name
                $currentImageName = $imageName . '_' . $sizeAlias;
                $this->setImageName($currentImageName);

                //execute provider
                $this->provider();

                //save image
                $result = Image::make($image->getRealPath())->fit($imageSize['width'], $imageSize['height'])->save(public_path($this->getImageAddress()), null, $this->getImageFormat());
                    if($result)
                    $indexArray[$sizeAlias] = $this->getImageAddress();
                    else
                    {
                        return false;
                    }

            }
            $images['indexArray'] = $indexArray;
            $images['directory'] = $this->getFinalImageDirectory();
            $images['currentImage'] = Config::get('image.default-current-index-image');

            return $images;
    }

    public function deleteImage($imagePath)
    {
        if(file_exists($imagePath))
        {
            unlink($imagePath);
        }
    }

    public function deleteIndex($images)
    {
        $directory = public_path($images['directory']);
        $this->deleteDirectoryAndFiles($directory);
    }

    public function deleteDirectoryAndFiles($directory)
    {
        if(!is_dir($directory))
        {
            return false;
        }


        $files = glob($directory . DIRECTORY_SEPARATOR . '*', GLOB_MARK);
        foreach($files as $file)
        {
            if(is_dir($file))
            {
                $this->deleteDirectoryAndFiles($file);
            }
            else{
                unlink($file);
            }
        }
        $result = rmdir($directory);
        return $result;
    }


}
