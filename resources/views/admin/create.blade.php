<?php
if(!empty($_POST)){

dump($_POST);
}
?>

<form action="{{url('/admin/movies/store')}}" method="POST">
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
    <input name="title" type="text">
    <br>
    <label for="image_url">画像URL</label>
    <br>
    <input name="image_url" type="text" name="">
    <br>
    <label for="published_year">公開年</label><br>
    <input name="published_year" type="text" name="">
    <br>
    <label for="is_showing">公開中かどうか</label>
    <input name="is_showing" type="checkbox" id="on" name="on"><label for=>公開中</label><br>
    <br>
    <input name="" type="checkbox" id="off" name="off"><label for="off">公開予定</label><br>
    <br>
    <label for="description">概要</label><br>
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <br>
    {{-- {{ csrf_field() }} --}}
    <button type="submit">追加</button>
</form>
