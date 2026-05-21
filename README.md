# br-validator

Biblioteca com validacoes brasileiras para Laravel 11, 12 e 13.

## Requisitos

- PHP 8.2+
- Illuminate Support 11, 12 ou 13

## Instalacao

```bash
composer require usinatech/br-validator
```

O package provider e carregado automaticamente pelo Laravel.

## Regras disponiveis

- `celular`
- `celular_com_ddd`
- `cnh`
- `cnpj`
- `cpf`
- `data`
- `formato_cep`
- `formato_cnpj`
- `formato_cnpj_alfanumerico`
- `formato_cpf`
- `formato_placa_de_veiculo`
- `telefone`
- `telefone_com_ddd`

As regras acima usam `snake_case` como formato canonico. Alias com hifen, como `telefone-com-ddd`, continuam aceitos por compatibilidade.

## Exemplo rapido

```php
$validator = \Validator::make(
    ['telefone' => '(77) 9999-3333'],
    ['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());
```

Tambem e possivel usar as regras em requests do Laravel:

```php
use Illuminate\Http\Request;

Route::get('testando', function (Request $request) {
    $dados = $request->validate([
        'telefone' => 'required|telefone',
        'cpf' => 'nullable|cpf',
    ]);

    return $dados;
});
```

## Mensagens personalizadas

```php
Validator::make($valor, $regras, [
    'celular_com_ddd' => 'O campo :attribute nao e um celular valido.',
]);
```

## Testes

```bash
composer install
composer test
```

## Observacoes

- `data` valida o formato `DD/MM/AAAA`.
- `formato_cep` aceita `99999-999` e `99.999-999`.
- `formato_cnpj` continua aceitando apenas `99.999.999/9999-99`.
- `formato_cnpj_alfanumerico` aceita tanto `99.999.999/9999-99` quanto o novo padrão com 12 posições alfanumericas e 2 digitos verificadores numericos, por exemplo `A3.08B.58C/0D01-20`.
- `formato_placa_de_veiculo` aceita `ABC-1234` e `ABC1234`.
