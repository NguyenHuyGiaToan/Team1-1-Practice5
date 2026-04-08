<x-movie-layout>
    <x-slot name="title">
        Web Movie - Kết quả tìm kiếm
    </x-slot>
    
    <style>

        /* Định dạng từng thẻ phim (Card) */
        .movie {
            width: 200px;
            min-width: 200px;
            border: 1px solid #ddd; 
            border-radius: 8px;
            overflow: hidden; 
            background-color: #fff;
            text-align: center;
        }

        .movie:hover {
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .movie a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .movie-info img {
            width: 100%;
            height: 60%; 
            object-fit: cover; 
            display: block;
        }
    </style>
    <div class="list-movie">
        @foreach($movies as $movie)
            <div class="movie" style="display: inline-block; margin: 10px; vertical-align: top; width: 200px;">
                <a href="{{ url('/chitiet/'.$movie->id) }}" class="movie-info">  
                    <img src="{{ asset('storage' . $movie->image) }}">
                    <b>{{ $movie->movie_name_vn }}</b><br/>
                    <i>{{ $movie->release_date }}</i><br>  
                </a> 
            </div>
        @endforeach
    </div>
</x-movie-layout>