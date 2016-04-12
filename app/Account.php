<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Session;

class Account extends Model
{
    protected $fillable = ['title', 'username', 'password', 'user_id'];

    /**
     * Get the user that owns the account.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $encrypter = new Encrypter(Session::get('spk'));
        $this->password = $encrypter->encrypt($this->password);
        parent::save($options);
    }

}
