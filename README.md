Para iniciar o projeto em seu PC 
utilize o comando:
	composer install
esse comando ira baixar as dependencias

caso não seja identiticado o banco de dados, abra o arquivo php.ini e procure por ( pdo_sqlite ) se estiver com ";" no inicio da linha retire e salve.

ao excluir um dado do sistema pode aparecer um erro execute esse comando na pasta do projeto.
vendor\bin\doctrine orm:generate-proxies

Na parte 01 - desse projeto é mostrado apenas codigo php puro com Doctrine
na parte 02 - nessa parte é feita refatoração do codigo, tirando blocos repetidos fazendo uso de traits
na parte 03 - Nessa ultima parte do projeto é aplicado as PSRs 7, 11 e 15 para que o projeto fique nas normas da comunidade PHP-FIG
