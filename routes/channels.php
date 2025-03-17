<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Order.{id}', function ($order, $id) {
    return (int) $order->id === (int) $id;
});
