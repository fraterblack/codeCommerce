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
        return $this->getStatus()[$this->status];
    }

    public function getStatus()
    {
        //Status possíveis
        $status = [
            -1 => "Falha ao efetuar pagamento",
            0 => "Aguardando o pagamento",
            1 => "Pago",
            2 => "Enviado",
            3 => "Entregue",
            4 => "Cancelado"
        ];

        return $status;
    }
}
