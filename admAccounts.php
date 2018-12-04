<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class admAccounts extends Model
{
    use Notifiable;

    protected $table = 'admAccounts';
    protected $fillable = [
        'description', 'email','idPlan', 'id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 
        
         'cpfCnpj', 'zipCode','idState',  'idCity', 'address', 'created', 'modified',
         
    ];
    public function usuarios()
    {
       return $this->belongsToMany(admAccounts::class,'adm_account_user','account_id','user_id'); 
    }
  }
