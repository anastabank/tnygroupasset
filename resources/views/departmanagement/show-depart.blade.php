@extends('layouts.app')

@section('template_title')
  {!! trans('departmentsmanagement.showing-department', ['name' => $department->dname]) !!}
@endsection

@php
  $levelAmount = trans('departmentsmanagement.labelDepartmentLevel');
  if ($department->level() >= 2) {
    $levelAmount = trans('departmentsmanagement.labelDepartmentLevels');
  }
@endphp

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">

        <div class="card">

          <div class="card-header text-white @if ($department->activated == 1) bg-success @else bg-danger @endif">
            <div style="display: flex; justify-content: space-between; align-items: center;">
              {!! trans('departmentsmanagement.showing-department-title', ['name' => $department->name]) !!}
              <div class="float-right">
                <a href="{{ route('departments') }}" class="btn btn-light btn-sm float-right" data-toggle="tooltip" data-placement="left" title="{{ trans('departmentsmanagement.tooltips.back-departments') }}">
                  <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
                  {!! trans('departmentsmanagement.buttons.back-to-departments') !!}
                </a>
              </div>
            </div>
          </div>

          <div class="card-body">

            <div class="row">
              <div class="col-sm-4 offset-sm-2 col-md-2 offset-md-3">
                <img src="@if ($department->profile && $department->profile->avatar_status == 1) {{ $department->profile->avatar }} @else {{ Gravatar::get($department->email) }} @endif" alt="{{ $department->name }}" class="rounded-circle center-block mb-3 mt-4 department-image">
              </div>
              <div class="col-sm-4 col-md-6">
                <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                  {{ $department->name }}
                </h4>
                <p class="text-center text-left-tablet">
                  <strong>
                    {{ $department->first_name }} {{ $department->last_name }}
                  </strong>
                  @if($department->email)
                    <br />
                    <span class="text-center" data-toggle="tooltip" data-placement="top" title="{{ trans('departmentsmanagement.tooltips.email-department', ['department' => $department->email]) }}">
                      {{ Html::mailto($department->email, $department->email) }}
                    </span>
                  @endif
                </p>
                @if ($department->profile)
                  <div class="text-center text-left-tablet mb-4">
                    <a href="{{ url('/profile/'.$department->name) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="left" title="{{ trans('departmentsmanagement.viewProfile') }}">
                      <i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('departmentsmanagement.viewProfile') }}</span>
                    </a>
                    <a href="/departments/{{$department->id}}/edit" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="{{ trans('departmentsmanagement.editUser') }}">
                      <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md"> {{ trans('departmentsmanagement.editUser') }} </span>
                    </a>
                    {!! Form::open(array('url' => 'departments/' . $department->id, 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => trans('departmentsmanagement.deleteUser'))) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::button('<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm hidden-md">' . trans('departmentsmanagement.deleteUser') . '</span>' , array('class' => 'btn btn-danger btn-sm','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this department?')) !!}
                    {!! Form::close() !!}
                  </div>
                @endif
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($department->name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelUserName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $department->name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->email)

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('departmentsmanagement.labelEmail') }}
              </strong>
            </div>

            <div class="col-sm-7">
              <span data-toggle="tooltip" data-placement="top" title="{{ trans('departmentsmanagement.tooltips.email-department', ['department' => $department->email]) }}">
                {{ HTML::mailto($department->email, $department->email) }}
              </span>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @endif

            @if ($department->first_name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelFirstName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $department->first_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->last_name)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelLastName') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $department->last_name }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('departmentsmanagement.labelRole') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @foreach ($department->roles as $department_role)

                @if ($department_role->name == 'User')
                  @php $badgeClass = 'primary' @endphp

                @elseif ($department_role->name == 'Admin')
                  @php $badgeClass = 'warning' @endphp

                @elseif ($department_role->name == 'Unverified')
                  @php $badgeClass = 'danger' @endphp

                @else
                  @php $badgeClass = 'default' @endphp

                @endif

                <span class="badge badge-{{$badgeClass}}">{{ $department_role->name }}</span>

              @endforeach
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('departmentsmanagement.labelStatus') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if ($department->activated == 1)
                <span class="badge badge-success">
                  Activated
                </span>
              @else
                <span class="badge badge-danger">
                  Not-Activated
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('departmentsmanagement.labelAccessLevel')}} {{ $levelAmount }}:
              </strong>
            </div>

            <div class="col-sm-7">

              @if($department->level() >= 5)
                <span class="badge badge-primary margin-half margin-left-0">5</span>
              @endif

              @if($department->level() >= 4)
                 <span class="badge badge-info margin-half margin-left-0">4</span>
              @endif

              @if($department->level() >= 3)
                <span class="badge badge-success margin-half margin-left-0">3</span>
              @endif

              @if($department->level() >= 2)
                <span class="badge badge-warning margin-half margin-left-0">2</span>
              @endif

              @if($department->level() >= 1)
                <span class="badge badge-default margin-half margin-left-0">1</span>
              @endif

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-6 text-larger">
              <strong>
                {{ trans('departmentsmanagement.labelPermissions') }}
              </strong>
            </div>

            <div class="col-sm-7">
              @if($department->canViewUsers())
                <span class="badge badge-primary margin-half margin-left-0">
                  {{ trans('permsandroles.permissionView') }}
                </span>
              @endif

              @if($department->canCreateUsers())
                <span class="badge badge-info margin-half margin-left-0">
                  {{ trans('permsandroles.permissionCreate') }}
                </span>
              @endif

              @if($department->canEditUsers())
                <span class="badge badge-warning margin-half margin-left-0">
                  {{ trans('permsandroles.permissionEdit') }}
                </span>
              @endif

              @if($department->canDeleteUsers())
                <span class="badge badge-danger margin-half margin-left-0">
                  {{ trans('permsandroles.permissionDelete') }}
                </span>
              @endif
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            @if ($department->created_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelCreatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $department->created_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->updated_at)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelUpdatedAt') }}
                </strong>
              </div>

              <div class="col-sm-7">
                {{ $department->updated_at }}
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->signup_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelIpEmail') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $department->signup_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->signup_confirmation_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelIpConfirm') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $department->signup_confirmation_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->signup_sm_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelIpSocial') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $department->signup_sm_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->admin_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelIpAdmin') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $department->admin_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

            @if ($department->updated_ip_address)

              <div class="col-sm-5 col-6 text-larger">
                <strong>
                  {{ trans('departmentsmanagement.labelIpUpdate') }}
                </strong>
              </div>

              <div class="col-sm-7">
                <code>
                  {{ $department->updated_ip_address }}
                </code>
              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            @endif

          </div>

        </div>
      </div>
    </div>
  </div>

  @include('modals.modal-delete')

@endsection

@section('footer_scripts')
  @include('scripts.delete-modal-script')
  @if(config('departmentsmanagement.tooltipsEnabled'))
    @include('scripts.tooltips')
  @endif
@endsection
