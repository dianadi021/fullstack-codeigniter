<h1 align='center'>Welcome! #Fullstack Codeigniter 🚀</h1>

# Requirements
## Languages
> [<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" />![version](https://img.shields.io/badge/version-8.2.12-blue)](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.12/xampp-windows-x64-8.2.12-0-VS16-installer.exe/download) </br>
> [<img src="https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white" />![version](https://img.shields.io/badge/version-3.7.1-blue)](https://cdnjs.com/libraries/jquery) </br>

## Frontend
> [<img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" />![version](https://img.shields.io/badge/version-1.7-blue)](https://tailwindcss.com/docs/guides/vite#vue) </br>
> [<img src="https://img.shields.io/badge/Font_Awesome-339AF0?style=for-the-badge&logo=fontawesome&logoColor=white" />![version](https://img.shields.io/badge/version-6.5.2-blue)](https://cdnjs.com/libraries/font-awesome) </br>

## Database
> [<img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" />![version](https://img.shields.io/badge/version-8.0.39-blue)](https://dev.mysql.com/downloads/installer/) </br>

## Tools
> [<img src="https://img.shields.io/badge/Codeigniter-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white" />![version](https://img.shields.io/badge/version-3.1.13-blue)](https://www.codeigniter.com/userguide3/installation/downloads.html) </br>
> [<img src="https://img.shields.io/badge/Node%20js-339933?style=for-the-badge&logo=nodedotjs&logoColor=white" />![version](https://img.shields.io/badge/version-21.7.1-blue)](https://nodejs.org/en/download/prebuilt-installer) </br>
> [<img src="https://img.shields.io/badge/Docker-2CA5E0?style=for-the-badge&logo=docker&logoColor=white" />![version](https://img.shields.io/badge/version-4.31.1-blue)](https://www.docker.com/get-started/) </br>

# Library / CDN
> [![AlpineJS]](https://alpinejs.dev/essentials/installation) </br>
> [![JQuery UI]](https://jqueryui.com) </br>
> [![MomentJS]](https://momentjs.com) </br>
> [![NotyJS]](https://www.jsdelivr.com/package/npm/noty) </br>
> [![Sweetalert]](https://sweetalert2.github.io) </br>
> [![tostr]](https://www.jsdelivr.com/package/npm/toastr) </br>
> [![DataTables]](https://datatables.net/download/) </br>
> [![AG Grid]](https://www.ag-grid.com/javascript-data-grid/getting-started/) / [![AG Grid Theme Builder]](https://www.ag-grid.com/theme-builder/) </br>
> [![ListJS]](https://listjs.com/overview/download/) </br>
> [![Flaticon]](https://www.flaticon.com/search?color=color) </br>

# Setup
> Perlu diperhatikan jika ingin setup menggunakan `docker` atau `local.host`;

> `base_url()` value harus diubah dan disesuaikan dengan `port` jika menggunakan docker atau tidak menggunakan docker
- Open File `application\config\config.php`
> Change `value`
```bash
$config['base_url'] = 'http://localhost:8080';
```

## ENV / Environment
- Jika running menggunakan `server localhost` maka `database` menggunakan
```bash
DB_HOST=localhost
```

- Jika running menggunakan `nginx docker` maka `database localhost` menggunakan
```bash
DB_HOST=host.docker.internal
```

- Jika running menggunakan `database docker` menggunakan
```bash
DB_HOST=codeigniter_database
```

## Docker
- Jangan lupa untuk merubah `ports` pada file `docker-compose.yml` untuk disesuaikan di perangkat masing - masing supaya tidak `error`
```bash
ports:
      - "3306:3306" # *Contoh customize_port:default_service_port
```
- Pastikan value `.env` sudah sama dengan konfigurasi `docker-compose.yml`
- Mengaktifkan mesin docker, dan pastikan operasi build berhasil sampai akhir
```bash
docker-compose up -d
```

> Redis
- Container redis run promp berikut
```bash
redis-cli FLUSHALL
```

- Jika running menggunakan `local.host` maka `redis` menggunakan
```bash
REDIS_CLIENT=predis
```

- Jika running menggunakan `nginx docker` maka `redis` menggunakan
```bash
REDIS_CLIENT=phpredis
```

> Migration run in `docker terimnal` jika koneksi apps menggunakan `docker`
```bash
php index.php migration
```

> Mungkin bisa perhatikan `migration_version` pada file `application\config\migration.php`
```bash
$config['migration_version'] = 0;
```

# php.ini
```bash
display_errors = On
error_reporting = E_ALL
upload_max_filesize = 64M
post_max_size = 64M
max_execution_time = 300
memory_limit = 512M

extension = pdo_pgsql
extension = pgsql
```
