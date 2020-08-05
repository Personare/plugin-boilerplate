# Plugin Boilerplate ![Release](https://github.com/Personare/plugin-boilerplate/workflows/Release/badge.svg)
Plugin destinado a ser usado como boilerplate, ele irá ser usado principalmente quando surgir a necessidade de criar um plugin WordPress do zero, 
mas com uma estrutura já bem definida, pronto para testes unitários, linter + analisador estático de código e com container de injeção de dependência.
## Requirements
* PHP >= 7.4
* Composer
## Scripts
* `composer ci` irá executar todos os scripts importantes para o CI, consulte o `composer.json` caso queira roda-los individualmente;
* `yarn lint` irá executar o linter para JavaScript + SASS;
* `yarn build` comando para gerar os bundles;
## Não esqueça de renomear
Renomeie todas as strings abaixo para algo que faça sentido para o projeto que está a desenvolver.
* `MY_APP_`
* `MyApp`
* `my-app`
## Configurando Phan como `external tool` no PHPStorm
* Em Preferences -> Tools -> External Tools clique para adicionar uma nova tool. Coloque o nome que achar melhor, selecione
`run_phan.sh` script como "Program" e selecione o diretório do projeto como "Working directory" e por ultimo coloque `$FILE_PATH$:$LINE$`
como "Output filters" clicando em "Advanced Options". Você consegue executar `external tools` em Tools -> External Tools.

Caso dê algum erro de permissão, execute `chmod +x run_phan.sh` no seu terminal.
## Exemplo de uso
Consulte os arquivos dentro de `src/WordPress/`, lá vai encontrar bons exemplos de como declarar hooks nesta estrutura,
caso queira registrar um CPT consulte `src/WordPress/Services/ExampleServiceProvider.php` ou se caso quer registrar uma
Taxonomia, então consulte `src/WordPress/Services/ExampleCategoryServiceProvider.php`
