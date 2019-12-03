<?php
use Illuminate\Support\Str;

    function generateSlug(string $title)
    {
        return Str::slug(html_entity_decode($title), '-');
    }

function updateImage(\Illuminate\Http\UploadedFile $file, $model, string $collectionName) {
    $modelMedia = $model->getMedia($collectionName);

    // can only have one picture, so delete previous one if it exists
    if (count($modelMedia) > 0) {
        foreach ($modelMedia as $media) {
            \Spatie\MediaLibrary\Models\Media::destroy($media->id);
        }
    }

    $model->addMedia($file)->preservingOriginal()->toMediaCollection($collectionName);
}
