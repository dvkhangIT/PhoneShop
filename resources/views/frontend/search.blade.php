@extends('frontend.master')
@section('title', 'Tìm kiếm')
@section('main')
    <link rel="stylesheet" href="css/search.css">
    <div id="wrap-inner">
        <div class="products">
            <h3>Tìm kiếm với từ khóa: <span>{{ $keyword }}</span></h3>
            <div class="product-list row">
                @foreach ($items as $item)
                    <div class="product-item col-md-3 col-sm-6 col-xs-12">
                        <a href="#"><img
                                src="{{ asset('../storage/app/avatar/' . $item->prod_image) }}"
                                class="img-thumbnail"></a>
                        <p><a class="text-uppercase " href="#">{{ $item->prod_name }}</a>
                        </p>
                        <p class="price">
                            {{ Number_format($item->prod_price, 0, ',', '.') }}
                            VNĐ
                        </p>
                        <div class="marsk">
                            <a
                                href="{{ asset('detail/' . $item->prod_id . '/' . $item->prod_slug . '.html') }}">Xem
                                chi
                                tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div id="pagination">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item disabled"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </div> --}}
    </div>
@endsection
