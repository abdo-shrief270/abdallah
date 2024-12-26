<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory;
    protected $fillable =['name','phone','id_number','password','active','rout_id'];

    public function rout() : BelongsTo
    {
        return $this->belongsTo(Rout::class);
    }
    public function assignedOrdersCount()
    {
        return Order::where('user_id',$this->id)->count();
    }
    public function newOrdersCount()
    {
        return Order::where(['user_id'=>$this->id,'status'=>'new'])->count();
    }
    public function unFinishedOrdersCount()
    {
        return Order::where(['user_id'=>$this->id,'status'=>'unFinished'])->count();
    }
    public function finishedOrdersCount()
    {
        return Order::where(['user_id'=>$this->id,'status'=>'finished'])->count();
    }
}
