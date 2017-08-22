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
composer require behat/behat  --dev
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

## 2.1 Create feature for User resource

- create `src/AppBundle/Features/Context` folder 

- create `user.feature` and `UserSetupContext.php`

## 2.2 Add Test Dependencies

<code>
composer require phpspec/phpspec  --dev <br>
composer require behat/mink --dev  <br>
composer require behat/mink-extension  --dev <br>
composer require behat/symfony2-extension  --dev  <br>
composer require behat/mink-browserkit-driver  --dev <br>

</code>

## 2.3 Add Runtime Dependencies

<code>
doctrine/doctrine-cache-bundle <br>
nelmio/cors-bundle <br>
nelmio/api-doc-bundle <br>
friendsofsymfony/rest-bundle <br>
csa/guzzle-bundle <br>
jms/serializer-bundle <br>
oneup/flysystem-bundle <br>
friendsofsymfony/user-bundle <br>
lexik/jwt-authentication-bundle

</code>

## 2.4 Create `behat.yml` file

Create `behat.yml` file in project root folder with the following content:


	# behat.yml
	default:
	
	  suites:
	    default:
	      type: symfony_bundle
	      bundle: AppBundle
	      contexts:
	        - FeatureContext:
	            # doctrine: "@doctrine"
	
	  extensions:
	    Behat\Symfony2Extension:
	      kernel:
	        env: "dev"
	        debug: "true"

## 2.5 Keep Testing Seperate

### 2.5.1 Create file of `app_acceptance.php` in project folder of `/web`

You can do this by copying from `app_dev.php` and rename it

Remember to create the variable `$kernel` like this:

	$kernel = new AppKernel('acceptance', true);
	
### 2.5.2 Modify the file of `app/AppKernel.php`

Update the code in line 21 like the following:

	//append acceptance to the array
	if (in_array($this->getEnvironment(), ['dev', 'test','acceptance'], true)) {
	
### 2.5.3 Create file of `config_acceptance.yml` in project folder of `app/config`

You can do this by copying from `config_test.yml` and rename it

Update the content in line 2 like this:

    - { resource: config_test.yml }
    
And then update the content of `dbname` like this:

	"%database_name%_acceptance"
	
### 2.5.4 Adding Mink Config

Update the `extensions` part in `behat.yml` like this:

	  extensions:
	    Behat\Symfony2Extension:
	      kernel:
	        env: "acceptance"
	        debug: "true"
	
	    Behat\MinkExtension:
	      base_url: "http://symfony-rest-example.dev/app_acceptance.php/"
	      sessions:
	        defaults:
	          symfony2: ~
	          
### 2.5.5 Run behat

Run behat in project root folder in the terminal:

	vendor/bin/behat
	
## 2.5.6 Copy code snippets as requested

Copy code snippets into `features/bootstrap/FeatureContext.php`