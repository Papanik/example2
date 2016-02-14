PhysicalShape = Shape.extend({
	
	errorSize: 'A shape cannot be less than <%= value %><%= abbr %> in <%= axes %>.',
	
	defaults: {
		x: 0,
		y: 0,
		width:0,
		height:0,
		rotation: 0,
		scaleX: 1,
		scaleY: 1,
		scaleMode: ScaleMode.NONE,
		type: ShapeTypes.init,
		units: null,
		name: '',
		order: 0,
		buffer: 0,
		footprintWidth: 0,
		footprintHeight: 0,
		url: '/'
	},
	
	initialize: function (attrs) {
		_.bindAll ( this, 'handleDimensionsChange');
		console.log('PhysicalShape init');
		Shape.prototype.initialize.call(this, attrs);
		
		_.bindAll(this, 'handleDimensionsChange');
		this.bind('change:width', this.handleDimensionsChange);
		this.bind('change:height', this.handleDimensionsChange);
		this.bind('change:buffer', this.handleDimensionsChange);
		this.bind('change:scaleX', this.handleDimensionsChange);
		this.bind('change:scaleY', this.handleDimensionsChange);
		//this.bind('change:footprintWidth', this.calculateScale);
		//this.bind('change:footprintheight', this.calculateScale);
		
		this.setFootprint();	
	},
	
	handleDimensionsChange: function () {	
		var m = this.toJSON(),
			sin = 0.707106781;
			//w = Math.max(m.height, m.width);
			//w = (m.get('type').sides === 1) ? w : (w * sin) * 2;
			
		//console.log('[PhysicalShape] handleDimensionsChange');
		this.setFootprint();		
	},
	
	calculateScale: function () {
		var scaleX = this.get('footprintWidth') / (this.get('width') + this.get('buffer') * 2),
			scaleY = this.get('footprintHeight') / (this.get('height') + this.get('buffer') * 2),
			oScaleX = this.get('scaleX'),
			oScaleY = this.get('scaleY');
		
		if (scaleX != oScaleX) {
			this.set({ scaleX: scaleX });
		} 
		if (scaleY != oScaleY) {
			this.set({ scaleY: scaleY });
		}
	},
	
	setFootprint: function () {
		//console.log('[PhysicalShape] setFootprint',  this.get('scaleX'), this.get('scaleY'));
		var footprintHeight = (this.get('height') + this.get('buffer') * 2) * this.get('scaleY'),
			footprintWidth = (this.get('width') + this.get('buffer') * 2) * this.get('scaleX'),
			oFootprintHeight = this.get('footprintHeight'),
			oFootprintWidth = this.get('footprintWidth');
			
		//console.log(footprintWidth, footprintHeight);
		
		if (footprintHeight !== oFootprintHeight) {
			//console.log('	setting footprintHeight', footprintHeight, oFootprintHeight)
			this.set({'footprintHeight' : footprintHeight });
		}
		
		if (footprintWidth !== oFootprintWidth) {
			//console.log('	setting footprintWidth', footprintWidth, oFootprintWidth)
			this.set({'footprintWidth' : footprintWidth });
		}
	}
});