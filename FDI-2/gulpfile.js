var gulp = require('gulp'), 
sass = require('gulp-sass');
autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function() { 
	return gulp.src(['./assets/sass/**/*.sass', './assets/sass/**/*.scss']) 
	.pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
	.pipe(gulp.dest('./assets/css')) 
});

gulp.task('default', () =>
	gulp.src('src/app.css')
	.pipe(autoprefixer({
		browsers: ['last 2 versions'],
		cascade: false
	}))
	.pipe(gulp.dest('dist'))
	);

gulp.task('watch', function() {
	gulp.watch(['./assets/sass/**/*.sass', './assets/sass/**/*.scss'], ['sass']); 
});

gulp.task('default', ['watch']);