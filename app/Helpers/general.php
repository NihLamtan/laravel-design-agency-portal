<?php

    function redirect_to()
    {
        return (request()->cookie('checkout_service_slug'))
            ? '/checkout?plan='.request()->cookie('checkout_service_slug')
            : '/orders';
    }

    function super_admin()
    {
        return (
                auth()->guard('admin')->check()
                && auth()->guard('admin')->user()->is_super_admin
            );
    }
