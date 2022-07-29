<?php

use App\Models\Customer;

if (!function_exists('isCustomerApproved')) {
    function isCustomerApproved($username): bool
    {
        return Customer::whereUsername($username)->isApproved()->exists();
    }
}
