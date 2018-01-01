@extends('admin.layout.master')
@section('title', 'Quản lý hộp thư')
@section('content')
<section class="content-header">
    <h1>
        Hộp thư
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}">Trang chủ</a></li>
        <li><a href="{{ route('admin.contact-us.index') }}">Hộp thư</a></li>
        <li class="active"><a href="#">Chi tiết hộp thư</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
				<div class="box-body no-padding">
					<div class="mailbox-read-info">
						<h3>{{ $contactUs->subject }}</h3>
						<h5>
							<label>Người liên hệ: </label> {{ $contactUs->name }}
							<span class="mailbox-read-time pull-right">{{ $contactUs->created_at->format('d-m-Y H:m:s') }}</span>
						</h5>
						<label>Trạng thái: </label>
						@if($contactUs->replied == \App\Models\ContactUs::TYPE_NO_REPLIED)
						<span class="label label-warning">Chờ trả lời...</span>
						@else
						<span class="label label-success">Đã trả lời</span>
						@endif
						<br>
						<label>Địa chỉ mail: </label> {{ $contactUs->email }}
					</div>
					<div class="mailbox-read-message">{{ $contactUs->message }}</div>
				</div>
				<div class="box-footer">
					<div class="pull-right">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-reply"></i> Trả lời</button>
					</div>
				</div>
			</div>
        </div>
    </div>
    <!-- Reply mail -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title" id="exampleModalLabel">Trả lời</h2>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form role="form" id="form-reply-contact" action="{{ route('admin.contact.reply', $contactUs->id) }}" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="mail_too" class="col-form-label">Đến:</label> {{ $contactUs->email }}
							<input type="hidden" name="mail_to" value="{{ $contactUs->email }}">
						</div>
						<div class="form-group">
							<label for="subject" class="col-form-label">Tiêu đề:</label>
							<input type="text" class="form-control" name="subject">
						</div>
						<div class="form-group">
							<label for="message" class="col-form-label">Nội dung:</label>
							<textarea class="form-control" name="message"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
							<button type="submit" class="btn btn-primary">Gửi mail</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
