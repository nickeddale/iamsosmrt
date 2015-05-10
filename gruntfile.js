module.exports = function(grunt) {

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		uglify: {
		  options: {
		    // the banner is inserted at the top of the output
		    banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
		    mangle: false,
		    beautify: true
		  },

		  js: {
		    src: ['resources/assets/js/*.js'],
		    dest: 'public/js/min.js',
		  },
		},

		sass: {                              // Task
		    dist: {                            // Target
		      options: {                       // Target options
		        style: 'expanded'
		      },
		      files: {                         // Dictionary of files
		        'public/css/style.css': 'resources/assets/sass/style.scss',       // 'destination': 'source'
		      }
		    }
		  },

		watch: {
			design: {
			    files: ['resources/assets/sass/**/*'],
			    tasks: ['sass'],
			    options: {
			      spawn: false,
			    },
			},
			dev: {
			    files: ['resources/assets/js/*.js', 
			    		'resources/assets/js/**/*.js'],
			    tasks: ['uglify'],
			    options: {
			      spawn: false,
			    },
			}
		},
			

	});
	
	
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.loadNpmTasks('grunt-contrib-watch');
	 // Default task(s).
  	grunt.registerTask('default', ['uglify']);

};