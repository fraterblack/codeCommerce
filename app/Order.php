<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status',
        'payment_transaction_reference',
        'payment_transaction_code'
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
            1 => "Aguardando o pagamento",
            2 => "Em análise",
            3 => "Pago",

            5 => "Em disputa",
            6 => "Estornado",
            7 => "Pagamento cancelado",

            10 => "Enviado",
            12 => "Entregue",
            13 => "Pedido cancelado"
        ];

        return $status;
    }
}
