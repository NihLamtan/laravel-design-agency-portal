<?php

namespace App\Observers;

use App\Models\Storage;
use App\Models\User;
use App\Notifications\UploadStorage;

class StorageObserver
{
    public function created(Storage $storage)
    {
        $user = User::find($user->id);
        $user->notify(new UploadStorage($storage));
    }
}
