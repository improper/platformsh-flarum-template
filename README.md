# Flarum for Platform.sh

<p align="center">
<a href="https://console.platform.sh/projects/create-project?template=https://github.com/improper/platformsh-flarum-template/blob/main/.platformsh.template.yaml&utm_content=flarum&utm_source=github&utm_medium=button&utm_campaign=deploy_on_platform">
    <img src="https://platform.sh/images/deploy/lg-blue.svg" alt="Deploy on Platform.sh" width="180px" />
</a>
</p>

This template builds Flarum on Platform.sh.

Flarum is a discussion platform. It's free and extremely extensible.

## Customizations

The project was sourced from `composer create-project flarum/flarum`. The following changes have been implemented.

* `.platform` directory has been added to enable cloud deployments.
* `.platformsh.template.yaml` has been added to enable the Deploy on Platform button. This file is optional.
* `config_base.php` and `deploy.php` have been added to enable so that this project may automatically configure environment variables.
* `.patches/platformsh_protect_app_directory.diff` has been added to increase the security of Flarum. If removed, Flarum will complain that the root project directory is not writeable, which is only needed during installation. This ensures that your project remains secure.
  * This patch is applied automagically by Composer using `cweagans/composer-patches`

## Features

* PHP 8.1
* MariaDB 10.4
* Automatic TLS certificates
* Composer 2
* Automatic Database Connection Configuration

## Post-deployment

1. Change your admin username and password. **Login with:**
   * **User**: admin
   * **Password**: password

## Local development

This template has been configured for use with [Lando](https://docs.lando.dev).  Lando is Platform.sh's recommended local development tool.  It is capable of reading your Platform.sh configuration files and standing up an environment that is _very similar_ to your Platform.sh project.  Additionally, Lando can easily pull down databases and file mounts from your Platform.sh project.

To get started using Lando with your Platform.sh project check out the [Quick Start](https://docs.platform.sh/development/local/lando.html) or the [official Lando Platform.sh documentation](https://docs.lando.dev/config/platformsh.html).

Or, after deploying your project simply run:

* `lando init --recipe platformsh --src cwd --platformsh-site "$projectName"`
* `lando start`
* `lando ssh -c 'php deploy.php'`

## References

* [Flarum](https://flarum.org/)
* [PHP on Platform.sh](https://docs.platform.sh/languages/php.html)
* [Flarum Docs](https://docs.flarum.org/)
