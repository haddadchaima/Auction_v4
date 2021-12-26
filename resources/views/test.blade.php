<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
<div id="app">
    <div class="timer">
    <Timer
        starttime="Nov 5, 2018 15:37:25"
        endtime="Nov 8, 2020 16:37:25"
        trans='{
            "day":"J",
            "hours":"H",
            "minutes":"M",
            "seconds":"S",
            "expired":"Evénement expiré.",
            "running":"Jusqu`à la fin de l`événement.",
            "upcoming":"Jusqu`au début de l`événement.",
            "status": {
                "expired":"Expiré",
                "running":"En cours",
                "upcoming":"Future"
            }
    }'
    ></Timer>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    new Vue({
        el: "#app",
    });
</script>
</body>
</html>
