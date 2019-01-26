// polyfill es6 features to be compatible with old browsers
require('babel-polyfill');

// import local dependencies
import Router from './utils/router';
import common from './routes/Common';
import home from './routes/Home';
import religiousEd from './routes/Religious-ed';
import sacraments from './routes/Sacraments';

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
const routes = {
  common,
  home,
  religiousEd,
  sacraments
};

// Load Events
jQuery(document).ready(() => new Router(routes).loadEvents());
