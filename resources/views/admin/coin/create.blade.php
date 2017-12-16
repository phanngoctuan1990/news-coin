@extends('admin.layout.master')
@section('title', 'Manager Coin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Create coin
	</h1>
	<ol class="breadcrumb">
		<li><a href="#">Home</a></li>
		<li><a href="#">Coin</a></li>
		<li class="active">Create</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <!-- form start -->
        <form role="form">
          <div class="box-body">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label>Thumbnail</label>
              <input type="file">
            </div>
            <div class="form-group">
              <label>Rate</label>
              <input type="text" class="form-control" placeholder="Enter rate">
            </div>

            <!-- radio -->
            <div class="form-group">
	          <label>Hype</label>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                  Very low
                </label>
                
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Low
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                  Low
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                  Medium
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                  High
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                  Very high
                </label>
              </div>
            </div>

            <!-- select -->
            <div class="form-group">
              <label>Select</label>
              <select class="form-control">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>

            <!-- wysiwyg -->
            <div class="form-group">
                <label>Textarea</label>
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
    </div>
    <!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
@endsection
@section('script')
<script>
    $(function () {
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5();
    })
</script>
@endsection