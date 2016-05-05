Voltage Starter Theme

Based on _s (http://underscores.me/)

This theme is namespaced with the generic tag `__package` - when starting a new site based on this theme, be sure to replace all instances of `__package` with the site namespace of choice (e.g. `bluestar`)

## Local Installation Template

1. From your main project folder, clone the project repo, e.g: `git clone --recursive git@github.com:voltagead/bluestar.git`
2. CD into project root
3. From the project root, run `git clone git@github.com:WordPress/WordPress.git wp`. This will create an instance of WordPress inside the `wp/` directory.
4. Checkout the latest stable version of WordPress locally: `cd wp` then `git checkout tags/x.x`, replacing `x.x` with the current version (`git tag`)
5. From the project root, create a local copy of `index.php`: `cp wp/index.php ./index.php`
    Edit the `index.php` to be `require( dirname( __FILE__ ) . '/wp/wp-blog-header.php' );` (note the addition of the `/wp` in front of `/wp-blog-header.php`)
6. From the project root, create a local copy of `wp-config.php`: `cp wp/wp-config-sample.php ./wp-config.php`
    Add the following to `wp-config.php` under the top comments:
    ````
    @define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'/wp');
    @define('WP_HOME', 'http://'.$_SERVER['HTTP_HOST']);
    @define('WP_CONTENT_URL', WP_HOME.'/wp-content');
    @define('WP_CONTENT_DIR', dirname(__FILE__).'/wp-content');
    ````
7. Ensure `WP_DEBUG` constant in `wp-config.php` is set to `true`: `define( 'WP_DEBUG', true );`
8. SFTP into the staging server (with the credentials found below) and pull down `/wp-content/plugins`.
10. Run `git submodule update --init --recursive` from the project root to install submodules (ie CMB2)
11. Access the WPEngine account phpMyAdmin and export the database 
12. Import SQL into local database and update `wp-config.php` with local database credentials and secret keys. Make sure to also update the `$table_prefix` variable.
13. Access phpMyAdmin on your local machine and navigate to the `wp_options` table. Search for `upload_url_path` and fill in the path to the production server `ex: http://www.bigchill.com/wp-content/uploads`. This forces WP to display images from production so you don't have to copy them to local!
14. From within the theme root, install Node.js dependencies: `npm install`
15. From within the theme root, install front-end dependencies: `gulp install`
16. Update your Git files by [following these instructions](https://github.com/voltagead/bluestar/wiki/Rebase-Setup).
17. Set up .htaccess and update the permissions: `chmod 666 .htaccess`


## Development

Gulp is needed for the asset compilation, and is commonly already installed globally to leverage the `gulp` command.

1. From within the theme root, watch for changes to styles/scripts, re-compile: `gulp watch`
2. Use the [LiveReload browser plugin](http://livereload.com/extensions/) to leverage non-reloading page refreshes
3. Install your IDE's [`.editorconfig` extension](http://editorconfig.org/#download)

We are using [Susy](http://susydocs.oddbird.net/en/) for grid framework-like layouts.

### Scripts and Styles

Assets in the `assets/build/` directory are partially generated from items in the `assets/css/` and `assets/js/` directories. It is assumed that these have been linted and relevant concatenation has already been performed.

Assets in the `assets/dist/` directory are generated from items in the `assets/build/` directory. It is assumed that these have been minified and comments have been removed. 

## Ready for Deployment

1. Run `gulp stage`. In order to run the time-consuming image optimizer before launch, run `gulp prod`.
2. Follow [General Workflow for a Pull Request](https://github.com/voltagead/flaming-ironman/blob/master/development.md)

## Deployment

The site is being deployed to WPEngine via a `git push`. Add the production server remote based on the wpengine URL, e.g:
`git remote add production git@git.wpengine.com:production/bluestar2015.git`

### Production

To update the production server, from the master branch: `git push production master`

# Workflow

Use GitHub Flow. Refer to the [Voltage development guidelines](https://github.com/voltagead/flaming-ironman/blob/master/development.md).