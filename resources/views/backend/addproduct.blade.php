@extends('backend.master')
@section('main')
@section('title', 'Thêm sản phẩm')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">Thêm sản phẩm</div>
                @include('errors.note')
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input required type="text" name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required type="number" name="price"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="img">Ảnh sản phẩm</label>
                                    <input required id="img" type="file"
                                        name="img" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="300px"
                                        src="img/new_seo-10-512.png">
                                </div>
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input required type="text" name="accessories"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input required type="text" name="warranty"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input required type="text" name="promotion"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input required type="text" name="condition"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select required name="status" class="form-control">
                                        <option value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea class="ckeditor" required name="description">
                                    </textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description', {
                                            language: 'vi',
                                            filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
                                            filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
                                            filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        });
                                    </script>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select required name="cate" class="form-control">
                                        @foreach ($categoryList as $category)
                                            <option value=" {{ $category->cate_id }}">
                                                {{ $category->cate_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div>Sản phẩm nổi bật</div><br>
                                    Có: <input type="radio" name="featured"
                                        value="1">
                                    Không: <input type="radio" checked name="featured"
                                        value="0">
                                </div>
                                <input type="submit" name="submit" value="Thêm"
                                    class="btn btn-primary">
                                <a href="#" class="btn btn-danger">Hủy bỏ</a>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div> <!--/.main-->
@endsection
