<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<style>
    body {
        font-family: DejaVu Sans, sans-serif;
    }
    .layer {

        padding: 22px; /* Поля вокруг текста */
    }
</style>
<table id="view_tbl" class="table table-hover text-nowrap">
    <tbody>
        <tr>
            <td>Назва петиції</td>
            <td>{{ $post->title }}</td>
        </tr>
        <tr>
            <td>Автор петиції</td>
            <td>{{ $post->user->name }}</td>
        </tr>
        <tr>
            <td>Кількість набраних голосів</td>
            <td>{{ count($post->likedUsers)+count($post->likedUsersAnonim) }}</td>
        </tr>
        <tr>
            <td>Дата створення петиції</td>
            <td>{{ $post->created_at }}</td>
        </tr>
        <tr>
            <td class="layer">{{ strip_tags($post->content) }}</td>
        </tr>

    </tbody>
</table>
<span>Список підписантів:</span>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ФІО</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
