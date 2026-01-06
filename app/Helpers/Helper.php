<?php

if (!function_exists('validatePermissions')) {
    function validatePermissions($slug)
    {
        return \App\Traits\HasPermissionsTrait::getModulesPermissionsBySlug($slug);
    }
}

if (!function_exists('sanitizeAllInput')) {
    function sanitizeAllInput($input)
    {
        if (is_array($input)) {
            return array_map('sanitizeAllInput', $input);
        }
        return is_string($input) ? htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8') : $input;
    }
}

if (!function_exists('ajaxResponse')) {
    function ajaxResponse($code, $msg, $html = null)
    {
        return response()->json([
            'status' => $code,
            'responseCode' => $code, // Keep for backward compatibility if any
            'msg' => $msg,
            'html' => $html,
        ]);
    }
}
