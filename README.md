# develshelper
Useful tools for developers.
- Code Snippets Manager
- ...

# Setup Development Environment

## Linux
0. Install [VirtualBox](http://www.VirtualBox.org)
0. Install [vagrant](https://www.vagrantup.com)
0. Download [composer](http://getcomposer.org) if you haven't already
0. Check out source code
0. Run `php composer.phar install`
0. Execute `./SETUP-DEV-ENVIRONMENT.sh`
0. Run `vagrant up` and wait till finished
0. Navigate in your browser to http://develshelper.apache.dev/app_dev.php
0. DONE. start development now ;)

## Windows
0. Install [git](https://git-scm.com/download/win)
 0. Make sure the `<git-install-dir>\usr\bin` is in your path (or install ssh separately)
 0. Set `core.autocrlf` to `true`. Choose at install time or do it later with:
  ```
  git config --local core.autocrlf true
  ```
0. Install [VirtualBox](http://www.VirtualBox.org)
0. Install [vagrant](https://www.vagrantup.com)
0. Check out source code
0. Edit `C:\Windows\System32\drivers\etc`
 0. Open `C:\Windows\System32\drivers\etc` in explorer and edit `hosts` as administrator
 0. add following lines in there:
 ```
    192.168.56.170  develshelper.apache.dev www.develshelper.apache.dev
    192.168.56.171  develshelper.nginx.dev www.develshelper.nginx.dev
 ```
 0. save and done here
0. Copy `tools/vagrant/windows/nginx/puphpet` and `tools/vagrant/windows/nginx/Vagrantfile` to root directory (directory there this README.md is)
0. Open command line (cmd.exe) (or use PhpStorm vagrant support) in root directory and execute `vagrant up`
 0. execute `vagrant ssh`
 0. type `cd /var/www/develshelper` and
 0. `composer install`
0. Navigate in your browser to http://develshelper.apache.dev/app_dev.php
0. DONE. start development now ;)
