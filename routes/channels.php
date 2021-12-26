<?php
use Illuminate\Support\Facades\Broadcast;

// This is only for testing purposes
// Broadcast::channel('auction', function ($data) {
//     return $data;
// });

Broadcast::channel('auction-bid', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
