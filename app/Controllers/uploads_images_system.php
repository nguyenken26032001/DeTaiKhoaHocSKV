<?php
class uploads_images_system extends controller
{
    public function uploads_images()
    {
        $this->Model('uploads')->uploads_images();
        header("Location: ../Admin/banner");
    }
}