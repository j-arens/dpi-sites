# DPI Gulp Workflow

A basic gulp workflow for compiling sass/scss to css in Wordpress themes.

---

### Getting Setup

You must have the latest version of Node.js installed on your computer for this to work. Download it [here](https://nodejs.org/en/).

If you've never used node, npm, gulp, or sass then you'll want to somewhat familiarize yourself with the basics of each technology. You'll also want to have a basic knowledge of the command prompt/terminal(mac), and Javascript.

[Node.js](https://nodejs.org/en/)

[NPM](https://www.sitepoint.com/beginners-guide-node-package-manager/)

[Gulp.js](http://gulpjs.com/)

[Sass](http://sass-lang.com/)

---

### Making It Work

1. Download the files in this repository to your computer.

![Step 1](http://imgur.com/aJUdYnR.jpg)

2. Copy and paste all the content into your build folder.

![Step 2](http://imgur.com/1AAQTyk.jpg)

3. Go into the `style.scss` file in the styles folder and change the `YOUR-PROJECT-NAME-HERE` the name of the project.

![Step 3](http://imgur.com/NS7jboX.jpg)

4. Open the command prompt and navigate to your build folder.

![Step 4](http://imgur.com/qdfpLrj.jpg)

5. Run the command `npm install`. This will search the directory for the `package.json` file and download the dependencies listed within it.

![Step 5](http://imgur.com/1uH8kRk.jpg)

6. Now that the modules are installed we can run gulp. Go to the command prompt, make sure you're in the root directory of your build folder, and run the command `gulp`. This will search the directory for the `gulpfile.js` and run it.

![Step 6](http://imgur.com/aivDQnJ.jpg)

7. In the command prompt you'll see gulp start and finish all of your styles. If you've made it this far it's all working correctly!

![Step 7](http://imgur.com/QmfsJh0.jpg)

8. Keep an eye on the command prompt each time you save changes to any of your sass/scss files. If you've made a mistake gulp will catch it and stop the process! You'll need to fix your mistake and run the gulp command again to restart everything.

![Step 8](http://imgur.com/nbvlV3r.jpg)

9. You can stop gulp from running by pressing `ctrl + c` twice.

---

### Features

Here you'll find an explanation of each of the gulp plugins that are being used in this build. There are many many more plugins out there. Feel free to modify this build any way you see fit.

1. Sourcemaps - The browser will use your sourcemap to tell you which specefic partial stylesheet your css rules are from.
2. Sass - Compiles scss/sass files to standard css.
3. Postcss - Similar to sass but is fully open source with many useful little plugins to enhance writing css.
4. Autoprefixer - Goes through your scss/sass and adds the appropiate prefixes to rules that require them.
5. Lost - Lost is a super handy postcss grid system that I like to use on occasion, you can learn how to use it at https://github.com/peterramsing/lost
6. PxtoRem - Another postcss module. Converts all pixel values to rem values. I like to use it because pixels is more familiar to me but I still want the benefits of using relative values.
