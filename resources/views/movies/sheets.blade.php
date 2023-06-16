<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Sheets</h1>

    @foreach($sheets as $sheet)
        <div>{{$sheet['row']}}-{{$sheet['column']}}</div>
@endforeach
</body>
</html>
