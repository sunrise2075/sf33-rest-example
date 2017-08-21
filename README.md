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


## 1.3 Install Behat from command line

You can also clone the project with Git by running:

<code>
git clone git://github.com/Behat/Behat.git && cd Behat
</code>

Then download `composer.phar` and run `install` command:

<code>
wget -nc https://getcomposer.org/composer.phar
php composer.phar install
</code>

Run the following command from project root directory in terminal to use behat:

<code>
bin/behat
</code>

Create `features/` folder in current directory:

<code>
behat --init
</code>
