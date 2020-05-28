<?php
return [
    'account_kind'     => [
        'class' => 'Tipo de conta|Tipos de conta',
        'kinds' => [
            'checking' => 'Corrente',
            'saving'   => 'Poupança',
            'wallet'   => 'Carteira'
        ],
    ],
    'transaction_kind' => [
        'class' => 'Tipo de transação|Tipos de transação',
        'kinds' => [
            'revenue'  => 'Renda',
            'transfer' => 'Transferência',
            'payment'  => 'Pagamento'
        ]
    ]
];
