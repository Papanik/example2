$(function(){

RoomDimensionsView = Backbone.View.extend({
	
	template : _.template( $("#room-dims-edit-template").html() ),
	className : 'roomDims',
	//el: '.roomDims', 
	
	events : {		
		
		'keypress #roomWidth' : 'checkSave',
		'keypress #roomHeight' : 'checkSave',
		'blur #roomHeight' : 'saveDims',
		'blur #roomWidth' : 'saveDims',
		'click .metric' : 'setMetric',
		'click .imperial' : 'setImperial'
	},
	
	
	initialize: function() {
	    //console.log("[RoomDimensionsView] initialise");
		_.bindAll(this, 'render', 'update', 'updateWidth', 'updateHeight','removeView', 'saveDims', 'checkSave', 'handleError');	
		
		if (this.model) this.setModel(this.model);		
    },
	
	setModel: function(model) {
		//console.log("[RoomDimensionsView] setModel", this.model);
		this.model = model;
		this.model.bind('change:width', this.updateWidth);
		this.model.bind('change:height', this.updateHeight);
		this.model.bind('remove', this.removeView);
		this.model.bind('error', this.handleError);
		this.model.get('units').bind('change', this.update);
	},
	
	render: function () {
		console.log("[RoomDimensionsView] render", this.model.toJSON());
	
		$(this.el).html( this.template( this.model.toJSON() ) );
	
		//this.$('.dims').hide();
		return this;
	},
		
	updateWidth: function () {
		//console.log('[TableDimensionsView] updateWidth', this.model);
		var width = this.model.get('units').checkConversion(this.model.get('width'), UnitSystems.metric, UnitSystems.metric);			
		width = Math.formatDecimals(width, 2);
		this.$('#roomWidth').attr("value", width);
	},
	
	updateHeight: function () {
		//console.log('[TableDimensionsView] updateHeight', this.model);
		var height = this.model.get('units').checkConversion(this.model.get('height'), UnitSystems.metric, UnitSystems.metric);	
		height = Math.formatDecimals(height, 2);				
		this.$('#roomHeight').attr("value", height);
	},
	
	updateAbbr: function () {
		this.$('span').html(this.model.get('units').get('abbr'));
	},
	
	checkSave: function (event) {
		if (event.which === 13) {
			this.saveDims();
		}
	},
	
	saveDims: function () {
		
		var m = this.model.toJSON(),
			width = this.getWidth(),
			height = this.getHeight(),
			newScale, editDim, maxDim;
			
		console.log('[TableDimensionsView] updateDims', width, height)
		
		if (!isNaN(width) && !isNaN(height)) {	
			
			this.model.set({ width: width, height: height });			
			
		} else {
			this.update();
		}
	
	},
	
	update: function () {
		this.updateWidth();
		this.updateHeight();
		this.updateAbbr();
	},
	
	getWidth: function () {
		return this.model.get('units').checkConversion(parseFloat(this.$('#roomWidth').attr("value")), UnitSystems.metric, UnitSystems.imperial);
	},
	
	getHeight: function () {
		return this.model.get('units').checkConversion(parseFloat(this.$('#roomHeight').attr("value")), UnitSystems.metric, UnitSystems.imperial);
	},
	
	
	removeView: function () {
		console.log("[TableDimensionsView] removeView");
		this.remove();
		this.model.unbind();
	},
	
	handleError: function (model, error) {
		alert(error);
		this.updateWidth();
		this.updateHeight();
	},
	
	setMetric: function () {
		console.log('setMetric');
		this.model.get('units').setMetric();
	},
	
	setImperial: function () {
		this.model.get('units').setImperial();
	}
	

});

});