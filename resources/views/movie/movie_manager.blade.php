<x-movie-layout>

    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                "responsive": true,
                "pageLength": 5, // Mặc định hiện 5 dòng như trong ảnh
                "lengthMenu": [5, 10, 25, 50], // Các lựa chọn ở ô "entries per page"
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ phim",
                    "zeroRecords": "Không tìm thấy phim nào",
                    "info": "Hiển thị từ _START_ đến _END_ của _TOTAL_ phim",
                    "infoEmpty": "Không có dữ liệu",
                    "infoFiltered": "(lọc từ _MAX_ phim)",
                    "search": "Tìm kiếm:",
                    "paginate": {
                        "first": "Đầu",
                        "last": "Cuối",
                        "next": ">",
                        "previous": "<"
                    }
                },
                "stateSave": true // Lưu lại trang đang đứng khi F5
            });
        });
    </script>
    <x-slot name="title">
        Movie Manager
    </x-slot>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        tr {
            border-collapse: collapse;
        }

        table,tr,td {
            border: 1px solid #dbdbdb;
        }

        /* Ví dụ đặt độ rộng cố định cho cột thứ 2 */
        th:nth-child(2),
        td:nth-child(2) {
            width: 100px;
            /* Hoặc width: 20%; */
        }

        thead td {
            font-weight: bold;
        }

        button {
            padding: 5px 10px;
            color: white;
        }


    </style>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
        <strong>Chúc mừng!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h1>Danh sách phim</h1>

    <a href="{{route('movie_add')}}" class="btn btn-success" style="margin-bottom: 10px;">Thêm</a>
    <table id="id-table">
        <thead>
            <tr>
                <td>Ảnh đại diện</td>
                <td>Tiêu đề</td>
                <td>Giới thiệu</td>
                <td>Ngày phát hành</td>
                <td>Điểm đánh giá</td>
                <td>Thao tác</td>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $row)
            <tr>
                <td><img src="/storage/{{$row->image}}" alt="" width="100px"></td>
                <td style="width: 30%">{{$row->movie_name_vn}}</td>
                <td>
                    <div id="overview" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $row->overview_vn }}
                    </div>
                </td>
                <td class="text-nowrap">{{$row->release_date}}</td>
                <td>{{$row->vote_average}}</td>
                <td style="display:grid; grid-template-columns: auto auto; gap:5px; border-bottom:0px ;">
                    <a class="btn btn-primary" href="{{route('chitiet',$row->id)}}">Xem</a>
                    <form action="{{ route('movie_delete', $row->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa phim này?')">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            Xóa
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-movie-layout>