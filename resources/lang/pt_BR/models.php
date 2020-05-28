<?php
return [
    'account'     => [
        'class'      => 'Conta|Contas',
        'categories' => [
            'new'    => 'Nova conta',
            'update' => 'Atualizar conta',
            'index'  => 'Listagem de contas'
        ],
        'attributes' => [
            'name'          => 'Nome',
            'balance'       => 'Saldo',
            'special_limit' => 'Limite especial',
            'kind'          => 'Tipo',
            'owner'         => 'Titular',
            'created_at'    => 'Criação',
            'updated_at'    => 'Edição'
        ]
    ],
    'expense'     => [
        'class'      => 'Despesa|Despesas',
        'categories' => [
            'new'    => 'Nova despesa',
            'update' => 'Atualizar despesa',
            'index'  => 'Listagem de despesas'
        ],
        'attributes' => [
            'description' => 'Descrição',
            'amount'      => 'Valor',
            'tags'        => 'Tags',
            'due_date'    => 'Vencimento',
            'issue_date'  => 'Emissão',
            'created_at'  => 'Criação',
            'updated_at'  => 'Edição'
        ]
    ],
    'transaction' => [
        'class'      => 'Transação|Transações',
        'attributes' => [
            'kind'        => 'Tipo',
            'amount'      => 'Valor',
            'source'      => 'Origem',
            'destination' => 'Destino',
            'created_at'  => 'Criação',
            'updated_at'  => 'Edição'
        ]
    ],
    'user'        => [
        'class'      => 'Usuário|Usuários',
        'categories' => [
            'new'    => 'Novo usuário',
            'update' => 'Atualizar usuário',
            'index'  => 'Listagem de usuários'
        ],
        'attributes' => [
            'name'                  => 'Nome',
            'email'                 => 'E-mail',
            'verified_at'           => 'Verificado',
            'password'              => 'Senha',
            'password_confirmation' => 'Confimação de senha',
            'created_at'            => 'Criação',
            'updated_at'            => 'Edição'
        ]
    ]
];