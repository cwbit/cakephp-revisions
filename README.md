# cakephp-revisions
=======================
CakePHP Revisions plugin (CakeFest 2015)


A Behavior plugin for CakePHP that extends the idea of counterCache and counterScope to more fields.

Note: this is a git extension of the original AggregateCache behavior by Vincent Lizzi.

## Installation
====

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
    Plugin::load('AggregateCache');
```
If you are already using `Plugin::loadAll();`, then this is not necessary.


## Usage

