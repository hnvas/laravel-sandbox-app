<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    private static $tags = [
        'Alimentação' => [
            'Alimentação',
            'Feira',
            'Lanche',
            'Restaurantes'
        ],
        'Saúde'       => [
            'Saúde',
            'Higiene',
            'Beleza'
        ],
        'Lazer'       => [
            'Lazer',
            'Esportes',
            'Viagens'
        ],
        'Transporte'  => [
            'Transporte',
            'Combustível',
            'Manutenção'
        ],
        'Educação'    => [
            'Educação',
            'Cursos',
            'Escola',
            'Graduação'
        ],
        'Segurança'   => [
            'Segurança'
        ],
        'Financeiro'  => [
            'Financeiro',
            'Investimento',
            'Aportes'
        ],
        'Renda'       => [
            'Renda',
            'Salário',
            'Freelance',
            'Serviços'
        ],
        'Bens'        => [
            'Bens',
            'Eletrônicos',
            'Móveis',
            'Eletrodomésticos'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$tags as $type => $tagNames) {
            Tag::findOrCreate($tagNames, $type);
        }
    }
}
