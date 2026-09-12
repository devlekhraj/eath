<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    // Setting Types
    public const TYPE_STRING = 'string';
    public const TYPE_TEXT = 'text';
    public const TYPE_JSON = 'json';
    public const TYPE_BOOLEAN = 'boolean';
    public const TYPE_INTEGER = 'integer';
    public const TYPE_FILE = 'file';

    public const TYPES = [
        self::TYPE_STRING,
        self::TYPE_TEXT,
        self::TYPE_JSON,
        self::TYPE_BOOLEAN,
        self::TYPE_INTEGER,
        self::TYPE_FILE,
    ];

    // Setting Groups
    public const GROUP_GENERAL = 'general';
    public const GROUP_CONTACT = 'contact';
    public const GROUP_SOCIAL = 'social';
    public const GROUP_SEO = 'seo';
    public const GROUP_SCRIPTS = 'scripts';
    public const GROUP_THEME = 'theme';

    public const GROUPS = [
        self::GROUP_GENERAL,
        self::GROUP_CONTACT,
        self::GROUP_SOCIAL,
        self::GROUP_SEO,
        self::GROUP_SCRIPTS,
        self::GROUP_THEME,
    ];

    protected $fillable = [
        'key',
        'value',
        'group',
        'type',
        'is_public',
    ];

    protected $casts = [
        'value' => 'json',
        'is_public' => 'boolean',
    ];
}
