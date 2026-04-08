<x-movie-layout>
    <x-slot name="title">
        {{ $movies->movie_name_vn }} - {{ $movies->movie_name }}
    </x-slot>
    
    <style>
        .detail-container {
            display: flex;
            gap: 30px;
            padding: 20px 0;
            background-color: #fff;
        }

        .movie-poster {
            flex: 0 0 300px; /* Độ rộng cố định cho ảnh poster */
        }

        .movie-poster img {
            width: 100%;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .movie-content {
            flex: 1;
        }

        .movie-content h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .info-item {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .info-label {
            font-weight: bold;
        }

        .movie-description {
            margin-top: 15px;
            line-height: 1.6;
            text-align: justify;
        }

        .btn-trailer {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 15px;
            font-size: 14px;
        }

        .btn-trailer:hover {
            background-color: #218838;
        }
    </style>

    <h2>{{ $movies->movie_name_vn }} - {{ $movies->movie_name }}</h2>
    <div class="detail-container">

        <div class="movie-poster">
            <img src="{{ asset('storage' . $movies->image) }}">
        </div>

        <div class="movie-content">
            
            <div class="info-item">
                <span class="info-label">Ngày phát hành:</span> {{ $movies->release_date }}
            </div>
            
            <div class="info-item">
                <span class="info-label">Quốc gia:</span> {{ $movies->country_name }}
            </div>
            
            <div class="info-item">
                <span class="info-label">Thời gian:</span> {{ $movies->runtime }} phút
            </div>
            
            <div class="info-item">
                <span class="info-label">Doanh thu:</span> {{ number_format($movies->revenue) }}
            </div>

            <div class="movie-description">
                <div class="info-label">Mô tả:</div>
                <p>{{ $movies->overview_vn }}</p>
            </div>

            <a href="#" class="btn-trailer">Xem trailer</a>
        </div>
    </div>
</x-movie-layout>