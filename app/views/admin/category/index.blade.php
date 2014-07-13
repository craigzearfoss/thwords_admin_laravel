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
                        {{ HTML::link('/admin/category/'.$category->id.'/edit', 'Edit', array('class' => 'btn btn-primary pull-left')) }}
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

    {{ HTML::link('/admin', 'Back to Admin Home', array('class' => 'btn btn-primary')) }}
    {{ HTML::link('/admin/category/create', 'Create Category', array('class' => 'btn btn-success pull-right')) }}

</div>

@stop