@extends('admin.layout.master')
@section('title', 'Manager Coin')
@section('content')
<section class="content-header">
    <h1>
        Coin
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Coin</a></li>
        <li class="active">Chi tiết coin</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" id="form-update-coin" action="{{ route('admin.coin.update', $coin->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name="name" class="form-control" value="{{ $coin->name }}" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="file" name="thumbnail"> 
                            <br>
                            <img src="{{ $coin->thumbnail }}" border="0" width="40" align="center" />
                        </div>
                        <div class="form-group">
                            <label>Rate</label>
                            <input type="text" name="rate" class="form-control" value="{{ $coin->rate }}" placeholder="Nhập rate">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input type="number" name="price" class="form-control" value="{{ $coin->price }}" placeholder="Nhập giá">
                        </div>

                        <!-- Hype -->
                        <div class="form-group">
                            <label>Hype</label>
                            <div class="radio">
                                <label class="radio-inline">
                                <input type="radio" name="hype" value="{{ \App\Models\Coin::TYPE_VERY_LOW }}" @if($coin->hype == \App\Models\Coin::TYPE_VERY_LOW) checked @endif>
								Rất thấp
								</label>
								<label class="radio-inline">
								<input type="radio" name="hype" value="{{ \App\Models\Coin::TYPE_LOW }}" @if($coin->hype == \App\Models\Coin::TYPE_LOW) checked @endif>
								Thấp
								</label>
								<label class="radio-inline">
								<input type="radio" name="hype" value="{{ \App\Models\Coin::TYPE_MEDIUM }}" @if($coin->hype == \App\Models\Coin::TYPE_MEDIUM) checked @endif>
								Trung bình
								</label>
								<label class="radio-inline">
								<input type="radio" name="hype" value="{{ \App\Models\Coin::TYPE_HIGH }}" @if($coin->hype == \App\Models\Coin::TYPE_HIGH) checked @endif>
								Cao
								</label>
								<label class="radio-inline">
								<input type="radio" name="hype"  value="{{ \App\Models\Coin::TYPE_VERY_HIGH }}" @if($coin->hype == \App\Models\Coin::TYPE_VERY_HIGH) checked @endif>
								Rất Cao
								</label>
                            </div>
                        </div>

                        <!-- Scam -->
                        <div class="form-group">
                            <label>Scam</label>
                            <div class="radio">
                                <label class="radio-inline">
                                <input type="radio" name="scam"  value="{{ \App\Models\Coin::TYPE_VERY_LOW }}" @if($coin->scam == \App\Models\Coin::TYPE_VERY_LOW) checked @endif>
                                Rất thấp
                                </label>

                                <label class="radio-inline">
                                <input type="radio" name="scam" value="{{ \App\Models\Coin::TYPE_LOW }}" @if($coin->scam == \App\Models\Coin::TYPE_LOW) checked @endif>
                                Thấp
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="scam"  value="{{ \App\Models\Coin::TYPE_MEDIUM }}" @if($coin->scam == \App\Models\Coin::TYPE_MEDIUM) checked @endif>
                                Trung bình
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="scam"  value="{{ \App\Models\Coin::TYPE_HIGH }}" @if($coin->scam == \App\Models\Coin::TYPE_HIGH) checked @endif>
                                Cao
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="scam"  value="{{ \App\Models\Coin::TYPE_VERY_HIGH }}" @if($coin->scam == \App\Models\Coin::TYPE_VERY_HIGH) checked @endif>
                                Rất Cao
                                </label>
                            </div>
                        </div>

                        <!-- Moom -->
                        <div class="form-group">
                            <label>Moom</label>
                            <div class="radio">
                                <label class="radio-inline">
                                <input type="radio" name="moom"  value="{{ \App\Models\Coin::TYPE_VERY_LOW }}" @if($coin->moom == \App\Models\Coin::TYPE_VERY_LOW) checked @endif>
                                Rất thấp
                                </label>

                                <label class="radio-inline">
                                <input type="radio" name="moom"  value="{{ \App\Models\Coin::TYPE_LOW }}" @if($coin->moom == \App\Models\Coin::TYPE_LOW) checked @endif>
                                Thấp
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="moom"  value="{{ \App\Models\Coin::TYPE_MEDIUM }}" @if($coin->moom == \App\Models\Coin::TYPE_MEDIUM) checked @endif>
                                Trung bình
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="moom"  value="{{ \App\Models\Coin::TYPE_HIGH }}" @if($coin->moom == \App\Models\Coin::TYPE_HIGH) checked @endif>
                                Cao
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="moom"  value="{{ \App\Models\Coin::TYPE_VERY_HIGH }}" @if($coin->moom == \App\Models\Coin::TYPE_VERY_HIGH) checked @endif>
                                Rất Cao
                                </label>
                            </div>
                        </div>

                        <!-- datepicker -->
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Ngày bắt đầu</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="start_date" value="{{ $coin->start_date }}" class="form-control pull-right" id="start-date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="end_date" value="{{ $coin->end_date }}" class="form-control pull-right" id="end-date">
                                </div>
                            </div>
                        </div>

                        <!-- stage -->
                        <div class="form-group">
                        <label>Trạng thái</label>
                            <div class="radio">
                                <label class="radio-inline">
                                <input type="radio" name="stage"  value="{{ \App\Models\Coin::TYPE_ENDED }}" @if($coin->stage == \App\Models\Coin::TYPE_ENDED) checked @endif>
                                ENDED
                                </label>

                                <label class="radio-inline">
                                <input type="radio" name="stage"  value="{{ \App\Models\Coin::TYPE_EXCHANGE }}" @if($coin->stage == \App\Models\Coin::TYPE_EXCHANGE) checked @endif>
                                EXCHANGE
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="stage" value="{{ \App\Models\Coin::TYPE_ICO }}" @if($coin->stage == \App\Models\Coin::TYPE_ICO) checked @endif>
                                ICO
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="stage" value="{{ \App\Models\Coin::TYPE_ICO_TODAY }}" @if($coin->stage == \App\Models\Coin::TYPE_ICO_TODAY) checked @endif>
                                ICO TODAY
                                </label>
                                <label class="radio-inline">
                                <input type="radio" name="stage" value="{{ \App\Models\Coin::TYPE_SCAM }}" @if($coin->stage == \App\Models\Coin::TYPE_SCAM) checked @endif>
                                SCAM
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{ route('admin.coin.index') }}" class="btn btn-danger btn-sm">Thoát</a>
                        <button type="submit" class="btn btn-primary btn-sm">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
{!! JsValidator::formRequest('App\Http\Requests\UpdateCoinRequest', '#form-update-coin') !!}
<script>
    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
        //Date picker
        $('#start-date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
        $('#end-date').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
        });
    })
</script>
@endsection