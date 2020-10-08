@extends('layouts.app')

@section('template_title')
    {!! trans('departmentsmanagement.create-new-department') !!}
@endsection

@section('template_fastload_css')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            {!! trans('departmentsmanagement.create-new-Departments') !!}
                            <div class="pull-right">
                                <a href="{{ route('departments') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('departmentsmanagement.tooltips.back-departments') }}">
                                    <i class="fa fa-fw fa-reply-all" aria-hidden="true"></i>
                                    {!! trans('departmentsmanagement.buttons.back-to-departments') !!}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! Form::open(array('route' => 'departments.store', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}

                            {!! csrf_field() !!}

                            

                            <div class="form-group has-feedback row {{ $errors->has('dname') ? ' has-error ' : '' }}">
                                {!! Form::label('name', trans('forms.create_department_label_departmentname'), array('class' => 'col-md-3 control-label')); !!}
                                <div class="col-md-9">
                                    <div class="input-group">
                                        {!! Form::text('dname', NULL, array('id' => 'dname', 'class' => 'form-control', 'placeholder' => trans('forms.create_department_ph_departmentname'))) !!}
                                        <div class="input-group-append">
                                            <label class="input-group-text" for="name">
                                                <i class="fa fa-fw {{ trans('forms.create_department_icon_departmentname') }}" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    @if ($errors->has('dname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            {!! Form::button(trans('forms.create_department_button_text'), array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')
@endsection
