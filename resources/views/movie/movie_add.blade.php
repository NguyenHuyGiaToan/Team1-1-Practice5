<x-movie-layout>
    <x-slot name="title">
        Movie Add
    </x-slot>
    <style>
        input {
            padding: 5px;
            margin: 5px 0;
            width: 100%;
            border: 1px solid #dbdbdb;
            border-radius: 5px;
        }

        h1 {
            margin-top: 20px;
            color: blue;
            text-transform: uppercase;
            text-align: center;
        }
    </style>
    <h1>Thêm phim</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="margin-bottom: 0;">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('movie_add')}}" method="post" enctype="multipart/form-data">
        <label for="">Tên Tiếng Anh</label> <br>
        <input type="text" name="mov_eng_name" id="" required><br>
        <label for="">Tên Tiếng Việt</label> <br>
        <input type="text" name="mov_vn_name" id="" required><br>
        <label for="">Ngày phát hành (Định dạng yyyy-mm-dd)</label><br>
        <input type="text" name="release_date" id="" required><br>
        <label for="">Mô tả</label><br>
        <input type="text" name="description" id="" required><br>
        <label for="">Ảnh đại diện</label><br>
        <input type="file" id="imageUpload" name="image" required><br>
        {{csrf_field()}}
        <button class="btn btn-primary" type="submit">Thêm</button><br>
    </form>
</x-movie-layout>