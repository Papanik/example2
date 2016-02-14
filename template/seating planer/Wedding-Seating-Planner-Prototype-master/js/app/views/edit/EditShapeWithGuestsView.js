//$(function(){

EditShapeWithGuestsView = Backbone.View.extend({
	
	className: 'edit-shape-guests',
	
	events: {
		'drop .edit-shape .shape': 'handleShapeDrop',
		'drop .guest-list': 'handleGuestListDrop',
		'change .shape-list': 'setSelection',
		'mouseup .shape canvas': 'mouseUp',
		'click .move-cancel': 'clearMoveUI'
	},
	
	mouseUp: function (event) {
		console.log('>',event.offsetX, event.offsetY);
		var model = this.editView.shapeView.model,
		shape = model.get('shape'),
		units = shape.get('units'),
		x = event.offsetX - model.get('footprintWidth') * 0.5,
		y = event.offsetY - model.get('footprintHeight') * 0.5,
		we = console.log('>>',x, y);
	},
	
	initialize: function(attrs) {
		_.bindAll(this, 'render', 'handleShapeDrop', 'handleGuestListDrop', 'handleStateChange', 'clearMoveUI');
		
		this.editView = attrs.factory.create(this.model);		
		$(this.el).append( this.editView.el );
		
		this.moveGuestView = new ShapeMoveGuestListView({ model: this.model.moveGuest, className:'shape-list shape-list-move-guest' });
		
		
		this.model.bind('change:state', this.handleStateChange);
		this.handleStateChange();
		//this.$('.shape-list-move-table').hide();
		
	},
	
	render: function() {		
		this.editView.render();	
		$(this.editView.el).append( this.moveGuestView.render().el );			
		return this;		
	},
	
	handleStateChange: function() {
		$(this.el).attr('class', this.className + ' ' + this.model.get('state'));
		
		if (this.model.get('state').split(' ').indexOf('move-guest') > 0) {
			this.$('.shape-list-move-guest').show();
		} else {
			this.$('.shape-list-move-guest').hide();
		}
	},
	
	handleShapeDrop: function (event, ui) {
		//console.log(event.target, this.editView.shapeView.model.get('shape').checkClosest);
		//console.log($(event.target).find('canvas').offset().left)
	
		var data = $(ui.draggable).data(),
			model = this.editView.shapeView.model,
			shape = model.get('shape'),
			units = shape.get('units'),
			canvas = $(event.target).find('canvas'),
			ox = canvas.offset().left,
			oy = canvas.offset().top,
			px = ui.position.left,
			py = ui.position.top,
			x0 = px - ox - model.get('footprintWidth') * 0.5,
			y0 = py - oy - model.get('footprintHeight') * 0.5,
			x1 = x0 / units.displayFactor(UnitSystems.imperial) * model.get('scaleX'),
			y1 = y0 / units.displayFactor(UnitSystems.imperial) * model.get('scaleY'),
			wq = console.log('<',px - ox, py - oy),
			wr = console.log('<<',x0, x0),
			we = console.log('<<<',x1, y1),
			
			
			tCid = shape.cid,
			gCid = data.gCid,
			ptCid = data.tCid,
			psCid = data.sCid,
			
			hitseat = shape.checkClosest(x1, y1) || shape.getFirstEmptySeat(),
			sCid, route, guest, previousGuest;		
		
		if (hitseat) {
			
			sCid = hitseat.cid;
			
			/*
			'guests/:gCid/remove/tables/:tCid/seats/:sCid/guest/add': 'moveGuestToTable',
			'tables/:tCid/seats/:sCid/guest/remove': 'removeGuestFromTable',
			'tables/:ptCid/seats/:psCid/guest/remove/tables/:tCid/seats/:sCid/guest/add' : 'transferGuestBetweenSeats'
			*/
			
			if (ptCid && psCid) {
				route = 'tables/'+ ptCid +'/seats/' + psCid + '/guest/remove/tables/'+ tCid +'/seats/'+ sCid +'/guest/add';
				this.model.transferGuestBetweenSeatsByCid(ptCid, psCid, tCid, sCid);
			} else if (gCid) {
				route = 'guests/' + gCid + '/remove/tables/'+ tCid +'/seats/'+ sCid +'/guest/add';
				this.model.moveGuestToShapeByCid(gCid, tCid, sCid);
			}
			
			console.log(route);
			//Backbone.history.navigate(route, true);
			
		}
		
	},
	
	handleGuestListDrop: function (event, ui) {
		console.log(event.target);
		var data = $(ui.draggable).data(),
		gCid = data.gCid,
		ptCid = data.tCid,
		psCid = data.sCid;
		
		if (ptCid && psCid) {
			this.model.removeGuestFromShapeByCid(ptCid, psCid)
		}
	},
	
	setSelection: function (event) {
		console.log(event);
	},
	
	clearMoveUI: function () {
		this.model.set({ state: 'active' });
	}
});

//});