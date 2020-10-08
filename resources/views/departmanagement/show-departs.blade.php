@extends('layouts.app')

@section('template_title')
    {!! trans('departmentsmanagement.showing-all-departments') !!}
@endsection

@section('template_linked_css')
    @if(config('departmentsmanagement.enabledDatatablesJs'))
        <link rel="stylesheet" type="text/css" href="{{ config('departmentsmanagement.datatablesCssCDN') }}">
    @endif
    <style type="text/css" media="screen">
        .departments-table {
            border: 0;
        }
        .departments-table tr td:first-child {
            padding-left: 15px;
        }
        .departments-table tr td:last-child {
            padding-right: 15px;
        }
        .departments-table.table-responsive,
        .departments-table.table-responsive table {
            margin-bottom: 0;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {!! trans('departmentsmanagement.showing-all-departments') !!}
                            </span>

                            <div class="btn-group pull-right btn-group-xs">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v fa-fw" aria-hidden="true"></i>
                                    <span class="sr-only">
                                        {!! trans('departmentsmanagement.departments-menu-alt') !!}
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/departments/create">
                                        <i class="fa fa-fw fa-department-plus" aria-hidden="true"></i>
                                        {!! trans('departmentsmanagement.buttons.create-new') !!}
                                    </a>
                                    <a class="dropdown-item" href="/departments/deleted">
                                        <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                        {!! trans('departmentsmanagement.show-deleted-Departments') !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(config('departmentsmanagement.enableSearchDepartments'))
                            @include('partials.search-departments-form')
                        @endif

                        <div class="table-responsive departments-table">
                            <table class="table table-striped table-sm data-table">
                                <caption id="department_count">
                                    {{ trans_choice('departmentsmanagement.departments-table.caption', 1, ['departmentscount' => $departments->count()]) }}
                                </caption>
                                <thead class="thead">
                                    <tr>
                                        <th>{!! trans('departmentsmanagement.departments-table.id') !!}</th>
                                        <th>{!! trans('departmentsmanagement.departments-table.dname') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('departmentsmanagement.departments-table.created') !!}</th>
                                        <th class="hidden-sm hidden-xs hidden-md">{!! trans('departmentsmanagement.departments-table.updated') !!}</th>
                                        <th>{!! trans('departmentsmanagement.departments-table.actions') !!}</th>
                                        <th class="no-search no-sort"></th>
                                        <th class="no-search no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody id="departments_table">
                                    @foreach($departments as $department)
                                        <tr>
                                            <td>{{$department->id}}</td>
                                            <td>{{$department->dname}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$department->created_at}}</td>
                                            <td class="hidden-sm hidden-xs hidden-md">{{$department->updated_at}}</td>
                                            <td>
                                                {!! Form::open(array('url' => 'departments/' . $department->id, 'class' => '', 'data-toggle' => 'tooltip', 'title' => 'Delete')) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::button(trans('departmentsmanagement.buttons.delete'), array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete department', 'data-message' => 'Are you sure you want to delete this department ?')) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block" href="{{ URL::to('departments/' . $department->id) }}" data-toggle="tooltip" title="Show">
                                                    {!! trans('departmentsmanagement.buttons.show') !!}
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-info btn-block" href="{{ URL::to('departments/' . $department->id . '/edit') }}" data-toggle="tooltip" title="Edit">
                                                    {!! trans('departmentsmanagement.buttons.edit') !!}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                                @if(config('departmentsmanagement.enableSearchDepartments'))
                                    <tbody id="search_results"></tbody>
                                @endif

                            </table>

                            @if(config('departmentsmanagement.enablePagination'))
                                {{ $departments->links() }}
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modals.department-delete')

@endsection

@section('footer_scripts')
    @if ((count($departments) > config('departmentsmanagement.datatablesJsStartCount')) && config('departmentsmanagement.enabledDatatablesJs'))
        @include('scripts.datatables')
    @endif
    @include('scripts.delete-modal-script')
    @include('scripts.save-modal-script')
    @if(config('departmentsmanagement.tooltipsEnabled'))
        @include('scripts.tooltips')
    @endif
    @if(config('departmentsmanagement.enableSearchDepartments'))
        @include('scripts.search-departments')
    @endif
@endsection
