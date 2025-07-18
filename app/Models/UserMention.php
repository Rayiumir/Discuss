<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class UserMention extends Model
{
    use Searchable;

    protected $table = 'users';

    public function searchableAs(): string
    {
        return 'users_mentions';
    }

    public function toSearchableArray(): array
    {
        return [
            'value' => $this->username,
            'label' => $this->name . ' (@' . $this->username . ')',
        ];
    }
}
