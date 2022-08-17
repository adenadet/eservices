<?php

namespace App\Models;


//use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Support\Facades\Config;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use DB;

class User extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
   
    protected $primaryKey = 'id';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
    protected $table = 'emr_patients';

    protected $fillable = [
        'first_name', 'middle_name', 'last_name', 'bvn', 'email', 'password', 'user_type', 'unique_id', 'username', 'street', 'street2', 'city', 'area_id', 'state_id', 'phone', 'branch_id', 'sex', 'image', 'saving_id', 'pin'     
        ];

    public function area(){
        return $this->belongsTo('App\Models\Area', 'area_id', 'id');
        }
    
    public function contributions(){
        return $this->hasMany('App\Models\Contribution', 'user_id', 'id');
        }
        
    public function fullname(){
        return $this->first_name." ".$this->middle_name." ".$this->last_name;
        }
    
    public function last_loan_year_report(){  
         
    }
    
    public function next_of_kin(){
        return $this->belongsTo('App\Models\NextOfKin', 'id', 'user_id');        
        }
    
    public function loans(){
        return $this->hasMany('App\Models\Loan', 'user_id', 'id');
        }
    
    public function repayments(){
        return $this->hasMany('App\Models\Repayment', 'user_id', 'id');
        }
    
                
    public function state(){
        return $this->belongsTo('App\Models\State', 'state_id', 'id');        
        }

    public function last_saving_year_report(){
        
    }

    public function savings(){
        return $this->hasMany('App\Models\Saving', 'user_id', 'id');
        }
    
    public function default_saving() {
        return $this->savings()->where('name','=', 'Contributions');
    }

    protected $hidden = [
        'password', 'remember_token', 'pin'
    ];
}
