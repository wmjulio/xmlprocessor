# Processar XMLs

# Guia de instalação

#####Dependências
- composer
- banco de dados
- node

##### Passos
- composer install
- npm install 
- npm run dev

 > Configurar arquivo .env
 >> QUEUE_CONNECTION=database
 
 > php artisan key:generate 
 
 - php artisan migrate
 - php artisan db:seed
 
 > Usuario default:  
 > * Email: admin@desafio.com
 > * Senha: 123 
 
 ##### Testes
 - php artisan test
 
 ##### Iniciar Execução da fila
 - php artisan queue:work
 
 
 #### API
 
 | Rota | Verbo | Parametros | Retorno |
 | :---: | :---: | :---: | :---: |
 | api/login | post | email, passord | { access_token: string, token_type: string, expires_in: string } |
 | api/logout | post |  | { message: string } |
 | api/me | post |  | { id: int, name: string, email: string, email_verified_at: datetime, created_at: datetime, updated_at: datetime } |
 | api/refresh | post |  | { access_token: string, token_type: string, expires_in: string } |
 | api/users | get |  | { users: [ { id: int, name: string, email: string, email_verified_at: datetime, created_at: datetime, updated_at: datetime } ] } | 
 | api/persons | get |  | { persons: [ { id: int, name: string, created_at: datetime, updated_at: datetime } ] } | 
 | api/persons/{id} | get |  | { person: { id: int, name: string, created_at: datetime, updated_at: datetime, phones: [ { id: int, person: int, number:, created_at: datetime, updated_at: datetime } ] } } | 
 | api/orders/ | get |  | { orders: { id: int, created_at: datetime, updated_at: datetime, person: { id: int, name: string, created_at: datetime, updated_at: datetime } } } | 
 | api/orders/{id} | get |  | { order: { id: int, created_at: datetime, updated_at: datetime, person: { id: int, name: string, created_at: datetime, updated_at: datetime }, ship_to: { "id": int, "shiporder": int, "name": string, "address": string, "city": string, "country": string, "created_at": datetime, "updated_at": datetime }, items: [ { id: int, shiporder: int, title: string, note: string, quantity: int, price: double, created_at: datetime, updated_at: datetime } ] } } | 