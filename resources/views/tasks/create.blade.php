<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm công việc mới</title>
</head>
<body>
    <h1>Thêm công việc mới</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="name">Tên công việc:</label>
       
