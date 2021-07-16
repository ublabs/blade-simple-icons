<?php

use Illuminate\Support\Str;

$svgNormalization = static function (string $tempFilepath, array $iconSet) {
    $fileLines = file_get_contents($tempFilepath);
    $updated = Str::replace("<svg", '<svg fill="currentColor"', $fileLines);
    file_put_contents($tempFilepath, $updated);
};

return [
    [
        'source' => __DIR__.'/../dist/icons',
        'destination' => __DIR__.'/../resources/svg',
        'after' => $svgNormalization,
        'safe' => true,
    ],
];
