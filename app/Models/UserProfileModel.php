<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['fullname', 'user_image'];
}
