<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'notification';

    protected $fillable = [
        'company_id',
        'user_id',
        'message',
        'read',
        'link',
        'updated_at',
    ];

    protected $hidden = [
        'company_id',
        'deleted_at',
    ];

    public function getLatestByUser(int $user_id, $limit = 10, bool $include_read = false)
    {
        $notification = Notification::where('user_id', $user_id)->orderBy('created_at', 'DESC');
        if ($include_read === false) {
            $notification->where('read', 0);
        }

        return $notification->limit($limit)->get();
    }
}
