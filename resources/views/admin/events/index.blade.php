@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.events.title')</h3>
    @can('event_create')
    <p>
        <a href="{{ route('admin.events.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>

    </p>
    @endcan



    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($events) > 0 ? 'datatable' : '' }} @can('event_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('event_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.events.fields.title')</th>
                        <th>@lang('global.events.fields.start-time')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>

                <tbody>
                    @if (count($events) > 0)
                        @foreach ($events as $event)
                            <tr data-entry-id="{{ $event->id }}">
                                @can('event_delete')
                                    <td></td>
                                @endcan

                                <td field-key='title'>{{ $event->title }}</td>
                                    <td field-key='start_time'>{{ $event->start_time }}</td>
                                    <td>
                                        @can('event_view')
                                            <a href="{{ route('admin.events.show',[$event->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                        @endcan
                                        @can('event_edit')
                                            <a href="{{ route('admin.events.edit',[$event->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                        @endcan
                                        @can('event_delete')
                                            {!! Form::open(array(
                                                                                    'style' => 'display: inline-block;',
                                                                                    'method' => 'DELETE',
                                                                                    'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                                                    'route' => ['admin.events.destroy', $event->id])) !!}
                                            {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                            {!! Form::close() !!}
                                        @endcan
                                    </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('event_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.events.mass_destroy') }}';
        @endcan

    </script>
@endsection