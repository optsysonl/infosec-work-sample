const path = require('path');

const BUILD_DIR = path.resolve(__dirname, 'webroot/js/dist');
const APP_DIR = path.resolve(__dirname, 'resources/app');

module.exports = {
    mode: 'development',
    devtool: 'cheap-module-source-map',
    entry: {
        main: [
            APP_DIR + '/index.js'
        ]
    },
    output: {
        path: BUILD_DIR,
        filename: 'bundle.js',
    },
    module: {
        rules: [
            {
                test: /(.)?\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                    loader: "babel-loader"
                }
            }
        ]
    }
};
