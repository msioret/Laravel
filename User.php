<?php

namespace App;

use App\admAccounts;
//use App\secCompanies;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'secUsers';
    protected $fillable = [
        'name', 'email', 'cellphone','password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 
        'isValidEmail', 'emailValidationCode','emailVerifiedAt',  'isValidCellphone', 'cellphoneValidationCode', 'cellphoneVerifiedAt', 'photo', 'superAdmin','password','idCreate', 'resetPasswordToken', 'resetPasswordTokenPublic', 'resetPasswordExpires', 'isActived', 'isDeletedLogical', 'idCreate', 'created', 'idModified', 'modified', 'rememberToken',  
     ];
    public function contas()
    {
       return $this->belongsToMany(admAccounts::class, 'accounts_users','user_id' ,'account_id'); 
       
    }
    /*public function companies()
    {
       return $this->hasMany(secCompanies::class);      
    }*/
    
}
