<?php

namespace App\Business\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity;

    protected $fillable = [
        'userId',
        'empid',
        'roid',
        'name',
        'email',
        'password',
        'notification',
        'logo',
        'status',
        'gallery',
    ];

    protected $hidden = ['password','remember_token',];
    protected $casts = ['email_verified_at' => 'datetime',];

    public function save(array $options = array()){
        if (!$this->userId) {
            $this->userId = Auth::user()->id;
        }
        parent::save($options);
    }

    public static function deleteValidation($id){
         return 0;//InvoiceModel::where('prid',$id)->count();
    }

    protected static $logName = 'UserModel';
    protected static $logAttributes = [
        'id',
        'userId',
        'empid',
        'roid',
        'name',
        'email',
        'password',
        'notification',
        'logo',
    ];
    protected static $recordEvents = ['created','updated','deleted'];
    public function getDescriptionForEvent(string $eventName): string
    {
        return "You Have {$eventName} UserModel.";
    }
    protected static $logOnlyDirty = true;
}
