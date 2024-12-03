<?php

function getAsset($fileType, $fileName, $fileExtension = null)
{
    if (!$fileExtension) {
        $fileExtension = match ($fileType) {
            'images' => 'webp',
            'icons' => 'svg',
            default => $fileType
        };
    }

    if ($fileExtension == 'svg') {
        include_once(BASE_PATH . "assets/$fileType/$fileName.$fileExtension");
    } else {
        return ASSETS_PATH . "$fileType/$fileName.$fileExtension";
    }
}

function images($fileName, $fileExtension = null)
{
    if (!$fileExtension || $fileExtension != 'svg') {
        return getAsset('images', $fileName, $fileExtension);
    } else {
        getAsset('images', $fileName, $fileExtension);
    }
}

function icons($fileName)
{
    getAsset('icons', $fileName);
}

function css($fileName)
{
    return getAsset('css', $fileName);
}

function js($fileName)
{
    return getAsset('js', $fileName);
}