<?php

function buildDara(string $id, string $pw): array
{
    return [
        'id' => $id,
        'pw' => $pw,
    ];
}

return [
    'yesfile' => buildDara(env('YESFILE_ID'), env('YESFILE_PW')),
    'applefile' => buildDara(env('APPLEFILE_ID'), env('APPLEFILE_PW')),
];
