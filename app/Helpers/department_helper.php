<?php
// File: app/Helpers/department_helper.php

if (!function_exists('getDepartmentName')) {
    function getDepartmentName($department)
    {
        switch ($department) {
            case 'first-year':
                return 'First Year';
            case 'cse':
                return 'Computer Science and Engineering';
            case 'electrical':
                return 'Electrical Engineering';
            case 'mech':
                return 'Mechanical Engineering';
            case 'civil':
                return 'Civil Engineering';
            case 'entc':
                return 'Electronics and Telecommunication Engineering';
            default:
                return 'Unknown Department';
        }
    }
}
