<?php

namespace Admin\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public const STATUS_ACTIVE = 'active';
    public const STATUS_INACTIVE = 'inactive';
    public const STATUS_SUSPENDED = 'suspended';
    public const STATUS_PENDING = 'pending';

    public const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
        self::STATUS_SUSPENDED,
        self::STATUS_PENDING,
    ];

    protected $fillable = [
        'fname',
        'lname',
        'username',
        'code',            // added code field
        'email',
        'mobile_no',
        'dob',
        'joined_date',
        'password',
        'is_active',
        'status',
        'email_verified_at',
    ];

    protected $appends = ['name'];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNameAttribute(): string
    {
        return $this->fname . ' ' . $this->lname;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($admin) {
            if (empty($admin->code)) {
                $admin->code = self::generateUniqueCode();
            }
        });
    }

    public static function generateUniqueCode()
    {
        $prefix = 'AD'; // change this per model: ST for Student, AD for Admin, etc.

        $bsYear = now()->year + 57;
        $bsYearLastTwo = substr((string) $bsYear, -2);

        do {
            $randomAlpha = self::randomAlpha(2); // only letters
            $code = $prefix . $bsYearLastTwo . $randomAlpha;
        } while (static::where('code', $code)->exists());

        return $code;
    }

    private static function randomAlpha(int $length = 2): string
    {
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
        $result = '';
        for ($i = 0; $i < $length; $i++) {
            $result .= $letters[random_int(0, strlen($letters) - 1)];
        }
        return $result;
    }

}
