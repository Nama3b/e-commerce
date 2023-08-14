<?php

namespace App\Support\ResourceHelper;

trait ImageHandlerResourceHelper
{

    /**
     * Handle upload image
     *
     * @param $request
     * @return string
     */
    public function imageHandler($request): string
    {
        $image_name = '';
        if($request->hasFile('image'))
        {
            $destination_path = 'public/uploads/img';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $request->file('image')->storeAs($destination_path, $image_name);
        }

        return $image_name;
    }

}
