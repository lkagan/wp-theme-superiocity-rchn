# RC Heli Nation

This is a custom theme built exclusively for RC Heli Nation  by [Superiocity](http://www.superiocity.com/). It utilizes a relatively advanced workflow based on industry standards that can be followed by others.

First, **DO NOT DIRECTLY EDIT THE STYLE.CSS FILE**.  This project uses Sass and must be run through a transpiler.

This project is built with [NPM](https://www.npmjs.com/) tools such as Gulp.  The NPM tools are not necessary but recommended.  To work with this project using NPM:
* Install [Node.js](https://nodejs.org/)
* From the theme directory, type `npm install` to install all the required packages and tools.
* Run the Gulp tasks listed in gulpfile.js or just `gulp` to run the default task list.

You can still work with this project without using Gulp or Node.js.  All source files (Sass, JS, image sources) are in
the _src/_ directory.  Any code written directly in style.css, any _js/*_ file, or _images/*_ file is likely to be overwritten by automated tools that use the original sources under the _src/_ directory.
