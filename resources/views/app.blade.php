<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="">

        <link href="/css/explainerapp.css" rel="stylesheet" type="text/css">

        <title>Explainer</title>

    </head>
    <body>
        <div id="explainerapp">
            <explainer-app></explainer-app>
        </div>

        <script>window.explainer = {!! $data !!};</script>
        <script src="/js/explainerapp.js" defer></script>
    </body>
</html>
