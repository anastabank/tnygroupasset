<?php

return [

    // Titles
    'showing-all-departments'     => 'Showing All Departments',
    'departments-menu-alt'        => 'Show Departments Management Menu',
    'create-new-Departments'       => 'Create New Departments',
    'show-deleted-Departments'    => 'Show Deleted Departments',
    'editing-department'          => 'Editing Department :name',
    'showing-department'          => 'Showing Department :name',
    'showing-department-title'    => ':name\'s Information',

    // Flash Messages
    'createSuccess'   => 'Successfully created department! ',
    'updateSuccess'   => 'Successfully updated department! ',
    'deleteSuccess'   => 'Successfully deleted department! ',
    'deleteSelfError' => 'You cannot delete yourself! ',

    // Show Department Tab
    // 'viewProfile'            => 'View Profile',
    'editDepartment'         => 'Edit Department',
    'deleteDepartment'       => 'Delete Department',
    'departsBackBtn'           => 'Back to Departments',
    'departmentsPanelTitle'        => 'Department Information',
    'labelDpartmentName'     => 'Department:',
    'labelEmail'             => 'Email:',
    'labelFirstName'         => 'First Name:',
    'labelLastName'          => 'Last Name:',
    'labelRole'              => 'Role:',
    'labelStatus'            => 'Status:',
    'labelAccessLevel'       => 'Access',
    'labelPermissions'       => 'Permissions:',
    'labelCreatedAt'         => 'Created At:',
    'labelUpdatedAt'         => 'Updated At:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpEmail'           => 'Email Signup IP:',
    'labelIpConfirm'         => 'Confirmation IP:',
    'labelIpSocial'          => 'Socialite Signup IP:',
    'labelIpAdmin'           => 'Admin Signup IP:',
    'labelIpUpdate'          => 'Last Update IP:',
    'labelDeletedAt'         => 'Deleted on',
    'labelIpDeleted'         => 'Deleted IP:',
    'departmentsDeletedPanelTitle' => 'Deleted Department Information',
    'departmentsBackDelBtn'        => 'Back to Deleted Departments',

    'successRestore'    => 'Department successfully restored.',
    'successDestroy'    => 'Department record successfully destroyed.',
    'errorDepartmentNotFound' => 'Department not found.',

    'labelDepartmentLevel'  => 'Level',
    'labelDepartmentLevels' => 'Levels',

    'departments-table' => [
        'caption'   => '{1} :departmentcount Department total|[2,*] :departmentcount total departments',
        'id'        => 'ID',
        'dname'     => 'Department',
        'created'   => 'Created',
        'updated'   => 'Updated',
        'actions'   => 'Actions',
        'updated'   => 'Updated',
    ],

    'buttons' => [
        'create-new'    => 'New Department',
        'delete'        => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs hidden-sm">Delete</span><span class="hidden-xs hidden-sm hidden-md"> Department</span>',
        'show'          => '<i class="fa fa-eye fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Show</span><span class="hidden-xs hidden-sm hidden-md"> Department</span>',
        'edit'          => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Edit</span><span class="hidden-xs hidden-sm hidden-md"> Department</span>',
        'back-to-departments' => '<span class="hidden-sm hidden-xs">Back to </span><span class="hidden-xs">Departments</span>',
        'back-to-department'  => 'Back  <span class="hidden-xs">to Department</span>',
        'delete-department'   => '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>  <span class="hidden-xs">Delete</span><span class="hidden-xs"> Department</span>',
        'edit-department'     => '<i class="fa fa-pencil fa-fw" aria-hidden="true"></i> <span class="hidden-xs">Edit</span><span class="hidden-xs"> Department</span>',
    ],

    'tooltips' => [
        'delete'            => 'Delete',
        'show'              => 'Show',
        'edit'              => 'Edit',
        'create-new'        => 'Create New Department',
        'back-departments'  => 'Back to departments',
        'submit-search'     => 'Submit Departments Search',
        'clear-search'      => 'Clear Search Results',
    ],

    'messages' => [
        'departmentNameTaken'           => 'Departmentname is taken',
        'departmentsNameRequired'       => 'Departmentname is required',
        'fNameRequired'                 => 'First Name is required',
        'lNameRequired'                 => 'Last Name is required',
        'emailRequired'                 => 'Email is required',
        'emailInvalid'                  => 'Email is invalid',
        'passwordRequired'              => 'Password is required',
        'PasswordMin'                   => 'Password needs to have at least 6 characters',
        'PasswordMax'                   => 'Password maximum length is 20 characters',
        'captchaRequire'                => 'Captcha is required',
        'CaptchaWrong'                  => 'Wrong captcha, please try again.',
        'roleRequired'                  => 'Department role is required.',
        'department-creation-success'   => 'Successfully created department!',
        'update-department-success'     => 'Successfully updated department!',
        'delete-success'                => 'Successfully deleted the department!',
        'cannot-delete-yourself'        => 'You cannot delete yourself!',
    ],

    'show-department' => [
        'id'                => 'Department ID',
        'name'              => 'Departmentname',
    ],

    'search'  => [
        'title'             => 'Showing Search Results',
        'found-footer'      => ' Record(s) found',
        'no-results'        => 'No Results',
        'search-departments-ph'   => 'Search Departments',
    ],

    'modals' => [
        'delete_department_message' => 'Are you sure you want to delete :department?',
    ],
];
