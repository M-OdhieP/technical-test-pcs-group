<?php

function dashboard_view($view)
{
    return "Modules\Dashboard\Views" . DIRECTORY_SEPARATOR . $view;
}
function superadmin($withAdmin = false)
{
    $ionAuth = new \App\Modules\Auth\Libraries\IonAuth();

    if ($withAdmin == true) {
        return $ionAuth->inGroup(['superadmin', 'admin']);
    } else {
        return $ionAuth->inGroup('superadmin');
    }
}
function autherror($field)
{
    $validation = \Config\Services::validation();
    if ($validation->hasError($field)) :
        echo '<div><small class="form-text text-danger pt-0 mt-0  mb-3">';
        echo $validation->getError($field);
        echo '</small>
        </div>';
    endif;
}

function getUsername()
{
    $ionAuth = new \App\Modules\Auth\Libraries\IonAuth();
    $user = $ionAuth->user()->row();
    return $user->first_name . ' ' . $user->last_name;
}
function getUserId()
{
    $ionAuth = new \App\Modules\Auth\Libraries\IonAuth();
    $user = $ionAuth->user()->row();
    return $user->id;
}

function get_title()
{
    $setting = new \App\Modules\Dashboard\Models\Settings();
    $title = $setting->select("app_name")->first();

    return $title->app_name;
}
