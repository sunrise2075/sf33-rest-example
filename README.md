sf33-rest-example
=================

# 1. Create project using symfony command line tool

## 1.1 Create the project

<code>
symfony new sf33-rest-example
</code>

A Symfony project created on August 21, 2017, 5:57 am.

## 1.2 Update Dependencies

<code>
composer update
</code>


## 1.3 Install Behat

### 1.3.1 You can also clone the project with Git by running in terminal:

<code>
composer require behat/behat
</code>

### 1.3.2 Then download `composer.phar` and run `install` command:

<code>
wget -nc https://getcomposer.org/composer.phar
php composer.phar install
</code>

### 1.3.3 Initialize BDD architecture

<code>
vendor/behat/behat/bin/behat --init
</code>

# 2. Write User feature

1. 
