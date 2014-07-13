@extends('layouts.admin')

@section('title') Categories @stop

@section('content')

<div class="col-lg-10 col-lg-offset-1">

    <h1>
        <i class="fa fa-category"></i> Categories
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h1>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <?php echo $categories->links(); ?>
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-primary pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/admin/category/' . $category->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <?php echo $categories->links(); ?>
    </div>

    <a href="/admin" class="btn btn-primary">Back to Admin Home</a>
    <a href="/admin/category/create" class="btn btn-success">Create Category</a>

</div>

@stop