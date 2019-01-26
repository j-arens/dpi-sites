const postcss = require('postcss');

module.exports = postcss.plugin('postcss-namespace', function(opts) {
    opts = opts || {};
    return function (css, result) {        
        css.walkRules(rule => {
            rule.selectors = rule.selectors.map(selector => selector.replace(/\\/g, ''));
        });
    }
});