<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Event-Hub</h1>
    <br>
</p>

Proyek Tugas Akhir Event-Hub dibangun dengan menggunakan [Yii 2](http://www.yiiframework.com/).

Aplikasi ini terdiri dari 5 macam yaitu: admin, api, console, frontend, dan organizer.

Struktur dari aplikasi ini dibangun untuk team development, sehingga dapat dijalankan dengan berbagai kondisi.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

DIRECTORY STRUCTURE
-------------------

```
admin
    assets/              contains application assets such as JavaScript and CSS
    config/              contains admin configurations
    controllers/         contains Web controller classes
    models/              contains admin-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
organizer
    assets/              contains application assets such as JavaScript and CSS
    config/              contains organizer configurations
    controllers/         contains Web controller classes
    models/              contains organizer-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

## Cara Instalasi
1. Download dan install [VirtualBox](https://www.virtualbox.org/wiki/Downloads).
2. Download dan install [vagrant](https://www.vagrantup.com/).
3. Create Github [Personal API Token](https://github.com/blog/1509-personal-api-tokens).
4. Clone Repository dengan cara `git clone https://github.com/adryanev/event-hub.git`.
5. Ganti Personal Api token di `vagrant/config/vagrant.local.yml`.
6. Jalankan command `vagrant plugin install vagrant-hostmanager` `vagrant up`.
7. Tambahkan hosts file.
```
192.168.2.1 admin.event-hub.test
192.168.2.1 api.event-hub.test
192.168.2.1 event-hub.test
192.168.2.1 organizer.event-hub.test
```
