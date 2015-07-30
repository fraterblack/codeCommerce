<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

    public function getTextStatusAttribute()
    {
        $textStatus = "Não conhecido";

        switch ($this->status) {
            case 0:
                $textStatus = "Aguardando o pagamento";
                break;
            case 1:
                $textStatus = "Aguardando o envio";
                break;
            case 2:
                $textStatus = "Enviado";
                break;
            case 3:
                $textStatus = "Entregue";
                break;
        }

        return $textStatus;
    }
}
