<?php

function getAsset($fileType, $fileName)
{
    $fileExtension = match ($fileType) {
        'images' => 'webp',
        'icons' => 'svg',
        default => $fileType
    };

    return ASSETS_PATH . "$fileType/$fileName.$fileExtension";
}

function images($fileName)
{
    return getAsset('images', $fileName);
}

function icons($fileName)
{
    return getAsset('icons', $fileName);
}

function css($fileName)
{
    return getAsset('css', $fileName);
}

function js($fileName)
{
    return getAsset('js', $fileName);
}