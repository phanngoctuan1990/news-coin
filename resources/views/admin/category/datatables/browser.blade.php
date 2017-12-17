<a href="{{ route('admin.category-coin.show', $id) }}" class="btn btn-info btn-sm">Chi tiết</a>
@if(!$hasCoins)
<a href="{{ route('admin.category-coin.destroy', $id) }}" data-method="delete" data-confirm="Bạn có chắc chắn muốn xoá?" class="btn btn-danger btn-sm">Xoá</a>
@endif
