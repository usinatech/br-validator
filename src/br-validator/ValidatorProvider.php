<?php

namespace UsinaTech\BrValidator;

use Illuminate\Support\ServiceProvider;

class ValidatorProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $customAttributes): Validator {
            $messages += $this->messages();

            return new Validator($translator, $data, $rules, $messages, $customAttributes);
        });
    }

    /**
     * @return array<string, string>
     */
    protected function messages(): array
    {
        return [
            'celular' => 'O campo :attribute não é um celular válido',
            'celular-com-ddd' => 'O campo :attribute não é um celular com DDD válido',
            'celular_com_ddd' => 'O campo :attribute não é um celular com DDD válido',
            'cnh' => 'O campo :attribute não é uma carteira nacional de habilitação válida',
            'cnpj' => 'O campo :attribute não é um CNPJ válido',
            'cpf' => 'O campo :attribute não é um CPF válido',
            'data' => 'O campo :attribute não é uma data com formato válido',
            'formato-cnpj' => 'O campo :attribute não possui o formato válido de CNPJ',
            'formato-cnpj-alfanumerico' => 'O campo :attribute não possui o formato válido de CNPJ alfanumérico',
            'formato-cpf' => 'O campo :attribute não possui o formato válido de CPF',
            'formato_cnpj' => 'O campo :attribute não possui o formato válido de CNPJ',
            'formato_cnpj_alfanumerico' => 'O campo :attribute não possui o formato válido de CNPJ alfanumérico',
            'formato_cpf' => 'O campo :attribute não possui o formato válido de CPF',
            'formato_cep' => 'O campo :attribute não possui um formato válido de CEP',
            'formato_placa_de_veiculo' => 'O campo :attribute não possui um formato válido de placa',
            'telefone' => 'O campo :attribute não é um telefone válido',
            'telefone-com-ddd' => 'O campo :attribute não é um telefone com DDD válido',
            'telefone_com_ddd' => 'O campo :attribute não é um telefone com DDD válido',
        ];
    }

    public function register(): void
    {
    }
}
