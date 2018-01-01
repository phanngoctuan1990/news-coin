<a href="{{ route('admin.coin.show', $id) }}" class="btn btn-info btn-sm">Chi tiết</a>
<a href="{{ route('admin.coin.destroy', $id) }}" data-method="delete" data-confirm="Bạn có chắc chắn muốn xoá?" class="btn btn-danger btn-sm">Xoá</a>
@if($is_publish != \App\Models\Coin::TYPE_PUBLISH)
<a href="{{ route('admin.coin.updateStatus', $id) }}" class="btn btn-warning btn-sm">Chờ duyệt...</a>
@else
<a href="javascript:void(0)" class="btn btn-success btn-sm">Đã duyệt</a>
@endif
