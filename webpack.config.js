/* const path = require('path');

const config = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'bundle.js'
  },
  module: {
    rules: [
      {
        test: /\.less$/,
        use: [{
          loader: "style-loader"
      }, {
          loader: "css-loader"
      }, {
          loader: "sass-loader",
          options: {
              includePaths: ["node_modules"]
          }
      }]
        
      }
    ]
  }
}

module.exports = config; */



module.exports = [{
  devServer: {
    port: 9999
  },
  output: {
    publicPath: 'http://localhost:9999/bundles/'
  },
  devtool: 'inline-source-map',
  entry: './style.scss',
  output: {
    // This is necessary for webpack to compile
    // But we never use style-bundle.js
    filename: 'style-bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'bundle.css',
            },
          },
          { loader: 'extract-loader' },
          { loader: 'css-loader' },
          { loader: 'sass-loader', options: { includePaths: ['./node_modules']} },
        ]
      }
    ]
  },
}];