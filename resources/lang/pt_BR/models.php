<?php
return [
    'account'     => [
        'class'         => 'Conta',
        'name'          => 'Nome',
        'balance'       => 'Saldo',
        'special_limit' => 'Limite especial',
        'type'          => 'Tipo',
        'owner'         => 'Titular',
        'created_at'    => 'Criação',
        'updated_at'    => 'Edição'
    ],
    'expense'     => [
        'class'       => 'Despesa',
        'description' => 'Descrição',
        'amount'      => 'Valor',
        'discount'    => 'Desconto',
        'fine'        => 'Multa',
        'due_date'    => 'Vencimento',
        'issue_date'  => 'Emissão',
        'created_at'  => 'Criação',
        'updated_at'  => 'Edição'
    ],
    'transaction' => [
        'class'       => 'Transação',
        'type'        => 'Tipo',
        'amount'      => 'Valor',
        'source'      => 'Origem',
        'destination' => 'Destino',
        'created_at'  => 'Criação',
        'updated_at'  => 'Edição'
    ],
    'user' => [
        'class' => 'Usuário',
        'name'  => 'Nome',
        'email' => 'E-mail',
        'verified_at' => 'Verificado',
        'password' => 'Senha',
        'password_confirmation' => 'Confimação de senha',
        'created_at'  => 'Criação',
        'updated_at'  => 'Edição'
    ]
];