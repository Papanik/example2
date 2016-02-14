define(["app/views/base/BaseSubCanvasView", "app/models/Style", "app/models/Seat", "libs/Backbone.Framework"], 

function(BaseSubCanvasView, Style) {
    
	var SeatView = BaseSubCanvasView.extend({

		initialize: function(attrs){

			this.style = attrs.style || new Style();

			if (attrs.style) {
				this.i11 = new Image();
				this.i11.src = FILEPATH + attrs.style.get('iconW');

				this.i12 = new Image();
				this.i12.src = FILEPATH + attrs.style.get('iconM');

				this.i21 = new Image();
				this.i21.src = FILEPATH + attrs.style.get('iconw');

				this.i22 = new Image();
				this.i22.src = FILEPATH + attrs.style.get('iconm');
			}


			if (this.model) this.setModel(this.model);	
			this.needsRedraw = true;
		},	

		setModel: function(model) {
			_.bindAll(this, 'removeSeat', 'invalidate', 'getPoint');

			this.model = model;
			this.model.bind('remove', this.removeSeat);
			this.model.bind('change', this.invalidate);

		},

		invalidate: function (){

			var pcx = this.model.previous('x'),
				pcy = this.model.previous('y'),
				pcw = this.model.previous('width'),
				pch = this.model.previous('height');
			//this.context.clearRect(pcx - pcw * 0.5, pcy - pch * 0.5, pcw, pch);
			if ( this.model.hasChanged('x') || this.model.hasChanged('y') || this.model.hasChanged('width') || this.model.hasChanged('height')) {
				this.needsRedraw = true;
			} 
		},

		draw: function (){

			var seat = this.model,
				round = Math.round,
				units = seat.get('table').get('units'),
				ctx = this.getContext(),
				type = parseInt(seat.get('type')),
				scaleX = 1/seat.get('table').get('scaleX'),
				scaleY = 1/seat.get('table').get('scaleY'),	
				img,cx,cy,cw,ch, point;

			switch (type) {			
			case SeatTypes.ADULT_FEMALE:
				img = this.i11;	
				break;
			case SeatTypes.ADULT_MALE:
				img = this.i12;	
				break;
			case SeatTypes.CHILD_FEMALE:
				img = this.i21;	
				break;
			case SeatTypes.CHILD_MALE:
				img = this.i22;	
				break;			
			}

			if (!_(img).isUndefined()) {
				cw = round(img.width * scaleX);
				ch = round(img.height * scaleY);
				point = this.getPoint(cw, ch);
				cx = point.x; 
				cy = point.y;
				ctx.drawImage(img, cx, cy, cw, ch);
			} else {			
				cw = seat.get('width');
				ch = seat.get('height');
				point = this.getPoint(cw, ch);
				cx = point.x;
				cy = point.y;
				ctx.fillEllipse(cx, cy, cw, ch, this.style.toJSON());
				
			}

			this.needsRedraw = false;
		},

		getPoint: function(cw, ch) {
			var seat = this.model,
				round = Math.round,			
				units = seat.get('table').get('units'),
				cx, cy;


			cx = round((seat.get('x') * units.displayFactor(UnitSystems.imperial)) - (cw * 0.5));
			cy = round((seat.get('y') * units.displayFactor(UnitSystems.imperial)) - (ch * 0.5));
			return { x: cx, y: cy }
		},

		removeSeat: function (model){

			model.unbind();
		}

	});
	
	return SeatView;
	
});