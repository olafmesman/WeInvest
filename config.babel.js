import path from 'path';

const DIST_PATH = path.resolve(__dirname, './dist');
const ENTRY_PATH = path.resolve(__dirname, './src');

export default {
	entry: ENTRY_PATH,
	dist: DIST_PATH
};