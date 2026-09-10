<?php

namespace Admin\Models;

use Admin\Models\GuideReview;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 extend this, not Model

class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;

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

    /**
     * JWT methods
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function guideReviews()
    {
        return $this->morphMany(GuideReview::class, 'reviewer');
    }
}
