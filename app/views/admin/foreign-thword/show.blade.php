@extends('layouts.admin')

@section('title') Show Foreign Thword @stop

@section('content')

<div class='col-lg-8 col-lg-offset-2'>

    @if (!empty($successMsg))
        <div class='bg-success alert'>{{ $successMsg }}</div>
    @endif

    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

    <h2>
        <i class="fa fa-thword"></i> Show Foreign Thword
        {{ HTML::link('/logout', 'Logout', array('class' => 'btn btn-warning pull-right'))}}
    </h2>

    {{ Breadcrumbs::render() }}

    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td colspan="100%">
                        <div class="nav-btn-container" class="pull-left" style="width: auto;">
                            {{ HTML::link('/admin/foreign-thword/first', '|<', ['class' => 'btn btn-primary pull-left', 'title' => 'go to first']) }}
                            {{ HTML::link('/admin/foreign-thword/'.$thwArray['thword']['id'].'/previous', '<', ['class' => 'btn btn-primary pull-left', 'title' => 'go to previous']) }}
                            {{ HTML::link('/admin/foreign-thword/'.$thwArray['thword']['id'].'/next', '>', ['class' => 'btn btn-primary pull-left', 'title' => 'go to next']) }}
                            {{ HTML::link('/admin/foreign-thword/last', '>|', ['class' => 'btn btn-primary pull-left', 'title' => 'go to last']) }}
                        </div>
                        <div class="pull-right" style="width: auto;">
                            {{ HTML::link('/admin/foreign-thword/create', 'Create a New Foreign Thword', array('class' => 'btn btn-primary')) }}
                            {{ HTML::link('/admin/foreign-thword/'.$thwArray['thword']['id'].'/edit', 'Edit This Foreign Thword', ['class' => 'btn btn-primary']) }}
                            {{ HTML::link('/admin/foreign-thword', 'Foreign Thword Listing', ['class' => 'btn btn-primary']) }}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Topic</td>
                    <td>{{ $thwArray['thword']['topic'] }}</td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>{{ $thwArray['category']['name'] }}</td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td>{{ $thwArray['subject']['name'] }}</td>
                </tr>
                <tr>
                    <td>Language</td>
                    <td>{{ $thwArray['thword']['lang'] }}</td>
                </tr>
                <tr>
                    <td>Level</td>
                    <td>{{ $thwArray['thword']['level'] }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $thwArray['thword']['description'] }}</td>
                </tr>
                <tr>
                    <td>Answers</td>
                    <td>
                        <?php $answers = explode('|', $thwArray['thword']['answers']); ?>
                        @foreach ($answers as $answer)
                            <li>
                            @if (strpos($answer, '^') !== false)
                                {{ str_replace('^', ' (', $answer) }})
                            @else
                                {{ $answer }}
                            @endif
                            </li>
                        @endforeach

                    </td>
                </tr>
                <tr style="display: none;">
                    <td>Bonus</td>
                    <td>
                        @if ($thwArray['thword']['bonus'])
                            YES
                        @else
                            NO
                        @endif
                    </td>
                </tr>
                <tr style="display: none;">
                    <td>Bonus Question</td>
                    <td>{{ $thwArray['thword']['bonus_question'] }}</td>
                </tr>
                <tr>
                    <td>Source</td>
                    <td>
                        {{ HTML::link($thwArray['thword']['source'], $thwArray['thword']['source'], ['target' => '_blank']) }}
                    </td>
                </tr>
                <tr>
                    <td>Notes</td>
                    <td>{{ $thwArray['thword']['notes'] }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ $thwArray['thword']['created_at'] }}</td>
                </tr>
                <tr>
                    <td>Updated At</td>
                    <td>{{ $thwArray['thword']['updated_at'] }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{ Form::close() }}

</div>

@stop