<?php

if (!function_exists('admin_path')) {

    /**
     * admin base path
     * @param  string $path [base path]
     * @return [string]       [path]
     */
    function admin_path($path = '')
    {
        return ucfirst(config('admin.directory')).($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (!function_exists('admin_url')) {

    /**
     * admin url
     * @param  string $path [description]
     * @return [type]       [description]
     */
    function admin_url($path = '')
    {
        return url(admin_base_path($path));
    }
}

if (!function_exists('admin_base_path')) {

    /**
     * admin url
     * @param  string $path [description]
     * @return [type]       [description]
     */
    function admin_base_path($path = '')
    {
        $prefix = '/'.trim(config('admin.route.prefix'), '/');

        $prefix = ($prefix == '/') ? '' : $prefix;

        return $prefix.'/'.trim($path, '/');
    }
}

if (!function_exists('admin_toastr')) {

    /**
     * Flash a toastr message bag to session.
     * @param  string $message [description]
     * @param  string $type    [description]
     * @param  array  $options [description]
     * @return [type]          [description]
     */
    function admin_toastr($message = '', $type = 'success', $options = [])
    {
        $toastr = new \Illuminate\Support\MessageBag(get_defined_vars());

        \Illuminate\Support\Facades\Session::flash('toastr', $toastr);
    }
}


if (!function_exists('admin_asset')) {

    /**
     * https
     * @param [string] $path [resource path]
     */
    function admin_asset($path)
    {
        return asset($path, config('admin.secure'));
    }
}
