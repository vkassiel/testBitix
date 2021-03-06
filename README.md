# Teste Bitix

## Requisitos
Pra rodar essa API, você precisa:
1. PHP
2. Composer
3. MySQL

## Configurando o projeto
1. `$ cd /path/to/testeBitix`
2. `$ cp .env.example .env`
3. Vá até o `.env` e configure seu banco de dados na parte de DB
4.  `$ ./install.sh`
5. `$ ./migrate.sh `
6. `$ ./seed.sh`
7. `$ php artisan serve`

## Endpoints
### Planos
`GET`

http://localhost:8000/planos

---

### Preços
`GET`

http://localhost:8000/precos

---

### Cálculo de preços
`POST`

<http://localhost:8000/calculo>

Para o cálculo do plano e usuários, você deverá se basear na tabela de preços acima, e enviar uma requisição do tipo `POST` passando os parâmetros abaixo:

```
{
	"codigo_plano": 1,
	"qtd_beneficiarios": 1,
	"beneficiarios": [
		{
			"nome": "Vitor Kassiel",
			"idade": 20
		}
	]
}
```

## Lógica

A lógica do cálculo encontra-se em `app\Http\Controllers\BeneficiarioController.php` e a a listagem de planos e preços encontra-se em `app\Http\Controllers\PlanoController.php`.
