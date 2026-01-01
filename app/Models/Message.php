<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_name',
        'sender_email',
        'message',
        'is_read',
        'replied_at'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'replied_at' => 'datetime',
    ];

    // Scope for unread messages
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    // Scope for read messages
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    // Get message preview (first 100 characters)
    public function getPreviewAttribute()
    {
        return \Str::limit($this->message, 100);
    }

    // Check if message has been replied to
    public function getHasRepliedAttribute()
    {
        return !is_null($this->replied_at);
    }
}
