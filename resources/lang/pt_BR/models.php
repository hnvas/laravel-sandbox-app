<?php
return [
    'account'     => [
        'name'       => 'Conta',
        'attributes' => [
            'name'          => 'Nome',
            'balance'       => 'Saldo',
            'special_limit' => 'Limite especial',
            'type'          => 'Tipo',
            'owner'         => 'Titular',
            'created_at'    => 'Criação',
            'updated_at'    => 'Edição'
        ]
    ],
    'expense'     => [
        'name'       => 'Despesa',
        'attributes' => [
            'description' => 'Descrição',
            'amount'      => 'Valor',
            'discount'    => 'Desconto',
            'fine'        => 'Multa',
            'due_date'    => 'Vencimento',
            'issue_date'  => 'Emissão',
            'created_at'  => 'Criação',
            'updated_at'  => 'Edição'
        ]
    ],
    'transaction' => [
        'name'       => 'Transação',
        'attributes' => [
            'type'        => 'Tipo',
            'amount'      => 'Valor',
            'source'      => 'Origem',
            'destination' => 'Destino',
            'created_at'  => 'Criação',
            'updated_at'  => 'Edição'
        ]
    ]
];