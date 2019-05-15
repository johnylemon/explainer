<?php

return [

    'docs_uri' => env('EXPLAINER_DOCS_URI', '/explainer/docs'),

    'declaim_self' => FALSE,

    'json_uri' => env('EXPLAINER_JSON_URI', '/explainer/json'),

    'json_path' => env('EXPLAINER_JSON_PATH', storage_path('app/public/explainer.json')),

];
