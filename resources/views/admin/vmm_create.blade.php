@extends('admin.master');
@section('title')
    Dashboard
@endsection
@section('content')


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Create VMM</h3>
                            </div>
                            <div class="card-body">
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <p>{!! \Session::get('success') !!}</p>
                                    </div>
                                @endif
                                @if (\Session::has('error'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('error') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <form method="post" action="/admin/vmm-store" >
                                    @csrf
                                    <div class="form-group">
                                        <label>Title:</label>
                                        <input type="text" class="form-control " name="title" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Minimum Invest:</label>
                                        <input type="number" class="form-control " name="minimum_invest" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Distribute Coin:</label>
                                        <input type="number" class="form-control " name="distribute_coin" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Execution Time [In minute]:</label>
                                        <input type="number" class="form-control " name="execution_time" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Prepration Time [In minute]:</label>
                                        <input type="number" class="form-control " name="prepration_time" required>
                                    </div>


                                    <!-- time Picker -->

                                    <div class="form-group">
                                        <label>Start Time:</label>
                                        <input type="datetime-local" class="form-control" name="start_time" required>
                                        <!-- /.input group -->
                                    </div>


                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option selected="selected">--select--</option>
                                            <option value="draft">Draft</option>
                                            <option value="in_prepration">In Prepration</option>
                                            <option value="in_prepration">In Prepration</option>
                                            <option value="running">Running</option>
                                            <option value="active">Active</option>
                                            <option value="finished">Finished</option>
                                        </select>
                                    </div>

                                    <button type="submit" name="sumit" class="btn btn-primary">Submit</button>

                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

@endsection
