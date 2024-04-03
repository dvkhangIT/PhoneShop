@extends('frontend.master')
@section('title', 'Giỏ hàng')
@section('main')
    <script>
        function updateCart(qty, rowId) {
            $.get(
                "{{ route('cart.update') }}", {
                    qty: qty,
                    rowId: rowId
                },
                function() {
                    location.reload()
                }
            );
        }
    </script>
    <link rel="stylesheet" href="css/cart.css">
    <div id="wrap-inner">
        @if (Cart::count() >= 1)
            <div id="list-cart">
                <h3>Giỏ hàng</h3>
                <form>
                    <table class="table .table-responsive text-center">
                        <tr class="active">
                            <td width="11.111%">Ảnh mô tả</td>
                            <td width="22.222%">Tên sản phẩm</td>
                            <td width="22.222%">Số lượng</td>
                            <td width="16.6665%">Đơn giá</td>
                            <td width="16.6665%">Thành tiền</td>
                            <td width="11.112%">Xóa</td>
                        </tr>
                        @foreach ($items as $item)
                            <tr>
                                <td><img width="150" class="img-responsive"
                                        src="{{ asset('../storage/app/avatar/' . $item->options->img) }}">
                                </td>
                                <td>{{ $item->name }}
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control" type="number"
                                            value="{{ $item->qty }}"
                                            onchange="updateCart(this.value,'{{ $item->rowId }}')">
                                    </div>
                                </td>
                                <td><span
                                        class="price">{{ number_format($item->price, 0, ',', '.') }}
                                        VNĐ</span>
                                </td>
                                <td><span
                                        class="price">{{ number_format($item->price * $item->qty, 0, ',', '.') }}
                                        VNĐ</span></td>
                                <td><a
                                        href="{{ route('cart.delete', ['id' => $item->rowId]) }}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="row" id="total-price">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            Tổng thanh toán: <span class="total-price">{{ $subtotal }}
                                VNĐ</span>

                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <a href="#" class="my-btn btn">Mua
                                tiếp</a>
                            <a href="#" class="my-btn btn">Cập
                                nhật</a>
                            <a href="{{ url('cart/delete/all') }}" class="my-btn btn">Xóa giỏ
                                hàng</a>
                        </div>
                    </div>
                </form>
            </div>
            <div id="xac-nhan">
                <h3>Xác nhận mua hàng</h3>
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input required type="email" class="form-control" id="email"
                            name="email">
                    </div>
                    <div class="form-group">
                        <label for="name">Họ và tên:</label>
                        <input required type="text" class="form-control" id="name"
                            name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại:</label>
                        <input required type="number" class="form-control" id="phone"
                            name="phone">
                    </div>
                    <div class="form-group">
                        <label for="add">Địa chỉ:</label>
                        <input required type="text" class="form-control" id="add"
                            name="add">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-default">Thực
                            hiện đơn hàng</button>
                    </div>
                </form>
            </div>
        @else
            <p class="mt-3 alert alert-danger ">Giỏ hàng trống!</p>
        @endif
    </div>
@endsection
