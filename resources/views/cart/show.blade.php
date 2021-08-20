@extends('include.index')

@section('title', 'cart')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Giỏ hàng</h1>
                @php
                    $t = 0;
                @endphp

                @if (Cart::count() > 0)
                    <form action="{{ route('cart.update') }}" method="post">
                        @csrf
                        <p class="text text-white bg-primary p-1">Bạn có {{ Cart::count() }} sản phẩm trong giỏ hàng</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach (Cart::content() as $item)
                                    <tr>
                                        <td scope="row">{{ ++$t }}</td>
                                        <td>
                                            <img src="{{ asset($item->options->thumnail) }}" width="100px" alt="sdsds">
                                        </td>
                                        <td scope="col"><a href="">{{ $item->name }}</a></td>
                                        <td scope="col">{{ number_format($item->price, 0, ',', '.') }}đ</td>
                                        <td scope="col">
                                            <input type="number" style="width:50px; text-align: center"
                                                value="{{ number_format($item->qty, 0, ',', '.') }}" min=1
                                                name="qty[{{ $item->rowId }}]">
                                        </td>
                                        <td scope="col">{{ number_format($item->total, 0, ',', '.') }}đ</td>
                                        <td><a href="{{ url('cart/remove', $item->rowId) }}" class="text-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td> <input name="btn_update" type="submit" class="btn btn-primary"
                                            value="Cập nhật giỏ hàng"></td>
                                    <td> <a href="{{ url('cart/removeAll') }}" class="text-danger">Xóa giỏ hàng</a></td>
                                    <td colspan='6' class="text-right">Tổng:</td>
                                    <td><strong>{{ Cart::total() }}đ</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                    </form>
                @else
                    <p class="text text-white bg-warning p-1">Không có sản phẩm nào trong giỏ hàng</p>
                    <a href="{{ url('/') }}" class="btn btn-success">Quay lại mua hàng </a>
                @endif


            </div>
        </div>
    </div>

@endsection
