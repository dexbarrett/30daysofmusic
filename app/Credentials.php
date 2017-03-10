<?php
namespace MusicChallenge;

use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    protected $table = 'oauth_credentials';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
