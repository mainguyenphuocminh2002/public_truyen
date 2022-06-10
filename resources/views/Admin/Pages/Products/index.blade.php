@extends('Admin.Layouts.adminLayout')
@section('adminContent')
    @php
    use App\Models\Admin\Products;
    use App\Helper\Common;

    @endphp
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Sản phẩm</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Search Filter -->

            <!-- /Search Filter -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive" id="product_list">
                                <table class="table table-center table-hover ">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên</th>
                                            <th>Tác giả</th>
                                            <th>views</th>
                                            <th>Ngày Tạo</th>
                                            <th>Ngày Cập Nhật</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBody">
                                        @if (isset($products))
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="id">{{ $product->id }}</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            {{ $product->name }}
                                                        </h2>
                                                    </td>
                                                    <td>
                                                        {{ $product->author->name }}
                                                    </td>
                                                    <td>
                                                        {{ $product->views ?? 'Trống' }}
                                                    </td>
                                                    <td>
                                                        {{ $product->created_at }}
                                                    </td>
                                                    <td>
                                                        {{ $product->updated_at }}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('chapters.show', ['chapter' => $product->id]) }}"
                                                            class="btn btn-sm btn-white text-primary mr-2"><i
                                                                class="far fa-eye mr-1"></i>Xem Chương</a>
                                                        @can('updateProducts', [Products::class, $product])
                                                            <a href="{{ route('products.edit', ['product' => Common::changeIdToEncode($product->id)]) }}"
                                                                class="btn btn-sm btn-white text-success mr-2"><i
                                                                    class="far fa-edit mr-1"></i>Sửa</a>
                                                        @endcan
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm btn-white text-danger delete"><i
                                                                class="far fa-trash-alt mr-1"></i>Xóa</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                    @endif
                                </table>
                                <div class=" float-right mt-2 mb-3">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('adminJs')
    <script>
        function deleteItem(element, item) {
            let id = element.closest("tr").find(".id").text();
            console.log(id);
            let title = element.closest("tr").find(".title").text();
            title = title ? title : "#" + id;
            var dtRow = element.parents("tr");
            Swal.fire({
                title: `Xóa ${item}`,
                html: `Bạn có muốn xoá ${item} <b style="  text-transform: capitalize;">${title}</b>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Không",
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    $.ajax({
                        type: "POST",
                        url: "products/" + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: "DELETE"
                        },
                        dataType: "JSON",
                        success: function(response) {}
                    });
                },
                allowOutsideClick: () => !Swal.isLoading(),
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload()

                }
            });
        }
    </script>
@endsection
