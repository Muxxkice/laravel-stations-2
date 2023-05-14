<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{route('admin.update',['id' => $movie->id ])}}" method="PATCH">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <label for="title">映画タイトル</label>
    <br>
    <input name="title" type="text" value={{$movie->title}}>
    <br>
    <label for="genre">ジャンル</label>
    <br>
    <input name="genre" type="text" value={{$movie->genre->name}}>
    <br>
    <label for="image_url">画像URL</label>
    <br>
    <input name="image_url" type="text" value={{$movie->image_url}}>
    <br>
    <label for="published_year">公開年</label><br>
    <input name="published_year" type="text" value={{$movie->published_year}}>
    <br>
    <label for="is_showing">公開中かどうか</label><br>
    <input name="is_showing" type="checkbox" id="on" value="1" @if($movie->is_showing == 1) checked @endif><label for="off">上映中</label><br>
    <br>
    <input name="is_showing" type="checkbox" id="off" value="0" @if($movie->is_showing == 0) checked @endif><label for="off">上映予定</label><br>
    <br>
    <label for="description">概要</label><br>
    <textarea name="description" id="" cols="30" rows="10">{{$movie->description}}</textarea>
    <br>
    {{-- {{ csrf_field() }} --}}
    <button type="submit">編集</button>
</form>

</body>
</html>
