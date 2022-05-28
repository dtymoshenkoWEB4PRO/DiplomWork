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
<table id="view_tbl" class="table">
    <tbody>
        <tr>
            <td><strong>Назва петиції</strong></td>
            <td>{{ $post->title }}</td>
        </tr>
        <tr>
            <td><strong>Автор петиції</strong></td>
            <td>{{ $post->user->name }}</td>
        </tr>
        <tr>
            <td><strong>Кількість набраних голосів</strong></td>
            <td>{{ count($post->likedUsers)+count($post->likedUsersAnonim) }}</td>
        </tr>
        <tr>
            <td><strong>Дата створення петиції</strong></td>
            <td>{{ $post->created_at }}</td>
        </tr>
    </tbody>
</table>
<strong>Зміст:</strong>
<div> {{ strip_tags($post->content) }}</div>
<strong>Список підписантів:</strong>
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
