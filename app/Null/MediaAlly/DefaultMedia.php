<?php

namespace App\Null\MediaAlly;

use SplFileInfo;

class DefaultMedia
{
    public string $file_url;

    public int|false $size;

    public string $file_name;

    public string|false $file_type;

    public function __construct()
    {
        $file = new SplFileInfo(public_path('images/null/default.png'));

        $this->file_url = asset('images/null/default.png');
        $this->file_type = $file->getType();
        $this->file_name = $file->getFilename();
        $this->size = $file->getSize();
    }
}
