<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
</head>
<body>
<div>
    <label for="title">映画タイトル</label>
    <br>
    <p>{{$movie->title}}</p>
    <br>
    <label for="genre">ジャンル</label>
    <br>
    <p>{{$movie->genre->name}}</p>
    <br>
    <label for="image_url">画像URL</label>
    <img src="{{$movie->image_url}}" alt="">
    <br>
    <label for="published_year">公開年</label><br>
    <p>{{$movie->published_year}}</p>
    <br>
    <label for="is_showing">公開中かどうか</label><br>
    @if ($movie->is_showing == 1)
    <p>公開中</p>
    @else
    <p>公開予定</p>
    @endif
    <br>
    <label for="description">概要</label><br>
    <p>{{$movie->description}}</p>
    <br>
    <p>上映時間</p>
    @if ($schedules)
        @foreach($schedules as $schedule)
        <div>{{$schedule['start_time']}}-{{$schedule['end_time']}}</div>
        @endforeach
    @endif

</div>
</body>
</html>
