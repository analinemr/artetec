<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtesaoSeeder extends Seeder
{

    //Criação de tabela para teste (sem retorno de dados)
    public function run(): void
    {
        $artesaos = [
            [
                'nome' => 'João Silva',
                'biografia' => 'João é um artesão especializado em cerâmica tradicional, com mais de 20 anos de experiência.',
                'email' => 'joao.silva@example.com',
                'cidade' => 'Rio de Janeiro',
            ],
            [
                'nome' => 'Maria Oliveira',
                'biografia' => 'Maria trabalha com tecelagem artesanal, criando peças únicas e sustentáveis.',
                'email' => 'maria.oliveira@example.com',
                'cidade' => 'Rio de Janeiro',
            ],
            [
                'nome' => 'Carlos Souza',
                'biografia' => 'Carlos é mestre na arte de trabalhar com madeira, criando móveis artesanais exclusivos.',
                'email' => 'carlos.souza@example.com',
                'cidade' => 'Niterói',
            ],
            [
                'nome' => 'Ana Costa',
                'biografia' => 'Ana produz bijuterias feitas à mão com materiais reciclados, valorizando a sustentabilidade.',
                'email' => 'ana.costa@example.com',
                'cidade' => 'Nova Iguaçu',
            ],
            [
                'nome' => 'Lucas Fernandes',
                'biografia' => 'Lucas é especialista em escultura em pedra, transformando blocos brutos em obras de arte impressionantes.',
                'email' => 'lucas.fernandes@example.com',
                'cidade' => 'Nilópolis',
            ],
            [
                'nome' => 'Beatriz Lima',
                'biografia' => 'Beatriz cria pinturas artesanais usando técnicas tradicionais e materiais naturais.',
                'email' => 'beatriz.lima@example.com',
                'cidade' => 'Magé',
            ],
            [
                'nome' => 'Ricardo Alves',
                'biografia' => 'Ricardo é um ourives que produz joias exclusivas com pedras preciosas brasileiras.',
                'email' => 'ricardo.alves@example.com',
                'cidade' => 'Niterói',
            ],
            [
                'nome' => 'Fernanda Gomes',
                'biografia' => 'Fernanda trabalha com cerâmica raku, técnica japonesa que cria peças únicas e cheias de personalidade.',
                'email' => 'fernanda.gomes@example.com',
                'cidade' => 'São Gonçalo',
            ],
            [
                'nome' => 'Marcelo Pinto',
                'biografia' => 'Marcelo é especializado em tapeçaria manual, produzindo tapetes artesanais exclusivos.',
                'email' => 'marcelo.pinto@example.com',
                'cidade' => 'Cabo Frio',
            ],
        ];

        foreach ($artesaos as $artesao) {
            DB::table('artesaos')->insert([
                'nome' => $artesao['nome'],
                'biografia' => $artesao['biografia'],
                'email' => $artesao['email'],
                'cidade' => $artesao['cidade'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

    }
}
}