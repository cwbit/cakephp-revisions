# cakephp-revisions

CakePHP Revisions plugin (CakeFest 2015)

A Plugin for CakePHP 3.x that allows you to track Revisions to Tables (at the entity level) in your Application

## Requirements


* [CakePHP 3.x](http://cakephp.org)

## Installation


_[Using [Composer](http://getcomposer.org/)]_

Add the plugin to your project's `composer.json` - something like this:

	{
		"require": {
			"cwbit/cakephp-revisions": "dev-master"
		}
	}

Because this plugin has the type `cakephp-plugin` set in it's own `composer.json` composer knows to install it inside your `/plugins` directory (rather than in the usual 'Vendor' folder). It is recommended that you add `/plugins/Revisions` to your cake app's .gitignore file. (Why? [read this](http://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md).)

_[Manual]_

* Download and unzip the repo (see the download button somewhere on this git page)
* Copy the resulting folder into `plugins`
* Rename the folder you just copied to `Revisions`

_[GIT Submodule]_

In your `app` directory type:

    git submodule add -b master git://github.com/cwbit/cakephp-revisions.git plugins/Revisions
    git submodule init
    git submodule update

_[GIT Clone]_

In your `plugins` directory type:

    git clone -b master git://github.com/cwbit/cakephp-revisions.git Revisions


### Enable plugin

In 3.0 you need to enable the plugin your `config/bootstrap.php` file:
```
    Plugin::load('Revisions');
```
If you are already using `Plugin::loadAll();`, then this is not necessary.


## Usage

Add the Behavior to any Table you want to track versions of

1. [Track any/all Revisions](#basic-implementation)
2. [Explicity watch for changes to certain fields (whitelist)](#watched-implementation)
3. [Ignore changes made to certain fields (blacklist)](#ignored-implementation)

#### Basic Implementation
The Basic Implementation will fire any time any field on the entity is modified.

```php
	public function initialize(){
		parent::initialize();
		
		$this->addBehavior('Revisions.Revisions');
	}
```

#### WATCHed Implementation
You can also explicitly tell the Plugin to only trigger version control if specific field(s) have been modified.

```php
	public function initialize(){
		parent::initialize();
		
		$this->addBehavior('Revisions.Revisions', [
			'watch' => [
				'name', # trigger if,
				'foo',  # and only if, 
				'bar'	# any of these fields are changed 
				],   
			]);
	}
```

#### IGNOREd Implementation
You can also explicitly tell the Plugin to ignore modifications to certain fields. The version control will only trigger if at least one other (non-ignored) field has been changed.

```php
	public function initialize(){
		parent::initialize();
		
		$this->addBehavior('Revisions.Revisions', [
			'ignore' => [
				'bigBlob',  # only trigger if something 
				'created',  # OTHER than these fields 
				'modified', # was changed
				],   
		]);
	}
```

### Adding Revision Review

The Plugin also comes with the ability to view all revisions and restore to any given point in time.

To enable this functionality, add and customize the following line in any view

```php
<?= $this->Element('Revisions.Revisions/index', [
		'id' => $entity->id, 	# replace with actual entity variable
		'model' => 'examples',	# replace with actual model
		'limit' => 10,			# optional
	]);?>

```