# Prospero Flow CRM

Un CRM (Customer Relationship Management) especializado en gestión de leads y campañas de email marketing, desarrollado inicialmente para Impulsa 360. Construido con PHP 8 y Laravel 10.

## Características Principales

- 📧 Gestión avanzada de leads y campañas de email
- 👥 Administración de clientes y contactos
- 📊 Dashboard interactivo con métricas clave
- 📅 Calendario integrado para seguimiento de actividades
- 🏢 Gestión multi-empresa
- 🔐 Sistema de roles y permisos
- 📱 Diseño responsive y PWA (Progressive Web App)
- 🌐 Soporte multilenguaje
- 🔒 Sistema de bloqueo de sesión por inactividad

## Requisitos del Sistema

- PHP >= 8.1
- Laravel 10.x
- MySQL/MariaDB
- Composer
- Node.js y NPM

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/tu-usuario/prospero-flow-crm.git
cd prospero-flow-crm
```

2. Instalar dependencias PHP:
```bash
composer install
```

3. Copiar el archivo de configuración:
```bash
cp .env.example .env
```

4. Configurar las variables de entorno en el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

5. Generar la clave de la aplicación:
```bash
php artisan key:generate
```

6. Ejecutar las migraciones y seeders:
```bash
php artisan migrate --seed
```

## Módulos Principales

- **Leads**: Gestión completa del ciclo de vida de leads
- **Campañas de Email**: Creación y seguimiento de campañas
- **Clientes**: Administración de clientes y su información
- **Productos**: Catálogo de productos y servicios
- **Órdenes**: Gestión de pedidos y ventas
- **Calendario**: Programación de actividades y eventos
- **Reportes**: Informes detallados y análisis
- **Configuración**: Personalización del sistema

## Seguridad

- Autenticación robusta de usuarios
- Sistema de bloqueo de pantalla
- Protección CSRF
- Validación de formularios
- Encriptación de datos sensibles

## Contribución

Si deseas contribuir al proyecto:

1. Haz un Fork del repositorio
2. Crea una rama para tu característica (`git checkout -b feature/AmazingFeature`)
3. Realiza tus cambios
4. Haz commit de tus cambios (`git commit -m 'Add some AmazingFeature'`)
5. Push a la rama (`git push origin feature/AmazingFeature`)
6. Abre un Pull Request

## Licencia

Este proyecto está licenciado bajo [MIT License](LICENSE).

## Soporte

Para soporte y consultas, por favor contacta a:
- Email: soporte@impulsa360.pe
- Website: https://impulsa360.pe

## Agradecimientos

- Equipo de desarrollo de Impulsa 360
- Comunidad Laravel
- Contribuidores del proyecto

---
Desarrollado con ❤️ para Impulsa 360

## Requirements
* PHP >= 8.3
* composer
* Laravel 10
* MariaDB / Postgres / MS SQL Server
* Redis

## Features
* Multi company (White label)
* Multi language
* REST API

[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=Roskus_prospero-flow-crm&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=Roskus_prospero-flow-crm)

## Setup

### Clone the project:
```bash
git clone git@github.com:Roskus/prospero-flow-crm.git
```

### Migrate from hammer to prospero-flow-crm repo
```bash
git remote set-url origin git@github.com:Roskus/prospero-flow-crm.git
```

### Docker Setup in 1 command
```bash
make install
```

### Setup docker
```bash
docker-compose -f docker-compose.yml -f docker-compose.mysql.yml -f docker-compose.pma.yml build
docker-compose -f docker-compose.yml -f docker-compose.mysql.yml -f docker-compose.pma.yml up -d
```

or
```bash
make build
make up
```

With Postgres
```bash
make build-pg
make up-pg
```

With MS SQL Server
```bash
make build-ms
make up-ms
```


### Enter inside the container

```bash
docker exec -it crm-php /bin/bash
```

or
```bash
make ssh
```

Copy template config
```bash
cp .env.example .env
```

Edit your .env config file and set language, database
```dotenv
DB_PASSWORD=
```

Install dependencies:
```bash
composer install
```

Generate your APP_KEY
```bash
php artisan key:generate
```
Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```
Generate JWT Secret
```bash
php artisan jwt:secret
```

Set Crontab
```bash
crotab -e
* * * * * cd /home/ubuntu/www/crm && php artisan schedule:run >> /dev/null 2>&1
```

## Demo
![](doc/screenshoot.png)
* User: admin@admin.com
* Pass: admin

## API
We will provide a REST API for exchange information with the CRM

API Docs
http://prosperoflow.localhost/api/documentation

Regenerate documentation
```bash
php artisan l5-swagger:generate
```

Endpoint:
/api

Some API Endpoint for the full list check the doc:

| Method | Endpoint           | Description           |
|--------|--------------------|-----------------------|
| POST   | `/api/auth`        | User auth             |
| GET    | `/api/lead`        | Get all leads         |
| GET    | `/api/lead/{id}`   | Get lead detail       |
| POST   | `/api/lead`        | Create new lead       |
| PUT    | `/api/lead/{id}`   | Update existing lead  |
| DELETE | `/api/lead/{id}`   | Delete a lead         |
| GET    | `/api/customer`    | Get all customers     |
| POST   | `/api/customer`    | Create new customer   |
| GET    | `/api/product`     | Get all products      |
| POST   | `/api/product`     | Create new product    |
| GET    | `/api/order`       | Get all orders        |
| GET    | `/api/supplier`    | Get all suppliers     |
| GET    | `/api/ticket`      | Get all tickets       |
| GET    | `/api/ticket/{id}` | Get existing ticket   |
| POST   | `/api/ticket`      | Create support ticket |


## Run tests
```bash
make test
```

## Translation (i18n)
Check missing translation keys
```bash
php artisan translations:check --excludedDirectories=lang/vendor
```

## PHPStan
Code quality check, find bugs
```bash
vendor/bin/phpstan analyse app tests
```

## Resources
Icon font Line Awesome
https://icons8.com/line-awesome
# CRM-LEAD-Impusal360
