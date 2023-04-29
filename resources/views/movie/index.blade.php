<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
    <form action="{{route('movie.index')}}" method="GET">
        <input type="text" name="keyword">
        <input name="is_showing" type="checkbox" id="on" value="1"><label for="on">上映中</label><br>
        <input name="is_showing" type="checkbox" id="off" value="0"><label for="off">上映予定</label><br>
        <button type="submit">検索</button>
    </form>
    <ul>
        @foreach($movies as $movie)
            <li> title: {{$movie->title}};
                img: {{$movie->image_url}};
            </li>
        @endforeach
    </ul>
    {{ $movies->links() }}
</body>
</html>
