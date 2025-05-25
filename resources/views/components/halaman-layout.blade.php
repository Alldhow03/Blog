<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{isset($title)?$title:'Default'}}</title>
</head>

<body>
    <h1>Hallo from component</h1>
    {{ $slot }}
    <p>Penulis : {{ $penulis }}</p>
    <p>Tanggal : {{ $tanggal }}</p>
</body>

</html>