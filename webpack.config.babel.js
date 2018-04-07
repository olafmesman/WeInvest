import config from './config.babel';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import CopyWebpackPlugin from 'copy-webpack-plugin';

const clientSetup = {
	entry: {
		app: config.entry
	},
	output: {
		path: `${config.dist}`,
		filename: '[name].js',
	},
	module: {
		rules: [
			{
				test: /\.jsx?$/, exclude: /node_modules/, loader: 'babel-loader'
			}, {
				test: /\.woff2?$/,
				use: [
					{
						loader: 'url-loader',
						options: {
							limit: 10,
							name: './fonts/[name].[ext]',
							publicPath: '../'
						}
					}
				]
			}, {
				test: /\.scss$/,
				exclude: /node_modules/,
				use: [
					MiniCssExtractPlugin.loader, {
						loader: 'css-loader',
						options: {
							importLoaders: 2,
							sourceMap: true
						}
					}, {
						loader: 'sass-loader',
						options: {
							sourceMap: true,
							importer: function(url, prev) {
								if (url.indexOf('@material') === 0) {
									const filePath = url.split('@material')[1];
									const nodeModulePath = `./node_modules/@material/${filePath}`;
									return {
										file: require('path').resolve(nodeModulePath)
									};
								}
								return {
									file: url
								};
							}
						}
					}, {
						loader: 'import-glob-loader'
					}
				]
			}, {
				test: /\.(png|jpg|jpeg|gif|svg|wav|mp3)$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: 'images/[name].[ext]',
						}
					}
				]
			}
		]
	},
	devtool: 'source-map',
	plugins: [
		new MiniCssExtractPlugin({
			filename: "[name].css"
		}),
		new CopyWebpackPlugin([
			{ from: `${config.entry}/assets`, to: 'assets' }
		])
	]
};

module.exports = [clientSetup];
