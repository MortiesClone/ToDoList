module.exports = function(grunt){
   grunt.initConfig({
 		less: {
	  		development: {
	    		files: {
	      			"css/result.css": "less/*.less"
	    		}
	  		}
		},
		concat:{
			dist:{
				src: ['js/*.js'],
				dest: 'js_result/script.js'
			}
		},
		uglify: {
			dist:{
				files: {
					'js_result/min/script.min.js' : 'js_result/script.js'
				}
			}
		}
	});

   grunt.loadNpmTasks('grunt-contrib-less');
   grunt.loadNpmTasks('grunt-contrib-concat');
   grunt.loadNpmTasks('grunt-contrib-uglify');

   grunt.registerTask('default', ['concat'], ['uglify']);
};
