<?php

use Illuminate\Support\Str;
use BladeUI\Icons\Generation\IconSetConfig;

$svgNormalization = static function (string $tempFilepath, array $iconSet) {
    $fileLines = file_get_contents($tempFilepath);
    $updated = Str::replace("<svg", '<svg fill="currentColor"', $fileLines);
    file_put_contents($tempFilepath, $updated);
};

return [
    IconSetConfig::build(
        __DIR__.'/../dist/icons',
        __DIR__.'/../resources/svg',
        '',
        '',
        '',
        '',
        true,
        $svgNormalization,
    ),
];
