module.exports = function(grunt) {

    const sass = require('node-sass');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        config: {
            root: ''
        },
        jsResources: [
            'node_modules/alpinejs/dist/cdn.min.js',
            '<%= config.root %>resources/js/custom.js',
        ],
        cssResources: [],

        sass: {
            dist: {
                options: {
                    implementation: sass,
                    sourceMap: true,
                    outputStyle: 'compressed'
                },
                files: {
                    '<%= config.root %>public/css/main.min.css' : '<%= config.root %>resources/scss/app.scss',
                    '<%= config.root %>public/css/font.min.css' : '<%= config.root %>resources/scss/font.scss',
                }
            }
        },
        watch: {
            css: {
                files: [ '<%= config.root %>resources/scss/**/*.scss'],
                tasks: ['sass:dist'],
            },
            js: {
                files: ['<%= config.root %>resources/js/*.js'],
                tasks: ['concat', 'uglify'] // , 'uglify' // wieder rein wenns in die heiße phase geht, ne
            }
        },
        concat: {
            dist: {
                src: [ '<%= jsResources %>' ],
                dest: '<%= config.root %>public/js/combined.min.js',
                options: {
                    separator: ';'
                }
            }
        },
        uglify: {
            js: {
                files: {
                    '<%= config.root %>public/js/combined.min.js': [ '<%= config.root %>public/js/combined.min.js' ],
                }
            }
        },
        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        cwd: '<%= config.root %>',
                        src: ['resources/images/**'],
                        dest: '<%= config.root %>public/'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.root %>',
                        src: ['resources/fonts/**'],
                        dest: '<%= config.root %>public/'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.root %>',
                        src: ['resources/scss/plugins/**'],
                        dest: '<%= config.root %>public/'
                    },
                    {
                        expand: true,
                        cwd: '<%= config.root %>',
                        src: ['resources/js/plugins/**'],
                        dest: '<%= config.root %>public/'
                    },
                ]
            }
        }
    });

    grunt.event.on('build', function(action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });

    grunt.event.on('watch', function(action, filepath, target) {
        grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
    });

    grunt.registerTask('default',[ 'concat', 'uglify', 'sass:dist', 'copy:main', 'watch']);
    grunt.registerTask('build',[ 'concat', 'uglify', 'sass:dist', 'copy:main']);
    grunt.registerTask('watch',[ 'concat', 'uglify', 'sass:dist', 'copy:main', 'watch']);


    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
}