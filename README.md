# Fullstack Evaluation Template

# Create Your Repository
Go to the Infosec Github and navigate to `infoseci/fullstack-template`. Click the button "Use this template". Create a new public repository.


## Install Docker
Follow the instructions found here for install Docker for Mac:
https://docs.docker.com/docker-for-mac/install/

## Running Docker
Once you have Docker installed you will need to build images locally to run the containers.
```
bin/build-images
```
With a fresh install of the skeleton app run composer.
```
bin/composer install
```

When that finishes start your development environment by running:
```
docker-compose up
```

That will run two services: ws-server and ws-db

A PHP http server will be set up and running at: http://0.0.0.0:8765/

## Running CakePHP commands
Once the dev environment is running you can run all the standard CakePHP commands with the following command:
```
bin/cakephp
```
And run database migrations with this command:
```
bin/cakephp migrations migrate
```
!Warning! The following will NOT work even though it's how Cake's docs say to run it
```
bin/cake migrations migrate
```

## Connecting to mysql from the host
You can connect to MySQL via Docker Desktop > Containers/Apps > `training-db` Container > CLI, or using
a local MySQL client:
```
mysql -utraining -ptraining -h0.0.0.0 -P3307 --protocol=tcp training
```


## Running unit tests on your running container

```
bin/phpunit
```

## Shutting your dev environment down

```
docker-compose down
```

## Running composer on your running container
With it running you can now run composer
```
bin/composer install
```

Running npm install
```
bin/npm install
```

Running webpack

```
bin/webpack -d
```
### Compiling Javascript
Webpack is configured and set up to Babelify your JS to ``` webroot/js/dist/build.js. ```

Build your Javascript file:

```
bin/npm run build
```

You can also watch your javascript files for changes and automatically recompile with this command:

```bash
bin/npm run watch
```

## Resources


### CakePHP
The best resource for learning CakePHP is the [CakePHP Cookbook](https://book.cakephp.org/4/en/index.html).
There is also a [YouTube channel](https://youtube.com/user/CakePHP/playlists) with past CakeFest trainings.

### ReactJS
ReactJS is the frontend framework you will be using at Infosec. Documentation for ReactJS is plentiful on the Internet. The official docs
can be found [here](https://reactjs.org/docs/getting-started.html).

Besides [Functional Components](https://reactjs.org/docs/components-and-props.html) and [Hooks](https://reactjs.org/docs/hooks-state.html),
some other useful topics include [JSX](https://reactjs.org/docs/introducing-jsx.html), [Conditional Rendering](https://reactjs.org/docs/conditional-rendering.html), and
[Lifting State Up](https://reactjs.org/docs/lifting-state-up.html).
