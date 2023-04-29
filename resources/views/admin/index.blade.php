<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin</title>
</head>
<body>
<button>
    <a href="/admin/movies/create">新規作成</a>
</button>
    <ul>
        @foreach($movies as $movies)
            <li> title: {{$movies->title}};</li>
            <li>is_showing {{$movies->image_url}};</li>
            @if($movies->is_showing == 0)
                <li>上映中</li>
            @else
                <li>上映予定</li>
            @endif
            <li>img: {{$movies->image_url}};</li>
            <li>description: {{$movies->description}};</li>
            <li>published_year: {{$movies->published_year}};</li>
            <li>{{$movies->id}};</li>
            <a href="{{route('admin.edit',['id' => $movies->id ])}}">編集</a>

            <form action="{{route('admin.destroy',['id' => $movies->id ])}}" method="DELETE">
                @csrf
                <button type="submit">削除</button>
            </form>
        @endforeach
    </ul>
</body>
</html>
