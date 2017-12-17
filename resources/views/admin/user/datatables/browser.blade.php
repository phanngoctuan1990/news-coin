@if (!$is_admin || auth()->user()->is_admin)
<a href="{{ route('admin.user.show', $id) }}" class="btn btn-info btn-sm">Sửa</a>
@endif
@if (auth()->user()->is_admin && $id != auth()->user()->id)
<a href="{{ route('admin.user.destroy', $id) }}" data-method="delete" data-confirm="Bạn có chắc chắn muốn xoá?" class="btn btn-danger btn-sm">Xoá</a>
@endif