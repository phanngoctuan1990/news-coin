<a href="{{ route('admin.news.show', $id) }}" class="btn btn-info btn-sm">Chi tiết</a>
<a href="{{ route('admin.news.destroy', $id) }}" data-method="delete" data-confirm="Bạn có chắc chắn muốn xoá?" class="btn btn-danger btn-sm">Xoá</a>
@if($status == 0)
<a href="{{ route('admin.news.updateStatus', $id) }}" class="btn btn-warning btn-sm">Chờ duyệt...</a>
@else
<a href="javascript:void(0" class="btn btn-success btn-sm">Đã duyệt</a>
@endif