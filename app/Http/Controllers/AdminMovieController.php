<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;

class AdminMovieController extends Controller
{

    public function movie_manager()
    {
        $movies = DB::select("SELECT * FROM movie
        where status = ?;", [1]);
        return view("movie.movie_manager", compact("movies"));
    }
    public function movie_add()
    {
        return view("movie.movie_add");
    }
    public function movie_add_func(Request $request)
    {
        // 1. Validate với thông báo Tiếng Việt
        $request->validate([
            'mov_eng_name' => 'required',
            'mov_vn_name'  => 'required',
            'release_date' => 'required|date_format:Y-m-d', // Ép đúng định dạng yyyy-mm-dd
            'description'  => 'required',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Chỉ cho phép định dạng ảnh
        ], [
            // Định nghĩa thông báo lỗi tiếng Việt
            'required'              => 'Trường :attribute không được để trống.',
            'date_format'           => 'Trường :attribute phải đúng định dạng yyyy-mm-dd.',
            'image'                 => 'File tải lên phải là định dạng ảnh.',
            'mimes'                 => 'Ảnh phải có định dạng: jpeg, png, jpg, gif.',
            'max'                   => 'Dung lượng ảnh không được quá 2MB.',
        ], [
            // Đặt tên tiếng Việt cho các trường để thông báo thân thiện hơn
            'mov_eng_name' => 'Tên Tiếng Anh',
            'mov_vn_name'  => 'Tên Tiếng Việt',
            'release_date' => 'Ngày phát hành',
            'description'  => 'Mô tả',
            'image'        => 'Ảnh đại diện',
        ]);

        // 2. Xử lý File (Giữ nguyên logic của bạn nhưng tối ưu đường dẫn)
        $filePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // LƯU Ý: Phải có tiền tố 'public/'
            $file->storeAs('public', $fileName);

            // Đường dẫn lưu vào DB để hiển thị ngoài giao diện
            $filePath = "/" . $fileName;
        }

        // 3. Database Insert
        DB::insert(
            "INSERT INTO movie (movie_name, movie_name_vn, release_date, overview_vn, image) 
         VALUES (?, ?, ?, ?, ?)",
            [
                $request->input("mov_eng_name"),
                $request->input("mov_vn_name"),
                $request->input("release_date"),
                $request->input("description"),
                $filePath
            ]
        );

        return redirect()->route("movie_manager")->with("success", "Thêm phim thành công.");
    }
    public function movie_delete($id)
    {
        DB::update("UPDATE movie set status = 0 where id = ?", [$id]);
        return redirect()->route("movie_manager")->with("success", "Xóa phim thành công.");
    }
}
