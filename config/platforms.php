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
    'yesfile2' => buildDara(env('YESFILE2_ID'), env('YESFILE2_PW')),
    'applefile' => buildDara(env('APPLEFILE_ID'), env('APPLEFILE_PW')),
];
