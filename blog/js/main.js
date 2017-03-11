FragmentsFx.prototype.options = {
	// Number of fragments.
	fragments: 25, 
	// The boundaries of the fragment translation (pixel values).
	boundaries: {x1: 100, x2: 100, y1: 50, y2: 50},
	// The area of the fragments in percentage values (clip-path).
	// We can also use random values by setting options.area to "random".
	area: 'random',
	/* example with 4 fragments (percentage values)
	[{top: 80, left: 10, width: 3, height: 20},{top: 2, left: 2, width: 4, height: 40},{top: 30, left: 60, width: 3, height: 60},{top: 10, left: 20, width: 50, height: 6}]
	*/
	// If using area:"random", we can define the area´s minimum and maximum values for the clip-path. (percentage values)
	randomIntervals: {
		top: {min: 0,max: 90},
		left: {min: 0,max: 90},
		// Either the width or the height will be selected with a fixed value (+- 0.1) for the other dimension (percentage values).
		dimension: {
			width: {min: 10,max: 60, fixedHeight: 1.1},
			height: {min: 10,max: 60, fixedWidth: 1.1}
		}
	},
	parallax: false,
	// Range of movement for the parallax effect (pixel values).
	randomParallax: {min: 10, max: 150}
};

FragmentsFx.prototype._init = function() {
	// The dimensions of the main element.
	this.dimensions = {width: this.el.offsetWidth, height: this.el.offsetHeight};
	// The source of the main image.
	this.imgsrc = this.el.style.backgroundImage.replace('url(','').replace(')','').replace(/\"/gi, "");;
	// Render all the fragments defined in the options.
	this._layout();
	// Init/Bind events
	this._initEvents();
};

FragmentsFx.prototype._layout = function() {
	// Create the fragments and add them to the DOM (append it to the main element).
	this.fragments = [];
	for (var i = 0, len = this.options.fragments; i < len; ++i) {
		const fragment = this._createFragment(i);
		this.fragments.push(fragment);
	}
};

FragmentsFx.prototype._createFragment = function(pos) {
	var fragment = document.createElement('div');
	fragment.className = 'fragment';
	// Set up a random number for the translation of the fragment when using parallax (mousemove).
	if( this.options.parallax ) {
		fragment.setAttribute('data-parallax', getRandom(this.options.randomParallax.min,this.options.randomParallax.max));
	}
	// Create the fragment "piece" on which we define the clip-path configuration and the background image.
	var piece = document.createElement('div');
	piece.style.backgroundImage = 'url(' + this.imgsrc + ')';
	piece.className = 'fragment__piece';
	piece.style.backgroundImage = 'url(' + this.imgsrc + ')';
	this._positionFragment(pos, piece);
	fragment.appendChild(piece);
	this.el.appendChild(fragment);
	
	return fragment;
};

FragmentsFx.prototype._positionFragment = function(pos, piece) {
	const isRandom = this.options.area === 'random',
		  data = this.options.area[pos],
		  top = isRandom ? getRandom(this.options.randomIntervals.top.min,this.options.randomIntervals.top.max) : data.top,
		  left = isRandom ? getRandom(this.options.randomIntervals.left.min,this.options.randomIntervals.left.max) : data.left;

	// Select either the width or the height with a fixed value for the other dimension.
	var width, height;

	if( isRandom ) {
		if(!!Math.round(getRandom(0,1))) {
			width = getRandom(this.options.randomIntervals.dimension.width.min,this.options.randomIntervals.dimension.width.max);
			height = getRandom(Math.max(this.options.randomIntervals.dimension.width.fixedHeight-0.1,0.1), this.options.randomIntervals.dimension.width.fixedHeight+0.1);
		}
		else {
			height = getRandom(this.options.randomIntervals.dimension.width.min,this.options.randomIntervals.dimension.width.max);
			width = getRandom(Math.max(this.options.randomIntervals.dimension.height.fixedWidth-0.1,0.1), this.options.randomIntervals.dimension.height.fixedWidth+0.1);
		}
	}
	else {
		width = data.width;
		height = data.height;
	}

	if( !isClipPathSupported ) {
		const clipTop = top/100 * this.dimensions.height,
			  clipLeft = left/100 * this.dimensions.width,
			  clipRight = width/100 * this.dimensions.width + clipLeft,
			  clipBottom = height/100 * this.dimensions.height + clipTop;

		piece.style.clip = 'rect(' + clipTop + 'px,' + clipRight + 'px,' + clipBottom + 'px,' + clipLeft + 'px)';
	}
	else {
		piece.style.WebkitClipPath = piece.style.clipPath = 'polygon(' + left + '% ' + top + '%, ' + (left + width) + '% ' + top + '%, ' + (left + width) + '% ' + (top + height) + '%, ' + left + '% ' + (top + height) + '%)';
	}

	// Translate the piece.
	// The translation has to respect the boundaries defined in the options.
	const translation = {
			x: getRandom(-1 * left/100 * this.dimensions.width - this.options.boundaries.x1, this.dimensions.width - left/100 * this.dimensions.width + this.options.boundaries.x2 - width/100 * this.dimensions.width),
			y: getRandom(-1 * top/100 * this.dimensions.height - this.options.boundaries.y1, this.dimensions.height - top/100 * this.dimensions.height + this.options.boundaries.y2 - height/100 * this.dimensions.height)
		  };

	piece.style.WebkitTransform = piece.style.transform = 'translate3d(' + translation.x + 'px,' + translation.y +'px,0)';
};

