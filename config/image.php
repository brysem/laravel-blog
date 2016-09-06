<?php

return array(
    'library'     => 'gd',
    'upload_dir'  => 'uploads',
    'assets_upload_path' => 'public/uploads',
    'quality'     => 85,
    'dimensions'  => [
        ['50',  '50',  true,  85, 'thumbnail'],
        ['160', '120', false, 85, 'xsmall'],
        ['900', '300', false, 85, 'excerpt'],
        ['1900', '1200', false, 85, 'cover']
    ]
);
