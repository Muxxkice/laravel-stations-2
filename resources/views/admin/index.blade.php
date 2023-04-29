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
<form action="{{route('admin.index')}}" method="GET">
    <input type="text" name="search_word">
    <input name="is_showing" type="checkbox" id="on" value="1"><label for="on">上映中</label><br>
    <input name="is_showing" type="checkbox" id="off" value="0"><label for="off">上映予定</label><br>
    <button type="submit">検索</button>
</form>
    <div>
            @foreach($movies as $movie)
                <div>
                    <ul>
                        <li> title: {{$movie->title}}</li>
                        <li>is_showing {{$movie->image_url}}</li>
                        @if($movie->is_showing == 0)
                            <li>上映中</li>
                        @else
                            <li>上映予定</li>
                        @endif
                        <li>img: {{$movie->image_url}}</li>
                        <li>description: {{$movie->description}}</li>
                        <li>published_year: {{$movie->published_year}}</li>
                        <li>{{$movie->id}}</li>
                    </ul>
                    <a href="{{route('admin.edit',['id' => $movie->id ])}}">編集</a>
                    <form action="{{route('admin.destroy',['id' => $movie->id ])}}" method="DELETE">
                        @csrf
                        <button type="submit">削除</button>
                    </form>
                </div>
            @endforeach
    </div>
    {{ $movies->links() }}
</body>
</html>
