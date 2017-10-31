/* Gruntfile

How it works?
The watch task looks for any file with the extention .scss. When there is a
change to these files it will run the [sass] task.

[sass] task
The sass task is divided into two subsections dev and dist. Dev creates an
expanded (human readable) css file from the style.scss and it's partials and
places it in the compiled folder. Dist creates a minified version from the same
style.scss sheet and places it also, in the compiled folder.

[postcss] task
The postcss will autoprefix (automatically add any required prefixes) to scss/css in order
to ensure styles will run across different browsers.

[jsHint] task
Lints the js code found in script.js and gruntfile.js and feedsback any errors using
the stylish module to the command line. It is added to the wacth task so that only changes to

*/
module.exports = function(grunt){
  grunt.initConfig({
    //tell Grunt where the package file is
    pkg: grunt.file.readJSON('package.json'),
    /* Sass Task*/
    sass:{
      //distribution version of sass compilation task
      dist:{
        options:{
          style: 'compressed',
          sourcemap: 'none',
        },
        files:{
          //where I want to put the file : where I'm getting the file from
          'compiled/style.css': 'sass/style.scss'
        }
      }
    },
    postcss: {
      options: {
        map: false,
        processors: [
          require('autoprefixer')
          ({
            browsers: ['last 2 versions']
           })
         ]
       },
       //prefix all files
       multiple_files:{
         expand:true,
         flatten:true,
         src:'./compiled/style.css',
         dest:'./public/login/styles/'
       }
    },
    /* Minify JS with Uglify Task */
      uglify: {
        my_target: {
          files: {
            //where I want to put the file : where I'm getting the file from
            './public/login/scripts/script.min.js': './js/script.js'
           }
         }
     },
    /*jsHint Task */
      jshint: {
          all: ['gruntfile.js', 'js/script.js'],
          options: {
          // more options here if you want to override JSHint defaults
          reporter: require('jshint-stylish'),
          globals: {
            jQuery: true,
            console: true,
            module: true
         }
      }
    },
    /* Watch Task*/
    watch:{
        css:{
          /*Anthing that happens to any file within the project
          that contains .scss then some other task will be triggered*/
          files:'**/*.scss',
          tasks: ['sass','postcss'],
          options: {
            livereload:true
          }
        },
        js:{
          /*Anthing that happens to script.js will trigger [uglify]*/
          files:'js/script.js',
          tasks: ['uglify'],
          options: {
            livereload:true
          }
        },
        jhint:{
          /*Anthing that happens to gruntfile or script.js
          will trigger jshint to run on those two files.*/
          files:['Gruntfile.js', 'js/script.js'],
          tasks: ['jshint'],
          options: {
            livereload:true
          }
       },
       php:{
         /*reload when changes occur in any of the php files but don't run
         any tasks*/
         files:['./public/login/**/*.php'],
         options:{
           livereload:true
         }
       }
     }
  });

  //Tell Grunt to load the tasks
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.registerTask('default',['watch']);

};
