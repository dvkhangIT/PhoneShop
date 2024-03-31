@extends('frontend.master')
@section('title', 'Danh mục sản phẩm')
@section('main')
    <link rel="stylesheet" href="css/category.css">
    <div id="wrap-inner">
        <div class="products">
            <h3>{{ $cateName->cate_name }}</h3>
            <div class="product-list row">
                @if ($items != '')
                    @foreach ($items as $item)
                        <div class="product-item col-md-3 col-sm-6 col-xs-12">
                            <a href="#"><img
                                    src="{{ asset('../storage/app/avatar/' . $item->prod_image) }}"
                                    class="img-thumbnail"></a>
                            <p><a class="text-uppercase "
                                    href="#">{{ $item->prod_name }}</a>
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
                @else
                    <p class="alert alert-danger">Chưa có sản phẩm</p>
                @endif
            </div>
            <div id="pagination">
                {{ $items->links('vendor.pagination.custom') }}
            </div>
        </div>
    @endsection
